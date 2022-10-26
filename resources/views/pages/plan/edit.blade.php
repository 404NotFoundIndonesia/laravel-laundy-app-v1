@extends('layout.main')

@section('content')
<x-form-card :route="route('plan.update', $data)">
    @method('PUT')
    <input 
        type="hidden" 
        name="user_id" 
        value="{{ auth()->user()->id }}">
    <x-input
        label="{{ __('table.column.plan.code') }}"
        name="code"
        :value="$data->code"/>
    <x-input
        label="{{ __('table.column.plan.plan') }}"
        name="plan"
        :value="$data->plan"/>
    <x-input
        label="{{ __('table.column.plan.price') }}"
        name="price"
        :value="$data->price"/>
    <x-input
        label="{{ __('table.column.plan.description') }}"
        name="description"
        :value="$data->description"/>
</x-form-card>
@endsection