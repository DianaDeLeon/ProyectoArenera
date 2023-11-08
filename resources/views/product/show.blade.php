@extends('layouts.app', [
    'namePage' => 'Material',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('template_title')
    {{ $product->name ?? "{{ __('Show') Product" }}
@endsection

@section('content')
<div class="panel-header panel-header-small">
    <h2 class="title-sale">Detalle Materiales</h2>
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
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $product->description }}
                        </div>
                        <div class="form-group">
                            <strong>Unidad de Medida:</strong>
                            {{ $product->unit_of_measurement }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $product->price }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            <br><img src="{{ asset('/fotografias/'.$product->image)}}" alt="" width="200" height="200">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
