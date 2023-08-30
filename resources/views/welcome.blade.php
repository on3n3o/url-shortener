@extends('layouts.app')

@section('content')
<div class="container has-text-centered">
    <div class="columns is-vcentered">
        <div class="column is-5">
            <figure class="image is-4by3">
                <img src="https://picsum.photos/800/600/?random" alt="Pictures provided by unsplash.com">
            </figure>
        </div>
        <div class="column is-7">
            <h1 class="title is-2">
                {{ __('Share your link') }}
            </h1>
            <h2 class="subtitle is-4">
                {{ __('by making it shorter.') }}
            </h2>
            <br>
            <form method="POST" action="{{ route('shorten') }}">
                @csrf
                <div class="control has-icons-right field has-addons">
                    <div class="control has-icons-left">
                        <div class="select is-info">
                            <select name="domain">
                                @foreach(config('app.domains') as $domain)
                                    <option value="{{$domain}}">{{strtoupper($domain)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="icon is-small is-left">
                            <i class="fas fa-globe"></i>
                        </span>
                    </div>
                    <div class="control is-expanded">
                        <input name="link" class="input" type="text" placeholder="{{ __('place your link here')}}" autofocus>
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-info">
                            {{ __('Shorten it') }}
                        </button>
                    </div>
                </div>
                @error('link')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </form>
        </div>
    </div>
</div>
@endsection