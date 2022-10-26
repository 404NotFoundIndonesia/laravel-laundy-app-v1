@extends('layout.main')

@section('content')
<x-form-card :route="route('customer.update', $data->id)">
    @method('PUT')
    <input 
        type="hidden" 
        name="user_id" 
        value="{{ auth()->user()->id }}" />
    <x-input
        label="{{ __('table.column.customer.name') }}"
        name="name"
        :value="$data->name"/>
    <x-input
        label="{{ __('table.column.customer.phone') }}"
        name="phone"
        :value="$data->phone"/>
    <x-input
        label="{{ __('table.column.customer.address') }}"
        name="address"
        :value="$data->address"/>
</x-form-card>
@endsection