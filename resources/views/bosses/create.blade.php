@extends('home')
@section('subtitle','Jefes de área')
@section('dir','Patrones')
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
                                <h3 class="mb-0">Crear nuevo Jefe</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{url('bosses')}}" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('bosses') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="name">Nombre <span class="text-muted"> (Obligatorio)</span></label>
                                <input name="name" class="form-control @if($errors->has('name')) border-danger @endif" placeholder="Como aparecerá en su responsiva" type="text" value="{{old('name')}}" autofocus>
                                <span class="text-danger"><small>{{ $errors->first('name')}}</small></span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="email">E-mail<span class="text-muted"> (Obligatorio)</span></label>
                                <input name="email" class="form-control @if($errors->has('email')) border-danger @endif" placeholder="Correo electrónico" type="email" value="{{old('email')}}">
                                <span class="text-danger"><small>{{ $errors->first('email')}}</small></span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="password">Contraseña<span class="text-muted"> (Obligatorio)</span></label>
                                <input name="no_control" class="form-control @if($errors->has('password')) border-danger @endif" placeholder="Contraseña" type="text" value="{{ str_random(8) }}" autocomplete="off">
                                <span class="text-danger"><small>{{ $errors->first('password')}}</small></span>
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
{{--                            <div class="form-group">
                                <label class="form-control-label">Nombre del área <span class="text-muted">(Obligatorio)</span></label>
                                <select class="form-control" name="area_id" id="area_id">
                                    <option value="">Seleccionar...</option>
                                    @foreach($areas as $area)

                                    <option value="{{$area['id']}}">{{$area['name']}}</option>
                                    @endforeach
                                </select>
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
