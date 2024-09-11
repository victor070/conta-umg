<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Proveedores; 

use DB;

class ProveedoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $proveedores=DB::table('Proveedor as pv')
        ->where('pv.Estatus','=','1')
        ->get();

        return view('proveedor.proveedores', compact('proveedores'));
    }

    public function new(){

        return view('proveedor.nuevo');
    }

    public function add(Request $request){
        try
        {
            DB::beginTransaction();

                $proveedor = new Proveedores([
                'Nombre'       => $request->get('Nombre'),
                'Direccion'    => $request->get('Direccion'),
                'Nit'          => $request->get('Nit'),
                'CorreoElectronico' => $request->get('CorreoElectronico'),
                'Telefono'     => $request->get('Telefono')
            ]);

            $proveedor->save();

            DB::commit();

        }catch (\Exception $e){
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo),404);
        }
        return response()->json(200);

    }

    public function edit($id){

        $proveedor=DB::table('Proveedor as pv')
        ->where('pv.ProveedorID','=',base64_decode($id))
        ->get();
        return view('proveedor.edit', compact('proveedor'));
    }

    public function update(Request $request){
        try
        {
            DB::beginTransaction();

            $cliente = Clientes::find($request->get('ClienteID'));
            $cliente->Nombre=$request->get('Nombre');
            $cliente->Direccion=$request->get('Direccion');
            $cliente->Nit=$request->get('Nit');
            $cliente->CorreoElectronico=$request->get('CorreoElectronico');
            $cliente->Telefono=$request->get('Telefono');
            $cliente->Estatus=$request->get('Estatus');
            $cliente->save();  

            DB::commit();

        }catch (\Exception $e){
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo),404);
        }
        return response()->json(200);

    }


}