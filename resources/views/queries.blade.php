@extends('template')

@section('title', 'Queries page')

@section('body')
    <div class="container">
        <div class="row">
            <!--Title-->
            <div class="col-12">
                <h1>Consultas</h1>
            </div>


            <div class="col-12">
                <h2>Opciones</h2>
                <!--Short Query-->
                <h4>Consultas Cortas</h4>
                <form action="{{ route('queries.short') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value="{{$environment['environment_id']}}">
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <label for="query">Consulta</label>
                    <textarea name="query" rows="5" cols="50">
                        enriched_text.entities.text:IBM
                    </textarea>
                    <button type="submit">Consultar</button>
                </form>
                <!--Long Query-->
                <h4>Consultas Largas</h4>
                <form action="{{ route('queries.short') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value="{{$environment['environment_id']}}">
                    <input name="coll_id" style="display: none" value="{{$collection['collection_id']}}">
                    <label for="query">Consulta</label>
                    <textarea name="query" rows="10" cols="50">
                        enriched_text.entities.text:IBM
                    </textarea>
                    <button type="submit">Consultar</button>
                </form>
            </div>

        </div>
    </div>
@endsection
