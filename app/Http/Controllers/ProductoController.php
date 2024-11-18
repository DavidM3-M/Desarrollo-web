<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class ProductoController extends Controller
{
    public function index(){
        $productos = Producto::all();
        return view('productos.index',[ 'productos' => $productos]);
    }
    public function create(){
        return view('productos.create');
    }

    public function store(Request $request){
        try {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->save();

        return redirect(route('producto.create'))->with('success', 'Producto registrado exitosamente');

        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function edit($id){
        $producto= Producto::where('id', $id)->first();
        return view('productos.edit',['producto'=> $producto]);
    }

    public function update (Request $request, $id){
        try {
            $producto = Producto::where('id',$id)->update([
                'nombre'=>$request->nombre,
                'descripcion'=>$request->descripcion,
                'precio'=>$request->precio,
            ]);
            if($producto){
                return redirect(route('producto.index'))->with('success', 'Producto actualizado exitosamente');
            }
            return redirect(route('producto.index'))->with('success', 'Producto no actualizado :(');


            } catch (Exception $exception) {
                return $exception->getMessage();
            }
    }

    public function delete($id){
        try {
            $producto = Producto::where('id',$id)->delete();

        if($producto){
             return redirect(route('producto.index'))->with('success', 'Producto eliminado exitosamente');
        }
        return redirect(route('producto.index'))->with('success', 'Producto no eliminado :(');


        } catch (Exception $exception) {
            return $exception->getMessage();
        }

    }
}
