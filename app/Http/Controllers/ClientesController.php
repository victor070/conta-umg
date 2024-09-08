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

        $clientes=Clientes::all();

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
                'Telefono'     => $request->get('telefono')
            ]);

            $cliente->save();

            DB::commit();

        }catch (\Exception $e){
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo),404);
        }
        return redirect('clientes');

    }


}