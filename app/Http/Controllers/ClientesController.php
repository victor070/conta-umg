<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Clientes; 

use DB;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $clientes=DB::table('Cliente as cl')
        ->where('cl.Estatus','=','1')
        ->get();

        return view('cliente.clientes', compact('clientes'));
    }

    public function new(){

        return view('cliente.nuevo');
    }

    public function add(Request $request){
        try
        {
            DB::beginTransaction();

                $cliente = new Clientes([
                'Nombre'       => $request->get('Nombre'),
                'Direccion'    => $request->get('Direccion'),
                'Nit'          => $request->get('Nit'),
                'CorreoElectronico' => $request->get('CorreoElectronico'),
                'Telefono'     => $request->get('Telefono')
            ]);

            $cliente->save();

            DB::commit();

        }catch (\Exception $e){
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo),404);
        }
        return response()->json(200);

    }

    public function edit($id){

        $cliente=DB::table('Cliente as cl')
        ->where('cl.ClienteID','=',base64_decode($id))
        ->get();
        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request){
        try
        {
            DB::beginTransaction();

            $cliente = Clientes::find($request->get('ClienteID'));
            $cliente->cliente=$request->get('Nombre');
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