@extends('home')
@section('subtitle','Jefes')
@section('dir','Jefes de area')
@section('action','Editar')
@section('content')

<div class="container-fluid mt--6">
    <!-- Page content -->
    <div class="row">
        <div class="col-xl-8 center">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                        <h3 class="mb-0">Editar jefe de área</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{url('bosses')}}" class="btn btn-sm btn-danger">Cancelar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('bosses/'.$boss->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-control-label" for="name">Nombre <span class="text-muted">(Obligatorio)</span></label>
                            <input name="name" class="form-control @if($errors->has('name')) border-danger @endif" placeholder="Como aparecerá en su responsiva" type="text" value="{{old('name', $boss->name)}}" autofocus>
                            <span class="text-danger"><small>{{ $errors->first('name')}}</small></span>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Nombre del área <span class="text-muted">(Obligatorio)</span></label>
                            <select class="form-control" name="area_id" id="area_id">
                                @foreach($areas as $area)
                                    <option {{old('area_id', $boss->area_id) == $area->id ? 'selected' : ''}} value="{{$area->id}}">{{$area->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger"><small>{{ $errors->first('employee_id')}}</small></span>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('¿Seguro que deseas editar este registro?');">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Footer -->
@include('home.footer')
</div>

@endsection
{{--
                            <div class="form-group">
                                <label class="form-control-label" for="phone">Teléfono<span class="text-muted">(Opcional)</span></label>
                                <input name="phone" class="form-control @if($errors->has('phone')) border-danger @endif" placeholder="(10 dígitos)" type="number" value="{{old('phone')}}">
                                <span class="text-danger"><small>{{ $errors->first('phone')}}</small></span>
                            </div>--}}
