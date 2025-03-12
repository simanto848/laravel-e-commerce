<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    public function storeCategory(Request $request) {
        $validate_data = $request->validate([
            'category_name' => ['required', 'unique:categories', 'string', 'max:200', 'min:10'],
        ]);

        Category::create($validate_data);

        return redirect()->back()->with('message', 'Category created successfully');
    }
}
