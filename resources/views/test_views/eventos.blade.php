<h1>Eventos</h1>

<ul>
    @forelse ($events as $event)
        <li>
            {{$event->id}}. {{ $event->name }}
            <a href="{{ url("/events/{$event->id}") }}">Ver detalles</a>
        </li>
    @empty
        <li>No hay eventos en el sistema.</li>
    @endforelse
</ul>