<?php
namespace projetoTechfit;

class ValorTable {

    public static function getAulas() {
        return [
            "id_aula"    => null,
            "data_aula"  => null,
            "tipo_aula"  => null,
            "id_unidade"   => null,
            "descricao_aula"   => null,
            "whereValue" => null
        ];
    }

    public static function getAvaliacao_fisicas() {
        return [
            "data_avaliacao" => null,
            "id_avaliacao"   => null,
            "tipo_avalicao"  => null,
            "id_aluno"       => null,
            "whereValue"     => null
        ];
    }

    public static function getFuncionarios() {
        return [
            "cep_funcionario"          => null,
            "nome_funcionario"         => null,
            "data_nascimento_funcionario" => null,
            "email_funcionario"        => null,
            "id_funcionario"           => null,
            "telefone_funcionario"     => null,
            "tipo_funcionario"         => null,
            "senha_funcionario"        => null, 
            "cpf_funcionario"          => null,
            "id_unidade"               => null,
            "whereValue"               => null
        ];
    }

    public static function getUnidades() {
        return [
            "cep_unidade"  => null,
            "nome_unidade" => null,
            "id_unidade"   => null,
            "whereValue"   => null
        ];
    }

    public static function getAlunos() {
        return [
            "nome_aluno"            => null,
            "cep_aluno"             => null,
            "data_nascimento_aluno" => null,
            "cpf_aluno"             => null,
            "telefone_aluno"        => null,
            "email_aluno"           => null,
            "senha_aluno"           => null,
            "id_aluno"              => null,
            "id_unidade"            => null,
            "id_plano"            => null,
            "whereValue"            => null
        ];
    }

    public static function getComunicados() {
        return [
            "informacao_comunicado" => null,
            "tipo_comunicado" => null,
            "titulo_comunicado"     => null,
            "id_comunicado"         => null,
            "whereValue"            => null
        ];
    }

    public static function getInscrevem() {
        return [
            "id_aula"    => null,
            "id_aluno" => null,
            "whereValue" => null
        ];
    }

    public static function getCriam() {
        return [
            "id_aula"        => null,
            "id_funcionario" => null,
            "whereValue"     => null
        ];
    }

    public static function getComentam() {
        return [
            "id_comunicado"  => null,
            "id_funcionario" => null,
            "whereValue"     => null
        ];
    }

    public static function getFazem() {
        return [
            "id_funcionario" => null,
            "id_avaliacao"   => null,
            "whereValue"     => null
        ];
    }
    public static function getPlanos() {
        return [
            "id_plano" => null,
            "nome_plano" => null,
            "descricao_plano" => null,
            "valor_plano"=> null,
            "whereValue" => null
        ];
    }

    public static function getPagamentos(){
        return [
            "id_pagamento" => null,
            "numero_cartao_pagamento" => null,
            "nome_cartao_pagamento" => null,
            "ccv_cartao_pagamento" => null,
            "validade_cartao_pagamento" => null,
            "id_aluno" => null,
            "whereValue" => null
        ];
    }
}
?>