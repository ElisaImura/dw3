<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request; 
use App\Models\Cliente; 

class ClienteController extends Controller {

    public function index(){ 
        //Obtener datos por ORM Eloquent    
        $clientes = Cliente::paginate(4);
        //Obtener datos por el metodo get
        //$clientes=DB::table('clientes')
        //->get();
        //$clientes=DB::insert('select * from clientes where estado= "Activo"');


        return view('clientes.index',compact('clientes'));
    } 

    public function crear(Request $request){
        $rules=[
            'nombre'=>'required|string',
            'apellido'=>'required|string',
            'edad'=>'required|integer',
            'ci'=>'required',
            'correo'=>'required|email',
            'fecha_nac'=>'required',
            'estado'=>'required',
        ];
        $mensaje=[
            'required'=>'El :attribute campo es requerido',
            'fecha_nac.required'=>'El campo fecha de nacimiento es requerido',
            'ci.required'=>'El campo de numero de ci es requerido',
        ];
        $this->validate($request,$rules,$mensaje);

        $cliente = Cliente::create([ 
            'nombre' => $request->input('nombre'),
            'apellido' => $request->input('apellido'),
            'edad' => $request->input('edad'),
            'ci' => $request->input('ci'),
            'correo' => $request->input('correo'),
            'fecha_nac' => $request->input('fecha_nac'),
            'estado' => $request->input('estado'),
            'id_cargo' => $request->input('id_cargo'),
            'telefono' => $request->input('telefono'),
            'telefono' => $request->input('id_cargo'),
        ]);
    	return redirect()->route('index')->with('success','Se creo correctamente!');
    }

    public function formulario(){
        $cargos =cargo::pluck('nombre','id');
    	return view('clientes.formulario');
    }
    public function eliminar($id){
        $clientes =Cliente::find($id);
        $clientes->delete();
        return redirect()->route('index');
    }
    public function editar($id){
        $clientes=Cliente::find($id);
        return view('clientes.editar',compact('clientes'));

    }
    public function actualizar(Request $request, $id)
    {
        $clientes = Cliente::find($id);
        $clientes->nombre = $request->input('nombre');
        $clientes->apellido = $request->input('apellido');
        $clientes->edad = $request->input('edad');
        $clientes->ci = $request->input('ci');
        $clientes->correo = $request->input('correo');
        $clientes->fecha_nac = $request->input('fecha_nac');
        $clientes->estado = $request->input('estado');
        $clientes->telefono = $request->input('telefono');
        $clientes->id_cargo = $request->input('id_cargo');
        $clientes->save();
        return redirect()->route('index');
    }

    public function ver($id){
        $clientes=Cliente::find($id);
        return view('clientes.ver',compact('clientes'));

    }

    public function buscar(Request $request) {
        $buscar = $request->input('buscar');
        $clientes = Cliente::where(function ($query) use ($buscar) {
        $query->where('nombre', 'like', "%$buscar%")
              ->orWhere('apellido', 'like', "%$buscar%")
              ->orWhere('edad', 'like', "$buscar")
              ->orWhere('ci', 'like', "$buscar")
              ->orWhere('correo', 'like', "$buscar")
              ->orWhere('fecha_nac', 'like', "$buscar")
              ->orWhere('estado', 'like', "$buscar");
        })->paginate(4);
        $vacio = $clientes->isEmpty();
        return view('clientes.index', compact('clientes', 'vacio'));
    }

    public function generarPDF(){
        $clientes = cliente::all();
        $pdf =PDF::loadView('clientes.pdf',compact('clientes'));
        return $pdf->download('clientes.pdf');
    }

}