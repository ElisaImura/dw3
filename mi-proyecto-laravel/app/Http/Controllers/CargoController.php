<?php
namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Cargo;
use barryvdh\DomPDF\faced as PDF;

class CargoController extends Controller{
    
    public function index(){ 

        $cargos = Cargo::paginate(4);

        return view('cargos.index',compact('cargos'));
    } 

    public function crear(Request $request){
        $rules=[
            'nombre'=>'required|string',
            'descripcion'=>'required|string',
            'sector'=>'required|string',
            'empresa'=>'required|string',
        ];
        $mensaje=[
            'required'=>'El :attribute campo es requerido',
        ];
        $this->validate($request,$rules,$mensaje);

        $producto = Cargo::create([ 
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'sector' => $request->input('sector'),
            'empresa' => $request->input('empresa'),
        ]);
        return redirect()->route('Cargoindex')->with('success','Se creo correctamente!');
    }

    public function formulario(){
        return view('cargos.formulario');
    }


    public function eliminar($id){
        try{
            $cargos =Cargo::find($id);
            if(!$cargos){
                return redirect()->route('Cargoindex')->with('error','Cargo no encontrado');
            }
            $cargos->delete();
            return redirect()->route('Cargoindex');
        }catch(\Exception $e){
            return redirect()->route('Cargoindex')->with('error','No se puede eliminar porque el cargo esta en uso');
        }
    }
    public function editar($id){
        $cargos=Cargo::find($id);
        return view('cargos.editar',compact('cargos'));
    }
    public function actualizar(Request $request, $id){
        $cargos = Cargo::find($id);
        $cargos->nombre = $request->input('nombre');
        $cargos->descripcion = $request->input('descripcion');
        $cargos->sector = $request->input('sector');
        $cargos->empresa = $request->input('empresa');
        $cargos->save();
        return redirect()->route('Cargoindex');
    }

    public function ver($id){
        $cargos=Cargo::find($id);
        return view('cargos.ver',compact('cargos'));

    }

    public function buscar(Request $request) {
        $buscar = $request->input('buscar');
        $cargos = Cargo::where(function ($query) use ($buscar) {
        $query->where('nombre', 'like', "%$buscar%")
              ->orWhere('descripcion', 'like', "%$buscar%")
              ->orWhere('sector', 'like', "%$buscar%")
              ->orWhere('empresa', 'like', "$buscar");
        })->paginate(4);
        $vacio = $cargos->isEmpty();
        return view('cargos.index', compact('cargos', 'vacio'));
    }

    public function generarPDF(){
        $cargos = Cargo::all();
        $pdf =PDF::loadView('cargos.pdf',compact('cargos'));
        return $pdf->download('cargos.pdf');
    }

}
