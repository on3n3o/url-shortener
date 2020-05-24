@extends('layouts.app', ['selected' => 'features'])

@section('content')
<div class="container has-text-centered">
    <div class="columns is-vcentered">
        <div class="column is-5">
            <figure class="image is-21by9">
                <img src="http://download.redis.io/logocontest/82.png" alt="Redis Key Value Store">
            </figure>
        </div>
        <div class="column is-6 is-offset-1">
            <h1 class="title is-2">
                Ultra Fast
            </h1>
            <h2 class="subtitle is-4">
                Powered by Redis in-memory Key Value Store
            </h2>
            <br>
            <p>This helps us improve read-response from your shortened link to full url redirect.</p>
        </div>
    </div>

    <div class="columns is-vcentered">
        <div class="column is-6 is-offset-1">
            <h1 class="title is-2">
                Open Source
            </h1>
            <h2 class="subtitle is-4">
                You can examine, copy and modify code.
            </h2>
            <br>
            <p>You can contribute to our project by making pull request to our github code.</p>
            <p> Available at <a href="https://github.com/on3n3o/url-shortener">https://github.com/on3n3o/url-shortener</a>
        </div>
        <div class="column is-5">
            <figure class="image is-21by9">
                <img src="/img/GitHub_Logo.png" alt="GitHub Logo">
            </figure>
        </div>
    </div>

    <div class="columns is-vcentered">
        <div class="column is-5">
            <figure class="image is-4by3">
                <img src="https://picsum.photos/800/600/?random" alt="Link Statistic Page Preview">
            </figure>
        </div>
        <div class="column is-6 is-offset-1">
            <h1 class="title is-2">
                Link Statistics
            </h1>
            <h2 class="subtitle is-4">
                Links created with account have stats
            </h2>
            <br>
            <p>Our clear Stats Panel gives you insight into who and how clicked your link down to browser they where using.</p>
        </div>
    </div>
</div>
@endsection