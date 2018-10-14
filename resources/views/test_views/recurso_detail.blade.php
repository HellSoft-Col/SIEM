<h1>Recurso #{{$resource->id}}</h1>

<p>Nombre del recurso: {{ $resource->name }}</p>
<p>Files:</p>
@forelse ($resource->files as $file)
    <li>
        * {{$file->path}} - {{ $file->description }}
    </li>
@empty
    <li>No hay fotos.</li>
@endforelse

<form method="POST" action="{{ url('/person/reservation/create') }}">
    {{ csrf_field() }}

    <button type="submit">Reservar</button>
</form>

<p>
    <a href="{{ url()->previous() }}">Regresar</a>
</p>