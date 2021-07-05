<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'success' => true,
            'message' => "Got all products.",
            'products' => $products,
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'slug' => 'required|max:100|unique:products,slug',
            'description' => 'nullable',
            'price' => 'numeric',
        ]);

        $data = $request->only([
            'title',
            'slug',
            'description',
            'price',
        ]);

        $product = Product::create($data);

        return response()->json([
            'success' => true,
            'message' => "Product created successfully.",
            'products' => $product,
        ], 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => "Product have found.",
                'product' => $product,
            ], 404);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Product not found!",
                'product' => null,
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:100',
            'slug' => 'required|max:100|unique:products,slug,' . $id,
            'description' => 'nullable',
            'price' => 'numeric',
        ]);

        $data = $request->only([
            'title',
            'slug',
            'description',
            'price',
        ]);

        $product = Product::find($id);

        if ($product) {
            $product->update($data);

            return response()->json([
                'success' => true,
                'message' => "Product updated successfully.",
                'product' => $product,
            ], 404);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Product not found!",
                'product' => null,
            ], 409);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();

            return response()->json([
                'success' => true,
                'message' => "Product deleted successfully.",
            ], 404);
        } else {
            return response()->json([
                'success' => false,
                'message' => "Product not found!",
            ], 409);
        }
    }

    public function search(string $term)
    {
        $products = Product::where('title', 'like', '%' . $term . '%')->get();

        return response()->json([
            'success' => true,
            'message' => "Got all products.",
            'products' => $products,
        ], 200);
    }
}
