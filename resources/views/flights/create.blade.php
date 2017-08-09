@extends('core')
@section('content')
    {!! Form::open(['url' => $route]) !!}
    @if(isset($record['id']))
        <h2>Edit: {{$record['name']}}</h2>
        <div class="form-group">
            {{Form::label('contry_id', 'Country name')}}
            {{Form::select('contry_id',$country)}}
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


            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-2 col-form-label">Arrival</label>
                <div class="col-10">
                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00"
                           id="example-datetime-local-input">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-datetime-local-input" class="col-2 col-form-label">Departure</label>
                <div class="col-10">
                    <input class="form-control" type="datetime-local" value="2011-08-19T13:45:00"
                           id="example-datetime-local-input">
                </div>
            </div>



        </div>
        <a class="btn btn-primary" href="{{$back}}">Back</a>
        {{Form::submit(('Save'), ['class' => 'btn btn-success']) }}
    @endif

@endsection

