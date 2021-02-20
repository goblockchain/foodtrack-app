<?php

namespace App;


use Illuminate\Support\Str;

Class Helpers {

    static function formataDataBR($data, $showTime = true) {
        try {
            $string = $showTime ? 'd/m/Y H:i:s' : 'd/m/Y';
            return date($string, strtotime($data));
        } catch (\Exception $exception) {
            return "Data Inválida";
        }
    }

    static function formataMoedaBR($number, $showDesc = false) {
        try {
            $desc = $showDesc ? "R$ " : "";
            return $desc . number_format($number, "2", ",", ".");
        } catch (\Exception $exception) {
            return "Valor inválido";
        }
    }

    static function getStatusOrder ($status) {
        $array = [
            'pendente' => 'Pendente',
            'entrega_pendente' => 'Entrega pendente',
            'entregue' => 'Entregue',
            'cancelada' => 'Cancelada'
        ];

        try {
            return $array[$status];
        } catch (\Exception $exception) {
            return "Status inválido";
        }

    }

    static function getStatusOrderPayment ($status) {
        $array = [
            'pendente' => 'Pendente',
            'aguardando_garcom' => 'Aguardando garçom na mesa',
            'paga' => 'Paga'
        ];

        try {
            return $array[$status];
        } catch (\Exception $exception) {
            return "Status inválido";
        }

    }

    static function getStatusOrderPaymentDetail ($status) {
        $array = [
            'on' => 'Pagamento pago online',
            'off' => 'Pagamento pago presencialmente'
        ];

        try {
            return $array[$status];
        } catch (\Exception $exception) {
            return "Status inválido";
        }

    }

    static function convertDataBrToEua ($data = null, $delimiter = '/') {
        $format = explode($delimiter, $data);
        return "{$format[2]}-{$format[1]}-{$format[0]}";
    }

    static function convertMoneyToNumber ($data) {
        $r = str_replace('.', '', $data);
        $r = str_replace(',', '.', $r);
        return $r;
    }

    static function makeRandomToken ($length) {
        return Str::random($length);
    }

    static function checkDecimal($positionReturn, $data) {
        try {
            $resp = explode('.', $data);
            if(count($resp) > 0) {
                if(isset($resp[$positionReturn])) {
                    return $resp[$positionReturn];
                } else {
                    return $data;
                }
            } else {
                return $data;
            }
        } catch (\Exception $e) {
            return $data;
        }
    }

    static function getProfileName ($name) {
        try {
            $arr = [
                'planting' => 'Plantação',
                'fertilizer' => 'Fertilização',
                'harvest' => 'Colheita',
                'herbicide' => 'Herbicida',
                'laboratory' => 'Laboratório',
                'transport' => 'Transporte',
                'industry' => 'Indústria'
            ];

            return $arr[$name];
        } catch (\Exception $e) {
            return 'Nome inválido';
        }
    }
}
