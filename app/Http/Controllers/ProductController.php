<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori unik
        $categories = DB::table('products')->pluck('categories')->unique();

        // Ambil kategori yang dipilih dari parameter query
        $selectedCategory = $request->query('category');

        // Ambil produk berdasarkan kategori yang dipilih, atau semua produk jika tidak ada kategori yang dipilih
        $products = Product::when($selectedCategory, function ($query, $selectedCategory) {
            return $query->where('categories', $selectedCategory);
        })->orderBy('created_at', 'DESC')->get();

        return view('products.index', compact('products', 'categories'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function save(Request $request)
    {
       $request->validate([
            'title' => 'required|string|max:100',
            'categories' => 'required|string|max:200',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
        ]);
            //print_r($validator);exit();
        try
        {
            $product = Product::create([
                'title' => $request->title,
                'categories' => $request-> categories,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
            //print_r($product);exit();
            return redirect('/product')->with(['success' => '<strong>'.$product->title.'</strong> Telah Disimpan']);
        }
        catch(\Exception $e)
        {
            return redirect('/product/new')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->update([
            'title' => $request->title,
            'categories' => $request-> categories,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        return redirect('/product')->with(['success' => '<strong>'.$product->title.'</strong> Diperbaharui']);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect('/product')->with(['success' => '<strong>'.$product->title.'</strong> Dihapus']);
    }
}
