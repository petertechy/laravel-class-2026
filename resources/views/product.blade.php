<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    @if (@isset($message))
                
            <div class="mx-auto alert {{$status ? 'alert-success' : 'alert-danger'}}">{{$message}}</div>
                
            @endif

             @if (session('message'))
                 <div class='alert alert-success'>{{session('message')}}</div>
            @endif
    <form action="/create" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-7 mx-auto border shadow p-3 my-4">
            <h1>Product Creation</h1>
        <input class="form-control mb-3" type="text" placeholder="product title" name="title">
        <div class="mb-3">
                    @if ($errors->first('title'))     
                    <span class="text-danger text-sm">{{$errors->first('title')}}</span>
                    @endif
                </div>
        <input class="form-control mb-3" type="text" placeholder="product description" name="description">
        <div class="mb-3">
                    @if ($errors->first('description'))     
                    <span class="text-danger text-sm">{{$errors->first('description')}}</span>
                    @endif
                </div>
        <input class="form-control mb-3" type="number" placeholder="product price" name="price">
        <div class="mb-3">
                    @if ($errors->first('price'))     
                    <span class="text-danger text-sm">{{$errors->first('price')}}</span>
                    @endif
                </div>
        <input class="form-control mb-3" type="number" placeholder="product quantity" name="quantity">
        <div class="mb-3">
                    @if ($errors->first('quantity'))     
                    <span class="text-danger text-sm">{{$errors->first('quantity')}}</span>
                    @endif
                </div>

        <input type="file" name="image" class="form-control mb-3" accept="image/*">
        <div class="mb-3">
                    @if ($errors->first('image'))     
                    <span class="text-danger text-sm">{{$errors->first('image')}}</span>
                    @endif
                </div>

        <button class="btn btn-success w-100">Add Product</button>
        </div>
    </form>

    <div class="col-7 mx-auto my-4">
        <h2>Products</h2>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            @forelse ($products as $product)
        <div class="col">
        <div class="card h-100">
            @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                    class="card-img-top" alt="{{ $product->title }}"
                    style="height: 180px; object-fit: cover;">
            @else
        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
            <span class="text-muted">No image</span>
        </div>
            @endif
        <div class="card-body">
            <h5 class="card-title">{{ $product->title }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">
                <strong>₦{{ number_format($product->price) }}</strong>
                &middot; {{ $product->quantity }} in stock
            </p>
        </div>
        </div>
</div>
        @empty
        <p class="text-muted">No products yet — add one above.</p>
        @endforelse
</div>
</div>
</body>
</html>