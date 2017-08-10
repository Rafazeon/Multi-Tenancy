@extends('painel.templates.template')

@extends('layouts.app')

@section('content')

<h1 class="title-pg">Listagem de Produtos</h1>

<a href="{{ routeTenant('produtos.create') }}" class="btn btn-primary">Novo Produto</a>

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
                        <a href="{{routeTenant('produtos.edit',['id'=>$product->id])}}" class="btn btn-default btn-sm">
                            Editar Produto
                        </a>
			</td>
		</tr>
	@endforeach
        
</table>

@endsection

