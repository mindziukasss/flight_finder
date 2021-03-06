@extends('core')
@section('content')
    {!! Form::open(['url' => $route]) !!}
    @if(isset($record['id']))
        <h2>Edit: {{$record['name']}}</h2>
        <div class="form-group">
            {{Form::label('origin', 'Origin')}}
            {{Form::select('origin',$origin, $record['orgin_id'])}}

            {{Form::label('destination', 'Destination')}}
            {{Form::select('destination',$destination, $record['destintation_id'])}}

            {{Form::label('airline', 'Airline')}}
            {{Form::select('airline',$airline, $record['airline_id'])}}

            {{Form::label('departure', 'Departure')}}
            {{Form::datetime('departure', $record['departure'])}}


            {{Form::label('arrival', 'Arrival')}}
            {{Form::datetime('arrival', $record['arrival'])}}


        </div>
        <a class="btn btn-primary" href="{{$back}}">Back</a>
        {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}

    @else
        <h2>{{$titleForm}}</h2>
        <div class="form-group">
            {{Form::label('origin', 'Origin')}}
            {{Form::select('origin',$origin)}}

            {{Form::label('destination', 'Destination')}}
            {{Form::select('destination',$destination)}}

            {{Form::label('airline', 'Airline')}}
            {{Form::select('airline', $airline)}}

            {{Form::label('departure', 'Departure')}}
            {{Form::datetime('departure', $departure)}}


            {{Form::label('arrival', 'Arrival')}}
            {{Form::datetime('arrival', $arrival)}}

        </div>
        <a class="btn btn-primary" href="{{$back}}">Back</a>
        {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}

        {!! Form::close() !!}

    @endif

@endsection


