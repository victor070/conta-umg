<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Bancos; 

use DB;

class BancosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $bancos=DB::table('Banco as b')
        ->where('b.Estatus','=','1')
        ->get();

        return view('banco.bancos', compact('bancos'));
    }

    public function new(){

        return view('banco.nuevo');
    }

    public function add(Request $request){
        try
        {
            DB::beginTransaction();

                $bancos = new Bancos([
                'Nombre'       => $request->get('Nombre'),
                'SaldoCuentas' => $request->get('SaldoCuentas')
            ]);

            $bancos->save();

            DB::commit();

        }catch (\Exception $e){
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo),404);
        }
        return response()->json(200);

    }

    public function edit($id){

        $banco=DB::table('banco as bn')
        ->where('bn.BancoID','=',base64_decode($id))
        ->get();
        return view('banco.edit', compact('banco'));
    }

    public function update(Request $request){
        try
        {
            DB::beginTransaction();

            $banco = Bancos::find($request->get('BancoID'));
            $banco->Nombre=$request->get('Nombre');
            $banco->SaldoCuentas=$request->get('SaldoCuentas');
            $banco->Estatus=$request->get('Estatus');
            $banco->save();  

            DB::commit();

        }catch (\Exception $e){
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo),404);
        }
        return response()->json(200);

    }


}