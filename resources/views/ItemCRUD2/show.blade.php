@extends('layouts.app')
 
@section('main-content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	    	@section('contentheader_title')
	        <div class="pull-left">
	            <h2> Show Item</h2>
	        </div>
	         @endsection
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('itemCRUD2.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                {{ $item->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $item->description }}
            </div>
        </div>
	</div>
@endsection