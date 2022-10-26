@extends('layout.main')

@section('content')
<x-alert />
<div x-data="{
}" class="row">
    <div class="col-6 col-sm-12 col-md-6 col-lg-4">
        <x-form-card :route="route('order.update', $data->id)">
            @method('PUT')
            <input 
                type="hidden" 
                name="user_id" 
                value="{{ auth()->user()->id }}" />
            <x-input
                label="{{ __('table.column.order.ordered_at') }}"
                name="ordered_at"
                type="date"
                :value="$data->ordered_at"/>
            <x-input
                label="{{ __('table.column.order.finished_at') }}"
                name="finished_at"
                type="date"
                :value="$data->finished_at"/>
            <x-input
                label="{{ __('table.column.order.customer') }}"
                name="customer"
                :value="$data->customer?->name"/>
            <x-input
                label="{{ __('table.column.customer.phone') }}"
                name="phone"
                :value="$data->customer?->phone"/>
            <x-input-select 
                label="{{ __('table.column.order.order_status') }}"
                name="order_status"
                :options="$options['order']"
                :value="$data->order_status" />
            <x-input-select 
                label="{{ __('table.column.order.payment_status') }}"
                name="payment_status"
                :options="$options['payment']"
                :value="$data->payment_status" />
            <x-input
                label="{{ __('table.column.order.total') }}"
                name="total"
                type="number"
                :value="$data->total"/>
            <x-input
                label="{{ __('table.column.order.down_payment') }}"
                name="down_payment"
                type="number"
                :value="$data->down_payment"/>
            <x-input
                label="{{ __('table.column.order.payment') }}"
                name="payment"
                type="number"
                :value="$data->payment"/>
            <x-input
                label="{{ __('table.column.order.change') }}"
                name="change"
                type="number"
                :value="$data->change"/>
        </x-form-card>
    </div>
</div>
@endsection