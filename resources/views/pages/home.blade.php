@extends('layout.main')

@section('content')
<div class="mb-5">
    <h1>
        {{ __('dashboard.welcome', ['name' => auth()->user()->name]) }}
    </h1>
</div>
<div class="card p-3">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h5 class="mb-5">
                    {{ __('dashboard.current_month_order_status') }}
                </h5>
            </div>
            <div class="col text-end">
                <div>{{ __('dashboard.income') }}</div>
                <span class="h2">{{ $income }}</span> IDR
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 text-center p-4 text-danger">
                <span class="h1">{{ $todo }}</span>
                {{ __('dashboard.status.order.todo') }}
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 text-center p-4 text-info">
                <span class="h1">{{ $inProgress }}</span>
                {{ __('dashboard.status.order.in_progress') }}
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 text-center p-4 text-success">
                <span class="h1">{{ $done }}</span>
                {{ __('dashboard.status.order.done') }}
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-3 text-center p-4 text-success">
                <span class="h1">{{ $completed }}</span>
                {{ __('dashboard.status.order.completed') }}
            </div>
        </div>
    </div>
</div>
@endsection