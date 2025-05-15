<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginate = $request->get("paginate");
        $categories = $paginate
            ? Category::orderBy("name")->paginate($paginate)
            : Category::orderBy("name")->get();

        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = Category::create($request->validated());
            return new CategoryResource($category);
        } catch (Exception $exception) {
            return response()->json(["error" => "Something went wrong!"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());
            return new CategoryResource($category);
        } catch (Exception $exception) {
            return response()->json(["error" => "Something went wrong", Response::HTTP_INTERNAL_SERVER_ERROR]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json(["message" => "Category: $category->name deleted!"], Response::HTTP_OK);
        } catch (Exception $exception) {
            return response()->json(["error" => "Something went went wrong!"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
