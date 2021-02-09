@extends('layouts.app', ['selected' => 'dashboard'])

@section('content')
<div class="container" style="align-self:normal">
    <div class="columns">
        <div class="column">
            {{__('Statistics for')}} <a href="{{ config('app.url')}}/{{ $short_link->short }}">{{ config('app.url')}}/{{ $short_link->short }}</a> {{__('redirecting to')}} <a href="{{ $short_link->url }}">{{ $short_link->url }}</a>
            <div class="table-container">
                <table class="table is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>User Agent</th>
                            <th width="10%">{{__('Count')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userAgents as $userAgent)
                        <tr>
                            <td>{{ $userAgent->user_agent }}</td>
                            <td>{{ $userAgent->count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $userAgents->links() }}
        </div>
    </div>
    <div class="columns">
        <div class="column">
            {{__('Countries')}}
            <div class="table-container">
                <table class="table is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>{{__('Country')}}</th>
                            <th width="10%">{{__('Visits')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($countries as $country)
                        <tr>
                            <td>{{ $country->name }}</td>
                            <td>{{ $country->pivot['visits'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column">
            {{__('IPs')}}
            <div class="table-container">
                <table class="table is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>{{__('IP')}}</th>
                            <th width="10%">{{__('Visits')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ips as $ip)
                        <tr>
                            <td>{{ $ip->ip }}</td>
                            <td>{{ $ip->pivot['visits'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection