@extends('layouts.app', ['selected' => 'dashboard'])

@section('content')
<div class="container">
    <div class="columns">
        <div class="column">
            <p>List of my shortened links</p>
            <div class="table-container">
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>Short link</th>
                            <th>Redirects to</th>
                            <th width="10%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shortLinks as $shortLink)
                        <tr>
                            <td><a href="{{ config('app.url') }}/{{ $shortLink->short }}">{{ config('app.url')}}/{{ $shortLink->short }}</a></td>
                            <td><a href="{{ $shortLink->url }}">{{ $shortLink->url }}</a></td>
                            <td><p class="has-text-centered"><a href="/stats/{{ $shortLink->uuid }}" class="button is-link is-light is-small">Statistics</a></p></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $shortLinks->links() }}
        </div>
    </div>
</div>
@endsection