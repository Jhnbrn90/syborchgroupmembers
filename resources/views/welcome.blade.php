@extends('layouts/master') 

@section('head')
    <script src="js/confetti.min.js"></script>

@endsection

@section('content')

@if (Carbon\Carbon::today() == Carbon\Carbon::parse('19 june')) 
    <canvas style="position:relative; z-index:1;" id="confetti-holder"></canvas>
@endif

    <div id="app" style="position:absolute; top:0; left:0; right: 0; z-index:9;">
        @include('layouts/nav')
        @include('layouts/login')
        @include('layouts/register')
        @include('layouts/tools')

        <status-list :data="{{ $machines }}" auth="{{ Auth::check() }}"></status-list>

        <message-list :data="{{ $messages }}" auth="{{ Auth::check() }}"></message-list>
    
        <div class="mt-4 -mb-6 flex justify-center text-xs">by John Braun</div>
    
    </div>




<script>
    var confettiSettings = {"target":"confetti-holder","max":"80","size":"1","animate":true,"props":["circle","square","triangle","line"],"colors":[[165,104,246],[230,61,135],[0,199,228],[253,214,126]],"clock":"20","width":"1280","height":"860"};
        var confetti = new ConfettiGenerator(confettiSettings);
    confetti.render();
</script>

@endsection
