@extends('template')

@section('title', 'Environments page')

@section('body')
    <div class="container">
        <div class="row">
            <!--Title-->
            <div class="col-12">
                <h1>Ambientes</h1>
            </div>

            <!--Environments-->
            <h2>Administración</h2>
            <div class="col-12">
                <!--Create-->
                <h4>Crear</h4>
                <form action="{{ route('environments.create') }}" method="post">
                    @csrf
                    <button type="submit">Crear</button>
                </form>
                <!--List-->
                <h4>Listar</h4>
                <form action="{{ route('environments.list') }}" method="get">
                    @csrf
                    <button type="submit">Listar</button>
                </form>
            </div>
            <!--Each Environment-->
            <h2>Ambientes Existentes</h2>
            @foreach ($environments as $env)
            <div class="col-6">
                <h4>{{$env['name']}}</h4>
                <!--View-->
                <form action="{{ route('view.environment') }}" method="post">
                    @csrf
                    <input name="env_id" style="display: none" value={{$env['environment_id']}}>
                    <button type="submit">Ver</button>
                </form>
            </div>
            @endforeach

        </div>
    </div>
@endsection
