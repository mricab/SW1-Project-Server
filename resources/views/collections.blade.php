@extends('template')

@section('title', 'Collections page')

@section('body')
    <div class="container">
        <div class="row">
            <!--Title-->
            <div class="col-12">
                <h1>Colecciones de {{$environment['name']}}</h1>
            </div>

            <!--Collections-->
            <h2>Administracion</h2>
            <div class="col-12">
                <!--Create-->
                <h4>Crear</h4>
                <form action="{{ route('collections.create') }}" method="post">
                    @csrf
                    <label for="env_id">Id del Ambiente</label>
                    <input type="text" name="env_id" value={{$environment['environment_id']}} readonly>
                    <label for="conf_id">Id de la Configuración del Ambiente</label>
                    <input type="text" name="conf_id">
                    </br>
                    <label for="name">Nombre de la Coleccion</label>
                    <input type="text" name="name">
                    <label for="description">Descripcion  de la Coleccion</label>
                    <input type="textarea" name="description">
                    </br>
                    <label for="language">Idioma</label>
                    <select name="language">
                        <option>en_us</option>
                        <option>es_es</option>
                    </select>
                    <button type="submit">Crear</button>
                </form>
                <!--List-->
                <h4>Listar</h4>
                <form action="{{ route('collections.list')}}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <button type="submit">Listar</button>
                </form>
            </div>

            <!--List-->
            <h2>Colecciones Existentes</h2>
            @foreach ($collections as $coll)
                <div class="col-6">
                    <!--Description-->
                    <h4>{{$coll['name']}}</h4>
                    <span>Descripcion: {{$coll['description']}}</span></br>
                    <span>Lenguage: {{$coll['language']}}</span></br>
                    <span>Estado: {{$coll['status']}}</span>
                    <!--Collection View-->
                    <form action="{{ route('view.collection')}}" method="post">
                        @csrf
                        <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                        <input name="coll_id" style="display: none" value={{$coll['collection_id']}}>
                        <button type="submit">Colección (Vista)</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
