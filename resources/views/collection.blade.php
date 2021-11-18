@extends('template')

@section('title', 'Collections page')

@section('body')
    <div class="container">
        <div class="row">
            <!--Title-->
            <div class="col-12">
                <h1>Coleccion {{$collection['name']}}</h1>
            </div>


            <div class="col-12">
                <h2>Opciones</h2>
                <!--Status-->
                <h4>Detalles</h4>
                <form action="{{ route('collection.details') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value="{{$environment['environment_id']}}">
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <button type="submit">Detallar</button>
                </form>
                <!--Fields-->
                <h4>Campos</h4>
                <form action="{{ route('collection.fields') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value="{{$environment['environment_id']}}">
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <button type="submit">Ver Campos</button>
                </form>
                <!--Update-->
                <h4>Actualizar</h4>
                <form action="{{ route('collection.update') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value="{{$environment['environment_id']}}">
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <label for="conf_id">Id de la Configuración del Ambiente</label>
                    <input type="text" name="conf_id" value="{{ $collection['configuration_id']}}">
                    </br>
                    <label for="name">Nuevo Nombre</label>
                    <input type="text" name="name">
                    </br>
                    <label for="description">Nueva Descripcion</label>
                    <input type="textarea" name="description">
                    </br>
                    <button type="submit">Actualizar</button>
                </form>
                <!--Delete-->
                <h4>Eliminar</h4>
                <form action="{{ route('collection.delete') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value="{{$environment['environment_id']}}">
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <button type="submit">Eliminar</button>
                </form>
                <!--Documents View-->
                <h4>Documentos</h4>
                <form action="{{ route('view.documents')}}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <button type="submit">Documentos (Vista)</button>
                </form>
                <!--Queries View-->
                <h4>Consultas</h4>
                <form action="{{ route('view.queries')}}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <button type="submit">Consultas (Vista)</button>
                </form>
            </div>

        </div>
    </div>
@endsection
