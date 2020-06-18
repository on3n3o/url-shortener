@extends('layouts.app', ['selected' => 'features'])

@section('content')
<div class="container has-text-centered">
    <div class="columns is-vcentered">
        <div class="column is-5">
            <figure class="image is-16by9">
                <img src="/img/dashboard.png" alt="Link Statistic Page Preview">
            </figure>
        </div>
        <div class="column is-6 is-offset-1">
            <h1 class="title is-2">
                {{__('Link Statistics')}}
            </h1>
            <h2 class="subtitle is-4">
                {{__('Links created with account have stats')}}
            </h2>
            <br>
            <p>
                {{__('Our clear Stats Panel gives you insight into who and how clicked your link down to browser, device they where using')}}.
            </p>
        </div>
    </div>

    <div class="columns is-vcentered">
        <div class="column is-6 is-offset-1">
            <h1 class="title is-2">
                {{__('Event Based request info')}}
            </h1>
            <h2 class="subtitle is-4">
                {{__('Our code saves information about request via Event Based code')}}
            </h2>
            <br>
            <p>{{__('This means that your shortened links are faster than ever and aren\'t waiting for DB to save information before responding with redirect')}}.</p>
        </div>
        <div class="column is-5">
            <figure class="image is-21by9">
                <img src="/img/Events.png" alt="Events representation">
            </figure>
        </div>
    </div>
    <div class="columns is-vcentered">
        <div class="column is-5">
            <figure class="image is-21by9">
                <img src="/img/redis_logo.png" alt="Redis Key Value Store">
            </figure>
        </div>
        <div class="column is-6 is-offset-1">
            <h1 class="title is-2">
                {{__('Ultra Fast')}}
            </h1>
            <h2 class="subtitle is-4">
                {{__('Powered by Redis in-memory Key Value Store')}}
            </h2>
            <br>
            <p>
                {{__('This helps us improve read-response from your shortened link to full url redirect')}}
            </p>
        </div>
    </div>

    <div class="columns is-vcentered">
        <div class="column is-6 is-offset-1">
            <h1 class="title is-2">
                {{__('Open Source')}}
            </h1>
            <h2 class="subtitle is-4">
                {{__('You can examine, copy and modify code')}}
            </h2>
            <br>
            <p>{{__('You can contribute to our project by making pull request to our github code')}}</p>
            <p> {{__('Available at')}} <a href="https://github.com/on3n3o/url-shortener">https://github.com/on3n3o/url-shortener</a>
        </div>
        <div class="column is-5">
            <figure class="image is-21by9">
                <img src="/img/GitHub_Logo.png" alt="GitHub Logo">
            </figure>
        </div>
    </div>


</div>
@endsection