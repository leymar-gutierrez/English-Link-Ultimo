@extends('panel.app')
@section('content')
      <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
           <div class="card-body">
             <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-cube text-danger icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Ganancias</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">$65,650</h3>
                  </div>
                </div>
             </div>
             <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i>Ganancias mensuales
             </p>
           </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
           <div class="card-body">
             <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-receipt text-warning icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Alumnos</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">{{$students}}</h3>
                  </div>
                </div>
             </div>
             <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Total Alumnos
             </p>
           </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
           <div class="card-body">
             <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-poll-box text-success icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Cursos</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">{{$course}}</h3>
                  </div>
                </div>
             </div>
             <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Total Cursos
             </p>
           </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
          <div class="card card-statistics">
           <div class="card-body">
             <div class="clearfix">
                <div class="float-left">
                  <i class="mdi mdi-account-location text-info icon-lg"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right">Profesores</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">3</h3>
                  </div>
                </div>
             </div>
             <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Total Profesores
             </p>
           </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="card">
           <div class="card-body">
             <div class="row d-none d-sm-flex mb-4">
                <div class="col-4">
                  <h5 class="text-primary">Total de visitas</h5>
                  <p>34657</p>
                </div>
                <div class="col-4">
                  <h5 class="text-primary">Total de Emails</h5>
                  <p>45673</p>
                </div>
                <div class="col-4">
                  {{-- <h5 class="text-primary">Total de </h5>
                  <p>45673</p> --}}
                </div>
             </div>
             <div class="chart-container">
                <canvas id="dashboard-area-chart" height="80"></canvas>
             </div>
           </div>
          </div>
        </div>
      </div>


@endsection
