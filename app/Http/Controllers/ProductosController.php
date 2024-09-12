<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Productos; 

use DB;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $productos=DB::table('Producto as pr')
        ->join('Proveedor as pv', 'pr.ProveedorID', '=', 'pv.ProveedorID')
        ->select('pr.*', 'pv.Nombre as Proveedor')
        ->where('pr.Estatus','=','1')
        ->get();

        return view('producto.productos', compact('productos'));
    }

    public function new(){

        $proveedores=DB::table('Proveedor as pv')
        ->where('pv.Estatus','=','1')
        ->get();

        return view('producto.nuevo', compact('proveedores'));
    }

    public function add(Request $request){
        try
        {
            DB::beginTransaction();

                $producto = new Productos([
                'CodigoProducto'       => $request->get('CodigoProducto'),
                'Nombre'               => $request->get('Nombre'),
                'DescripcionDetallada' => $request->get('DescripcionDetallada'),
                'PrecioCompra'         => $request->get('PrecioCompra'),
                'PrecioVenta'          => $request->get('PrecioVenta'),
                'ImpuestosAplicables'  => $request->get('ImpuestosAplicables'),
                'ProveedorID'          => $request->get('ProveedorID'),
                'StockMinimo'          => $request->get('StockMinimo'),
                'StockMaximo'          => $request->get('StockMaximo'),
                'ImpuestosAplicables'  => $request->get('ImpuestosAplicables')
            ]);

            $producto->save();

            DB::commit();

        }catch (\Exception $e){
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo),404);
        }
        return response()->json(200);

    }

    public function edit($id){

        $producto=DB::table('Producto as pr')
        ->where('pr.ProductoID','=',base64_decode($id))
        ->get();

        $proveedores=DB::table('Proveedor as pv')
        ->where('pv.Estatus','=','1')
        ->get();

        return view('producto.edit', compact('producto','proveedores'));
    }

    public function update(Request $request){
        try
        {
            DB::beginTransaction();

            $producto = Productos::find($request->get('productoID'));
            $producto->CodigoProducto       = $request->get('CodigoProducto');
            $producto->Nombre               = $request->get('Nombre');
            $producto->DescripcionDetallada = $request->get('DescripcionDetallada');
            $producto->PrecioCompra         = $request->get('PrecioCompra');
            $producto->PrecioVenta          = $request->get('PrecioVenta');
            $producto->ImpuestosAplicables  = $request->get('ImpuestosAplicables');
            $producto->ProveedorID          = $request->get('ProveedorID');
            $producto->StockMinimo          = $request->get('StockMinimo');
            $producto->StockMaximo          = $request->get('StockMaximo');
            $producto->Estatus              = $request->get('Estatus');
            $producto->save();  

            DB::commit();

        }catch (\Exception $e){
            DB::rollback();
            return response()->json(array('error' => $e->errorInfo),404);
        }
        return response()->json(200);

    }


}