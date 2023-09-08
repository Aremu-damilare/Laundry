<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>  Registration </title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins',sans-serif;
      }
      body{
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #4070f4;
      }
      .container{
        max-width: 700px;
        width: 100%;
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.15);
      }
      .container .title{
        font-size: 25px;
        font-weight: 500;
        position: relative;
      }
      .container .title::before{
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        border-radius: 5px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
      }
      .content form .user-details{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
      }
      form .user-details .input-box{
        margin-bottom: 15px;
        width: calc(100% / 2 - 20px);
      }
      form .input-box span.details{
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
      }
      .user-details .input-box input{
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
      }
      .user-details .input-box input:focus,
      .user-details .input-box input:valid{
        border-color: #9b59b6;
      }
       form .gender-details .gender-title{
        font-size: 20px;
        font-weight: 500;
       }
       form .category{
         display: flex;
         width: 80%;
         margin: 14px 0 ;
         justify-content: space-between;
       }
       form .category label{
         display: flex;
         align-items: center;
         cursor: pointer;
       }
       form .category label .dot{
        height: 18px;
        width: 18px;
        border-radius: 50%;
        margin-right: 10px;
        background: #d9d9d9;
        border: 5px solid transparent;
        transition: all 0.3s ease;
      }
       #dot-1:checked ~ .category label .one,
       #dot-2:checked ~ .category label .two,
       #dot-3:checked ~ .category label .three{
         background: #9b59b6;
         border-color: #d9d9d9;
       }
       form input[type="radio"]{
         display: none;
       }
       form .button{
         height: 45px;
         margin: 35px 0
       }
       
       form .button input{
         height: 100%;
         width: 100%;
         border-radius: 5px;
         border: none;
         color: #fff;
         font-size: 18px;
         font-weight: 500;
         letter-spacing: 1px;
         cursor: pointer;
         transition: all 0.3s ease;
         background: linear-gradient(135deg, #71b7e6, #9b59b6);
       }
       form .button input:hover{
        /* transform: scale(0.99); */
        background: linear-gradient(-135deg, #71b7e6, #9b59b6);
        }
        
        .input-box.button input{
          color: #fff;
          letter-spacing: 1px;
          border: none;
          background: #4070f4;
          cursor: pointer;
        }
        .input-box.button input:hover{
          background: #0e4bf1;
        }
       @media(max-width: 584px){
       .container{
        max-width: 100%;
      }
      form .user-details .input-box{
          margin-bottom: 15px;
          width: 100%;
        }
        form .category{
          width: 100%;
        }
        .content form .user-details{
          max-height: 300px;
          overflow-y: scroll;
        }
        .user-details::-webkit-scrollbar{
          width: 5px;
        }
        }
        @media(max-width: 459px){
        .container .content .category{
          flex-direction: column;
        }
      }
      
      form .text h3{
       color: #333;
       width: 100%;
       text-align: center;
      }
      form .text h3 a{
        color: #4070f4;
        text-decoration: none;
      }
      form .text h3 a:hover{
        text-decoration: underline;
      }

      span.text-danger {
        color: red;
    }

    </style>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif
    <div class="content">
      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
         @csrf
        <div class="user-details">
          <div class="input-box">
            <h5>User Info</h5>
          </div>
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>          
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phoneNumber" placeholder="Enter your number" required>
            @error('phoneNumber')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" placeholder="Enter your password" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="password_confirmation"  placeholder="Confirm your password" required>
          </div>
        </div>  
        
        <div class="user-details">        
          <div class="input-box">
            <h5>Laundry Info</h5>
          </div>  
          <!-- Additional input fields -->
            <div class="input-box">
              <span class="details">Delivery Cost</span>
              <input type="number" name="deliveryCost" placeholder="Enter delivery cost" required>
              @error('deliveryCost')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Image Header</span>
              <input type="file" name="image_header" accept="image/*" required>
              @error('image_header')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Image Logo</span>
              <input type="file" name="image_logo" accept="image/*" required>
              @error('image_logo')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Laundry Name</span>
              <input type="text" name="laundryName" placeholder="Enter laundry name" required>
              @error('laundryName')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Laundry Phone Number</span>
              <input type="tel" name="laundryPhoneNumber" placeholder="Enter laundry phone number" required>
              @error('laundryPhoneNumber')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Minimum Charge</span>
              <input type="number" name="minimumCharge" placeholder="Enter minimum charge" required>
              @error('minimumCharge')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Discount</span>
              <input type="nmuber" name="discount" placeholder="Enter discount" required>
              @error('discount')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Price List</span>
              <input type="number" name="price_list" placeholder="Enter price list" required>
              @error('price_list')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Rating</span>
              <input type="text" name="rating" placeholder="Enter rating" required>
              @error('rating')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Separate Cleaning</span>
              <input type="text" name="separate_qleaning" placeholder="Enter separate cleaning" required>
              @error('separate_qleaning')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="input-box">
              <span class="details">Times</span>
              <input type="number" name="times" placeholder="Enter times" required>
              @error('times')
              <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

        </div>

        <div class="user-details">
          <!-- Additional input fields -->
          <div class="input-box">
            <h5>Payment Info</h5>
          </div>
          <div class="input-box">
            <span class="details">CRNO</span>
            <input type="text" name="crno" placeholder="Enter CRNO" required>
            @error('crno')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="input-box">
            <span class="details">Account Name</span>
            <input type="text" name="accountName" placeholder="Enter account name" required>
            @error('accountName')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="input-box">
            <span class="details">Account Number</span>
            <input type="text" name="accountNumber" placeholder="Enter account number" required>
            @error('accountNumber')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="input-box">
            <span class="details">Bank Name</span>
            <input type="text" name="bankName" placeholder="Enter bank name" required>
            @error('bankName')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="input-box">
            <span class="details">IBAN</span>
            <input type="text" name="iban" placeholder="Enter IBAN" required>
            @error('iban')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="input-box">
            <span class="details">Payable Date</span>
            <input type="date" name="payableDate" required>
            @error('payableDate')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="input-box">
            <span class="details">Payment Method</span>
            <select name="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="bank_transfer">Bank Transfer</option>
                <option value="cash">Cash</option>
            </select>
            @error('payment_method')
              <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
        </div>

        

        
        <div class="input-box button">
          <input type="submit" value="Register">
        </div>
        <div class="text">
          <h3>Already have an account? <a href="{{ route('login') }}">Login now</a></h3>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
