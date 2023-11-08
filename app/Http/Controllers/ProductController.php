<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use DB;
use Intervention\Image\Facades\Image as Image;
/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('status', true)->paginate(5);

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('product.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if (!is_numeric($input['price'])) {
            return back()
                ->withInput()
                ->with('error', 'El precio debe ser un valor numérico');
        }
    
        // Ahora, realiza la validación normal
        $validator = Validator::make($input, [
            'price' => 'required|numeric',
            // otras reglas de validación
        ]);
    
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $cont=DB::table('products')
        ->select(DB::raw('count(id) as contador'))
        ->get();

        $cont=$cont[0]->contador+1;
        request()->validate(Product::$rules);

        $image = $request->file('image');

        $input  = array('image' => $image) ;
        $reglas = array('image' => 'required|image|mimes:jpeg,jpg,png|max:2000');
        $validacion = Validator::make($input,  $reglas);

        if ($validacion->fails())
        {
            return back()
                ->with("msj","El archivo no es una imagen valida");
        }
        else
        {      
          
            $cont+=1;
            $nombre_original=$image->getClientOriginalName();
            $extension=$image->getClientOriginalExtension();
            $nuevo_nombre="productimagen-".$cont.".".$extension;

            $img = Image::make($image)->resize(350, 350);

            $r1=Storage::disk('fotografias')->put($nuevo_nombre,   (string) $img->encode() );

            $rutadelaimagen=$nuevo_nombre;

            $product = Product::create([
                'description' => $request->input('description'),
                'unit_of_measurement'=> $request->input('unit_of_measurement'),
                'price'=> $request->input('price'),
                'image'=>$rutadelaimagen,
            ]);

        }   
        
        return redirect()->route('products/list')
            ->with('success', 'Producto Creado Exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
    
        request()->validate(Product::$rules);

        $product->update($request->all());

        return redirect()->route('products/list')
            ->with('success', 'Product updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Actualiza el atributo "status" a false para el cliente con el ID dado
        $updated = Product::where('id', $id)->update(['status' => false]);

        return redirect()->route('products/list')
            ->with('success', 'Product deleted successfully');
    }
}
