<?php

namespace App\Helpers;

/**
 *
 */
trait JsonReturnHelper
{
    public function jsonSuccessReturn($code)
    {
        switch ($code) {
            case 200:
                return [
                    'success' => true,
                    'status'  => $code,
                    'code'    => "success",
                    'message' => "Listado de registros",
                ];
                break;

            case 201:
                return [
                    'success' => true,
                    'status'  => $code,
                    'code'    => "success",
                    'message' => "Registro creado con exito",
                ];
                break;

            case 202:
                return [
                    'success' => true,
                    'status'  => $code,
                    'code'    => "success",
                    'message' => "Registro encontrado",
                ];
                break;

            case 203:
                return [
                    'success' => true,
                    'status'  => $code,
                    'code'    => "success",
                    'message' => "Registro actualizado",
                ];
                break;

            case 204:
                return [
                    'success' => true,
                    'status'  => $code,
                    'code'    => "success",
                    'message' => "Registro eliminado",
                ];
                break;
        }
    }

    public function jsonFailReturn($code)
    {
        switch ($code) {
            case 400:
                return [
                    'success' => false,
                    'status'  => $code,
                    'code'    => "error",
                    'message' => "Fallo en la validación de los campos",
                ];
                break;

            case 401:
                return [
                    'success' => false,
                    'status'  => $code,
                    'code'    => "error",
                    'message' => "Registro no encontrado",
                ];
                break;

            case 402:
                return [
                    'success' => false,
                    'status'  => $code,
                    'code'    => "error",
                    'message' => "Columna no encontrada",
                ];
                break;

            case 403:
                return [
                    'success' => false,
                    'status'  => $code,
                    'code'    => "error",
                    'message' => "Las columnas solo se pueden ordernar por 'asc' o 'desc'",
                ];
                break;

            case 404:
                return [
                    'success' => false,
                    'status'  => $code,
                    'code'    => "error",
                    'message' => "Las paginación solo acepta números",
                ];
                break;
        }
    }
}
