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

function setDataGrid($query, $request, $with = [], $select = false, $conditions = [], $orderBy = 'asc')
{
    # Ordenamiento - Single
    if ($request->has('sort') && !empty($request->input('sort'))) {
        $sort = $request->input('sort');
        foreach ($sort as $sort_option) {
            $field = $sort_option['selector'];
            $desc = $sort_option['desc'];
            $query->orderBy($field, ($desc == 'true') ? 'desc' : 'asc');
        }
    }

    # Filtros
    if ($request->has('filter') && !empty($request->input('filter'))) {
        $filters = $request->input('filter');
        if (count($filters) == 3 && !is_array($filters[0])) {
            $operator = getSqlOperator($filters[1]);
            $value = getQueryValue($filters[1], $filters[2]);
            $query->where($filters[0], $operator, $value);
        } else {
            for ($i = 0; $i < count($filters); $i += 2) {
                # Operadores
                $operator = getSqlOperator($filters[$i][1]);
                $value = getQueryValue($filters[$i][1], $filters[$i][2]);
                $query->where($filters[$i][0], $operator, $value);
            }
        }
    }

    if (!empty($conditions)) {
        foreach ($conditions as $column => $value) {
            $query->where($column, $value);
        }
    }

    $skip = $request->input('skip') ?? 1;
    $take = $request->input('take') ?? 0;

    # Paginación
    $total_count = getTotal($query, $select);
    $page = $skip / ($take + 1);
    $page_size = $take;
    $query->skip($skip)
        ->take($take)
        ->with($with)
        ->orderBy('id', $orderBy)
        ->distinct();

    if (!$select) {
        $data = $query->get();
    } else {
        $data = $query->get($select);
    }

    return response()->json([
        'data' => $data,
        'totalCount' => $total_count,
        'current_page' => $page,
        'per_page' => $page_size,
    ]);
}

function getTotal($query, $select)
{
    return count($query->distinct()->get($select));
}

function getSqlOperator($operator)
{
    switch ($operator) {
        case 'contains':
            return 'LIKE';
        case 'notcontains':
            return 'NOT LIKE';
        case 'startswith':
            return 'LIKE';
        case 'endswith':
            return 'LIKE';
            // case '=':
            //     return '=';
        case '=':
            return 'LIKE';
        case '<>':
            return '<>';
        default:
            return null;
    }
}

function getQueryValue($operator, $value)
{
    switch ($operator) {
        case 'contains':
            return '%' . $value . '%';
        case 'notcontains':
            return '%' . $value . '%';
        case 'startswith':
            return $value . '%';
        case 'endswith':
            return '%' . $value;
        case '=':
            return '%' . $value . '%';
        default:
            return $value;
    }
}
