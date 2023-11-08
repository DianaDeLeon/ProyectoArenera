@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('template_title')
    {{ __('Create') }} Costumer
@endsection

@section('content')
<div class="panel-header panel-header-small">
    <h2 class="title-sale">Agregar Cliente</h2>
  </div>
<br>
    <br>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Cliente</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('costumers.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('costumer.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
