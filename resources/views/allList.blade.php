@extends('core')
@section('content')
    <div class="container">
        <h2>{{ucfirst($tableName)}}s table</h2>
        <a href="{{ route($create) }}">Create new {{$tableName}}</a>
        @if(sizeof($list)>0)
            <table class="table table-bordered">
                <thead>
                <tr>
                    @foreach($list['data'][0] as $key => $value)
                        @if(!in_array($key, $ignore))
                            <th>{{$key}}</th>
                        @endif
                    @endforeach
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list['data'] as $key => $record)
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
            @foreach($list as $key => $value)
                {{--{{dd($list['last_page'])}}--}}
            @if($key == 'next_page_url')
                @for($x=0; $value > $x; $x++ )
                        $value += $x;
                    @endfor
                    {{dd($x)}}
                    <a  href='{{ $value }}'>Next</a>
                    <ul class="pagination">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li class="disabled"><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                    </ul>
                     {{--{{dd($value)}}--}}
                @endif
            @endforeach
                        {{--{{$list->links()}}--}}
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
