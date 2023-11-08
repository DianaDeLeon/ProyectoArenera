@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('template_title')
    {{ $sale->name ?? "{{ __('Show') Sale" }}
@endsection

@section('content')
<div class="panel-header panel-header-small">
    <h2 class="title-sale">Detalle de Venta</h2>
  </div>
<br><br><br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sales/list') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $sale->date }}
                        </div>
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            {{ $sale->costumer->first_name }} {{ $sale->costumer->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Encargado:</strong>
                            {{ $sale->user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $sale->total }}
                        </div>
              
                    </div>
                </div>
                <h2>Detalles de la Venta</h2>
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr class="table-title-row">
                                <th>Descripción</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale->detallesVenta as $detalle)
                                <tr>
                                    <td>{{ $detalle->product->description }}</td>
                                    <td>{{ $detalle->quantity }}</td>
                                    <td>{{ $detalle->price }}</td>
                                    <td>{{ $detalle->subtotal }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>

            
        </div>

        

    </section>


  

@endsection
