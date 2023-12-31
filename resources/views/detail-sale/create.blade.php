@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('template_title')
    {{ __('Create') }} Detail Sale
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Detail Sale</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('detail_sales.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('detail-sale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
