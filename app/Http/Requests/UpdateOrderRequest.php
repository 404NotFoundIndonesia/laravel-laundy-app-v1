<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->id == $this->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'ordered_at' => ['required', 'date'],
            'finished_at' => ['required', 'date'],
            'order_status' => ['required'],
            'payment_status' => ['required'],
            'total' => ['required', 'numeric', 'gte:0'],
            'down_payment' => ['required', 'numeric', 'gte:0'],
            'payment' => ['required', 'numeric', 'gte:0'],
            'change' => ['required', 'numeric', 'gte:0'],
        ];
    }
}
