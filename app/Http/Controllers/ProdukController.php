<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $product = Produk::all();
        $produk = new Produk();
        return view('product.index', compact('product', 'produk'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $produk = Produk::create($validatedData);

        // dd($produk);

        return redirect()->route('product.index')->with('success', 'Produk Telah Ditambahkan.');
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('product.show', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('product.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Produk Telah Diupdate.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('product.index')->with('success', 'Produk Telah Dihapus.');
    }

    public function availableProducts()
    {
        $availableProducts = Produk::where('stock', '>', 0)->get();
        
        return view('product.available', ['availableProducts' => $availableProducts]);
    }

    public function unavailableProducts()
    {
        $unavailableProducts = Produk::where('stock', '=', 0)->get();

        return view('product.unavailable', ['unavailableProducts' => $unavailableProducts]);
    }

    public function updateStockForm($id)
    {
        $produk = Produk::findOrFail($id);
        
        return view('product.update_stock', compact('produk'));
    }

    public function updateStock(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $request->validate(['stock' => 'required|integer|min:0',]);
        $produk->stock = $request->stock;
        $produk->save();

        return redirect()->route('product.index')->with('success', 'Stock Produk Telah Diupdate.');
    }
}
