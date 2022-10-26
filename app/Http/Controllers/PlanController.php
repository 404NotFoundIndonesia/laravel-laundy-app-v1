<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.plan.index', [
            'search' => $request->search,
            'num_page' => $request->num_page,
            'data' => Plan::render(
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
        return view('pages.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanRequest $request)
    {
        try {
            Plan::create($request->validated());
            return redirect()
                ->route('plan.index')
                ->with('success', 'Success!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return view('pages.plan.edit', [
            'data' => $plan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
    * @param  \App\Http\Requests\UpdatePlanRequest  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        try {
            $plan->update($request->validated());
            return back()->with('success', 'Success!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        try {
            $plan->delete();
            return back()->with('success', 'Success!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Error!');
        }
    }
}
