<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerProductController extends Controller
{
    public function index() {
        $authUserId = Auth::id();
        $stores = Store::where('user_id', $authUserId)->get();

        return view('seller.product.create', compact('stores'));
    }

    public function manage() {
        $authUserId = Auth::id();
        $products = Product::with('images')->where('seller_id', $authUserId)->get();

        return view('seller.product.manage', compact('products'));
    }

    public function store(Request $request) {
        $validate_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'sku' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'sub_category_id' => ['required', 'integer'],
            'store_id' => ['required', 'integer'],
            'regular_price' => ['required', 'numeric', 'min:0'],
            'discount_price' => ['required', 'numeric', 'min:0'],
            'tax_rate' => ['required', 'numeric', 'min:0', 'max:100'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'slug' => ['required', 'string', 'unique:products,slug'],
            'images.*' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif', 'max:11000'],
            'meta_title' => ['required', 'string', 'max:255'],
            'meta_description' => ['required', 'string', 'max:255'],
        ]);

        $sellerId = Auth::id();
        $validate_data['seller_id'] = $sellerId;
        unset($validate_data['images']);

        $product = Product::create($validate_data);

        // Handle Product Images
        if($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'img_path' => $path,
                    'is_primary' => false,
                ]);
            }
        }

        return redirect()->back()->with('message', 'Product has been created successfully!');
    }

    public function show($productId) {
        $userId = Auth::id();
        $product = Product::with(['category', 'subCategory', 'store'])
        ->where('seller_id', $userId)
        ->findOrFail($productId);
        $stores = Store::where('user_id', $userId)->get();
        return view('seller.product.edit', compact('product', 'stores'));
    }

    public function update(Request $request, $productId) {
        $validate_data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'sku' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'sub_category_id' => ['required', 'integer'],
            'store_id' => ['required', 'integer'],
            'regular_price' => ['required', 'numeric', 'min:0'],
            'discount_price' => ['required', 'numeric', 'min:0'],
            'tax_rate' => ['required', 'numeric', 'min:0', 'max:100'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'slug' => ['required', 'string', 'unique:products,slug,' . $productId],
            'images.*' => ['nullable', 'image', 'mimes:png,jpg,jpeg,gif', 'max:11000'],
            'meta_title' => ['required', 'string', 'max:255'],
            'meta_description' => ['required', 'string', 'max:255'],
        ]);

        $sellerId = Auth::id();
        $product = Product::where('seller_id', $sellerId)
        ->where('id', $productId)
        ->firstOrFail();

        $validatedData['seller_id'] = $sellerId;
        unset($validatedData['images']);
        $product->update($validate_data);


        // Handle Product Images
        if ($request->hasFile('images')) {
            // Fetch existing images associated with the product
            $existingImages = ProductImage::where('product_id', $product->id)->get();

            // Delete old images from storage and database
            foreach ($existingImages as $image) {
                // Delete the file from storage
                if (\Storage::disk('public')->exists($image->img_path)) {
                    \Storage::disk('public')->delete($image->img_path);
                }
                // Delete the record from the database
                $image->delete();
            }

            // Upload new images
            foreach ($request->file('images') as $file) {
                $path = $file->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'img_path' => $path,
                    'is_primary' => false,
                ]);
            }
        }
        return redirect()->back()->with('message', 'Product has been updated successfully!');
    }

    public function delete($productId) {
        $userId = Auth::id();
        $product = Product::where('seller_id', $userId)
        ->where('id', $productId)
        ->firstOrFail();
        $product->delete();

        return redirect()->back()->with('message', 'Product has been deleted successfully!');
    }
}
