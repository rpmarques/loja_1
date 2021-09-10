<?php

/* ===================================================
 * FUNÇÃO QUE TRANSFORMA A DATA POR EXTENSO
 * PEGUEI DA INTERNET
 * ====================================================== */

function data_extenso($data = false) {
    if ($data) {
        $mes = date('m', strtotime($data));
    } else {
        $mes = date('m');
        $data = date('Y-m-d');
    }
    $meses = array
        (
        '01' => 'Janeiro',
        '02' => 'Fevereiro',
        '03' => 'Março',
        '04' => 'Abril',
        '05' => 'Maio',
        '06' => 'Junho',
        '07' => 'Julho',
        '08' => 'Agosto',
        '09' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro'
    );
    $dias = array
        (
        0 => 'Domingo',
        1 => 'Segunda-feira',
        2 => 'Terça-feira',
        3 => 'Quarta-feira',
        4 => 'Quinta-feira',
        5 => 'Sexta-feira',
        6 => 'Sábado'
    );
    return $dias[date('w', strtotime($data))] . ', ' . date('d', strtotime($data)) . ' de ' . $meses[$mes] . ' de ' . date('Y', strtotime($data));
}

/* ===================================================
 * FUNÇÃO QUE TRANSFORMA A DATA PARA O FORMATO DD/MM/AAAA
 * PEGUEI DA INTERNET
 * print formadaData("2014/12/24");
 * retorna 24/12/2014
 * ====================================================== */

function formataData($data) {
    if ($data != '') {
        if ($data === '0000-00-00') {
            return '';
        }
        return (substr($data, 8, 2) . '/' . substr($data, 5, 2) . '/' . substr($data, 0, 4));
    } else {
        return '';
    }
}

function gravaData($rData) {
    if ($rData != '') {
        return (substr($rData, 6, 4) . '-' . substr($rData, 3, 2) . '-' . substr($rData, 0, 2));
    } else {
        return '';
    }
}

function selectEstados($rNome = 'uf', $rSelecionado = null) {
    $aEstados = array("FB" => 'Fora do Brasil',
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BH' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MG' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TC' => 'Tocantins');

    echo '<select class="form-control select2" name="' . $rNome . '"  data-placeholder="Escolha um Estado ..." style="width: 100%;">';
    echo '<option value="">&nbsp;</option>';
    foreach ($aEstados as $iId => $sEstado) {
        if (!empty($rSelecionado) && $rSelecionado === $iId) {
            $sAdd = 'selected';
        } else {
            $sAdd = '';
        }
        echo '<option value="' . $iId . '" ' . $sAdd . '>' . $iId . ' - ' . $sEstado . '</option>';
    }
    echo '</select>';
}

//FUN��O PARA REMOVER . E , DAS QTDES
function gravaMoeda($rValor) {
    if ($rValor != '') {
        return str_replace(',', '.', str_replace('.', '', $rValor));
    } else {
        return '';
    }
}

function formataMoeda($rValor) {
    return number_format($rValor, 2, ',', '.');
}

function escreve($rTexto) {
    echo '<script>alert("' . $rTexto . '")</script>';
}

function executaJavaScript($rJavaScript) {
    if (!empty($rJavaScript)) {
        echo '<script>"' . $rJavaScript . '")</script>';
    }
}

function AtualizaPagina() {
    echo '<script>window.location.href=window.location.href</script>';
}

function pegaCEP($rCEP) {
    if (!empty($rCEP)) {
        $rCEP = preg_replace("/[^0-9]/", "", $rCEP);
        $url = "http://viacep.com.br/ws/$rCEP/xml/";
        $xml = simplexml_load_file($url);
        return $xml;
    }
}

?>