@extends('layouts.app', ['selected' => 'error'])

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
                Oh no!
            </h1>
            <h2 class="subtitle is-4">
                You have been struck by 404 error!
            </h2>
            
        </div>
    </div>
</div>
@endsection