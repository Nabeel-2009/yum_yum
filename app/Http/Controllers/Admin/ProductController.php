<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    
    public function create()
    {
        return view('admin.products.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric',
            'category' => 'required|string',
            'image'    => 'required|image|max:2048',
        ]);
        
        $path = $request->file('image')->store('Products', 'public');
        
        Product::create([
            'name'     => $request->name,
            'price'    => $request->price,
            'category' => $request->category,
            'image'    => $path,
        ]);
        
        return redirect()->route('admin.products.index')->with('message', 'Product added successfully!');
    }
    
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric',
            'category' => 'required|string',
            'image'    => 'nullable|image|max:2048',
        ]);
        
        $product = Product::findOrFail($id);
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('Products', 'public');
            $product->update([
                'name'     => $request->name,
                'price'    => $request->price,
                'category' => $request->category,
                'image'    => $path,
            ]);
        } else {
            $product->update([
                'name'     => $request->name,
                'price'    => $request->price,
                'category' => $request->category,
            ]);
        }
        
        return redirect()->route('admin.products.index')->with('message', 'Product updated successfully!');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return redirect()->route('admin.products.index')->with('message', 'Product deleted successfully!');
    }
}
