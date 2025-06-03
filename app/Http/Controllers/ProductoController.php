<?php
namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //
    public function index(Request $request)
    {
        $productos = Producto::all();
        if ($request->has('lista')) {
            $productos = Producto::onlyTrashed()->get();
        }

        return view("admin.productos")->with(array("productos" => $productos));
    }
    public function create()
    {
        return view("admin.create");
    }
    public function store(Request $request)
    {

        $validacion = Validator::make(
            $request->all(),
            [
                "nombre" => "required|max:100",

            ]
        );
        if ($validacion->fails()) {
            return redirect()->back()->with(array(
                "error" => $validacion->messages()
            ));
        }
        if ($request->has("id")) {
            $objeto = Producto::find($request->input("id"));
        } else {
            $objeto = new Producto();
        }

        $objeto->nombre = $request->input("nombre");
        $objeto->precio = $request->input("precio");
        $objeto->descripcion = $request->input("descripcion");
        if ($objeto->save()) {
            return redirect()->route("productos.index");
        }
    }
    public function edit($id, Request $request)
    {
        $producto = Producto::withTrashed($id)->where("id", $id)->first();

        if ($request->has("accion")) {
            $producto->restore();
            return redirect()->route("productos.index");
        }
        return view("admin.create")->with(array(
            "producto" => $producto
        ));
    }

    public function destroy($id, Request $request)
    {
        $producto = Producto::withTrashed($id)->where("id", $id)->first();
        if ($request->has("eliminar")) {
            $producto->forceDelete();
            return redirect()->back();
        } else {
            $producto->delete();
        }
        return redirect()->route("productos.index");
    }
}
