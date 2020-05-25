@extends('layouts.app', ['selected' => 'dashboard'])

@section('content')
<div class="container">
    <div class="columns">
        <div class="column">
            Statistics for <a href="{{ config('app.url')}}/{{ $short_link->short }}">{{ config('app.url')}}/{{ $short_link->short }}</a> redirecting to <a href="{{ $short_link->url }}">{{ $short_link->url }}</a>
        </div>
    </div>
</div>
@endsection