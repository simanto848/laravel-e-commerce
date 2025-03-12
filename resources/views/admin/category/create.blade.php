@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Category - Admin Panel
@endsection

@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Category</h5>
                </div>
                <div class="card-body">

                    {{-- Show Error Message --}}
                    @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li class="mb-0">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Show Success Message --}}
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form action="{{ route('store.category') }}" method="POST">
                        @csrf
                        @method('POST')

                        <label for="category_name" class="fw-bold mb-2">Category Name</label>
                        <input type="text" class="form-control" placeholder="Electronics" name="category_name"
                            id="category_name">

                        <button type="submit" class="btn btn-primary w-100 mt-2">Add Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
