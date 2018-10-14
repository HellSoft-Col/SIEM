<h1>Crear reserva</h1>

<form method="POST" action="{{ url('/person/reservation/create') }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <button type="submit">Crear</button>
</form>