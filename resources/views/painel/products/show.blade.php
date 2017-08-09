@extends('painel.templates.template')

@section('content')

<h1 class="title-pg"><a href="{{route('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a> Produto: {{$product->name}}</h1>
<p><b>Ativo:</b></p> {{$product->active}}
<p><b>Número:</b></p> {{$product->number}}
<p><b>Categoria:</b></p> {{$product->category}}
<p><b>Descrição:</b></p> {{$product->description}}

<hr>

@if(isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
</div>
@endif

{!! Form::open(['route' => ['produtos.destroy', $product->id], 'method' => 'DELETE']) !!}
    {!! Form::submit("Deletar Produto: $product->name", ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}

@endsection

