@extends('layouts.app')
@section('content')
    <table>
        @foreach($data as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td> {{ $item['category_name'] }} </td>
                <td> {{ $item['types_id'] }} </td>
                @if($item['user_id'] != 0)
                    <td><button >Изменить</button></td>
                @endif
            </tr>
        @endforeach
    </table>


    <button id="getData">GetData</button>
    <div id="showdata"></div>

@endsection
