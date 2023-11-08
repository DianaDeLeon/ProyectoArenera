<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Costumer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\DetailSale;

class SalesNew extends Component
{
   // Venta
   public $fecha;
   public $clientes, $cliente = 1;
   public $userId;
   public $cancelado=false;
   public $totalV;
   // Detalle venta
   public $products, $products_det = [];
   public $precio = [''];
   public $cantidad = 1;
   public $subtotal = [''];
   public $id_venta = [''];
   public $selectedProduct = 1;
   // Funcion que inizializa las variables
   public function mount()
   {
       $this->clientes = Costumer::all();
       $this->products = Product::all();

   }
   public function agregarProducto()
   {

       // Obtén los detalles del producto seleccionado y la cantidad
       $product_de = Product::find($this->selectedProduct);

       $this->products_det[] = [
           'id_producto' => $this->selectedProduct,
           'description' => $product_de->description,
           'price' => $product_de->price,
           'cantidad' => $this->cantidad,
           'sub_total' => $product_de->price * $this->cantidad,
       ];
       // Calcula el total
       $this->calcularTotal();
       // Restablece las variables después de agregar el producto
       $this->selectedProduct = 1;
       $this->cantidad = 1;

   }
   public function calcularTotal()
   {
       $this->totalV = 0;
       foreach ($this->products_det as $product) {
           $this->totalV += $product['sub_total'];
       }
   }
   public function eliminarProducto($index)
   {
       // Verificar si el índice existe en el array
       if (array_key_exists($index, $this->products_det)) {
           // Eliminar el producto del array utilizando el índice
           unset($this->products_det[$index]);
           // Reasignar los productos en el array
           $this->products_det = array_values($this->products_det);
           $this->calcularTotal();
       }
   }

   public function guardarVenta()
   {
           // Iniciar una transacción de base de datos
           DB::beginTransaction();

           try {
           // Obtén el usuario autenticado
           $user = Auth::user();
           // Obtén el ID del usuario
           $this->userId = $user->id;
           // Ingresamso las ventas
           $venta = new Sale();
           $venta->id_user = $this->userId;
           $venta->date = $this->fecha;
           $venta->id_costumer = $this->cliente;
           $venta->total = $this->totalV;
           $venta->cancel = $this->cancelado;
           $venta->save();

           // Guardar los detalles
           foreach ($this->products_det as $index => $product) {
               $detalleVenta = new DetailSale();
               $detalleVenta->id_sale = $venta->id;
               $detalleVenta->id_product = $product['id_producto'];
               $detalleVenta->quantity = $product['cantidad'];
               $detalleVenta->price = $product['price'];
               $detalleVenta->subtotal = $product['sub_total'];
               $detalleVenta->save();
           }

           // Commit de la transacción si todo fue exitoso
           DB::commit();
           // Restablecer las propiedades y variables después de guardar
           $this->fecha = null;
           $this->cliente = 1;
           $this->products_det = [];
           $this->totalV = 0;

           return redirect()->route('sales/list')
           ->with('success', 'La venta se ha guardado correctamente.');
           } catch (\Exception $e) {
               // Rollback de la transacción si ocurre algún error
               DB::rollBack();
               session()->flash('error', 'Se produjo un error al guardar la venta. Inténtalo de nuevo.');
           }
   }
   public function render()
   {
       return view('livewire.sales-new');
   }
}
