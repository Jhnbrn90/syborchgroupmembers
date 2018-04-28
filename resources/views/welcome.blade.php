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
        }

        .message {
            margin-bottom: 35px;
        }
    </style>
</head>

<body class="bg-white">
    @include('layouts/nav')
    @include('layouts/tools')

    <div id="app">

        <div class="flex mt-8 justify-center border-t border-grey-light py-4">
            <add-message></add-message>
        </div>

        <div class="flex mt-2 justify-center">
            <div class="w-full text-center">
                <div class="bg-white h-auto rounded shadow py-4 max-w-lg mx-auto px-8">
                    <p class="font-thin mb-8">Message log of <span class="font-medium">Friday 24 April</span></p>

                    <message-list :messages="{{ $messages }}"></message-list>

                </div>
            </div>
        </div>

    </div>

    <script src="js/app.js"></script>
</body>

</html>