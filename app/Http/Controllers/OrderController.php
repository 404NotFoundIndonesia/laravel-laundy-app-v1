<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Plan;
use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.order.index', [
            'search' => $request->search,
            'num_page' => $request->num_page,
            'data' => Order::render(
                $request->search,
                $request->num_page,
            ),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.order.create', [
            'options' => Customer::where(
                    'user_id',
                    auth()->user()->id
                )
                ->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        try {
            $data = $request->all();
            $validatedData = $request->validated();
            DB::beginTransaction();
            if (!isset($data['customer_id'])) {
                $customer = Customer::create([
                    'name' => $data['name'],
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'user_id' => auth()->user()->id,
                ]);
                $validatedData['customer_id'] = $customer->id;
            }
            $order = Order::create($validatedData);
            DB::commit();
            return redirect()
                ->route('order.edit', $order)
                ->with('success', 'Success!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order->load(['itemLines', 'itemLines.plan', 'customer']);
        return view('pages.order.edit', [
            'data' => $order,
            'options' => [
                'order' => OrderStatus::options(),
                'payment' => PaymentStatus::options(),
                'plan' => Plan::where('user_id', auth()->user()->id)
                    ->pluck('plan', 'id')
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        try {
            $order->update($request->validated());
            return back()
                ->with('success', 'Success!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {        
        try {
            $order->delete();
            return back()
                ->with('success', 'Success!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error!');
        }
    }
}
