@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('template_title')
    {{ __('Update') }} Sale
@endsection

@section('content')
<div class="panel-header panel-header-small">
    <h2 class="title-sale">Editar Estado de Venta</h2>
  </div>
<br><br><br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sales.update', $sale->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('sale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
