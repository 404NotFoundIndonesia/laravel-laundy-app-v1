<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItemLine;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class OrderItemLineController extends Controller
{
    public function store(
        Request $request,
        Order $order
    )
    {
        $validatedRequest = $request->validate([
            'quantity' => ['required', 'numeric'],
            'description' => ['nullable'],
            'plan_id' => ['required'],
        ]);
        try {
            $plan = Plan::find($request->plan_id);
            $data = array_merge($validatedRequest, [
                'price' => $plan->price,
                'subtotal' => $plan->price * $validatedRequest['quantity'],
            ]);
            DB::beginTransaction();
            $order->itemLines()->create($data);
            $order->update([
                'total' => (int) $order->total + $data['subtotal'],
            ]);
            DB::commit();
            return back()
                ->with('success', 'Success!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Error!');
        }
    }

    public function destroy(
        Request $request,
        Order $order,
        OrderItemLine $item
    )
    {
        try {
            DB::beginTransaction();
            $order->update([
                'total' => (int) $order->total - $item->subtotal,
            ]);
            $item->delete();
            DB::commit();
            return back()
                ->with('success', 'Success!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Error!');
        }
    }
}
