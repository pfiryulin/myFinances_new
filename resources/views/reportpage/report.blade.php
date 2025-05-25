<table>
    @foreach($data as $item)
        <tr>
            <td>{{ $item['id'] }}</td>
            <td> {{ $item['category_name'] }} </td>
            <td> {{ $item['types_id'] }} </td>
            @if($item['user_id'] != 0)
                <td><button>Изменить</button></td>
            @endif
        </tr>
    @endforeach
</table>


<button id="getData">GetData</button>

<div id="showdata">

</div>

<script>
    getData.addEventListener('click',async function(){
        let request = await fetch('/api/profile/category');
        if (request.ok) { // если HTTP-статус в диапазоне 200-299
            // получаем тело ответа (см. про этот метод ниже)
            let json = await request.json();
            console.log(json);
        }
    })
</script>


