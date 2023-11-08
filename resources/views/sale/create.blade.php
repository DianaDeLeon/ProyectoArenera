@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('template_title')
    {{ __('Create') }} Sale
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Sale</span>
                    </div>
                    <div class="card-body">
                        @csrf
                        <livewire:sales-new>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @livewireScripts
@endsection
