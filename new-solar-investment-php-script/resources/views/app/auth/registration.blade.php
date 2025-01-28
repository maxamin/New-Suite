<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#F0F8F6] flex items-center justify-center min-h-screen">
    <div class="w-[360px] bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header Section -->
        <div class="relative bg-[#F0F8F6]">
            <img src="{{asset('public/bp/img/banner.png')}}" alt="Background" class="w-full h-[200px] object-cover opacity-80">
            <div class="absolute inset-0 flex flex-col justify-center items-center">
                <!--<img src="https://placehold.co/80x80" alt="BP Logo" class="w-[50px] h-[50px] mb-2">
                <span class="text-[#44A329] font-bold text-lg">bp</span>-->
            </div>
        </div>

        <!-- Form Section -->
        <form action="{{url('register')}}" id="reg" method="post">@csrf
        <div class="p-6">
            <form class="space-y-5">
                <!-- Mobile Number -->
                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                    <div class="mt-1">
                        <input type="number" name="phone" placeholder="+234 Enter your mobile number" class="w-full p-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#44A329] focus:border-[#44A329]">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" placeholder="Password (≥6 characters)" class="w-full p-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#44A329] focus:border-[#44A329]">
                </div>

                <!-- Captcha -->
                <div>
                    <label for="captcha" class="block text-gray-600 text-sm font-medium mb-2">Captcha</label>
                    <div class="flex items-center border border-gray-300 rounded-lg bg-white px-3 py-2">
                        <input type="text" name="captcha" placeholder="Enter Captcha" class="flex-1 outline-none text-gray-600 text-sm" />
                        
                        <uni-image data-v-7a65a90e="">
                                        <div style="background-image: url({{$code['img']}}); background-position: 0% 0%; background-size: 100% 100%; background-repeat: no-repeat;"></div>
                                        <img
                                            src="{{$code['img']}}"
                                            draggable="false"></uni-image>
                    </div>
                </div>
                
                <!-- Referral Code -->
                <div>
                    <label for="referral" class="block text-sm font-medium text-gray-700">Referral Code (optional)</label>
                    <div class="mt-1">
                        <input type="text" name="ref_by" placeholder="Enter Referral Code" class="w-full p-3 border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#44A329] focus:border-[#44A329]"
                    value="{{isset($ref_by) && !empty($ref_by) && $ref_by != null ? $ref_by : \App\Models\User::select('ref_id')->first()->ref_id}}">
                    </div>
                </div>

                <!-- Login link -->
                <div class="text-right text-sm text-gray-500">
                    Already have an account? <a href="{{url('login')}}" class="text-[#36a644] font-medium">Login</a>
                </div>
                      sign up
                <!-- Sign Up Button -->
                <button type="submit" class="w-full bg-[#36a644] text-white text-center font-medium text-lg py-3 rounded-lg hover:bg-[#2c8a38] transition-colors">Sign Up</button>
            </form>

            <!-- Footer -->
            <div class="mt-8 text-center">
                <img src="{{asset('public/bp/img/copyright.png')}}" alt="BP logo" class="mx-auto mb-1">
                <p class="text-xs text-gray-500">BP p.l.c. Copyright © 1996–2024</p>
            </div>
        </div>
        @include('alert-message')
    </div>
    @include('alert-message')
<script>
    function login(){
        var varificationCode = '{{$code['code']}}';

        var phone = document.querySelector('input[name="phone"]').value;
        var password = document.querySelector('input[name="password"]').value;
        var code = document.querySelector('input[name="code"]').value;

    
        }
        if (code !== varificationCode){
            message('Invalid verification captcha');
            return true;
        }
</script>

</body>
</html