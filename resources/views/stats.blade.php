@extends('layouts.app', ['selected' => 'dashboard'])

@section('content')
<div class="container" style="align-self:normal">
    <div class="columns">
        <div class="column">
            Statistics for <a href="{{ config('app.url')}}/{{ $short_link->short }}">{{ config('app.url')}}/{{ $short_link->short }}</a> redirecting to <a href="{{ $short_link->url }}">{{ $short_link->url }}</a>
            <div class="table-container">
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th>User Agent</th>
                            <th width="10%">Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($statistics as $statistic)
                        <tr>
                            <td>{{ $statistic->user_agent }}</td>
                            <td>{{ $statistic->count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $statistics->links() }}
        </div>
    </div>
</div>
@endsection