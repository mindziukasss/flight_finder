@extends('core')
@section('content')
    {!! Form::open(['url' => $route]) !!}
    @if(isset($record['id']))
        <h2>Edit: {{$record['original_name']}}</h2>
        <div class="form-group">
            {{Form::label('id', 'Country ID')}}
            {{Form::text('id', $record['id'])}}
            {{Form::label('original_name', 'Country name')}}
            {{Form::text('original_name', $record['original_name'])}}
        </div>
        <a class="btn btn-primary" href="{{$back}}">Back</a>
        {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
    @else
        <h2>{{$titleForm}}</h2>
        <div class="form-group">
            {{Form::label('id', 'Country ID')}}
            {{Form::text('id')}}
            {{Form::label('original_name', 'Country name')}}
            {{Form::text('original_name')}}
        </div>
        <a class="btn btn-primary" href="{{$back}}">Back</a>
        {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
    @endif

@endsection