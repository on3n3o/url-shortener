@extends('layouts.app')

@section('content')
<div class="container has-text-centered">
    <div class="columns is-vcentered">
        <div class="column is-2">
            <figure class="image">
                @if(config('app.env') == 'production')
                <script type="text/javascript">
                    atOptions = {
                        'key': '{{config("ads.ad600x160")}}',
                        'format': 'iframe',
                        'height': 600,
                        'width': 160,
                        'params': {}
                    };
                    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bestdisplayformats.com/{{config("ads.ad600x160")}}/invoke.js"></scr' + 'ipt>');
                </script>
                @else
                <img src="https://dummyimage.com/160x600/000/fff" style="display:inline-block;width:160px;height:600px">
                @endif
            </figure>
        </div>
        <div class="column is-6">
            <figure class="image">
                @if(config('app.env') == 'production')
                <script type="text/javascript">
                    atOptions = {
                        'key': '{{config("ads.ad90x728")}}',
                        'format': 'iframe',
                        'height': 90,
                        'width': 728,
                        'params': {}
                    };
                    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bestdisplayformats.com/{{config("ads.ad90x728")}}/invoke.js"></scr' + 'ipt>');
                </script>
                @else
                <img src="https://dummyimage.com/728x90/000/fff" style="display:inline-block;width:728px;height:90px">
                @endif
            </figure>
            <h1 class="title is-2">
                You are being redirected <br>in <span id="time-remaining">5</span> seconds
            </h1>
            <h2 class="subtitle is-4">
                from {{ config('app.url') }}/{{ $short_link->short }}
            </h2>
            <br>
            <p>to <a href="{{ $short_link->url }}">{{ $short_link->url }}</a></p>
            <br>
            <br>
            <p>Is this redirect suspicious?</p>
            <br>
            <p>
                <button class="button is-success is-light">NO</button>
                <a href="/" class="button is-danger is-light">YES! Take me back!</a>
            </p>
            <br>
            <figure class="image">
                @if(config('app.env') == 'production')
                <script type="text/javascript">
                    atOptions = {
                        'key': '{{config("ads.ad90x728")}}',
                        'format': 'iframe',
                        'height': 90,
                        'width': 728,
                        'params': {}
                    };
                    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bestdisplayformats.com/{{config("ads.ad90x728")}}/invoke.js"></scr' + 'ipt>');
                </script>
                @else
                <img src="https://dummyimage.com/728x90/000/fff" style="display:inline-block;width:728px;height:90px">
                @endif
            </figure>
        </div>
        <div class="column is-4">
            <figure class="image">
                @if(config('app.env') == 'production')
                <script type="text/javascript">
                    atOptions = {
                        'key': '{{config("ads.ad250x300")}}',
                        'format': 'iframe',
                        'height': 250,
                        'width': 300,
                        'params': {}
                    };
                    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bestdisplayformats.com/{{config("ads.ad250x300")}}/invoke.js"></scr' + 'ipt>');
                </script>
                @else
                <img src="https://dummyimage.com/300x250/000/fff" style="display:inline-block;width:300px;height:250px">
                @endif
            </figure>
            <figure class="image">
                @if(config('app.env') == 'production')
                <script type="text/javascript">
                    atOptions = {
                        'key': '{{config("ads.ad250x300")}}',
                        'format': 'iframe',
                        'height': 250,
                        'width': 300,
                        'params': {}
                    };
                    document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bestdisplayformats.com/{{config("ads.ad250x300")}}/invoke.js"></scr' + 'ipt>');
                </script>
                @else
                <img src="https://dummyimage.com/300x250/000/fff" style="display:inline-block;width:300px;height:250px">
                @endif
            </figure>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var counter = 5;
    var interval = setInterval(function() {
        span = document.getElementById("time-remaining");
        span.innerHTML = counter;
        counter--;
        // Display 'counter' wherever you want to display it.
        if (counter == 0) {
            // Display a login box
            clearInterval(interval);
            window.location.href = '{{ $short_link->url }}';
        }
    }, 1000);
</script>
@endpush