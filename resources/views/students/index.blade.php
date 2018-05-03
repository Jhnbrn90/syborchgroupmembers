@extends('layouts/master') 
@section('content')
    @include('layouts/nav')

<div id="app">

    <div class="w-full">
        <div class="container mx-auto">
            <div class="tracking-tight font-xs mb-4">
                <a href="/" class="no-underline font-medium text-black hover:text-blue-dark">
                &larr; back
            </a>
            </div>

            <div class="p-8 w-full shadow-lg bg-white border border-t border-grey-lighter">
                <div>
                    <student-selector></student-selector>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection