<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Laundry;
use App\Models\PaymentInformation;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB; 


use App\Notifications\EmailVerification;


class UserController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle user login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended('/dashboard'); 
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Handle user registration
    public function register(Request $request)
    {

        // try {
        
                $data = $request->validate([
                    'name' => 'required|string|max:255',
                    'phoneNumber' => 'required|string|max:255',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|string|min:8|confirmed',

                    // 
                    'crno' => 'required|string|max:255',
                    'accountName' => 'required|string|max:255',
                    'accountNumber' => 'required|string|max:255',
                    'bankName' => 'required|string|max:255',
                    'iban' => 'required|string|max:255',
                    'payableDate' => 'required|date',
                    'payment_method' => 'required|string',

                    'deliveryCost' => 'required|string',
                    'image_header' => 'required|image|mimes:jpeg,png,jpg,gif',
                    'image_logo' => 'required|image|mimes:jpeg,png,jpg,gif',
                    'laundryName' => 'required|string|max:255',
                    'laundryPhoneNumber' => 'required|string|max:255',
                    'minimumCharge' => 'required|string',
                    'discount' => 'required|string',
                    'price_list' => 'required|string',
                    'rating' => 'required|string',
                    'separate_qleaning' => 'required|string',
                    'times' => 'required|string',
                ]);

                DB::beginTransaction();

                // Create a new user
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phoneNumber' => $data['phoneNumber'],
                    'password' => bcrypt($data['password']),
                ]);
                
                // $user->notify(new EmailVerification($user));         

                // Save Laundry Information
                $laundryInformation = Laundry::create([
                    'user_id' => $user->id,
                    'deliveryCost' => $data['deliveryCost'],
                    'image_header' => $data['image_header'],
                    'image_logo' => $data['image_logo'],
                    'laundryName' => $data['laundryName'],
                    'laundryPhoneNumber' => $data['laundryPhoneNumber'],
                    'minimumCharge' => $data['minimumCharge'],
                    'discount' => $data['discount'],
                    'price_list' => $data['price_list'],
                    'rating' => $data['rating'],
                    'separate_qleaning' => $data['separate_qleaning'],
                    'times' => $data['times'],
                ]);

                // Save Payment Information
                $paymentInformation = PaymentInformation::create([
                    'user_id' => $user->id,
                    // 'laundry_id' => $laundryInformation->id,
                    'crno' => $data['crno'],
                    'accountName' => $data['accountName'],
                    'accountNumber' => $data['accountNumber'],
                    'bankName' => $data['bankName'],
                    'iban' => $data['iban'],
                    'payableDate' => $data['payableDate'],
                    'payment_method' => $data['payment_method'],
                ]);

                DB::commit();


                Auth::login($user);                 
                
                return redirect('/dashboard'); 

        // } catch (\Exception $e) {
        //     // Something went wrong, rollback the transaction and handle the error
        //     DB::rollBack();
        //     return back()->withErrors(['error' => 'An error occurred. Please try again.']);
        // }
    }


    
    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/login');
    }
}
