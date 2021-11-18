@extends('template')

@section('title', 'Configurations page')

@section('body')
    <div class="container">
        <div class="row">
            <!--Title-->
            <div class="col-12">
                <h1>Configuraraciones del Ambiente: {{$environment['name']}}</h1>
            </div>

            <!--Configuraciones-->
            <h2>Manejo de Ambientes</h2>
            <div class="col-12">
                <!--Create-->
                <h4>Crear</h4>
                <p>No implementado</p>
                <!--List-->
                <h4>Listar</h4>
                <form action="{{ route('configurations.list') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <button type="submit">Listar</button>
                </form>
                <!--Detais-->
                <h4>Detalles de una configuración</h4>
                <form action="{{ route('configurations.detail') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$environment['environment_id']}}>
                    <label for="config_id">Id de la Configuración</label>
                    <input type="text" name="config_id">
                    <button type="submit">Detalle</button>
                </form>
                <!--Update-->
                <h4>Actualizar una configuración</h4>
                <p>No implementado</p>
                <!--Delete-->
                <h4>Eliminar una configuración</h4>
                <p>No implementado</p>
            </div>
        </div>
    </div>
@endsection
