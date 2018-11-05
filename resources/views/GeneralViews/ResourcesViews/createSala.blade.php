<h1>Recursos</h1>
Añadir
<br>
<form  >
    <input type="radio" name="Sala" checked="checked" value="{{url('/resource/create/sala')}}" > Sala
    <input type="radio" name="Instrumento" value="{{url('/resource/create/instrumento')}}"> Instrumento
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    $('input[type="radio"]').on('click', function() {
        window.location = $(this).val();
    });
</script>
<form method="POST" action="{{url('/resource/create')}}">
    @csrf
    {{ method_field('PUT') }}
    <label>Galería</label><br>
    <input type="file" name="images[]" accept="image/*" multiple><br>
    <label>Nombre</label><br>
    <input type="text" name="name" value="{{old('name')}}"><br>
    <label>Tipo de salón</label><br>
    <select name="tSalon">
        @foreach($types as $type)
            <option>{{$type['name']}}</option>
        @endforeach
    </select><br>
    <label>Característica</label><br>
    <select id="characteristic">
        <option value="C1">"C1"</option> <button onclick="">X</button>
        <option value="C2">"C2"</option>
    </select><br>
    <label>Otra, ¿Cuál?</label><br>
    <input type="text" name="other"><br>
    <label>Descripción</label><br>
    <textarea name="description" rows="10" cols="30" value="{{old('description')}}"></textarea><br>
    <button type="submit">Crear</button>
</form>
