@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h3>Subir documento</h3>
            </div>
        </div>

        <form action="{{ route('user.documents') }}" role="form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Nombre del documento</label>
                <input name="title" type="text" required="required" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Categoria</label>
                <input name="category" type="text" required="required" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Subir archivo</label>
                <input name="document" type="file" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right">Enviar</button>
            </div>
        </form>
        <div class="row">
            <div class="col-xs-12">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <h3>Mis documentos</h3>
            </div>
        </div>

        <table class="table">
            <tr>
                <th>Documento</th>
                <th colspan="2">Opciones</th>
            </tr>

            @foreach($documents as $document)
                <tr>
                    <td>{{ $document->title }}</td>
                    <td><a href="/uploads/{{ $document->name }}" target="_blank" class="btn btn-success">Descargar</a></td>
                    <td>
                        <form action="{{ route('user.documents.delete') }}" role="form" method="POST" >
                            {{ csrf_field() }}
                            <input type="hidden" name="documentId" value="{{ $document->id }}">
                        <button type="submit" href="" class="btn btn-danger">Eliminar</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {!! $documents->render() !!}
    </div>
@endsection
