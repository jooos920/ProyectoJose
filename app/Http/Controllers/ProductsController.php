<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return response()->json($products);
    }
    public function update(Request $request, $id)
    {
        $products = Products::find($id);
        $products->update($request->all());
        return response()->json($products);
    }

    public function show($id)
    {
        $products = Products::find($id);
        return response()->json($products);
    }

    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();
        return response()->json(['message' => 'Producto Eliminado']);
    }

    public function create(Request $request){
        $data=[];
        $data["name"]=$request->nombre;
        $data["description"]=$request->description;
        $data["price"]=$request->price;
        $data["stock"]=$request->stock;

        $product=Products::create($data);
        return response()->json([
            'message' => 'Producto creado',
            'datos: ' => $product
        ]);
    }
}
