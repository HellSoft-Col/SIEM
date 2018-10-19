<!DOCTYPE html>
<html>
<head>
    <title> ERROR</title>
</head>
<body>
<div class=”title m-b-md”>
    @if (session()->has('message'))
        Debe ser {{ strtoupper(session()->get('message'))}} para accesar esta pagina !
    @else
        ERROR!
    @endif
</div>

</body>
</html>
