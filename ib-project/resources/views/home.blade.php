<!DOCTYPE html>
<html>
<head>
    <title>Home screen</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,h1 {font-family: "Raleway", sans-serif}
        body, html {height: 100%}
        .bgimg {
            background-image: url('https://img.freepik.com/free-vector/gradient-blur-pink-blue-abstract-background_53876-117324.jpg?size=626&ext=jpg&ga=GA1.1.1826414947.1699574400&semt=sph');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@if (Auth::check())
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
            <form method="POST" action="/logout" style="margin-top: 50px; margin-right: 30px">
                @csrf
                <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

            @if (Route::has('signup'))
                <a href="{{ route('signup') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endauth
    </div>
@endif
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-topleft w3-padding-large w3-xlarge">
       <img src="https://old.finki.ukim.mk/Content/dataImages/news/big/finki_46.png" alt="" height="100px">
    </div>
    <div class="w3-display-middle">
        @if(auth()->check())
            <h1 class="w3-jumbo w3-animate-top text-indigo-700">Hi {{ auth()->user()->name }}</h1>
            <hr class="w3-border-grey" style="margin:auto;width:40%">
        <div class="text-xl text-pink-600">
            <script type="text/javascript" src="https://www.brainyquote.com/link/quotebr.js"></script>
        </div>
        @else
            <h1 class="w3-jumbo w3-animate-top text-indigo-700">Hi there!</h1>
            <a href="/login" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Login</a>
            <a href="/signup" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign up</a>
            <a href="https://www.iknow.ukim.mk/Students/StudentsHome.aspx" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">IKNOW</a>
        @endif

    </div>
</div>

</body>
</html>
