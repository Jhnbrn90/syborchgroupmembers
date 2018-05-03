@extends('layouts/master') 
@section('content')

<div class="flex flex-column justify-center mb-8" style="margin-top: 100px;">
    <h1> {{ $equipment }} </h1>
</div>

<div class="flex justify-center mb-2">
    <input class="bg-blue-lightest border-blue shadow rounded h-8 text-center" type="text" placeholder="your name..." value=""
        name="name" autofocus required>
</div>

<div class="flex justify-center">
    <button class="hover:bg-blue-dark hover:text-white bg-white text-blue shadow-lg rounded border border-blue-dark px-8 py-4">{{ $equipment }} is running</button>
</div>
@endsection