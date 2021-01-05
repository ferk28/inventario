@extends('home')
@section('subtitle','Empleados')
@section('dir','Empleados')
@section('action','Nuevo')
@section('content')
<div class="container-fluid mt--6">
    <!-- Page content -->
    <div class="row">
        <div class="col-xl-8 center">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Crear nuevo empleado</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{url('employees')}}" class="btn btn-sm btn-danger">Cancelar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('employees') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="name">Nombre del empleado<span class="text-muted">(Obligatorio)</span></label>
                            <input name="name" class="form-control @if($errors->has('name')) border-danger @endif" placeholder="Como aparecerá en su responsiva" type="text" value="{{old('name')}}" autofocus>
                            <span class="text-danger"><small>{{ $errors->first('name')}}</small></span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="email">E-mail<span class="text-muted"> (Obligatorio)</span></label>
                            <input name="email" class="form-control @if($errors->has('email')) border-danger @endif" placeholder="Correo electrónico" type="email" value="{{old('email')}}">
                            <span class="text-danger"><small>{{ $errors->first('email')}}</small></span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="phone">Teléfono<span class="text-muted"> (Opcional)</span></label>
                            <input name="phone" class="form-control @if($errors->has('phone')) border-danger @endif" placeholder="(10 dígitos)" type="number" value="{{old('phone')}}">
                            <span class="text-danger"><small>{{ $errors->first('phone')}}</small></span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="no_control">No. de Control<span class="text-muted"> (Opcional)</span></label>
                            <input name="no_control" class="form-control @if($errors->has('no_control')) border-danger @endif" placeholder="(5 dígitos)" type="number" value="{{old('no_control')}}">
                            <span class="text-danger"><small>{{ $errors->first('no_control')}}</small></span>
                        </div>
{{--                        <label class="form-control-label" for="boss_id">Nombre del jefe en área<span class="text-muted">(Obligatorio)</span></label>
                        <div class="form-group">
                            <select class="form-control @if($errors->has('boss_id')) border-danger @endif" name="boss_id" id="boss_id">
                                <option value="">Seleccionar...</option>
                                @foreach($bosses as $boss)
                                <option value="{{$boss['id']}}">{{$boss['name']}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"><small>{{ $errors->first('boss_id')}}</small></span>
                        </div>--}}
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    @include('home.footer')
</div>
@endsection
