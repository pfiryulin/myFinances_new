<table>
    @foreach($data as $item)
        <tr>
            <td>{{ $item['id'] }}</td><td> {{ $item['category_name'] }} </td> <td> {{ $item['types_id'] }} </td>
        </tr>
    @endforeach
</table>


