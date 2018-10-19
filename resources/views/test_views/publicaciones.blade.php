<h1>Publicaciones</h1>

<ul>
    @forelse ($publications as $publication)
        <li>
            {{$publication->id}}. {{ $publication->header }} <br> - {{$publication->date_time}} <br>
            - Autor {{$publication->user->name}} <br>
            - Files: <br>
            @forelse ($publication->files as $file)
                * {{$file->path}} - {{ $file->description }}<br>
            @empty
                * No hay archivos de la publicación.
            @endforelse
        </li>
    @empty
        <li>No hay publicaciones en el sistema.</li>
    @endforelse
</ul>