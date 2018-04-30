<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ config('app.name') }} </title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch:400,700" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Work Sans', sans-serif;
            font-weight: 100;
            margin-bottom: 20px;
        }

        .message {
            margin-bottom: 35px;
        }
    </style>
</head>

<body class="bg-white">
    <div id="app">
    @include('layouts/nav')
    @include('layouts/login')
    @include('layouts/register')
    @include('layouts/tools')

        <div class="flex mt-8 pt-4 justify-center items-center border-t border-grey-light">
            <div class="inline-flex bg-blue w-2 h-2 rounded full mr-2 shadow"></div>
            <div class="mr-4 text-sm">SFC-MS</div>

            <div class="inline-flex bg-green w-2 h-2 rounded full mr-2 shadow"></div>
            <div class="mr-4 text-sm">NMR 300</div>

            <div class="inline-flex bg-red w-2 h-2 rounded full mr-2 shadow"></div>
            <div class="mr-4 text-sm">NMR 500</div>

            <div class="inline-flex bg-orange w-2 h-2 rounded full mr-2 shadow"></div>
            <div class="mr-4 text-sm">NMR 600</div>
        </div>

        <message-list :data="{{ $messages }}" auth="{{ Auth::check() }}"></message-list>

    </div>

    <script src="js/app.js"></script>
</body>

</html>