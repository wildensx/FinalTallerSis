<?php

namespace FinalSis\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use FinalSis\Http\Requests\IngresoFormRequest;
use FinalSis\Ingreso;
use FinalSis\DetalleIngreso;
use DB;
use Carbon\Carbon;
use PhpParser\Node\Expr\AssignOp\Concat;
use Response;
use Illuminate\Support\Collection;
class IngresoController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request)
        {
            $query=trim($request->get('searchText'));
            $ingresos=DB::table('ingresos as i')
                ->join('personas as p','i.idproveedor','=','p.idpersona')
                ->join('detalle_ingresos as di','i.idingreso','=','di.idingreso')
                ->select('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
                ->where('i.num_comprobante','LIKE','%'.$query.'%')
                ->orderBy('i.idingreso','desc')
                ->groupBy('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
                ->paginate(7);
            return view('compras.ingreso.index',["ingresos"=>$ingresos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        $personas=DB::table('personas')->where('tipo_persona','=','Proveedor')->get();
        $articulos=DB::table('articulos as art')
            ->select(DB::raw("CONCAT(art.codigo,' ',art.nombre) AS articulo"),'art.idarticulo')
            ->where('art.estado','=','Activo')
            ->get();
        return view("compras.ingreso.create",["personas"=>$personas,"articulos"=>$articulos]);
    }
    public function store(IngresoFormRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $ingreso = new Ingreso();
            $ingreso->idproveedor=$request->get('idproveedor');
            $ingreso->tipo_comprobante=strtoupper($request->get('tipo_comprobante'));
            $ingreso->serie_comprobante=$request->get('serie_comprobante');
            $ingreso->num_comprobante=$request->get('num_comprobante');
            $mytime = Carbon::now('America/Caracas');
            $ingreso->fecha_hora=$mytime->toDateTimeString();
            $ingreso->impuesto='1.20';
            $ingreso->estado='A';
            $ingreso->save();

            $idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compra');
            $precio_venta = $request->get('precio_venta');

            $cont = 0;

            while($cont < count($idarticulo))
            {
                $detalle = new DetalleIngreso();
                $detalle->idingreso= $ingreso->idingreso;
                $detalle->idarticulo= $idarticulo[$cont];
                $detalle->cantidad= $cantidad[$cont];
                $detalle->precio_compra= $precio_compra[$cont];
                $detalle->precio_venta= $precio_venta[$cont];
                $detalle->save();
                $cont = $cont+1;
            }

            DB::commit();
        }
        catch (\Exception $e)
        {
            DB::rollback();
        }
        return Redirect::to('compras/ingreso');
    }

    public function show($id)
    {
        $ingreso = DB::table('ingresos as i')
            ->join('personas as p','i.idproveedor','=','p.idpersona')
            ->join('detalle_ingresos as di','i.idingreso','=','di.idingreso')
            ->select('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado',DB::raw('sum(di.cantidad*precio_compra) as total'))
            ->where('i.idingreso','=',$id)
            ->groupBy('i.idingreso','i.fecha_hora','p.nombre','i.tipo_comprobante','i.serie_comprobante','i.num_comprobante','i.impuesto','i.estado')
            ->first();
        $detalles = DB::table('detalle_ingresos as d')
            ->join('articulos as a','d.idarticulo','=','a.idarticulo')
            ->select('a.nombre as articulo','d.cantidad','d.precio_compra','d.precio_venta')
            ->where('d.idingreso','=',$id)
            ->groupBy('a.nombre','d.cantidad','d.precio_compra','d.precio_venta')
            ->get();
        return view ("compras.ingreso.show",["ingreso"=>$ingreso,"detalles"=>$detalles]);
    }
    public function destroy($id)
    {
        $ingreso = Ingreso::findOrFail($id);
        $ingreso->Estado='C';
        $ingreso->update();
        return Redirect::to('compras/ingreso');

    }
}
