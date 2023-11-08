@extends('layouts.app', [
    'namePage' => 'Usuarios',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])


@section('template_title')
    {{ __('Update') }} User
@endsection

@section('content')
<div class="panel-header panel-header-small">
    <h2 class="title-sale">Agregar Material</h2>
  </div>
<br><br><br>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
