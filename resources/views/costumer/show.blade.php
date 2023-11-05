@extends('layouts.app')

@section('template_title')
    {{ $costumer->name ?? "{{ __('Show') Costumer" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Costumer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('costumers.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>First Name:</strong>
                            {{ $costumer->first_name }}
                        </div>
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            {{ $costumer->last_name }}
                        </div>
                        <div class="form-group">
                            <strong>Phone Number:</strong>
                            {{ $costumer->phone_number }}
                        </div>
                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $costumer->nit }}
                        </div>
                        <div class="form-group">
                            <strong>Adress:</strong>
                            {{ $costumer->adress }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $costumer->status }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
