<?php


namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Database\Eloquent\Collection;

class CategoryController extends Controller
{
    public function index() : Collection
    {
        return Category::all();
    }

    public function store(StoreCategoryRequest $request) : JsonResponse
    {
        $category = Category::create([
            'name' => $request->name
        ]);

        return response()->json(['New category created', $category],200);
    }

    public function update(StoreCategoryRequest $request, Category $category) : JsonResponse
    {
        $category->update(['name' => $request->name]);
        return response()->json(['Category name updated', $category],200);
    }

    public function destroy(Category $category) : JsonResponse
    {
        $category->delete();
        return response()->json(['Category deleted'],200);
    }
}
