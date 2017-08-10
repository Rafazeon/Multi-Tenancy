@extends('painel.templates.template')

@extends(layoutTenant())

@section('content')

<h1 class="title-pg">
    <a href="{{routeTenant('produtos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
    Gestão Produto: <b> {{$product->name or 'Novo'}} </b> 
</h1>

@if(isset($errors) && count($errors) > 0)
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
</div>
@endif


@if(isset($product))
    {!! Form::model($product, ['url'=>routeTenant('produtos.update', [$product->id]),'method' => 'PUT']) !!}
@else
    {!! Form::open(['url'=>routeTenant('produtos.store'), 'class'=>'form']) !!}
@endif

	<div class="form-group">		
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome:']) !!}
	</div>

	<div class="form-group">
		<label>
			{!! Form::checkbox('active') !!} Ativo?
		</label>
	</div>

	<div class="form-group">	
                {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Número:']) !!}
	</div>

	<div class="form-group">
		{!! Form::select('category', $categorys, null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">	
                {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Descrição:']) !!}
	</div>
		
                {!! Form::submit('enviar', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection