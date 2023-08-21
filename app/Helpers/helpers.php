<?php

function mapFormPayPal($datos)
{
    return [
        "nombre_beneficiario" => $datos["nombre_b_form1"],
        "cedula_beneficiario" => $datos["cedula_b_form1"],
        "banco_beneficiario" => $datos["banco_b_form1"],
        "telefono_beneficiario" => $datos["movil_b_form1"],
        "nro_cuenta" => $datos["nro_cuenta_form1"],
        "tipo_persona" => $datos["tipo_persona_form1"],
        "tipo_cuenta" => $datos["tipo_cuenta_form1"],
        "monto_enviar" => $datos["monto_enviar_d_form1"],
        "imagen_comprobante" => null,
        "terminos_comprobante" => true,
        "email_comprobante" => $datos["email_d_form1"],
        "pais" => $datos["pais_d_form1"],
        "archivo" => null,
        "id_moneda" => null,
        "id_entidad" => null,
        "id_formulario" => null,
        "id_user" => null,
        "id_estado" => null
    ];
}
