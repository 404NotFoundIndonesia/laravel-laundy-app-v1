@extends('layout.main')

@section('content')
<x-table 
    :create="route('plan.create')" 
    :columns="[
        'table.column.plan.code',
        'table.column.plan.plan',
        'table.column.plan.price',
        'table.column.plan.description',
        'table.column.action'
    ]" 
    :search="$search" 
    :datum="$data" 
    :numPage="$num_page">
    <tbody>
        @foreach($data as $plan)
        <tr>
            <th scope="row">{{ $plan->code }}</th>
            <td>{{ $plan->plan }}</td>
            <td>{{ $plan->price }}</td>
            <td>{{ $plan->description }}</td>
            <td style="width: 120px">
                <x-table-row-action
                    route="plan"
                    :value="$plan"
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
