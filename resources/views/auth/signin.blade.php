<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-[420px]">
        <!-- Header -->
        <div class="mb-8 text-left">
            <h2 class="text-3xl font-bold mb-1.5 text-white tracking-tight">Sign in to your account</h2>
            <p class="text-[#8c94a3] text-sm">Enter your details to proceed further</p>
        </div>

        <form class="space-y-4" action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Email Input -->
            <div class="form-control w-full">
                <label class="label pb-1.5 pl-0">
                    <span class="label-text text-[#b4bac5] font-semibold text-sm">Email Address</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 text-[#8c94a3]">
                            <path d="M3 4a2 2 0 00-2 2v8a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2H3zm0 2h14v.5l-7 3.5-7-3.5V6zm0 2.82l6.55 3.275a1 1 0 00.9 0L17 8.82V14H3V8.82z" />
                        </svg>
                    </div>
                    <input type="email" name="email" class="input input-bordered w-full pl-10 custom-input text-white h-11 text-sm rounded-lg" placeholder="name@company.com" required />
                </div>
            </div>

            <!-- Password Input -->
            <div class="form-control w-full">
                <label class="label pb-1.5 pl-0">
                    <span class="label-text text-[#b4bac5] font-semibold text-sm">Password</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <!-- Key icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 text-[#8c94a3]">
                          <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v-2a1 1 0 00-1-1H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="password" name="password" class="input input-bordered w-full pl-10 custom-input text-white h-11 text-lg tracking-widest rounded-lg" placeholder="••••••••" required />
                </div>
                <div class="text-right mt-2 mb-2">
                    <a href="#" class="text-sm font-semibold text-[#828df8] hover:text-[#9ea7fc]">Forgot password?</a>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="">
                <button class="btn w-full h-[46px] min-h-0 bg-[#7c83fd] hover:bg-[#6c74fa] border-none text-white text-base font-bold rounded-lg" type="submit">
                    Sign In
                </button>
            </div>

            <p class="text-center text-[13px] mt-8 text-[#8c94a3] pt-2">
                Don't have an account? 
                <a href="#" class="text-[#828df8] font-semibold hover:text-[#9ea7fc] hover:underline underline-offset-2 transition-all">Sign up now</a>
            </p>
        </form>
    </div>
    </div>
</body>
</html>
