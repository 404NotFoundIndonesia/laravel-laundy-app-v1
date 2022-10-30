@extends('layout.main')

@section('content')
<x-form-card :route="route('setting.update')">
    <x-input
        label="{{ __('form.name') }}"
        name="name"
        :value="$data->name"/>
    <x-input
        label="Email"
        name="email"
        :value="$data->email"/>
    <x-input-select 
        label="{{ __('form.language') }}"
        name="language"
        :options="$languages"
        :value="$data->language" />
</x-form-card>
@endsection