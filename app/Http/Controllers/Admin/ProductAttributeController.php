<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DefaultAttribute;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    public function index() {
        return view('admin.product_attribute.create');
    }

    public function manage() {
        $defaultAttributes = DefaultAttribute::all();

        return view('admin.product_attribute.manage', compact('defaultAttributes'));
    }

    public function store(Request $request) {
        $validate_data = $request->validate([
            'attribute_value' => ['required','string','unique:default_attributes', 'max:100'],
        ]);

        DefaultAttribute::create($validate_data);
        return redirect()->back()->with('message', 'Attribute created successfully');
    }

    public function showDefaultAttribute($defaultAttributeId) {
        $defaultAttribute = DefaultAttribute::find($defaultAttributeId);
        return view('admin.product_attribute.edit', compact('defaultAttribute'));
    }

    public function updateDefaultAttribute(Request $request, $defaultAttributeId) {
        $validate_data = $request->validate([
            'attribute_value' => ['required','string','unique:default_attributes', 'max:100'],
        ]);
        DefaultAttribute::findOrFail( $defaultAttributeId )->update($validate_data);
        return redirect()->back()->with('message', 'Attribute updated successfully');
    }

    public function deleteDefaultAttribute($defaultAttributeId) {
        DefaultAttribute::findOrFail($defaultAttributeId)->delete();
        return redirect()->back()->with('message', 'Attribute deleted successfully');
    }
}
