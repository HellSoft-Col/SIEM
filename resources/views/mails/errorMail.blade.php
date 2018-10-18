<p> Apreciado usuario(a), {{$body['nameUser']}}:</p>
<p>La reserva {{$body['resourceId']}} hecha en la plataforma SIEM entre las fechas: {{$body['startTime']}}
    y {{$body['endTime']}} del {{$body['resource_tipo']}} :</p>
<ul>
    <li>{{$body['resourceName']}}</li>
</ul>
<p>No fué exitosa, por las siguientes razones </p>
<ul>
    <li>{{$body['message']}}</li>
</ul>
