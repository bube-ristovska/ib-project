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
        .contain{
            width: 1000px;
            margin:auto;
        }
        .bgimg {
            background-image: url('https://img.freepik.com/free-vector/gradient-blur-pink-blue-abstract-background_53876-117324.jpg?size=626&ext=jpg&ga=GA1.1.1826414947.1699574400&semt=sph');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
        body{
            color:black;
        }

        body > div.bgimg.w3-display-container.w3-animate-opacity.w3-text-white > div > section > form{
            margin-top: 100px;
        }

    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@if (Auth::check())
    <nav class="bg-white-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
                          Icon when menu is closed.

                          Menu open: "hidden", Menu closed: "block"
                        -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                          Icon when menu is open.

                          Menu open: "block", Menu closed: "hidden"
                        -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="https://www.finki.ukim.mk/Content/dataImages/downloads/logo-large-500x500_2.png" alt="finki">
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="/" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" >Home</a>
                            <a href="https://courses.finki.ukim.mk/" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Courses</a>
                            <a href="https://courses.finki.ukim.mk/course/view.php?id=1663" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Consultations</a>
                            <a href="https://www.iknow.ukim.mk/Students/StudentsHome.aspx" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">IKNOW</a>
                            @if(auth()->check())
                                @if(auth()->user()->role()=='admin')
                                    <a href="/role" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Adjust roles</a>
                                @endif
                                @if(auth()->user()->role()=='student')
                                    <a href="/student" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">My grades</a>
                                @endif
                                @if(auth()->user()->role()=='teacher')
                                    <a href="/teacher" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add grades</a>
                                @endif
                            @else
                                <p>User is not authenticated</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">


                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://i.pravatar.cc/60?u={{auth()->id() }}" alt="">
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="/" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>
                <a href="https://courses.finki.ukim.mk/" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Courses</a>
                <a href="https://courses.finki.ukim.mk/course/view.php?id=1663" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Consultations</a>
                <a href="https://www.iknow.ukim.mk/Students/StudentsHome.aspx" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">IKNOW</a>
                @if(auth()->check())
                    @if(auth()->user()->role()=='admin')
                        <a href="/role" class="bg-gray-900 text-white" aria-current="page">Adjust roles</a>
                    @endif
                    @if(auth()->user()->role()=='student')
                        <a href="/student" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">My grades</a>
                    @endif
                    @if(auth()->user()->role()=='teacher')
                        <a href="/teacher" class="text-black-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add grades</a>
                    @endif
                @else
                    <p>User is not authenticated</p>
                @endif
            </div>
        </div>
    </nav>


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
<div>
    <section class="px-6 py-8 max-w-md mx-auto">

        <form method="POST" action="/role/update/{{$user->id}}" enctype="multipart/form-data" class="px-6 py-8 border border-gray-200 rounded-xl shadow-md">
            <h1 class="text-lg text-black  font-bold mb-4">
                Editing user: {{$user->username}}
            </h1>

            @csrf
            @method('PATCH')
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="name"
                >
                    Name
                </label>

                <input class="border border-gray-400 p-2 w-full text-black"
                       type="text"
                       name="name"
                       id="name"
                       value="{{ $user->name }}"
                       required
                >

                @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="role_id"
                >
                    Select a role
                </label>

                <select name="role_id" id="role_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                    @foreach(\App\Models\Role::all() as $role)
                        <option value="{{ $role->id }}">{{ $role->name}}</option>
                    @endforeach
                </select>

                @error('role_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Update
                    </span>
            </button>
        </form>
    </section>
</div>
</div>
</body>
</html>
