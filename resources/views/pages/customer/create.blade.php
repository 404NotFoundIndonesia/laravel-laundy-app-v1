@extends('layout.main')

@section('content')
<x-form-card :route="route('customer.store')">
    <input 
        type="hidden" 
        name="user_id" 
        value="{{ auth()->user()->id }}">
    <x-input
        label="{{ __('table.column.customer.name') }}"
        name="name"/>
    <x-input
        label="{{ __('table.column.customer.phone') }}"
        name="phone"/>
    <x-input
        label="{{ __('table.column.customer.address') }}"
        name="address"/>
</x-form-card>
@endsection