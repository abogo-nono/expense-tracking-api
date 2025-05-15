<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    /**
     * lis all categories (with pagination if needed)
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        $paginate = $request->get("paginate");
        $categories = $paginate
            ? Category::orderBy("name")->paginate($paginate)
            : Category::orderBy("name")->get();

        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created category in db
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return CategoryResource|JsonResponse|mixed
     */
    public function store(StoreCategoryRequest $request): CategoryResource|JsonResponse
    {
        try {
            $category = Category::create($request->validated());
            return new CategoryResource($category);
        } catch (Exception $exception) {
            return response()->json(["error" => "Something went wrong!"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified category
     * @param \App\Models\Category $category
     * @return CategoryResource
     */
    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified category in DB
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return CategoryResource|JsonResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category): CategoryResource|JsonResponse
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
    public function destroy(Category $category): JsonResponse
    {
        try {
            $category->delete();
            return response()->json(["message" => "Category: $category->name deleted!"], Response::HTTP_OK);
        } catch (Exception $exception) {
            return response()->json(["error" => "Something went went wrong!"], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
