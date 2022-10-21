@extends('layout.app')

@section('body')
    <x-auth-card>
        <form action="{{ route('login') }}" method="post" class="m-4">
            @csrf
            <x-input label="Email Address" name="email" type="email" />
            <x-input label="Password" name="password" type="password" />
            <div class="form-text my-3">
                Don't have account? 
                <a href="{{ route('register') }}">Register</a> now for free.
            </div>
            <x-button name="Login" type="submit" size="block" />
        </form>
    </x-auth-card>
@endsection