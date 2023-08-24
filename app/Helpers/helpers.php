<?php

use App\Enums\FormulariosType;
use App\Models\Tipos\TasaCambio;

function mapForm($datos)
{
    $fromOptions = FormulariosType::FROM_OPTIONS;
    $peruOptions = FormulariosType::TRANS_PERU_OPTIONS;
    $colombiaOptions = FormulariosType::TRANS_COLOMBIA_OPTIONS;

    if (in_array($datos['tasa'], $fromOptions)) {
        return [
            'nombre_beneficiario' => $datos['nombre_b_form1'],
            'cedula_beneficiario' => $datos['cedula_b_form1'],
            'banco_beneficiario' => $datos['banco_b_form1'],
            'telefono_beneficiario' => $datos['movil_b_form1'],
            'nro_cuenta' => $datos['nro_cuenta_form1'],
            'tipo_persona' => $datos['tipo_persona_form1'],
            'tipo_cuenta' => $datos['tipo_cuenta_form1'],
            'monto_enviar' => $datos['monto_enviar_d_form1'],
            'terminos_comprobante' => true,
            'pais' => $datos['pais_d_form1'],
            // Datos de relacion
            'id_moneda' => $datos['id_moneda'],
            'id_entidad' => null,
            'id_formulario' => null,
            'id_user' => null,
            'id_estado' => null,
            // Datos particulares
            'archivo' => null,
            'tasa' => $datos['tasa'],
            'imagen_comprobante' => (isset($datos['file_b_form1'])) ? $datos['file_b_form1'] : null,
            'email_comprobante' => (isset($datos['email_d_form1'])) ? $datos['email_d_form1'] : null,
        ];
    } else  if (in_array($datos['tasa'], $peruOptions)) {
        return [
            'nombre_beneficiario' => $datos['nombre_b_transPeruForm'],
            'cedula_beneficiario' => $datos['cedula_b_transPeruForm'],
            'banco_beneficiario' => $datos['banco_b_transPeruForm'],
            'telefono_beneficiario' => $datos['movil_b_transPeruForm'],
            'nro_cuenta' => $datos['nro_cuenta_transPeruForm'],
            'tipo_persona' => $datos['tipo_persona_transPeruForm'],
            'tipo_cuenta' => $datos['tipo_cuenta_transPeruForm'],
            'monto_enviar' => $datos['moneda_b_transPeruForm'],
            'terminos_comprobante' => true,
            'pais' => (isset($datos['pais_d_transPeruForm'])) ? $datos['pais_d_transPeruForm'] : null,
            // Datos de relacion
            'id_moneda' => $datos['id_moneda'],
            'id_entidad' => null,
            'id_formulario' => null,
            'id_user' => null,
            'id_estado' => null,
            // Datos particulares
            'archivo' => null,
            'tasa' => $datos['tasa'],
            'imagen_comprobante' => (isset($datos['file_b_transPeruForm'])) ? $datos['file_b_transPeruForm'] : null,
            'email_comprobante' => (isset($datos['email_d_transPeruForm'])) ? $datos['email_d_transPeruForm'] : null,
        ];
    } else  if (in_array($datos['tasa'], $colombiaOptions)) {
        return [
            'nombre_beneficiario' => $datos['nombre_b_transColForm'],
            'cedula_beneficiario' => $datos['cedula_b_transColForm'],
            'banco_beneficiario' => $datos['banco_b_transColForm'],
            'telefono_beneficiario' => (isset($datos['movil_b_transColForm'])) ? $datos['movil_b_transColForm'] : null,
            'nro_cuenta' => $datos['nro_cuenta_transColForm'],
            'tipo_persona' => $datos['radio_type_transColForm'],
            'tipo_cuenta' => $datos['radio_label_transColForm'],
            'monto_enviar' => $datos['monto_enviar_d_transColForm'],
            'terminos_comprobante' => true,
            'pais' => (isset($datos['pais_d_transColForm'])) ? $datos['pais_d_transColForm'] : null,
            // Datos de relacion
            'id_moneda' => $datos['id_moneda'],
            'id_entidad' => null,
            'id_formulario' => null,
            'id_user' => null,
            'id_estado' => null,
            // Datos particulares
            'archivo' => null,
            'tasa' => $datos['tasa'],
            'imagen_comprobante' => (isset($datos['file_b_transColForm'])) ? $datos['file_b_transColForm'] : null,
            'email_comprobante' => (isset($datos['email_d_transColForm'])) ? $datos['email_d_transColForm'] : null,
        ];
    }
}

function mapTasaPay($tasa)
{
    $listTipo = null;

    switch ($tasa) {
        case 'PayPal':
            $listTipo = TasaCambio::find(1);
            return [$listTipo['id_tipo_formulario'], $listTipo['key']];
            break;
        case 'Skrill':
            $listTipo = TasaCambio::find(2);
            return [$listTipo['id_tipo_formulario'], $listTipo['key']];
            break;
        case 'Bitcoin':
            $listTipo = TasaCambio::find(3);
            return [$listTipo['id_tipo_formulario'], $listTipo['key']];
            break;
        case 'Tehther':
            $listTipo = TasaCambio::find(4);
            return [$listTipo['id_tipo_formulario'], $listTipo['key']];
            break;
        case 'PeruSol':
            $listTipo = TasaCambio::find(5);
            return [$listTipo['id_tipo_formulario'], $listTipo['key']];
            break;
        case 'PeruDolar':
            $listTipo = TasaCambio::find(6);
            return [$listTipo['id_tipo_formulario'], $listTipo['key']];
            break;
        case 'ColombiaBolivar':
            $listTipo = TasaCambio::find(7);
            return [$listTipo['id_tipo_formulario'], $listTipo['key']];
            break;
        default:
            break;
    }
}
