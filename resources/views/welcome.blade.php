@extends('layouts/master') 
@section('content')

<div id="app">
    @include('layouts/nav')
    @include('layouts/login')
    @include('layouts/register')
    @include('layouts/tools')

    <status-list :data="{{ $machines }}" auth="{{ Auth::check() }}"></status-list>

    <message-list :data="{{ $messages }}" auth="{{ Auth::check() }}"></message-list>
</div>
@endsection