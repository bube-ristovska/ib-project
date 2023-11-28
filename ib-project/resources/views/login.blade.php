<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Log in</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body{
            height: 100vh;
            background: url("https://4kwallpapers.com/images/wallpapers/glass-light-abstract-background-blue-background-3d-3840x2160-8742.jpg") no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body class="antialiased opacity-90">
<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
    <a href="/signup" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Signup</a>
</div>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-topleft w3-padding-large w3-xlarge">
        <img src="https://old.finki.ukim.mk/Content/dataImages/news/big/finki_46.png" alt="" height="100px">
    </div>
</div>

<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl font-mono">Log In!</h1>
        <form method="POST" action="/login" class="mt-10">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="email"
                >
                    Email
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="email"
                       name="email"
                       id="email"
                       value="{{ old('email') }}"
                       required
                >
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="password"
                >
                    Password
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="password"
                       name="password"
                       id="password"
                       required
                >


            </div>
            <div class="mb-6">
            @error('credentials')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-6">
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Submit
                    </span>
                </button>
            </div>

        </form>
    </main>
</section>
</body>
</html>
