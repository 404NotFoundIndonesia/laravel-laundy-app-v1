<?php

return [
    'placeholder' => 'Find...',
    'search' => 'Search',
    'create' => 'Create New',
    'show' => 'Detail',
    'edit' => 'Edit',
    'delete' => 'Delete',
    'column' => [
        'customer' => [
            'name' => 'Name',
            'phone' => 'Phone',
            'address' => 'Address',
        ],
        'plan' => [
            'code' => 'Code',
            'plan' => 'Plan',
            'price' => 'Price',
            'description' => 'Description',
        ],
        'order' => [
            'id' => 'Order ID',
            'ordered_at' => 'Ordered At',
            'finished_at' => 'Finish At',
            'total' => 'Total',
            'down_payment' => 'Down Payment',
            'payment' => 'Payment',
            'change' => 'Change',
            'payment_status' => 'Payment Status',
            'order_status' => 'Order Status',
            'customer' => 'Customer',
            'new_customer' => 'New Customer',
        ],
        'order_item_line' => [
            'price' => 'Price',
            'quantity' => 'Quantity',
            'subtotal' => 'Subtotal',
            'description' => 'Description',
            'plan' => 'Service Plan'
        ],
        'status' => [
            'order' => [
                'todo' => 'To Do',
                'in_progress' => 'In Progress',
                'done' => 'Done',
                'completed' => 'Completed',
            ],
            'payment' => [
                'pending' => 'Pending Payment',
                'partial' => 'Partially Paid',
                'paid' => 'Paid',
            ],
        ],
        'action' => 'Action'
    ],
];