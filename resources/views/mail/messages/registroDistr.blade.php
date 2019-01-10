@component('mail::message')
# ¡Se han comunicado con nosotros! <br><br>
{{-- dd( $data ) --}}
{{$data['nombre']}} nos ha escrito: <br>
{{$data['mensaje']}} <br><br>

Cargo: {{$data['cargo']}}<br>
Razon Social: {{$data['razonsocial']}}<br>
RFC: {{$data['rfc']}}<br>
Ciudad: {{$data['ciudad']}}<br>
Correo: {{$data['mail']}}<br>
Teléfono: {{$data['telefono']}}<br>
Motivo: {{$data['motivo']}}<br><br>

Enviado desde:<br>
Mr Seguridad
{{ dd('end of mail') }}

@endcomponent
