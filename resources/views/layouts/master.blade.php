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

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

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

        .hidden {
            display: none;
        }
    </style>
</head>

<body class="bg-white">

    @yield('content')

    <script src="js/app.js"></script>
</body>

</html>