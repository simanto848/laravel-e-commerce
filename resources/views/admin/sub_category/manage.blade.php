@extends('admin.layouts.layout')
@section('admin_page_title')
    Manage Sub Category - Admin Panel
@endsection

@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">All Sub Category</h5>
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
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategories as $subCategory)
                                    <tr>
                                        <td>{{ $subCategory->id }}</td>
                                        <td>{{ $subCategory->sub_category_name }}</td>
                                        <td>{{ $subCategory->category->category_name }}</td>
                                        <td style="white-space: nowrap;">
                                            <a href="{{ route('show.SubCategory', $subCategory->id) }}"
                                                class="btn btn-primary btn-sm"
                                                style="display: inline-block; margin-right: 0.5rem;">Edit</a>
                                            <form action="{{ route('delete.SubCategory', $subCategory->id) }}" method="POST"
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
