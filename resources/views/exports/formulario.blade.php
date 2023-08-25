<table>
    <thead>
        <tr>
           <th>Nombre Beneficiario</th>
           <th>Cedula Beneficiario</th>
           <th>Telefono Beneficiario</th>
           <th>Creado</th>
           <th>Nro Cuenta</th>
           <th>Nombre del Depositante</th>
           <th>Cedula del Depositante</th>
           <th>Telefono del Depositante</th>
           <th>Correo del Depositante</th>
           <th>Tipo Persona</th>
           <th>Tipo de Cuenta</th>
           <th>Monto a Enviar</th>
           <th>Email Comprobante</th>
           <th>Pais</th>
           <th>Tipo Moneda</th>
           <th>Tipo Entidad</th>
           <th>Tipo Formulario</th>
           <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $contract)
            <tr>
                <td>{{ $contract['nombre_beneficiario'] }}</td>
                <td>{{ $contract['cedula_beneficiario'] }}</td>
                <td>{{ $contract['telefono_beneficiario'] }}</td>
                <td>{{ $contract['created_at'] }}</td>
                <td>{{ $contract['nro_cuenta'] }}</td>
                <td>{{ $contract['user']['name'] }}</td>
                <td>{{ $contract['user']['identificacion'] }}</td>
                <td>{{ $contract['user']['telefono'] }}</td>
                <td>{{ $contract['user']['email'] }}</td>
                <td>{{ $contract['tipo_persona'] }}</td>
                <td>{{ $contract['tipo_cuenta'] }}</td>
                <td>{{ $contract['monto_enviar'] }}</td>
                <td>{{ $contract['pais'] }}</td>
                <td>{{ $contract['email_comprobante'] }}</td>
                <td>{{ $contract['tipo_moneda']['tipo'] }}</td>
                <td>{{ $contract['tipo_entidad']['descripcion'] }}</td>
                <td>{{ $contract['tipo_formulario']['descripcion'] }}</td>
                <td>{{ $contract['id_estado'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


