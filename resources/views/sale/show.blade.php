@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('template_title')
    {{ $sale->name ?? "{{ __('Show') Sale" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Sale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $sale->date }}
                        </div>
                        <div class="form-group">
                            <strong>Id Costumer:</strong>
                            {{ $sale->id_costumer }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $sale->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $sale->total }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
