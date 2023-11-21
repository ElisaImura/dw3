<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator; 
class ProfesorController extends Controller
{
    public function index(){ 

    $profesores = Profesor::paginate(2);
    
    return view('profesores.index',compact('profesores')); } 


    public function crear(Request $request){
    Profesor::create([ 
                'nombre' => $request->input('nombre'),
                'apellido' => $request->input('apellido'),
                'ci' => $request->input('ci'),
                'correo' => $request->input('correo'),
                'fecha_nac' => $request->input('fecha_nac'),
                'direccion' => $request->input('direccion'),
                'profesion' => $request->input('profesion'),
                'materia' => $request->input('materia'),
            ]);
                return redirect()->route('index')->with('success','Se creo correctamente!');
        }

    public function formulario(){
        return view('profesores.form');
       }
        public function eliminar($id){
            $profesores =Profesor::find($id);
            $profesores->delete();
            return redirect()->route('index');
        }
        public function editar($id){
            $profesores=Profesor::find($id);
            return view('profesores.edit',compact('profesores'));

        }
        public function actualizar(Request $request, $id)
        {
        $profesores = Profesor::find($id);
        $profesores->nombre = $request->input('nombre');
        $profesores->apellido = $request->input('apellido');
        $profesores->ci = $request->input('ci');
        $profesores->correo = $request->input('correo');
        $profesores->fecha_nac = $request->input('fecha_nac');
        $profesores->direccion = $request->input('direccion');
        $profesores->profesion = $request->input('profesion');
        $profesores->materia = $request->input('materia');
        $profesores->save();
        return redirect()->route('index');
        }

        public function ver($id){
            $profesores=Profesor::find($id);
            return view('profesores.info',compact('profesores'));

        }

        public function buscar(Request $request) {
        $buscar = $request->input('buscar');
        $profesores = Profesor::where(function ($query) use ($buscar) {
        $query->where('nombre', 'like', "%$buscar%")
              ->orWhere('apellido', 'like', "%$buscar%")
              ->orWhere('ci', 'like', "$buscar")
              ->orWhere('correo', 'like', "$buscar")
              ->orWhere('fecha_nac', 'like', "$buscar")
              ->orWhere('direccion', 'like', "$buscar")
              ->orWhere('profesion', 'like', "$buscar")
              ->orWhere('materia', 'like', "$buscar");
        })->paginate(2);
        $vacio = $profesores->isEmpty();
        return view('profesores.index', compact('profesores', 'vacio'));
    }

}
