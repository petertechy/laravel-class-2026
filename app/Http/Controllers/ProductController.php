<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function index(){
        return view('product');
    }

    public function create(Request $request){

          $validator = Validator::make($request->all(), [
        'title' => 'required | min:1 | max:25',
        'description' => 'required|max:255',
        'price' => ['required'],
        'quantity' => ['required']
    ]);

    // return $validator->fails();
    // return $validator->errors();

    if($validator->fails()){
            return view('product', [
                    'status' => 'false',
                    'errors' => $validator->errors()
            ]);
    }else{

    $product = Product::create([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'quantity' => $request->quantity,
    ]);

    if ($product) {
        return redirect()->route('product')->with('message', 'Registration Successful');
    }else {
        return view('product', [
            'status' => false,
            'message' => 'User failed to register. Please try again'
        ]);
    }
    }
    }
}
