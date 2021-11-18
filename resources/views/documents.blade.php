@extends('template')

@section('title', 'Documents page')

@section('body')
    <div class="container">
        <div class="row">
            <!--Title-->
            <div class="col-12">
                <h1>Documentos</h1>
            </div>


            <div class="col-12">
                <h2>Opciones</h2>
                <!--Upload document-->
                <h4>Subir Archivo</h4>
                <form action="{{ route('documents.upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="env_id" style="display: none" value="{{$environment['environment_id']}}">
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <label for="document">Archivo</label>
                    <input type="file" name="document">
                    <button type="submit">Subir</button>
                </form>
                <!--Document details-->
                <h4>Detalles de un Archivo</h4>
                <form action="{{ route('documents.details') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value="{{$environment['environment_id']}}">
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <label for="doc_id">Id del Archivo</label>
                    <input type="text" name="doc_id">
                    <button type="submit">Detalles</button>
                </form>
                <!--Update document-->
                <h4>Actualizar Archivo</h4>
                <form action="{{ route('documents.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input name="env_id" style="display: none" value="{{$environment['environment_id']}}">
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <label for="doc_id">Id del Archivo</label>
                    <input type="text" name="doc_id"></br>
                    <label for="document">Archivo</label>
                    <input type="file" name="document"></br>
                    <button type="submit">Actualizar</button>
                </form>
                <!--Document details-->
                <h4>Eliminar Archivo</h4>
                <form action="{{ route('documents.delete') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value="{{$environment['environment_id']}}">
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <label for="doc_id">Id del Archivo</label>
                    <input type="text" name="doc_id">
                    <button type="submit">Eliminar</button>
                </form>
            </div>

        </div>
    </div>
@endsection
