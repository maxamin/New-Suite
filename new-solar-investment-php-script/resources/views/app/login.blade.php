<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

  <div class="w-full max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Header Section with Image and Logo -->
    <div class="relative">
      <img src="https://placehold.co/720x250" alt="Header Background" class="w-full h-40 object-cover opacity-80">
      <div class="absolute inset-0 flex justify-center items-center">
        <img src="https://placehold.co/80x80" alt="Logo" class="w-16 h-16">
        <span class="text-green-600 text-3xl font-bold ml-2">bp</span>
      </div>
    </div>

    <!-- Login Form Section -->
    <div class="p-6">
      <form class="space-y-4">
        <div>
          <label class="block text-gray-700 text-sm font-medium" for="mobile-number">Mobile number</label>
          <input type="text" id="mobile-number" placeholder="+63 Enter your Mobile number" class="w-full mt-1 p-3 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
        </div>
        <div>
          <label class="block text-gray-700 text-sm font-medium" for="password">Password</label>
          <input type="password" id="password" placeholder="Password ( ≥6 characters )" class="w-full mt-1 p-3 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
        </div>
        <div class="flex justify-between items-center text-sm mt-2">
          <span class="text-gray-600">Don't have an account?</span>
          <a href="#" class="text-green-600 font-medium hover:underline">Sign up</a>
        </div>
        <button type="submit" class="w-full mt-4 py-3 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Login</button>
      </form>
    </div>

    <!-- Statistics Section -->
    <div class="px-6 py-4 bg-gray-50">
      <div class="grid grid-cols-3 text-center">
        <div>
          <p class="text-2xl font-bold text-gray-800">10K+</p>
          <p class="text-sm text-gray-500">Users</p>
        </div>
        <div>
          <p class="text-2xl font-bold text-gray-800">1.2M</p>
          <p class="text-sm text-gray-500">Transactions</p>
        </div>
        <div>
          <p class="text-2xl font-bold text-gray-800">5K+</p>
          <p class="text-sm text-gray-500">Downloads</p>
        </div>
      </div>
    </div>

    <!-- Footer Section -->
    <div class="flex flex-col items-center py-4 border-t border-gray-200">
      <img src="https://placehold.co/20x20" alt="Footer Logo" class="w-5 h-5 mb-2">
      <p class="text-xs text-gray-500">BP p.l.c. Copyright © 1996–2024</p>
    </div>
  </div>

</body>
</html>