@extends('layouts.app')

@section('asset')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="container">
        <br><br><br>
        <h3>Update Teacher's Info</h3>
        <br>
        {!!Form::open(['action' => ['TeachersController@update', $teacher->id], 'method' => 'POST'])!!}
            <div class="form-group">
                {{Form::label('name','Full Name')}}
                {{Form::text('name','',['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('desig','Designation')}}
                {{Form::text('desig','',['class' => 'form-control', 'placeholder' => 'Designation'])}}
            </div>
            
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}

        <div class="text-right">
            <a  href="/batches" class="btn btn-info">Back</a>
        </div>
    </div>
@endsection