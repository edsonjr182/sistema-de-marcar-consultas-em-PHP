{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box for Patients -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $patientsCount }}</h3>
                    <p>Pacientes Registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('pacientes.index') }}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box for Doctors -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $doctorsCount }}</h3>
                    <p>Médicos Registrados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ route('medicos.index') }}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box for Consultations -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $consultationsCount }}</h3>
                    <p>Consultas Agendadas</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('consultas.index') }}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box for Specialties -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $specialtiesCount }}</h3>
                    <p>Especialidades Disponíveis</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{ route('especialidades.index') }}" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</div>
@endsection
