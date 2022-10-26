@extends('layout.app')

@section('body')
<x-navbar />
<div class="container pt-5">
    @yield('content')
</div>
@endsection