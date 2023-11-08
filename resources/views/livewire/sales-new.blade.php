@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="box box-info padding-1">
    <br><br>
    <h2>Registrar Venta</h2>
    <div class="box-body">
        <div class="container">
            <div class="row row-cols-2">
                <div class="col">
                    <div class="form-group">
                            <label for="date">Fecha</label>
                            <input type="date" name="date" wire:model="fecha" class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" placeholder="Date">
                            @error('date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="id_costumer">Cliente</label>
                        <select name="id_costumer" wire:model="cliente" class="form-control">
                            <option value="" disabled selected>Seleccione un cliente</option>
                            @foreach($clientes as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('id_costumer') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <hr>
        <div class="container">
            <div class="row row-cols-3">
                <div class="col">
                    <div class="form-group" id="productos-data">
                        <label for="id_producto">Producto</label>
                        <select name="id_producto" wire:model="selectedProduct" class="form-control">
                            <option value="" disabled selected>Seleccione Producto</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->description }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">{{ $errors->first('id_costumer') }}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="Cantidad">Cantidad</label>
                        <input type="number" name="total" wire:model="cantidad"  class="form-control <?php echo $errors->has('total') ? 'is-invalid' : ''; ?>" placeholder="Cantidad">
                        <div class="invalid-feedback"><?php echo $errors->first('total'); ?></div>

                    </div>
                </div>
                <div class="col">
                    <br>
                    <button type="button" wire:click="agregarProducto" class="btn btn-primary">
                        Agregar producto
                    </button>
                </div>
            </div>
        </div>
        <hr>

        <!-- Tabla para mostrar productos agregados -->
        @if(is_array($products_det) && count($products_det) > 0)
        <div class="container">
            <h5>Detalle de venta</h5>
            <hr>
            <table class="table table-light" id="tabventa">
                <thead>
                    <tr class="table-title-row">
                        <th>No.</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Sub-Total</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products_det as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product['description'] }}</td>
                            <td>Q{{ $product['price'] }}</td>
                            <td>{{ $product['cantidad'] }}</td>
                            <td>Q{{ $product['sub_total'] }}</td>
                            <td>
                                <button wire:click="eliminarProducto({{ $index }})" class="btn btn-danger">
                                    <i class="fa fa-trash"></i> <!-- Agrega el icono de eliminación de Font Awesome -->
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="container">
            <p>Debes agregar productos a la venta</p>
        </div>
        @endif
        <hr>
        <div class="container">
            <div class="row row-cols-2">
                <div class="col"></div>
                <div class="col-sm-3">
                    <label for="total">TOTAL</label>
                    <input readonly type="text" id="tot" class="form-control" wire:model="totalV" name="total_venta"
                    value="{{isset($venta->totalV)?$venta->totalV:'' }}" placeholder="Q --">
                </div>
            </div>
        </div>

        <div class="container">
        <div class="form-group">
            
            <div class="col"><input type="checkbox" name="cancel" wire:model="cancelado" class="form-check-input {{ $errors->has('cancel') ? 'is-invalid' : '' }}">Cancelado</div>
            @error('cancel')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <input type="hidden" name="cancel" wire:model="cancelado" value="0">
        </div>


        <div class="container">
            <button type="button" wire:click="guardarVenta" class="btn btn-primary">
                Guardar
            </button>
        </div>
    </div>
</div>
