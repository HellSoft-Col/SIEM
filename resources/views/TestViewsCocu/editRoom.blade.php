<h1>Recursos</h1>
Añadir
<br>
<form method="POST" action="{{url('/resource/edit')}}">
    @csrf
    <input hidden name="id" value="{{$id}}">
    <label>Galería</label><br>
    <input type="file" name="images[]" accept="image/*" multiple><br>
    <label>Nombre</label><br>
    <input type="text" name="name" value="{{$name}}"><br>
    <label>Tipo de salón</label><br>
    <select name="tSalon">
        @foreach($types as $type)
            @if (strcmp($tSalon,$type['name']))
                <option selected value="{{$type['name']}}">{{$type['name']}}</option>
            @else
                <option value="{{$type['name']}}">{{$type['name']}}</option>
            @endif
        @endforeach
    </select><br>
    <label>Estado</label><br>
    <select name="state">
        @if (strcmp($state, 'AVAILABLE') == 0)
            <option selected value="AVAILABLE"> 'Disponible'</option>
            <option value="IN_RESERVATION"> 'Reservado'</option>
            <option value="DAMAGED"> 'Dañado'</option>
            <option value="IN_MAINTENANCE"> 'Mantenimiento'</option>
        @elseif (strcmp($state, 'IN_RESERVATION') == 0)
            <option selected value="IN_RESERVATION"> 'Reservado'</option>
            <option value="AVAILABLE"> 'Disponible'</option>
            <option value="DAMAGED"> 'Dañado'</option>
            <option value="IN_MAINTENANCE"> 'Mantenimiento'</option>
        @elseif (strcmp($state, 'DAMAGED') == 0)
            <option selected value="DAMAGED"> 'Dañada'</option>
            <option value="AVAILABLE"> 'Disponible'</option>
            <option value="IN_RESERVATION"> 'Reservado'</option>
            <option value="IN_MAINTENANCE"> 'Mantenimiento'</option>
        @elseif (strcmp($state, 'IN_MAINTENANCE') == 0)
            <option selected value="IN_MAINTENANCE"> 'Mantenimiento'</option>
            <option value="AVAILABLE"> 'Disponible'</option>
            <option value="IN_RESERVATION"> 'Reservado'</option>
            <option value="DAMAGED"> 'Dañado'</option>
        @endif
    </select><br>
    <label>Característica</label><br>
    <select name="characteristic">
        @foreach($characteristic as $char)
            <option>{{$char['name']}}</option>
            <button onclick="">X</button>
        @endforeach
    </select><br>
    <label>Otra, ¿Cuál?</label><br>
    <input type="text" name="other"><br>
    <label>Descripción</label><br>
    <textarea name="description" rows="10" cols="30">{{$description}}</textarea><br>
    <button type="submit">Guardar</button>
</form>
