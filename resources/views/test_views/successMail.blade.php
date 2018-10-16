
<p>Apreciado usuario(a), {{$body['nameUser']}}:</p>
<p>Esta es la confirmación {{$body['resourceId']}} del préstamo realizado de forma
    exitosa en la plataforma SIEM en la fecha: {{$body['startTime']}} y
    los siguientes instrumentos/salas deberían estar en préstamo, bajo su cuidado:</p>
<ul>
    <li>{{$body['resourceName']}}</li>
</ul>
<p>Los anteriores instrumentos/salas deben regresarse en la fecha y hora {{$body['endTime']}}</p>