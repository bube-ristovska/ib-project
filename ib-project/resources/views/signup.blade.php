<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Sign up</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        body{
            height: 100vh;
            background: url("https://4kwallpapers.com/images/wallpapers/abstract-background-colorful-background-blue-background-1920x1080-8624.jpeg") no-repeat;
            background-size: cover;
        }
        #message {
            display:none;
            color: #2a2929;
            position: relative;
            padding: 15px;
            margin-top: 10px;
        }

        #message p {
            padding: 10px 35px;
            font-size: 12px;
        }

        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✓";
        }
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✕";
        }
    </style>
</head>
<body class="antialiased opacity-90	">
<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
    <a href="/login" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-gray-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Login</a>
</div>
<div class="w3-display-container w3-animate-opacity w3-text-white">
    <div class="w3-display-topleft w3-padding-small">
        <img src="https://old.finki.ukim.mk/Content/dataImages/news/big/finki_46.png" alt="" height="90px">
    </div>
</div>
<section class="px-4 py-6">
<main class="max-w-lg mx-auto">
    <main class="max-w-lg mx-auto mt-1 bg-gray-100 border border-gray-100 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl text-indigo-800 font-mono">Sign up!</h1>
        <form method="POST" action="/signup" class="mt-10">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-800"
                       for="name"
                >
                    Name
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="name"
                       value="{{old('name')}}"
                       id="name"
                       required
                >
            </div>

            @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="username"
                >
                    Username
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="text"
                       name="username"
                       value="{{old('username')}}"
                       id="username"
                       required
                >
            </div>
            @error('username')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="email"
                >
                    Email
                </label>

                <input class="border border-gray-400 p-2 w-full"
                       type="email"
                       name="email"
                       value="{{old('email')}}"
                       id="email"
                       required
                >
            </div>
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

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
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                       title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                       required
                >
            </div>
             <div class="mb-6">
                 <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        for="password_confirmation"
                 >
                     Re-type password
                 </label>
                <input class="border border-gray-400 p-2 w-full"
                       type="password"
                       name="password_confirmation"
                       id="password_confirmation"
                       required
                >
            </div>
            <div id="message" class="text-red-500 text-xs mt-1">
                <h3>Password must contain:</h3>
                <p id="letter" class="invalid">A lowercase letter</p>
                <p id="capital" class="invalid">A capital letter</p>
                <p id="number" class="invalid">A number</p>
                <p id="character" class="invalid">A special character</p>
                <p id="length" class="invalid">Minimum 8 characters</p>
            </div>

            <div class="mb-4 opacity-100">
                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                    Submit
                    </span>
                </button>
            </div>
        </form>
    </main>
</main>
</section>

</body>
<script>
    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var character = document.getElementById("character");

    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    myInput.onkeyup = function() {
        var lowerCaseLetters = /[a-z]/g;
        if(myInput.value.match(lowerCaseLetters)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }

        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }

        var specialCharacter = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/g; // Add your desired special characters to this regex
        if (myInput.value.match(specialCharacter)) {
            character.classList.remove("invalid");
            character.classList.add("valid");
        } else {
            character.classList.remove("valid");
            character.classList.add("invalid");
        }
    }
</script>
</html>
