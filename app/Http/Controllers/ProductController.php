<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return view('product.index');
    }

    public function list()
    {
        return ['status' => 1, 'products' => Product::all()];
    }

    public function product()
    {
        if ($this->request->has('product_id') && is_numeric($this->request->get('product_id'))) {
            $product = Product::findOrFail($this->request->get('product_id'));
        } else {
            $product = new Product;
        }

        $product->name = $this->request->get('name');
        $product->quantity = $this->request->get('quantity');
        $product->price = $this->request->get('price');
        $product->save();

        return ['status' => 1];
    }

    public function getProduct()
    {
        $product = Product::findOrFail($this->request->get('id'));

        return ['status' => 1, 'product' => $product];
    }
}