<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SSC-2013 Batch</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-primary-800 via-primary-700 to-primary-900 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <!-- Logo/Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold text-gray-900">Admin Login</h1>
                <p class="text-gray-600 mt-2">SSC-2013 Batch Donation System</p>
            </div>

            <!-- Login Form -->
            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf

                @if($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg text-sm">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <div class="mb-5">
                    <label for="email" class="label">Email Address</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           class="input-field @error('email') border-red-500 @enderror" 
                           placeholder="admin@example.com"
                           required 
                           autofocus>
                </div>

                <div class="mb-6">
                    <label for="password" class="label">Password</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="input-field @error('password') border-red-500 @enderror" 
                           placeholder="••••••••"
                           required>
                </div>

                <div class="mb-6 flex items-center">
                    <input type="checkbox" 
                           id="remember" 
                           name="remember" 
                           class="w-4 h-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>

                <button type="submit" class="btn-primary w-full">
                    Login to Dashboard
                </button>
            </form>

            <!-- Footer -->
            <p class="text-center text-sm text-gray-500 mt-6">
                <a href="{{ route('home') }}" class="text-primary-600 hover:text-primary-700 font-medium">
                    ← Back to Homepage
                </a>
            </p>
        </div>
    </div>
</body>
</html>
