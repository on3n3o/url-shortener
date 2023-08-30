@extends('layouts.app', ['selected' => 'dashboard'])

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
                {{ __('You have done it!') }}
            </h1>
            <h2 class="subtitle is-4">
                {{__('nice')}} :)
            </h2>
            <br>
            <p><input type="text" value="{{ $shortLink->short_url }}" id="shortLink" readonly></p>
            <button class="button is-light is-success" onclick="myFunction()">
                {{__('Save to clipboard')}}&nbsp;&nbsp;&nbsp;<i class="fa fa-clipboard"></i>
            </button>
            <br>
            <p>{{__('Do you want to make another one')}}?</p>
            <a class="button is-link" href="/">{{__('YES')}}!</a> 
            @auth
                <a class="button is-success is-light" href="{{route('dashboard')}}">{{__('Go to dashboard')}}</a>
            @endauth
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("shortLink");
    console.log(copyText);
  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
  /* Copy the text inside the text field */
  document.execCommand("copy");
} 
</script>
@endpush