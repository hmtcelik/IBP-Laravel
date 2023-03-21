<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('products.create') }}">Create Product</a>
                    </div>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <section style="background-color: #eee;">
            <div class="container py-5">
                @forelse ($products as $product)
                <div class="row justify-content-center mb-3">
                    <div class="col-md-10 col-xl-7">
                    <div class="card shadow-0 border rounded-3">
                        <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                            <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                <img class="card-img-top" src="{{ asset('storage/'.$product->avatar) }}" alt="Card image">
                                <a href="#!">
                                <div class="hover-overlay">
                                    <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                </div>
                                </a>
                            </div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-xl-6">
                            <h5>{{ $product->title }}</h5>
                            </div>
                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                            <div class="d-flex flex-row align-items-center mb-1">
                                <h4 class="mb-1 me-1">{{ $product->price }} $</h4>
                            </div>
                            <h6 class="text-success">Free shipping</h6>
                            <div class="d-flex flex-column mt-4">
                                <button class="btn btn-primary btn-sm" type="button">Details</button>
                                <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                Add to wishlist
                                </button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                @empty
                    <p> Oh there is no product yet </p>
                @endforelse
            </div>
        </section>
    </div>
</body>
</html>