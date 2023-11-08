@extends('layouts.app', [
    'namePage' => 'Home',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg15.jpg",
])

@section('content')
  <div class="panel-header panel-header-lg">
    <h2 class="title-home">Venta de Materiales de Construcción</h2>
  </div>
  <div class="content">
  <div class="row">
  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-category"></h5>
        <h4 class="card-title"></h4>
      </div>
      <div class="card-body">
        <div class="image-container">
          <img class="img-fluid" src="{{ asset('assets/img/excavadora.jpg') }}" alt="">
        </div><br>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-category"></h5>
        <h4 class="card-title"></h4>
      </div>
      <div class="card-body">
        <div class="image-container">
          <img class="img-fluid" src="{{ asset('assets/img/Internationa.jpg') }}" alt="">
          <br>
        </div><br><br>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <div class="card card-chart">
      <div class="card-header">
        <h5 class="card-category"></h5>
        <h4 class="card-title"></h4>
      </div>
      <div class="card-body">
        <div class="image-container">
          <img class="img-fluid" src="{{ asset('assets/img/retroexcavadora.jpg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endpush