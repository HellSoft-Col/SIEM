<p> Apreciado usuario(a), {{$body['nameUser']}2014_10_12_000000_create_users_table}:</p>
<p>La reserva {{$body['resourceId']}} hecha en la plataforma SIEM entre las fechas: {{$body['startTime']}}
    y {{$body['endTime']}} del recurso:</p>
<ul>
    <li>{{$body['resourceName']}}</li>
</ul>
<p>no fué exitosa, por las siguientes razones </p>
<ul>
    <li>{{$body['message']}}</li>
</ul>
