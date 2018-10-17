<h1>Resultados búsqueda</h1>

<ul>
    @forelse ($resources as $resource)
        <li>
            @forelse ($resource->files as $file)
                <img src="{!! asset($file->path) !!}" height="300px" width="300px"/><br>
                @break
            @empty
                <p>Sin fotos</p><br>
            @endforelse
            {{$resource->id}}. {{ $resource->name }} <br>
            {{$resource->description}} <br>
            <a href="{{ url("/person/resource/view/{$resource->id}") }}">Ver detalles</a>
        </li>
    @empty
        <li>No hay coincidencias en el sistema.</li>
    @endforelse
</ul>
