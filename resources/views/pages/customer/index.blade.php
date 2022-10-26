@extends('layout.main')

@section('content')
<x-table 
    :create="route('customer.create')" 
    :columns="[
        'table.column.customer.name',
        'table.column.customer.phone',
        'table.column.customer.address',
        'table.column.action'
    ]" 
    :search="$search" 
    :datum="$data" 
    :numPage="$num_page">
    <tbody>
        @foreach($data as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->address }}</td>
            <td style="width: 120px">
                <x-table-row-action
                    route="customer"
                    :value="$customer"
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