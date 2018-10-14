<h1>Evento #{{$event->id}}</h1>

<p>Nombre del evento: {{ $event->name }}</p>
<p>Lugar: {{ $event->place }}</p>
<p>Creador: {{$event->user->name}}</p>
<p>Files:</p>
@forelse ($event->files as $file)
    <li>
        * {{$file->path}} - {{ $file->description }}
    </li>
@empty
    <li>No hay archivos del evento.</li>
@endforelse

<p>
    <a href="{{ url()->previous() }}">Regresar</a>
</p>