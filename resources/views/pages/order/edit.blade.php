@extends('layout.main')

@section('content')
<div x-data="{
}" class="row mb-5">
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
    <div class="col-6 col-sm-12 col-md-6 col-lg-8">
        <div class="card">
            <div class="card-body">
                <button 
                    class="btn btn-dark bg-gradient mb-3 float-end"
                    data-bs-toggle="modal"
                    data-bs-target="#createOrderItemLineModal">
                    {{ __('table.create') }}
                </button>
                @if(count($data->itemLines))
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">
                                {{ __('table.column.order_item_line.plan') }}
                            </th>
                            <th scope="col">
                                {{ __('table.column.order_item_line.price') }}
                            </th>
                            <th scope="col">
                                {{ __('table.column.order_item_line.quantity') }}
                            </th>
                            <th scope="col">
                                {{ __('table.column.order_item_line.subtotal') }}
                            </th>
                            <th scope="col">
                                {{ __('table.column.action') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data->itemLines as $item)
                        <tr>
                            <td>{{ $item->plan?->plan }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->subtotal }}</td>
                            <td>
                                <form 
                                    action="{{ route('order.item.destroy', [
                                        'order' => $data,
                                        'item' => $item,
                                    ]) }}" 
                                    method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button 
                                        type="submit" 
                                        class="btn btn-sm btn-light bg-gradient">
                                        {{ __('table.delete') }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">
                                {{ __('table.column.order.total') }}
                            </th>
                            <td>{{ $data->total }}</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Create Order Item Line Modal -->
<div 
    class="modal fade" 
    id="createOrderItemLineModal" 
    tabindex="-1" 
    aria-labelledby="createOrderItemLineModalLabel" 
    aria-hidden="true">
    <div class="modal-dialog">
        <form 
            action="{{ route('order.item.store', $data->id) }}"
            method="post">
            @csrf
            <div class="modal-content">     
                <div class="modal-header">
                    <button 
                        type="button" 
                        class="btn-close" 
                        data-bs-dismiss="modal" 
                        aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <input 
                        type="hidden" 
                        name="user_id" 
                        value="{{ auth()->user()->id }}">
                    <x-input-select 
                        label="{{ __('table.column.order_item_line.plan') }}"
                        name="plan_id"
                        :options="$options['plan']" />
                    <x-input
                        label="{{ __('table.column.order_item_line.quantity') }}"
                        name="quantity"
                        type="number"/>
                    <x-input
                        label="{{ __('table.column.order_item_line.description') }}"
                        name="description"/>
                </div>
                <div class="modal-footer">
                    <x-button 
                        name="{{ __('form.save') }}"
                        type="submit" 
                        size="block"
                    />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection