@extends('layouts.app', [
    'namePage' => 'Cliente',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('template_title')
    {{ $costumer->name ?? "{{ __('Show') Costumer" }}
@endsection

@section('content')
<div class="panel-header panel-header-small">
    <h2 class="title-sale">Detalle del Cliente</h2>
  </div>
<br><br><br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('customers/list') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $costumer->first_name }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $costumer->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Teléfono:</strong>
                            {{ $costumer->phone_number }}
                        </div>
                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $costumer->nit }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            {{ $costumer->adress }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
