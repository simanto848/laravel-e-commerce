@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Category - Admin Panel
@endsection

@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Update Category</h5>
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

                    <form action="{{ route('update.category', $categoryInfo->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="category_name" class="fw-bold mb-2">Category Name</label>
                        <input type="text" class="form-control" placeholder="Electronics" name="category_name"
                            id="category_name" value="{{ $categoryInfo->category_name }}">

                        <button type="submit" class="btn btn-primary w-100 mt-2">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
