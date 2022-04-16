@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <h1 class="text-center">Homepage</h1>
        <div class="d-flex justify-content-center">
            @guest
                @if (Route::has('login'))
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
                @if (Route::has('register'))
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @endguest
        </div>
    </div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
