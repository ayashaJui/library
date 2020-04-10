@extends('layouts.app')

@section('asset')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="container">
        <br><br><br>
        <h3>Update Access No</h3>
        <br>
        {!!Form::open(['action' => ['AccessnosController@update', $accessno->id], 'method' => 'POST'])!!}
            <div class="form-group">
                {{Form::label('name','Category')}}
                {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'category'])}}
            </div>
            <div class="form-group">
                {{Form::label('title','Book Title')}}
                {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'title'])}}
            </div>
            <div class="form-group">
                {{Form::label('edition','Edition')}}
                {{Form::text('edition','',['class' => 'form-control', 'placeholder' => 'edition'])}}
            </div>
            <div class="form-group">
                {{Form::label('access_no','Access No')}}
                {{Form::text('access_no','',['class' => 'form-control', 'placeholder' => 'access_no'])}}
            </div> 
                {{Form::hidden('_method','PUT')}}
                {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}

        <div class="text-right">
            <a  href="/books" class="btn btn-info">Back</a>
        </div>
    </div>
@endsection