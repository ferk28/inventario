@extends('home')
@section('subtitle','Areas')
@section('dir','Areas')
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
                                <h3 class="mb-0">Crear nueva area</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{url('areas')}}" class="btn btn-sm btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('areas') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label" for="name">Área<span class="text-muted">(Obligatorio)</span></label>
                                <input name="name" class="form-control @if($errors->has('name')) border-danger @endif" placeholder="Nombre del área" type="text" value="{{old('name')}}" autofocus>
                                <span class="text-danger"><small>{{ $errors->first('name')}}</small></span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="phone">Teléfono<span class="text-muted">(Opcional)</span></label>
                                <input name="phone" class="form-control @if($errors->has('phone')) border-danger @endif" placeholder="(10 dígitos)" type="number" value="{{old('phone')}}">
                                <span class="text-danger"><small>{{ $errors->first('phone')}}</small></span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label" for="extension">Extensión<span class="text-muted">(Opcional)</span></label>
                                <input name="extension" class="form-control @if($errors->has('extension')) border-danger @endif" placeholder="(4 dígitos)" type="number" value="{{old('extension')}}">
                                <span class="text-danger"><small>{{ $errors->first('extension')}}</small></span>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('home.footer')
    </div>


    {{--    --}}
@endsection

