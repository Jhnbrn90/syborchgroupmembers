@extends('layouts/master') 
@section('content')
    @include('layouts/nav')
<div id="app">
    <div class="flex justify-center">
        <h1>Measuring on: </h1>
    </div>
    <div class="flex justify-center">
        <ul>
            <li>SFC-MS</li>
            <li>GC-MS</li>
            <li>NMR 300</li>
            <li>NMR 500</li>
            <li>NMR 600</li>
        </ul>
    </div>
</div>
@endsection