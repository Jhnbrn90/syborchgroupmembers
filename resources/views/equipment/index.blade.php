@extends('layouts/master') 
@section('content')
    @include('layouts/nav')
<div id="app">
    <div class="flex justify-center">
        <h2 class="mb-4">
            I want to use:
        </h2>
    </div>

    <div class="flex justify-center text-xl">
        <ul class="list-reset">
            <li class="mb-2"><a href="/equipment/SFC-MS">SFC-MS</a></li>
            <li><a href="/equipments/GC-MS">GC-MS</a></li>
        </ul>
    </div>
</div>
@endsection