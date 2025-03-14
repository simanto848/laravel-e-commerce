@extends('seller.layouts.layout')

@section('seller_page_title')
    Update Product
@endsection

@section('seller_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Update Product</h5>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div
                            style="background-color: #fff3cd; color: #856404; border: 1px solid #ffeeba; padding: 1rem; border-radius: 0.25rem; margin-bottom: 1rem;">
                            <ul style="margin: 0; padding-left: 1.5rem;">
                                @foreach ($errors->all() as $error)
                                    <li style="list-style-type: disc; margin-bottom: 0.25rem;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Show Success Message --}}
                    @if (session('message'))
                        <div
                            style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 1rem; border-radius: 0.25rem; margin-bottom: 1rem;">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form action="{{ route('vendor.product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label for="name" class="fw-bold mb-2">Product Name</label>
                        <input type="text" class="form-control mb-2" placeholder="Samsung S25 Ultra" name="name" id="name"
                            value="{{ $product->name }}">

                        <label for="description" class="fw-bold mb-2">Description</label>
                        <textarea class="form-control mb-2" placeholder="Product Description" name="description"
                            id="description" cols="30" rows="10">{{ $product->description}}</textarea>

                        <label for="images" class="fw-bold mb-2">Product Images Upload</label>
                        <input type="file" class="form-control mb-2" name="images[]" id="images" multiple>

                        <label for="sku" class="fw-bold mb-2">SKU</label>
                        <input type="text" class="form-control mb-2" placeholder="LXD34SF" name="sku" id="sku"
                            value="{{ $product->sku }}">

                        <livewire:category-sub-category />

                        <label for="store_id" class="fw-bold mb-2">Select a Store</label>
                        <select class="form-control mb-2" name="store_id" id="store_id">
                            <option value="" disabled>Select a Store</option>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}" {{ $product->store_id == $store->id ? 'selected' : '' }}>
                                    {{ $store->store_name }}
                                </option>
                            @endforeach
                        </select>

                        <label for="regular_price" class="fw-bold mb-2">Regular Price of Product</label>
                        <input type="number" class="form-control mb-2" name="regular_price" id="regular_price"
                            value="{{ $product->regular_price }}">

                        <label for="discount_price" class="fw-bold mb-2">Discount Price of Product</label>
                        <input type="number" class="form-control mb-2" name="discount_price" id="discount_price"
                            value="{{ $product->discount_price }}">

                        <label for="tax_rate" class="fw-bold mb-2">Tax Rate of Product</label>
                        <input type="number" class="form-control mb-2" name="tax_rate" id="tax_rate"
                            value="{{ $product->tax_rate }}">

                        <label for="stock_quantity" class="fw-bold mb-2">Stock Quantity of Product</label>
                        <input type="number" class="form-control mb-2" name="stock_quantity" id="stock_quantity"
                            value="{{ $product->stock_quantity }}">

                        <label for="slug" class="fw-bold mb-2">Slug</label>
                        <input type="text" class="form-control mb-2" name="slug" id="slug" value="{{ $product->slug }}">

                        <label for="meta_title" class="fw-bold mb-2">Meta Title</label>
                        <input type="text" class="form-control mb-2" name="meta_title" id="meta_title"
                            value="{{ $product->meta_title }}">

                        <label for="meta_description" class="fw-bold mb-2">Meta Discription</label>
                        <input type="text" class="form-control mb-2" name="meta_description" id="meta_description"
                            value="{{ $product->meta_description }}">

                        <button type="submit" class="btn btn-primary w-100 mt-2">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
