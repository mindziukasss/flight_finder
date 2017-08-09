@extends('core')
@section('content')
    {!! Form::open(['url' => $route]) !!}
    @if(isset($record['id']))
        <h2>Edit: {{$record['name']}}</h2>
        <div class="form-group">
            {{Form::label('name', 'Airport name')}}
            {{Form::text('name', $record['name'])}}
            {{Form::label('city', 'City')}}
            {{Form::text('city', $record['city'])}}
            {{Form::label('contry_id', 'Country name')}}
            {{Form::select('contry_id',$country)}}
        </div>
        <a class="btn btn-primary" href="{{$back}}">Back</a>
        {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
    @else
        <h2>{{$titleForm}}</h2>
        <div class="form-group">
            {{Form::label('name', 'Airport name')}}
            {{Form::text('name')}}
            {{Form::label('city', 'City')}}
            {{Form::text('city')}}
            {{Form::label('contry_id', 'Country name')}}
            {{Form::select('contry_id',$country)}}


        </div>
        <a class="btn btn-primary" href="{{$back}}">Back</a>
        {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
    @endif

@endsection