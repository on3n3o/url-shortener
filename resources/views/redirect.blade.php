@extends('layouts.app')

@section('content')
<div class="container has-text-centered">
    <div class="columns is-vcentered">
        <div class="column is-2">
            <figure class="image">
                <img src="https://dummyimage.com/160x600/000/fff" style="display:inline-block;width:160px;height:600px">
            </figure>
        </div>
        <div class="column is-6">
            <figure class="image">
                <img src="https://dummyimage.com/728x90/000/fff" style="display:inline-block;width:728px;height:90px">
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
                <img src="https://dummyimage.com/728x90/000/fff" style="display:inline-block;width:728px;height:90px">
            </figure>
        </div>
        <div class="column is-4">
            <figure class="image">
                <img src="https://dummyimage.com/300x250/000/fff" style="display:inline-block;width:300px;height:250px">
            </figure>
            <figure class="image">
                <img src="https://dummyimage.com/300x250/000/fff" style="display:inline-block;width:300px;height:250px">
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