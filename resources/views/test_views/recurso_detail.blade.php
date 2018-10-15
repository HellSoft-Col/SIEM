<h1>Recurso #{{$resource->id}}</h1>

<p>Nombre del recurso: {{ $resource->name }}</p>
<p>Tipo del recurso: {{ $resource->type }}</p>
<p>Files:</p>
@forelse ($resource->files as $file)
    <li>
        * {{$file->path}} - {{ $file->description }}
    </li>
@empty
    <li>No hay fotos.</li>
@endforelse

@forelse ($resource->reservations as $reservation)
    <li>
        * {{$reservation->start_time}} - {{$reservation->end_time}}
    </li>
@empty
    <li>No hay reservas del recurso.</li>
@endforelse

<form method="POST" action="{{ url('/person/reservation/create') }}">
    {{ csrf_field() }}
    <input type="hidden" name="_resource" value="{{$resource->id}}">
    <button type="submit">Reservar</button>
</form>

<p>
    <a href="{{ url()->previous() }}">Regresar</a>
</p>