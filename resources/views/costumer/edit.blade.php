@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('template_title')
    {{ __('Update') }} Costumer
@endsection

@section('content')
<div class="panel-header panel-header-small">
    <h2 class="title-sale">Actualizar Cliente</h2>
  </div>
<br><br><br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('costumers.update', $costumer->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('costumer.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
