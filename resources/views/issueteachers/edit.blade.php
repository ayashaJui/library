@extends('layouts.app')

@section('asset')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="container">
        <br><br><br>
        <h3>Update Issued Book Info</h3>
        <br>
        {!!Form::open(['action' => ['IssueteachersController@update', $issueteacher->id], 'method' => 'POST'])!!}
            <div class="form-group">
                {{Form::label('name','Teacher\'s Name')}}
                {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'name'])}}
            </div>
            <div class="form-group">
                {{Form::label('access_no','Access No')}}
                {{Form::text('access_no','',['class' => 'form-control', 'placeholder' => 'access no'])}}
            </div>
            <div class="form-group">
                {{Form::label('title','Book Title')}}
                {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'title'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}

        <div class="text-right">
            <a  href="/issuestuds" class="btn btn-info">Back</a>
        </div>
    </div>
@endsection