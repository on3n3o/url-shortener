@extends('layouts.app', ['selected' => 'dashboard'])

@section('content')
<div class="container has-text-centered">
    <div class="columns is-vcentered">
        <div class="column is-5">
            <figure class="image is-4by3">
                <img src="https://picsum.photos/800/600/?random" alt="Description">
            </figure>
        </div>
        <div class="column is-6 is-offset-1">
            <h1 class="title is-2">
                You have done it!
            </h1>
            <h2 class="subtitle is-4">
                nice :)
            </h2>
            <br>
            <p>{{ config('app.url') }}/{{ $shortLink->short }}</p>
            <br>
            <p>Do you want to make another one?</p><a class="button is-link" href="/">YES!</a>
        </div>
    </div>
</div>
@endsection
