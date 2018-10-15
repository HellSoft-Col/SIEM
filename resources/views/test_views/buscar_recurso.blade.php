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
    <select name="rtype">
        @foreach($rtypes as $rtype)
            <option>{{$rtype->name}}</option>
        @endforeach
    </select><br>
    <select name="rcaracteristic">
        @foreach($rcaracteristics as $rcaracteristic)
            <option>{{$rcaracteristic->name}}</option>
        @endforeach
    </select><br>
    AND
    <select name="rcaracteristic2">
        @foreach($rcaracteristics as $rcaracteristic)
            <option>{{$rcaracteristic->name}}</option>
        @endforeach
    </select><br>
    <button type="submit">Buscar</button>
</form>