<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller{
    
    public function index(){ 

        $productos = Producto::paginate(4);

        return view('productos.index',compact('productos'));
    } 

    public function crear(Request $request){
        $rules=[
            'nombre'=>'required|string',
            'descripcion'=>'required|string',
            'marca'=>'required|string',
            'stock'=>'required|integer',
            'precio'=>'required|float',
            'iva'=>'required|float',
            'stock_min'=>'required|integer',
            'estado'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute campo es requerido',
            'stock_min.required'=>'El campo stock minimo es requerido',
        ];
        $this->validate($request,$rules,$mensaje);

        $producto = Producto::create([ 
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'marca' => $request->input('marca'),
            'stock' => $request->input('stock'),
            'precio' => $request->input('precio'),
            'iva' => $request->input('iva'),
            'stock_min' => $request->input('stock_min'),
            'estado' => $request->input('estado'),
        ]);
        return redirect()->route('index')->with('success','Se creo correctamente!');
    }

    public function formulario(){
        return view('productos.formulario');
    }
    public function eliminar($id){
        $productos =Producto::find($id);
        $productos->delete();
        return redirect()->route('index');
    }
    public function editar($id){
        $productos=Producto::find($id);
        return view('productos.editar',compact('productos'));
    }
    public function actualizar(Request $request, $id){
        $productos = Producto::find($id);
        $productos->nombre = $request->input('nombre');
        $productos->descripcion = $request->input('descripcion');
        $productos->marca = $request->input('marca');
        $productos->stock = $request->input('stock');
        $productos->precio = $request->input('precio');
        $productos->iva = $request->input('iva');
        $productos->stock_min = $request->input('stock_min');
        $productos->estado = $request->input('estado');
        $productos->save();
        return redirect()->route('index');
    }

    public function ver($id){
        $productos=Producto::find($id);
        return view('productos.ver',compact('productos'));

    }

    public function buscar(Request $request) {
        $buscar = $request->input('buscar');
        $productos = Producto::where(function ($query) use ($buscar) {
        $query->where('nombre', 'like', "%$buscar%")
              ->orWhere('descripcion', 'like', "%$buscar%")
              ->orWhere('marca', 'like', "%$buscar%")
              ->orWhere('stock', 'like', "$buscar")
              ->orWhere('precio', 'like', "$buscar")
              ->orWhere('iva', 'like', "$buscar")
              ->orWhere('stock_min', 'like', "$buscar")
              ->orWhere('estado', 'like', "$buscar");
        })->paginate(4);
        $vacio = $productos->isEmpty();
        return view('productos.index', compact('productos', 'vacio'));
    }

}
