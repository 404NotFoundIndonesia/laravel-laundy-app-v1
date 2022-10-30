@extends('layout.main')

@section('content')
<div x-data="{
    newCustomer: false,
}">
    <x-form-card :route="route('order.store')">
        <input 
            type="hidden" 
            name="user_id" 
            value="{{ auth()->user()->id }}">
        <x-input
            label="{{ __('table.column.order.ordered_at') }}"
            type="date"
            :value="date('Y-m-d')"
            name="ordered_at"/>
        <div class="form-check form-switch mb-4">
            <input 
                class="form-check-input"
                x-model="newCustomer" 
                type="checkbox" 
                role="switch" 
                id="flexSwitchCheckDefault">
            <label 
                class="form-check-label" 
                for="flexSwitchCheckDefault">
                {{ __('table.column.order.new_customer') }}
            </label>
        </div>
        <template x-if="newCustomer">
            <div>
                <x-input
                    label="{{ __('table.column.customer.name') }}"
                    name="name"/>
                <x-input
                    label="{{ __('table.column.customer.phone') }}"
                    name="phone"/>
                <x-input
                    label="{{ __('table.column.customer.address') }}"
                    name="address"/>
            </div>
        </template>
        <template x-if="!newCustomer">
            <x-input-select 
                label="{{ __('table.column.order.customer') }}"
                name="customer_id"
                :options="$options" />
        </template>
    </x-form-card>
</div>
@endsection