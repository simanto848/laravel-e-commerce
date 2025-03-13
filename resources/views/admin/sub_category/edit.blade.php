@extends('admin.layouts.layout')
@section('admin_page_title')
    Update Sub Category - Admin Panel
@endsection

@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Sub Category</h5>
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

                    <form action="{{ route('update.SubCategory', $subCategoryInfo->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="sub_category_name" class="fw-bold mb-2">Sub Category Name</label>
                        <input type="text" class="form-control" placeholder="Electronics" name="sub_category_name"
                            id="sub_category_name" value="{{ $subCategoryInfo->sub_category_name }}" required>

                        <label for="category_id" class="fw-bold mb-2">Select Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $subCategoryInfo->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-primary w-100 mt-2">Update Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
