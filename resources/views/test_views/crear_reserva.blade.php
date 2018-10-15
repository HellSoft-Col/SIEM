<h1>Crear reserva</h1>

<form method="POST" action="{{ url('/person/reservation/create') }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    Fecha inicio: <input type="date" name="start_date"><br>
    Hora inicio: <input type="time" name="start_time"><br>
    Fecha fin:<input type="date" name="end_date"><br>
    Hora fin: <input type="time" name="end_time"><br>
    <input type="hidden" name="resource_id" value="{{$resource_id}}">
    Usuario: <input type="text" name="user_id">
    <button type="submit">Crear</button>
</form>