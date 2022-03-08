<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        return Category::all();
    }

    public function store(CategoryStoreRequest $request) {
        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    public function show(Category $category) {
        return $category;
    }

    public function update(CategoryUpdateRequest $request, Category $category) {
        $category->update($request->all());

        return response()->json($category);
    }

    public function destroy(Category $category) {
        $category->delete();

        return response()->json(null, 204);
    }
}
