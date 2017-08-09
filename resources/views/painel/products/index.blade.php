@extends('painel.templates.template')

@extends('layouts.app')

@section('content')

<h1 class="title-pg">Listagem de Produtos</h1>

{!! Form::open(['url'=>routeTenant('produtos.create'), 'class'=>'form']) !!}

<div class="form-group">
            {!! Form::submit('Criar Produto', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

<table class="table table-striped">

<tr>
	<th>Name</th>
        <th>Categoria</th>
	<th>Descrição</th>
	<th width="100px;">Ações</th>
</tr>

	@foreach($products as $product)
		<tr>
			<td>{{$product->name}}</td>
                        <td>{{$product->category}}</td>
			<td>{{$product->description}}</td>			
			<td>
                            {!! Form::open(['url'=>routeTenant('produtos.edit', [$product->id]), 'class'=>'form']) !!}

                            <div class="form-group">
                                {!! Form::submit('Editar Produto', ['class'=>'btn btn-primary']) !!}
                            </div>

                            {!! Form::close() !!}
			</td>
		</tr>
	@endforeach
        
</table>

@endsection

