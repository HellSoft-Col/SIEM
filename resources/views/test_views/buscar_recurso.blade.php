<h1>Buscar recurso</h1>

<form method="POST" action="{{ url('/person/resource/search') }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    Palabra clave: <input type="text" name="keyword"> <br>
    Recurso: <select name="rcategory">
        @foreach($categories as $category)
            <option>{{$category->type}}</option>
        @endforeach
    </select> <br>
    <!--<select name="rtype">
        @foreach($categories as $category)
            <option>{{$category->name}}</option>
        @endforeach
    </select>
    <select name="rcaracteristic">
        @foreach($categories as $category)
            <option>{{$category->name}}</option>
        @endforeach
    </select> -->
    <button type="submit">Buscar</button>
</form>