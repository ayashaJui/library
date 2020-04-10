@extends('layouts.app')

@section('asset')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection

@section('content')
    <div class="container">
        <br><br><br>
        <h3>Update Batch Info</h3>
        <br>
        {!!Form::open(['action' => ['BatchesController@update', $batch->id], 'method' => 'POST'])!!}
            <div class="form-group">
                {{Form::label('title','Batch No')}}
                {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Batch'])}}
            </div>
            <div class="form-group">
                {{Form::label('program','Program Name')}}
                {{Form::text('program','',['class' => 'form-control', 'placeholder' => 'Program'])}}
            </div>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Add', ['class' => 'btn btn-primary'])}}
        {!!Form::close()!!}

        <div class="text-right">
            <a  href="/categories" class="btn btn-info">Back</a>
        </div>
    </div>
@endsection