<?php

return [
    'placeholder' => 'Pencarian...',
    'search' => 'Cari',
    'create' => 'Tambah Baru',
    'show' => 'Detail',
    'edit' => 'Edit',
    'delete' => 'Hapus',
    'column' => [
        'customer' => [
            'name' => 'Nama',
            'phone' => 'No. Telepon',
            'address' => 'Alamat',
        ],
        'plan' => [
            'code' => 'Kode',
            'plan' => 'Paket',
            'price' => 'Harga',
            'description' => 'Keterangan',
        ],
        'order' => [
            'id' => 'ID Pesanan',
            'ordered_at' => 'Tanggal Masuk',
            'finished_at' => 'Tanggal Selesai',
            'total' => 'Total Harga',
            'down_payment' => 'Uang Muka',
            'payment' => 'Harga Bayar',
            'change' => 'Kembalian',
            'payment_status' => 'Status Pembayaran',
            'order_status' => 'Status Pesanan',
            'customer' => 'Pelanggan',
            'new_customer' => 'Pelanggan Baru',
        ],
        'order_item_line' => [
            'price' => 'Harga Satuan',
            'quantity' => 'Jumlah',
            'subtotal' => 'Harga Total',
            'description' => 'Keterangan',
            'plan' => 'Paket Layanan'
        ],
        'status' => [
            'order' => [
                'todo' => 'Menunggu',
                'in_progress' => 'Dikerjakan',
                'done' => 'Selesai',
                'completed' => 'Diambil',
            ],
            'payment' => [
                'pending' => 'Belum Bayar',
                'partial' => 'Uang Muka',
                'paid' => 'Lunas',
            ],
        ],
        'action' => 'Aksi'
    ],
];