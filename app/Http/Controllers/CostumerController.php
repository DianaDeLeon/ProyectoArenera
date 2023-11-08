<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;

/**
 * Class CostumerController
 * @package App\Http\Controllers
 */
class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $costumers = Costumer::where('status', true)
            ->when($search, function ($query) use ($search) {
                return $query->where('first_name', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('costumer.index', compact('costumers', 'search'))
            ->with('i', (request()->input('page', 1) - 1) * $costumers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costumer = new Costumer();
        return view('costumer.create', compact('costumer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Costumer::$rules);

        $costumer = Costumer::create($request->all());

        return redirect()->route('costumers/list')
            ->with('success', 'Cliente creado exitosamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $costumer = Costumer::find($id);

        return view('costumer.show', compact('costumer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costumer = Costumer::find($id);

        return view('costumer.edit', compact('costumer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Costumer $costumer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costumer $costumer)
    {
        request()->validate(Costumer::$rules);

        $costumer->update($request->all());

        return redirect()->route('customers/list')
            ->with('success', 'Cliente Actualizado !');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Actualiza el atributo "status" a false para el cliente con el ID dado
        $updated = Costumer::where('id', $id)->update(['status' => false]);

        return redirect()->route('customers/list')
            ->with('success', 'Cliente Eliminado !');
    }
}
