<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (@isset($message))
                
            <div class="mx-auto alert {{$status ? 'alert-success' : 'alert-danger'}}">{{$message}}</div>
                
            @endif
    <form action="/create" method="post">
        @csrf
        <h1>Product Creation</h1>
        <input type="text" placeholder="product title" name="title">
        <div class="mb-3">
                    @if ($errors->first('title'))     
                    <span class="text-danger text-sm">{{$errors->first('title')}}</span>
                    @endif
                </div>
        <input type="text" placeholder="product description" name="description">
        <div class="mb-3">
                    @if ($errors->first('description'))     
                    <span class="text-danger text-sm">{{$errors->first('description')}}</span>
                    @endif
                </div>
        <input type="number" placeholder="product price" name="price">
        <div class="mb-3">
                    @if ($errors->first('price'))     
                    <span class="text-danger text-sm">{{$errors->first('price')}}</span>
                    @endif
                </div>
        <input type="number" placeholder="product quantity" name="quantity">
        <div class="mb-3">
                    @if ($errors->first('quantity'))     
                    <span class="text-danger text-sm">{{$errors->first('quantity')}}</span>
                    @endif
                </div>

        <button>Add Product</button>
    </form>
</body>
</html>