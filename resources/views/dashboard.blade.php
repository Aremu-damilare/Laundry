<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf_token" content="{{ csrf_token() }}" />
</head>
<body>
    <h1>Welcome to the Dashboard, {{ auth()->user()->name }}!</h1>
    <button style="color: red;" onclick="logout()">Logout</button>
    

<script>
        function logout() {
        fetch('http://127.0.0.1:8000/logout/', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {            
            window.location.href = '/login'; 
        })
        .catch(error => {            
            console.error(error);
        });
    }

</script>
</body>
</html>
