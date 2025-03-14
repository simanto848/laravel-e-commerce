<div>
    <h1>Browse Products</h1>

    <section>
        @foreach ($products as $product)
            <div class="col">
                <div class="card h-100 border-0 rounded-4 shadow-sm">
                    <div class="position-relative">
                        <img src="#" alt="Product image" class="card-img-top p-3" />
                        <button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-3">
                            <i class="far fa-heart text-muted"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        {{-- <img src="{{ asset('storage/' . $product->image->img_path) }}" alt=""> --}}
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">{{ $product->regular_price }}</span>
                            <button class="btn btn-primary rounded-pill" wire:click="addToCart({{ $product->id }})">Add to
                                Cart</button>
                            <a href="#">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</div>
