<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Order;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'income' => Order::currentMonthIncome(),
            'todo' => Order::currentMonthTodo(),
            'inProgress' => Order::currentMonthInProgress(),
            'done' => Order::currentMonthDone(),
            'completed' => Order::currentMonthCompleted(),
        ]);
    }

    public function settingEdit()
    {
        return view('pages.setting', [
            'data' => auth()->user(),
            'languages' => [
                'id' => 'Bahasa Indonesia',
                'en' => 'English',
            ],
        ]);
    }

    public function settingUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string'],
            'language' => [
                'required',
                'string',
                Rule::in(['en', 'id']),
            ],
            'email' => [
                'required',
                'email', 
                Rule::unique('users')->ignore(auth()->user()->id),
            ],
        ]);
        try {
            auth()->user()->update($validatedData);
            return back()->with('success', 'Success!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error!');
        }
    }
}
