@extends('seller.layouts.layout')

@section('seller_page_title')
    Manage Product
@endsection

@section('seller_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Products</h5>
                </div>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>SKU</th>
                                    <th>Category</th>
                                    <th>Sub-Category</th>
                                    <th>Store</th>
                                    <th>Regular Price</th>
                                    <th>Discount Price</th>
                                    <th>Stock Quantity</th>
                                    <th>Stock Status</th>
                                    <th>Slug</th>
                                    <th>Meta Title</th>
                                    <th>Meta Description</th>
                                    <th>Is Featured</th>
                                    <th>Is Active</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if ($product->images->isNotEmpty())
                                                <div style="display: flex; gap: 5px;">
                                                    <img src="{{ asset('storage/' . $product->images->first()->img_path) }}"
                                                        alt="Product Image"
                                                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                                </div>
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->category->category_name }}</td>
                                        <td>{{ $product->subCategory->sub_category_name }}</td>
                                        <td>{{ $product->store->store_name }}</td>
                                        <td>{{ $product->regular_price }}</td>
                                        <td>{{ $product->discount_price }}</td>
                                        <td>{{ $product->stock_quantity }}</td>
                                        <td>{{ $product->stock_status }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>{{ $product->meta_title }}</td>
                                        <td>{{ $product->meta_description }}</td>
                                        <td>{{ $product->is_featured ? "True" : "False" }}</td>
                                        <td>{{ $product->is_active ? "True" : "False" }}</td>
                                        <td>{{ $product->status }}</td>

                                        <td style="white-space: nowrap;">
                                            <a href="{{ route('vendor.product.show', $product->id) }}"
                                                class="btn btn-primary btn-sm"
                                                style="display: inline-block; margin-right: 0.5rem;">Edit</a>
                                            <form action="{{ route('vendor.product.delete', $product->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
