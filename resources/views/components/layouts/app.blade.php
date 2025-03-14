<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce || Home</title>
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossOrigin="anonymous" />
    --}}
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --foreground-rgb: 0, 0, 0;
            --background-rgb: 240, 245, 250;
        }

        body {
            color: rgb(var(--foreground-rgb));
            background: rgb(var(--background-rgb));
        }

        .z-0 {
            z-index: 0;
        }

        .z-1 {
            z-index: 1;
        }

        .z-10 {
            z-index: 10;
        }

        .bg-blue-500 {
            background-color: #3b82f6;
        }

        .text-blue-500 {
            color: #3b82f6;
        }

        .rounded-4 {
            border-radius: 0.75rem;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0">
        {{-- Header --}}
        <header class="bg-white py-3 px-4 shadow-sm">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 d-flex align-items-center">
                        <div class="bg-blue-500 rounded-circle p-1 me-2">
                            <i class="fas fa-shopping-cart text-white"></i>
                        </div>
                        <h1 class="m-0 fw-bold">QuickCart</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control border-end-0 bg-light"
                                placeholder="Search Product..." aria-label="Search Product" />
                            <span class="input-group-text bg-light border-start-0">
                                <i class="fas fa-search text-muted"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end gap-2">
                        <button class="btn btn-light rounded-pill">
                            <i class="fas fa-shopping-cart text-warning"></i>
                        </button>
                        <button class="btn btn-primary rounded-pill px-4">Sign In</button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Navigation -->
        <nav class="bg-blue-500 py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Trending</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-white dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown">
                                    Categories
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Electronics</a></li>
                                    <li><a class="dropdown-item" href="#">Fashion</a></li>
                                    <li><a class="dropdown-item" href="#">Home & Kitchen</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Discounts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Gift Collections</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">Stores</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        {{-- Main Content --}}
        <main class="container py-4">
            <div class="row g-4">
                {{-- Main Banner --}}
                <div class="col-lg-8">
                    <div class="card h-100 overflow-hidden border-0 rounded-4 shadow-sm">
                        <div class="card-body p-0 position-relative">
                            <div class="position-absolute top-0 start-0 p-4 z-10">
                                <h1 class="display-1 fw-bold text-white">75%</h1>
                                <h2 class="text-white">Flat Discount</h2>
                                <p class="text-white opacity-75 mb-4">
                                    Because of store opening carnival, Eclipse providing a huge discounted sell
                                </p>
                            </div>
                            <div class="h-100 w-100 position-absolute z-0"
                                style="background: linear-gradient(90deg, #4299e1 0%, #ed8936 100%);">
                            </div>
                            <img src="{{ asset('images/yellow-sneakers.png') }}" alt="Yellow sneakers"
                                class="position-absolute end-0 bottom-0 z-1"
                                style="max-width: 60%; object-fit: contain;" />
                        </div>
                    </div>
                </div>

                <!-- Side Banners -->
                <div class="col-lg-4">
                    <div class="row g-4">
                        <!-- Bean Bag Banner -->
                        {{-- <div class="col-12">
                            <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">
                                <div class="card-body p-0 position-relative">
                                    <div class="position-absolute top-0 end-0 p-4 text-end z-10">
                                        <h2 class="text-white fw-bold mb-0">Comfy</h2>
                                        <p class="text-white mb-0">Bean Bag Chair</p>
                                    </div>
                                    <div class="h-100 w-100 position-absolute z-0"
                                        style="background: linear-gradient(90deg, #9f7aea 0%, #d53f8c 100%);">
                                    </div>
                                    <img src="{{ asset('images/bean-bag.png') }}" alt="Bean bag chair"
                                        class="position-absolute start-0 bottom-0 z-1"
                                        style="max-width: 50%; object-fit: contain;" />
                                </div>
                            </div>
                        </div> --}}

                        <!-- VR Glasses Banner -->
                        <div class="col-12">
                            <div class="card h-100 border-0 rounded-4 shadow-sm overflow-hidden">
                                <div class="card-body p-0 position-relative">
                                    <div class="position-absolute top-0 start-0 p-4 z-10">
                                        <h2 class="text-white fw-bold mb-0">VR</h2>
                                        <p class="text-white mb-0">Glasses</p>
                                    </div>
                                    <div class="h-100 w-100 position-absolute z-0"
                                        style="background: linear-gradient(90deg, #4299e1 0%, #d53f8c 100%);">
                                    </div>
                                    <img src="{{ asset('images/vr-glasses.png') }}" alt="VR glasses"
                                        class="position-absolute end-0 bottom-0 z-1"
                                        style="max-width: 50%; object-fit: contain;" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Discovery Section -->
            <div class="text-center my-5">
                <h3 class="mb-2">Discover Your Required Product</h3>
                <h2 class="fw-bold mb-4">From 267+ Different Vendors, 30+ Categories</h2>

                <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
                    <button class="btn btn-warning rounded-pill px-4">
                        🔥 Hot in Sale
                    </button>
                    <button class="btn btn-info text-white rounded-pill px-4">
                        Gaming Equipments
                    </button>
                    <button class="btn btn-info text-white rounded-pill px-4">
                        Shoes
                    </button>
                    <button class="btn btn-info text-white rounded-pill px-4">
                        Men's Fashion
                    </button>
                    <button class="btn btn-info text-white rounded-pill px-4">
                        Home Decor
                    </button>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
                {{ $slot }}
            </div>
        </main>
    </div>
    {{--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossOrigin="anonymous"></script> --}}
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
