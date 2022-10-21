@extends('layout.app')

@section('body')
    <x-auth-card>
        <form action="{{ route('register') }}" method="post" class="m-4">
            @csrf
            <x-input label="Name" name="name" />
            <x-input label="Email Address" name="email" type="email" />
            <x-input label="Password" name="password" type="password" />
            <x-input label="Confirm Password" name="password_confirmation" type="password" />
            <div class="form-text my-3">
                Already have an account? 
                <a href="{{ route('login') }}">Log In</a>.
            </div>
            <x-button name="Register" type="submit" size="block" />
        </form>
    </x-auth-card>
@endsection