@extends('core')
@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <h2>{{ucfirst($tableName)}}s table</h2>
        <a href="{{ route($create) }}">Create new {{$tableName}}</a>
        @if(sizeof($list)>0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    @foreach($list[0] as $key => $value)
                        @if(!in_array($key, $ignore))
                            <th>{{$key}}</th>
                        @endif
                    @endforeach
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $key => $record)
                    <tr id="{{$record['id']}}">
                        @foreach($record as $key => $value)
                            @if(!in_array($key, $ignore))
                                @if($key == 'origin_airport')
                                    <td>
                                        {{$value['name']}}(Airport),
                                        {{$value['city']}}(City),
                                        {{$value['contry_id']}}(Country code)
                                    </td>
                                @elseif($key == 'destination_airport')
                                    <td>
                                        {{$value['name']}}(Airport),
                                        {{$value['city']}}(City),
                                        {{$value['contry_id']}}(Country code)
                                    </td>
                                @elseif($key == 'airline')
                                    <td>{{$value['name']}}</td>
                                @else
                                    <td>{{$value}}</td>
                                @endif
                            @endif
                        @endforeach
                        <td>
                            <a href="{{ route($edit,$record['id']) }}">
                                <button type="button" class="btn btn-primary">Edit</button>
                            </a>
                        </td>
                        <td>
                            <button onclick="deleteItem( '{{ route($delete, $record['id']) }}' )"
                                    class="btn btn-danger">Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                {!! $paginate->links()!!}
            </nav>
        @else
            <h2>Data not find</h2>
        @endif
    </div>


@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                dataType: 'json',
                success: function (response) {
                    $('#' + response.id).remove();
                },
                error: function () {
                    alert('ERROR')
                }
            });
        }

    </script>
@endsection