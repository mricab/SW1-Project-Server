@extends('template')

@section('title', 'Environment page')

@section('body')
    <div class="container">
        <div class="row">
            <!--Title-->
            <div class="col-12">
                <h1>Ambiente: {{$environment['name']}}</h1>
            </div>

            <!--Environment-->
            <h2>Manejo de Ambientes</h2>
            <div class="col-6">
                <!--Status-->
                <h4>Estado</h4>
                <form action="{{ route('environment.status') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <button type="submit">Status</button>
                </form>
                <!--Update-->
                <h4>Actualizar Ambiente</h4>
                <form action="{{ route('environment.update') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <label for="name">Nuevo Nombre</label>
                    <input type="text" name="name"></br>
                    <label for="description">Nueva Descripcion</label>
                    <input type="textarea" name="description">
                    <button type="submit">Actualizar</button>
                </form>
                <!--Delete-->
                <h4>Eliminar</h4>
                <form action="{{ route('environment.delete')}}" method="get">
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <button type="submit">Eliminar</button>
                </form>
                <!--Configurations View-->
                <h4>Ver Configuraciones</h4>
                <form action="{{ route('view.configurations')}}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <button type="submit">Configuraciones (Vista)</button>
                </form>
                <!--Campos comunes de Colecciones-->
                <h4>Listar campos comunes de las colecciones</h4>
                <form action="{{ route('environment.fields')}}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <label for="collection_ids">Ids de las colecciones (Separar con comas)</label>
                    <input type="textarea" name="collection_ids">
                    <button type="submit">Obtener Campos</button>
                </form>
                <!--Collections View-->
                <h4>Ver Colecciones</h4>
                <form action="{{ route('view.collections')}}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <button type="submit">Colecciones (Vista)</button>
                </form>
            </div>
        </div>
    </div>
@endsection
