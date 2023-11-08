@extends('layouts.app', [
    'namePage' => 'Material',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('template_title')
    {{ __('Update') }} Product
@endsection

@section('content')
<div class="panel-header panel-header-small">
    <h2 class="title-sale">Editar Material</h2>
  </div>
<br><br><br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"></span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $product->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('product.form',["task"=>"edit"])

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
