<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\CuentasPorPagar; // Importa el modelo correspondiente a Cuentas por Pagar

use DB;

class CuentasPorPagarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Obtener todas las cuentas por pagar activas
        $cuentasporpagar = DB::table('CuentasPorPagar as cpp')
            ->where('cpp.Estatus', '=', '1')
            ->get();

        return view('cuentasporpagar.index', compact('cuentasporpagar'));
    }

    public function new()
    {
        return view('cuentasporpagar.nuevo');
    }

    public function add(Request $request)
    {
        try {
            DB::beginTransaction();

            $cuentaporpagar = new CuentasPorPagar([
                'ProveedorID' => $request->get('ProveedorID'),
                'SaldoPendiente' => $request->get('SaldoPendiente'),
                'FechaVencimiento' => $request->get('FechaVencimiento')
            ]);

            $cuentaporpagar->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo), 404);
        }
        return response()->json(200);
    }

    public function edit($id)
    {
        $cuentaporpagar = DB::table('CuentasPorPagar as cpp')
            ->where('cpp.CuentaPorPagarID', '=', base64_decode($id))
            ->get();
        return view('cuentasporpagar.edit', compact('cuentaporpagar'));
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            $cuentaporpagar = CuentasPorPagar::find($request->get('CuentaPorPagarID'));
            $cuentaporpagar->ProveedorID = $request->get('ProveedorID');
            $cuentaporpagar->SaldoPendiente = $request->get('SaldoPendiente');
            $cuentaporpagar->FechaVencimiento = $request->get('FechaVencimiento');
            $cuentaporpagar->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo), 404);
        }
        return response()->json(200);
    }
}
