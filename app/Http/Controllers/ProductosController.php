<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\ProductosCategorias;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductosController extends Controller
{
    public function index()
{
    $productos = Productos::where('status', 1)->paginate(10);

    return view('admin.productos.index', compact('productos'));
}


    public function create()
    {
        return view('admin.productos.create');
    }

    public function store(Request $request)
{
    $producto = new Productos();
    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->stock = $request->stock;
    $producto->save();
    return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
}
    public function edit($id)
    {
        $producto = Productos::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'No se pudo encontrar el producto');
        }

        return view('admin.productos.edit', compact('producto', 'categorias', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $producto = Productos::find($id);
    
        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'No se pudo encontrar el producto');
        }
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->save();
    
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }
    
    public function destroy($id)
    {
        $producto = Productos::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'No se pudo encontrar el producto');
        }

        $producto->update(['status' => 0]);
        return redirect()->route('productos.index')->with('success', 'Producto Eliminado Correctamente');
    }

    public function show($id)
    {
        $producto = Productos::find($id);

        if (!$producto) {
            return redirect()->route('productos.index')->with('error', 'No se pudo encontrar el producto');
        }

        return view('admin.productos.show', compact('producto'));
    }
}
