@extends('seller.layouts.layout')

@section('seller_page_title')
    Create New Store
@endsection

@section('seller_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Store</h5>
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

                    <form action="{{ route('vendor.store.publish') }}" method="POST">
                        @csrf
                        @method('POST')

                        <label for="store_name" class="fw-bold mb-2">Store Name</label>
                        <input type="text" class="form-control" placeholder="John store" name="store_name" id="store_name">

                        <label for="slug" class="fw-bold mb-2">Slug</label>
                        <input type="text" class="form-control" placeholder="John store" name="slug" id="slug">

                        <label for="details" class="fw-bold mb-2">Store Name</label>
                        <textarea type="text" class="form-control" name="details" id="details" rows="10"
                            cols="30"></textarea>

                        <button type="submit" class="btn btn-primary w-100 mt-2">Add Store</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
