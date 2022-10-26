@extends('layout.main')

@section('content')
<x-table 
    :create="route('order.create')" 
    :columns="[
        'table.column.order.id',
        'table.column.order.ordered_at',
        'table.column.order.customer',
        'table.column.order.total',
        'table.column.order.payment_status',
        'table.column.action'
    ]" 
    :search="$search" 
    :datum="$data" 
    :numPage="$num_page">
    <tbody>
        @foreach($data as $order)
        <tr>
            <th scope="row">{{ $order->id }}</th>
            <td>{{ $order->ordered_at }}</td>
            <td>{{ $order->customer?->name }}</td>
            <td>{{ $order->total }}</td>
            <td>{{ __('table.column.status.payment.' . $order->payment_status) }}</td>
            <td style="width: 120px">
                <x-table-row-action
                    route="order"
                    :value="$order"
                    :isEditable="true"
                    :isDeletable="true"
                    :isShowable="false"
                />
            </td>
        </tr>
        @endforeach
    </tbody>
</x-table>
@endsection
