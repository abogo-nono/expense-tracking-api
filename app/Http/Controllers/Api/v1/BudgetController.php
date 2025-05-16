<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\UpdateBudgetRequest;
use App\Models\Budget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BudgetResource;
use App\Http\Requests\StoreBudgetRequest;
use Symfony\Component\HttpFoundation\Response;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginate = $request->get('paginate');
        $budgets = Budget::query();

        $paginate ? $budgets->paginate($paginate) : $budgets->get();

        return BudgetResource::collection($budgets);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBudgetRequest $request)
    {
        try {
            $validated = $request->validated();
            $budget = Budget::create($validated);
            return new BudgetResource($budget);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget)
    {
        return new BudgetResource($budget);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        try {
            $validated = $request->validated();
            $budget->update($validated);
            return new BudgetResource($budget);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
    {
        try {
            $budget->delete();
            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
