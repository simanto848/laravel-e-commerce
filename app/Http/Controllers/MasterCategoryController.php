<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function storeCategory(Request $request) {
        $validate_data = $request->validate([
            'category_name' => ['required', 'unique:categories', 'string', 'max:200', 'min:2'],
        ]);

        Category::create($validate_data);

        return redirect()->back()->with('message', 'Category created successfully');
    }

    public function showCategory($categoryId) {
        $categoryInfo = Category::find($categoryId);
        return view('admin.category.edit', compact('categoryInfo'));
    }

    public function updateCategory(Request $request, $categoryId) {
        $validate_data = $request->validate([
            'category_name'=> ['required', 'unique:categories', 'string', 'max:200', 'min:2']
        ]);
        Category::findOrFail($categoryId)->update($validate_data);
        return redirect()->back()->with('message','Category updated successfully');
    }

    public function deleteCategory($categoryId) {
        Category::findOrFail($categoryId)->delete();
        return redirect()->back()->with('message','Category deleted successfully');
    }
}
