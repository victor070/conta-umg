<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\CuentasPorCobrar; // Importa el modelo correspondiente a Cuentas por Cobrar

use DB;

class CuentasPorCobrarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Obtener todas las cuentas por cobrar activas
        $cuentasporcobrar = DB::table('CuentasPorCobrar as cpc')
            ->where('cpc.Estatus', '=', '1')
            ->get();

        return view('cuentasporcobrar.index', compact('cuentasporcobrar'));
    }

    public function new()
    {
        return view('cuentasporcobrar.nuevo');
    }

    public function add(Request $request)
    {
        try {
            DB::beginTransaction();

            $cuentaporcobrar = new CuentasPorCobrar([
                'ClienteID' => $request->get('ClienteID'),
                'SaldoPendiente' => $request->get('SaldoPendiente'),
                'FechaVencimiento' => $request->get('FechaVencimiento')
            ]);

            $cuentaporcobrar->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo), 404);
        }
        return response()->json(200);
    }

    public function edit($id)
    {
        $cuentaporcobrar = DB::table('CuentasPorCobrar as cpc')
            ->where('cpc.CuentaPorCobrarID', '=', base64_decode($id))
            ->get();
        return view('cuentasporcobrar.edit', compact('cuentaporcobrar'));
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $cuentaporcobrar = CuentasPorCobrar::find($request->get('CuentaPorCobrarID'));
            $cuentaporcobrar->ClienteID = $request->get('ClienteID');
            $cuentaporcobrar->SaldoPendiente = $request->get('SaldoPendiente');
            $cuentaporcobrar->FechaVencimiento = $request->get('FechaVencimiento');
            $cuentaporcobrar->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo), 404);
        }
        return response()->json(200);
    }
}
