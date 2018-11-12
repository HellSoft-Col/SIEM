<h1>Recursos</h1>
Añadir
<br>
<form  >
    <input type="radio" name="Sala" checked="checked" value="{{url('/resource/create/room')}}" > Sala
    <input type="radio" name="Instrumento" value="{{url('/resource/create/instrument')}}"> Instrumento
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
    $('input[type="radio"]').on('click', function() {
        window.location = $(this).val();
    });
</script>
<form enctype="multipart/form-data"  method="POST" action="{{url('/resource/create/room')}}">
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
    <select id="characteristic" name="chars[]">
    </select>
    <input type="number" name="quantity"><button  type="submit">X</button><br>
    <label>Otra, ¿Cuál?</label><br>
    <input type="text" name="other">
    <button type="submit" >Añadir característica</button><br>
    <label>Descripción</label><br>
    <textarea name="description" rows="10" cols="30" value="{{old('description')}}"></textarea><br>
    <button type="submit">Crear</button>
</form>
