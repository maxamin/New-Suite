<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-[#F0F8F6] flex items-center justify-center min-h-screen">
  <div class="w-[360px] bg-white rounded-lg shadow-md">
     <form action="{{url('login')}}" method="post">
                    @csrf
    <!-- Header Section with Full Background -->
    <div class="relative bg-[#F0F8F6]">
      <img src="{{asset('public/bp/img/banner.png')}}" class="w-full h-[200px] object-cover rounded-t-lg opacity-80">
      <div class="absolute inset-0 flex justify-center items-center mt-8">
        <!--<img src="https://placehold.co/80x80" alt="BP Logo" class="w-[50px] h-[50px]">
        <span class="text-[#44A329] font-medium text-lg ml-2">bp</span>-->
      </div>
    </div>
    
    <!-- Form Section -->
    <div class="p-6">
      <form class="space-y-4">
        <!-- Mobile Number -->
        <div>
          <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile number</label>
          <div class="mt-1">
            <input type="number" name="phone" placeholder="+234 Enter your Mobile number" class="w-full p-2 border border-gray-300 rounded-md text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#44A329] focus:border-[#44A329]">
          </div>
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="mt-1">
            <input type="password" name="password" placeholder="Password ( ≥6 characters )" class="w-full p-2 border border-gray-300 rounded-md text-gray-500 focus:outline-none focus:ring-2 focus:ring-[#44A329] focus:border-[#44A329]">
          </div>
        </div>

        <!-- Sign Up Link -->
        <div class="flex justify-between items-center text-sm">
          <span class="text-gray-500">Don't have an account?</span>
          <a href="{{url('register')}}" class="text-[#44A329] font-medium hover:underline">Sign up</a>
        </div>
             login
        <!-- Login Button -->
        <button type="submit" class="w-full py-2 bg-[#44A329] text-white font-medium rounded-md text-center hover:bg-[#3c9227]">Login</button>
      </form>
    </div>

    <!-- Footer -->
            <div class="mt-8 text-center">
                <img src="{{asset('public/bp/img/copyright.png')}}" alt="BP logo" class="mx-auto mb-1">
                <p class="text-xs text-gray-500">BP p.l.c. Copyright © 1996–2024</p>
                <P></P>
            </div>
        </div>
        @include('alert-message')
        
    </div>
</form>
@include('alert-message')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>
    function submitForLogin()
    {
        var phone = document.querySelector('input[name="phone"]').value;
        var password = document.querySelector('input[name="password"]').value;
        document.querySelector('.load').style.display='block';

        if (phone != ''){
            if (password != ''){
                var data = {
                    phone: phone,
                    password: password
                }
                fetch('{{route('login.submit')}}',
                    {
                        method:"POST",
                        body:JSON.stringify(data),
                        headers: {'Content-type': 'application/json; charset=UTF-8',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')}})
                    .then(response => response.json())
                    .then(data => {
                        document.querySelector('.load').style.display='none';
                        message(data.message)
                        if (data.status == true){
                            window.location.href = data.url
                        }
                    }).catch();
            }else {
                message('Enter password');
            }
        }else{
            message('Enter phone number');
        }
    }
</script>
</body>
</html>