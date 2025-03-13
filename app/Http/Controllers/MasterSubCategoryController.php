<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class MasterSubCategoryController extends Controller
{
    public function storeSubCategory(Request $request) {
        $validate_data = $request->validate([
            'sub_category_name' => ['required', 'string', 'max:200', 'min:2'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        SubCategory::create($validate_data);

        return redirect()->back()->with('message', 'Sub-Category created successfully');
    }

    public function showSubCategory($subCategoryId) {
        $subCategoryInfo = SubCategory::find($subCategoryId);
        $categories = Category::all();

        return view('admin.sub_category.edit', compact('subCategoryInfo', 'categories'));
    }

    public function updateSubCategory(Request $request, $subCategoryId) {
        $validate_data = $request->validate([
            'sub_category_name' => ['required', 'string', 'max:200', 'min:2'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);
        SubCategory::findOrFail($subCategoryId)->update($validate_data);
        return redirect()->back()->with('message','Sub Category updated successfully');
    }

    public function deleteSubCategory($subCategoryId) {
        SubCategory::findOrFail($subCategoryId)->delete();
        return redirect()->back()->with('message','Sub Category deleted successfully');
    }
}
