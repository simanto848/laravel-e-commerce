@extends('admin.layouts.layout')
@section('admin_page_title')
    Update Default Attribute - Admin Panel
@endsection

@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Update Default Attribute</h5>
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

                    <form action="{{ route('default.product.attribute.update', $defaultAttribute->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label for="attribute_value" class="fw-bold mb-2">Attribute Name</label>
                        <input type="text" class="form-control" placeholder="XL" name="attribute_value" id="attribute_value"
                            value="{{ $defaultAttribute->attribute_value }}">

                        <button type="submit" class="btn btn-primary w-100 mt-2">Update Attribute</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
