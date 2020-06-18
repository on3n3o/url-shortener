@extends('layouts.app', ['selected' => 'dashboard'])

@section('content')
<div class="container" style="align-self:normal">
    <div class="columns">
        <div class="column">
            <div class="content">
                <h5>{{__('List of my shortened links')}}</h5>
                <div class="table-container">
                    <table class="table is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>{{__('Short link')}}</th>
                                <th class="is-hidden-mobile">{{__('Redirects to')}}</th>
                                <th width="10%">{{__('Actions')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shortLinks as $shortLink)
                            <tr>
                                <td><a href="{{ config('app.url') }}/{{ $shortLink->short }}">{{ config('app.url')}}/{{ $shortLink->short }}</a></td>
                                <td class="is-hidden-mobile"><a href="{{ $shortLink->url }}">{{ $shortLink->url }}</a></td>
                                <td>
                                    <p class="has-text-centered">
                                        <a href="/stats/{{ $shortLink->uuid }}" class="button is-link is-light is-small">
                                            {{__('Statistics')}}
                                        </a>
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $shortLinks->links() }}
        </div>
    </div>
</div>
@endsection