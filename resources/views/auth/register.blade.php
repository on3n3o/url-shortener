@extends('layouts.app', ['selected' => 'register'])

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column-is-5">
            <div class="card">
                <div class="card-content">
                    <p class="title">
                        {{ __('Sign in') }}
                    </p>
                    <div class="content">

                        <div class="columns is-centered">
                            <div class="column column-is-12">
                                <a href="/login/facebook" class="button is-medium is-facebook is-fullwidth">
                                    <span class="icon">
                                        <i class="fab fa-facebook"></i>
                                    </span>
                                    <span>Sign in with Facebook</span>
                                </a>
                            </div>
                        </div>
                        <div class="columns is-centered">
                            <div class="column column-is-12">
                                <a href="/login/github" class="button is-medium is-github is-fullwidth">
                                    <span class="icon">
                                        <i class="fab fa-github"></i>
                                    </span>
                                    <span>Sign in with GitHub</span>
                                </a>
                            </div>
                        </div>
                        <div class="columns is-centered">
                            <div class="column column-is-12">
                                <a href="/login/gitlab" class="button is-medium is-gitlab is-fullwidth">
                                    <span class="icon">
                                        <i class="fab fa-gitlab"></i>
                                    </span>
                                    <span>Sign in with GitLab</span>
                                </a>
                            </div>
                        </div>

                        <div class="columns is-centered">
                            <div class="column column-is-12">
                                <h2>or Register</h2>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="field">
                                <label class="label">{{ __('Name') }}</label>
                                <div class="control has-icons-left">
                                    <input class="input @error('name') is-danger @enderror" type="text" placeholder="John Smith" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                            </div>
                            @error('name')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

                            <div class="field">
                                <label class="label">{{ __('E-Mail Address') }}</label>
                                <div class="control has-icons-left">
                                    <input class="input @error('email') is-danger @enderror" type="email" placeholder="someone@example.org" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-envelope"></i>
                                    </span>
                                </div>
                            </div>
                            @error('email')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

                            <div class="field">
                                <label class="label">{{ __('Password') }}</label>
                                <div class="control has-icons-left">
                                    <input class="input @error('password') is-danger @enderror" type="password" name="password" required autocomplete="new-password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>

                            @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror

                            <div class="field">
                                <label class="label">{{ __('Confirm Password') }}</label>
                                <div class="control has-icons-left">
                                    <input class="input" type="password" name="password_confirmation" required autocomplete="new-password">
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="field is-grouped is-grouped-right">
                                <div class="control">
                                    <a href="{{ route('login') }}" class="button is-link is-light">Login</a>
                                </div>
                                <div class="control">
                                    <button class="button is-success" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection