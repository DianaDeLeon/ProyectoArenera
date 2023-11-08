<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Costumer;
use Illuminate\Http\Request;

/**
 * Class SaleController
 * @package App\Http\Controllers
 */
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totales=0;
        $customers = Costumer::all();
        $sales = Sale::where('status', true)->paginate(8);
        return view('sale.index', compact('sales','totales','customers'))
            ->with('i', (request()->input('page', 1) - 1) * $sales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sale = new Sale();
        return view('sale.create', compact('sale'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Sale::$rules);

        $sale = Sale::create($request->all());

        return redirect()->route('sale/list')
            ->with('success', 'Registro Exitoso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::with('detallesVenta.producto')->find($id);
        
        if (!$sale) {
            // Puedes manejar el caso en que la venta no se encuentre, por ejemplo, redireccionando a otra página o mostrando un mensaje de error.
            return redirect()->route('sales/list')->with('error', 'La venta no existe.');
        }

        return view('sale.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);

        return view('sale.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        request()->validate(Sale::$rules);

        $sale->update($request->all());

        return redirect()->route('sales/list')
            ->with('success', 'Registro Actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sale = Sale::where('id', $id)->update(['status' => false]);

        return redirect()->route('sales/list')
            ->with('success', 'Registro eliminado');
    }

    public function filterByDate(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $status = $request->input('status');
        $customerId = $request->input('id_costumer'); // Asegúrate de que el nombre del campo sea correcto
    
        $query = Sale::where('status', true);
    
        if ($status !== null) {
            $query->where('cancel', $status);
        }
    
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }
    
        if (!empty($customerId)) {
            $query->where('id_costumer', $customerId);
        }
    
        $sales = $query->paginate(8);
        $totales = $sales->sum('total');
        $customers = Costumer::all();
    
        return view('sale.index', compact('sales', 'totales', 'customers'))
            ->with('i', (request()->input('page', 1) - 1) * $sales->perPage());

    }
}
