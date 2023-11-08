@extends('layouts.app', [
    'namePage' => 'Home',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('template_title')
    Sale
@endsection

@section('content')
<div class="panel-header panel-header-small">
    <h2 class="title-sale">Listado de Ventas</h2>
  </div>
<br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                                   
                    
                        <span id="card_title">
                               
                               </span>

                             <!-- <div class="float-right">
                                <a href="{{ route('sales.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Registrar Venta') }}
                                </a>
                              </div> -->
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif


                    <form method="GET" action="{{ route('sales.filter') }}">
                            <div class="form-row" style="margin-left: 0.4cm;">
                                <div class="form-group col-md-2">
                                    <label for="start_date">Fecha de inicio:</label>
                                    <input type="date" class="form-control" name="start_date" id="start_date">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="end_date">Fecha de fin:</label>
                                    <input type="date" class="form-control" name="end_date" id="end_date">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="status">Estado:</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Selecciona un estado</option>
                                        <option value="1">Cancelado</option>
                                        <option value="0">Pendiente</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="id_costumer">Cliente:</label>
                                    <select class="form-control" name="id_costumer" id="id_costumer">
                                        <option value="">Selecciona un cliente</option>
                                        @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-2" style="margin-top: 0.4cm;">
                                    <button type="submit" class="btn btn-primary">Filtrar</button>
                                </div>
                            </div>
                        </form>

                   

                    <div class="card-body">

                    <div class="total-ventas">Total de Ventas: Q {{ $totales }}.00</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr  class="table-title-row">
                                        <th>#</th>

										<th>Fecha</th>
										<th>Cliente</th>
                                        <th>Total</th>
										<th>Estado</th>
									
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $sale->date }}</td>
											<td>{{ $sale->costumer->first_name}} {{ $sale->costumer->last_name }}</td>
                                            <td>{{ $sale->total }}</td>
											<td>
                                                    @if ($sale->cancel === 1)
                                                        <span class="green-dot">&#9679;</span> <!-- Punto verde grande -->
                                                    @else
                                                        <span class="red-dot">&#9679;</span> <!-- Punto rojo grande -->
                                                    @endif
                                                </td>
                                                <td>
                                                <form action="{{ route('sales.destroy',$sale->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sales.show',$sale->id) }}"><i class="fa fa-fw fa-eye"></i> </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('sales.edit',$sale->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div>
                {!! $sales->links() !!}
            </div>
        </div>
    </div>
@endsection
