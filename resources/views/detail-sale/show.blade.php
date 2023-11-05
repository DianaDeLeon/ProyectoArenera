@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('template_title')
    {{ $detailSale->name ?? "{{ __('Show') Detail Sale" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Detail Sale</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('detail_sales.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Sale:</strong>
                            {{ $detailSale->id_sale }}
                        </div>
                        <div class="form-group">
                            <strong>Id Product:</strong>
                            {{ $detailSale->id_product }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $detailSale->price }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $detailSale->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Subtotal:</strong>
                            {{ $detailSale->subtotal }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
