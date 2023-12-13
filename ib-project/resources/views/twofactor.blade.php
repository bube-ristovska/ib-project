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
            background: url("https://img.freepik.com/free-vector/blue-curve-frame-template_53876-114605.jpg") no-repeat;
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
<body class="antialiased opacity-90">
<main class="max-w-lg mx-auto mt-1 bg-gray-100 border border-gray-100 p-6 rounded-xl mt-14">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    @if(session()->has('message'))
                        <p class="alert alert-info">
                            {{ session()->get('message') }}
                        </p>
                    @endif
                    <form method="POST" action="{{ route('verify.store') }}">
                        {{ csrf_field() }}
                        <h1 class="text-center font-bold text-xl text-indigo-800 font-mono">Two-factor authentication</h1>

                        <p class="text-muted">
                            You have received an email which contains two factor login code.
                            If you haven't received it, press <a href="{{ route('verify.resend') }}">here</a>.
                        </p>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                            </div>
                            <input name="two_factor_code" type="text" class="border border-gray-400 p-2 w-full form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus placeholder="Two Factor Code">
                            @if($errors->has('two_factor_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('two_factor_code') }}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Submit
                                    </span>
                                </button>
                            </div>
                            <div class="col-4">
                                <form method="POST" action="/logout" style="margin-top: 50px; margin-right: 30px">
                                    @csrf
                                    <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium rounded-lg group bg-gradient-to-br from-gray-500 to-gray-500 group-hover:from-gray-500 group-hover:to-gray-100 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-800">
                                    <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                   Logout
                                    </span>
                                    </button>                                </form>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</body>

</html>
