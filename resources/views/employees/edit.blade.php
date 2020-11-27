 @extends('home')
@section('subtitle','Empleados')
@section('dir','Empleados')
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
                                <h3 class="mb-0">Editar empleado</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{url('employees')}}" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('employees/'.$employee->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label class="form-control-label" for="name">Nombre del empleado<span class="text-muted">(Obligatorio)</span></label>
                            <input name="name" class="form-control @if($errors->has('name')) border-danger @endif" placeholder="Como aparecerá en su responsiva" type="text" value="{{old('name', $employee->name)}}" autofocus>
                                <span class="text-danger"><small>{{ $errors->first('name')}}</small></span>
                            </div>
                            <label class="form-control-label">Nombre del jefe en área<span class="text-muted">(Obligatorio)</span></label>
                            <div class="form-group">
                                <select class="form-control @if($errors->has('boss_id')) border-danger @endif" name="boss_id" id="boss_id">
                                    @foreach($bosses as $boss)
                                        <option {{old('boss_id', $employee->boss_id) == $boss->id ? 'selected' : ''}} value="{{$boss->id}}">{{$boss->name}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"><small>{{ $errors->first('boss_id')}}</small></span>
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
