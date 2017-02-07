<?php

/*
 * Desenvolvido por Nexxus Tecnologia Ltda  * 
 * Programador responsável: Wagner Rigoli da Rosa  * 
 * E-mail para contato: wagner@fawacom.com.br  * 
 */

/**
 * Processamento dos dados captuardos através do WEBSERVICE Datawash
 * e retornando os valores através dos interceptadores.
 *
 * @author wagner
 */

/**
 * Classe extendida para popular os interceptadores
 */
require_once("PopoDatawash.class.php");

class Datawash extends PopoDatawash {
    /* VARIAVEIS DE CAPTAÇÃO DOS DADOS RETORNADOS DO WEBSERVICE */

    var $documento;
    var $cpf;
    var $cnpj;
    var $nome;
    var $sexo;
    var $datanasc;
    var $nomeMae;
    var $rg;
    var $escolaridade;
    var $tpLog1;
    var $log1;
    var $nro1;
    var $bairro1;
    var $cidade1;
    var $uf1;
    var $cep1;
    var $tpLog2;
    var $log2;
    var $nro2;
    var $bairro2;
    var $cidade2;
    var $uf2;
    var $cep2;
    var $fone1;
    var $fone2;
    var $fone3;
    var $fone4;
    var $movel1;
    var $movel2;
    var $movel3;
    var $movel4;
    var $com1;
    var $com2;
    var $com3;
    var $com4;
    var $cleco;
    var $renda;
    var $email1;
    var $email2;
    var $email3;
    var $email4;
    var $razaosocial;
    var $fantasia;
    var $dataabertura;
    var $situacao;
    var $datasituacao;
    var $cnae;
    var $cnaedesc;
    var $cnaesec;
    var $cnaesecdesc;
    var $natureza;
    var $descnatureza;
    var $capitalsocial;

    /* VARIAVEIS PRIVADAS UTILIZADAS PELO CONTRUTOR COM OS DADOS DE ACESSO AO WEBSERVICE DO CLIENTE */
    private $cliente;
    private $usuario;
    private $senha;

    /**
     * Construtor padrão.
     * Requer os dados de acesso ao WEBSERVICE do cliente que irá realizar a consulta.
     * 
     * @param type $client => string
     * @param type $user => string
     * @param type $passwd => string
     */
    public function __construct($client, $user, $passwd) {
        $this->cliente = $client;
        $this->user = $user;
        $this->senha = $passwd;
    }

    /**
     * Método base para busca dos dados através do CPF ou do CNPJ
     * O método verifica se o documento passado deverá executar a busca através do CPF ou do CNPJ
     * realizando a chamada do submetodo correto.
     * 
     * @param type $doc => string
     * @return type => array (Acessado através dos interceptadores GET)
     */
    public function findByDoc($doc) {
        $this->documento = $doc;

        /**
         * Verifica o tamanho do documento passado para execução do metodo correspondente 
         */
        if (strlen($this->documento) == 11) {
            //Execução do sub-método referente a busca através do CPF
            $cliente = $this->findCpf($this->documento);
        } elseif (strlen($this->documento) == 14) {
            //Execução do sub-método referente a busca através do CNPJ
            $cliente = $this->findCnpj($this->documento);
        }
        //Retorno dos dados capturados acessível através dos interceptadores GETs
        return $this->documento;
    }

    /**
     * Métod de execução de busca através do CPF
     * 
     * @param type $doc => string
     */
    public function findCpf($doc) {

        //Documento para processamento no webservice
        $this->cpf = $doc;
        
        $link = "http://webservice.datawash.com.br/localizacao.asmx/ConsultaCPFCompleta?Cliente={$this->cliente}&Usuario={$this->usuario}&Senha={$this->senha}&CPF={$this->cpf}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (curl_exec($ch) == TRUE) {
            $content = curl_exec($ch);
            $xml = simplexml_load_string($content);

            foreach ($xml->DADOS as $dados) {
                $this->nome = $dados->NOME; //NOME COMPLETO
                $this->sexo = $dados->SEXO; //SEXO => M ou F
                $this->datanasc = $dados->DATA_NASC; //DATA DE NASCIMENTO NO PADRÃO YYYY-MM-DD
                $this->nomeMae = $dados->NOME_MAE; //NOME COMPLETO DA MAE
                if (!empty($dados->RG)) {
                    $this->rg = $dados->RG; //RG
                }
                $this->ufRg = $dados->UF_RG; //UNIDADE FEDERATIVA DE EMISSÃO DO RG
                if (!empty($dados->ESCOLARIDADE)) {
                    $this->escolaridade = $dados->ESCOLARIDADE; //ESCOLARIDADE
                }

                foreach ($dados->ENDERECOS->ENDERECO as $data) {
                    if (!empty($data->LOGRADOURO[0])) {
                        $this->tpLog1 = $data->TIPO_LOGRADOURO[0]; //TIPO DO LOGRADOURO => AV., RUA, TRAVESSA, ETC.
                        $this->log1 = $data->LOGRADOURO[0]; //NOME DA RUA
                        $this->nro1 = $data->NUMERO[0]; //NUMERO DO ENDEREÇO
                        $this->bairro1 = $data->BAIRRO[0]; //BAIRRO DO ENDEREÇO
                        $this->cidade1 = $data->CIDADE[0]; //CIDADE DO ENDEREÇO
                        $this->uf1 = $data->UF[0]; //UNIDADE FEDERATIVA DO ENDEREÇO
                        $this->cep1 = $data->CEP[0]; //CEP DO ENDEREÇO
                    }
                    if (!empty($data->LOGRADOURO[1])) {
                        $this->tpLog2 = $data->TIPO_LOGRADOURO[1]; //TIPO DO LOGRADOURO => AV., RUA, TRAVESSA, ETC.
                        $this->log2 = $data->LOGRADOURO[1]; //NOME DA RUA
                        $this->nro2 = $data->NUMERO[1]; //NUMERO DO ENDEREÇO
                        $this->bairro2 = $data->BAIRRO[1]; //BAIRRO DO ENDEREÇO
                        $this->cidade2 = $data->CIDADE[1]; //CIDADE DO ENDEREÇO
                        $this->uf2 = $data->UF[1]; //UNIDADE FEDERATIVA DO ENDEREÇO
                        $this->cep2 = $data->CEP[1]; //CEP DO ENDEREÇO
                    }
                }

                foreach ($dados->TELEFONES_FIXOS as $fixos) {
                    if (!empty($fixos->TELEFONE[0])) {
                        $this->fone1 = $fixos->TELEFONE[0]; //PRIMEIRO TELEFONE FIXO
                    }
                    if (!empty($fixos->TELEFONE[1])) {
                        $this->fone2 = $fixos->TELEFONE[1]; //SEGUNDO TELEFONE FIXO
                    }
                    if (!empty($fixos->TELEFONE[2])) {
                        $this->fone3 = $fixos->TELEFONE[2]; //TERCEIRO TELEFONE FIXO
                    }
                    if (!empty($fixos->TELEFONE[3])) {
                        $this->fone4 = $fixos->TELEFONE[3]; //QUARTO TELEFONE FIXO
                    }
                }

                foreach ($dados->TELEFONES_MOVEIS as $moveis) {
                    if (!empty($moveis->TELEFONE[0])) {
                        $this->movel1 = $moveis->TELEFONE[0]; //PRIMEIRO TELEFONE CELULAR
                    }
                    if (!empty($moveis->TELEFONE[1])) {
                        $this->movel2 = $moveis->TELEFONE[1]; //SEGUNDO TELEFONE CELULAR
                    }
                    if (!empty($moveis->TELEFONE[2])) {
                        $this->movel3 = $moveis->TELEFONE[2]; //TERCEIRO TELEFONE CELULAR
                    }
                    if (!empty($moveis->TELEFONE[3])) {
                        $this->movel4 = $moveis->TELEFONE[3]; //QUARTO TELEFONE CELULAR
                    }
                }

                foreach ($dados->FLAGWHATSAPP as $whats) {
                    $this->whatsapp = $whats->FLAG; //FLAG PARA IDENTIFICAR O NÚMERO QUE CORRESPONDE AO WHATASAPP
                }

                foreach ($dados->TELEFONES_COMERCIAIS as $com) {
                    if (!empty($com->TELEFONE[0])) {
                        $this->com1 = $com->TELEFONE[0]; //PRIMEIRO TELEFONE COMERCIAL
                    }
                    if (!empty($com->TELEFONE[1])) {
                        $this->com2 = $com->TELEFONE[1]; //SEGUNDO TELEFONE COMERCIAL
                    }
                    if (!empty($com->TELEFONE[2])) {
                        $this->com3 = $com->TELEFONE[2]; //TERCEIRO TELEFONE COMERCIAL
                    }
                    if (!empty($com->TELEFONE[3])) {
                        $this->com4 = $com->TELEFONE[3]; //QUARTO TELEFONE COMERCIAL
                    }
                }

                foreach ($dados->EMAILS as $mail) {
                    if (!empty($mail->EMAIL[0])) {
                        $this->email1 = $mail->EMAIL[0]; //PRIMEIRO EMAIL DE CONTATO
                    }
                    if (!empty($mail->EMAIL[1])) {
                        $this->email2 = $mail->EMAIL[1]; //SEGUNDO EMAIL DE CONTATO
                    }
                    if (!empty($mail->EMAIL[2])) {
                        $this->email3 = $mail->EMAIL[2]; //TERCEIRO EMAIL DE CONTATO
                    }
                    if (!empty($mail->EMAIL[3])) {
                        $this->email4 = $mail->EMAIL[3]; //QUARTO EMAIL DE CONTATO
                    }
                }

                foreach ($dados->RENDA_ESTIMADA as $faixa) {
                    if (!empty($faixa->FAIXA_RENDA)) {
                        $this->cleco = $faixa->FAIXA_RENDA; //FAIXA DE RENDA CORRESPONDENTE A CLASSE ECONOMICA => A, B, C, D, E
                    }
                    if (!empty($faixa->VALOR_RENDA)) {
                        $this->renda = $faixa->VALOR_RENDA; //VALOR DECLARADO DE RENDA
                    }
                }
            }
        }

        /* POPULANDO OS INTERCEPTADORES */
        parent::setCpf($this->cpf);
        parent::setNome($this->nome);
        parent::setNascimento($this->datanasc);
        parent::setClasseEconomica($this->cleco);
        parent::setSexo($this->sexo);
        parent::setRg($this->rg);
        parent::setTelefone1($this->fone1);
        parent::setTelefone2($this->fone2);
        parent::setTelefone3($this->fone3);
        parent::setTelefone4($this->fone4);
        parent::setCelular1($this->movel1);
        parent::setCelular2($this->movel2);
        parent::setCelular3($this->movel3);
        parent::setCelular4($this->movel4);
        parent::setComercial1($this->com1);
        parent::setComercial2($this->com2);
        parent::setComercial3($this->com3);
        parent::setComercial4($this->com4);
        parent::setEmail1($this->email1);
        parent::setEmail2($this->email2);
        parent::setEmail3($this->email3);
        parent::setEmail4($this->email4);
        parent::setTipoLogradouro1($this->tpLog1);
        parent::setLogradouro1($this->log1);
        parent::setNr1($this->nro1);
        parent::setBairro1($this->bairro1);
        parent::setCidade1($this->cidade1);
        parent::setUf1($this->uf1);
        parent::setCep1($this->cep1);
        parent::setTipoLogradouro2($this->tpLog2);
        parent::setLogradouro2($this->log2);
        parent::setNr2($this->nro2);
        parent::setBairro2($this->bairro2);
        parent::setCidade2($this->cidade2);
        parent::setUf2($this->uf2);
        parent::setCep2($this->cep2);

        /* EXECUTA O CÁLCULO PARA SABER A IDADE */
        $exNasc = explode("-", $this->datanasc);
        $this->idade = date("Y") - $exNasc[0];
        parent::setIdade($this->idade);
    }

    public function findCnpj($doc) {

        $this->cnpj = $doc;

        $link = "http://webservice.datawash.com.br/localizacao.asmx/ConsultaCNPJ?Cliente={$this->cliente}&Usuario={$this->usuario}&Senha={$this->senha}&CNPJ={$this->cnpj}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (curl_exec($ch) == TRUE) {
            $content = curl_exec($ch);
            $xml = simplexml_load_string($content);

            foreach ($xml->DADOS as $dados) {
                $this->razaosocial = $dados->RAZAO_SOCIAL; //RAZAO SOCIAL DA EMPRESA
                $this->fantasia = $dados->FANTASIA; //NOME FANTASIA DA EMPRESA
                $this->dataabertura = $dados->DATA_ABERTURA; //DATA DE ABERTURA DA EMPRESA (YYYY-MM-DD)
                $this->situacao = $dados->SITUACAO_CADASTRAL; //SITUAÇÃO CADASTRAL => ATIVA ou INATIVA
                $this->datasituacao = $dados->DATA_SITUACAO_CADASTRAL; //DATA DA SITUAÇÃO CADASTRAL
                $this->cnae = $dados->CNAE; //CNAE DA ATIVIDADE PRINCIPAL DA EMPRESA
                $this->cnaedesc = $dados->CNAEDescricao; //DESCRIÇÃO DO CNAE DE ATIVIDADE PRINCIPAL DA EMPRESA
                $this->cnaesec = $dados->CNAE_SECUNDARIO; //CNAE DE ATIVIDADE SECUNDARIA DA EMPRESA
                $this->cnaesecdesc = $dados->CNAE_SECUNDARIO_DESCRICAO; //DESCRIÇÃO DO CNAE DE ATIVIDADE SECUNDARIA DA EMPRESA
                $this->natureza = $dados->NATUREZA_JURIDICA; //NATUREZA JURIDICA DA EMPRESA
                $this->descnatureza = $dados->DESCRICAO_NATUREZA_JURIDICA; //DESCRIÇÃO DA NATUREZA JURIDICA DA EMPRESA
                $this->capitalsocial = $dados->CAPITAL_SOCIAL; //CAPITAL SOCIAL DA EMPRESA

                foreach ($dados->ENDERECOS->ENDERECO as $data) {
                    if (!empty($data->LOGRADOURO[0])) {
                        $this->tpLog1 = $data->TipoLogradouro[0]; //TIPO DO LOGRADOURO => AV., RUA, TRAVESSA, ETC.
                        $this->log1 = $data->LOGRADOURO[0]; //NOME DA RUA
                        $this->nro1 = $data->NUMERO[0]; //NUMERO DO ENDEREÇO
                        $this->bairro1 = $data->BAIRRO[0]; //BAIRRO DO ENDEREÇO
                        $this->cidade1 = $data->CIDADE[0]; //CIDADE DO ENDEREÇO
                        $this->uf1 = $data->UF[0]; //UNIDADE FEDERATIVA DO ENDEREÇO
                        $this->cep1 = $data->CEP[0]; //CEP DO ENDEREÇO
                    }
                }

                foreach ($dados->TELEFONES as $tel) {
                    if (!empty($tel->TELEFONE[0])) {
                        $this->fone1 = $tel->TELEFONE[0]; //TELEFONE DA EMPRESA
                    }
                }
            }
        }

        /* POPULANDO OS INTERCEPTADORES */
        parent::setCnpj($this->cnpj);
        parent::setRazaoSocial($this->razaosocial);
        parent::setNomeFantasia($this->fantasia);
        parent::setDtaAbertura($this->dataabertura);
        parent::setSituacao($this->situacao);
        parent::setDataSituacao($this->datasituacao);
        parent::setCnae($this->cnae);
        parent::setCnaeDesc($this->cnaedesc);
        parent::setCnaeSecundaria($this->cnaesec);
        parent::setCnaeSecDesc($this->cnaesecdesc);
        parent::setNatureza($this->natureza);
        parent::setDescNatureza($this->descnatureza);
        parent::setCapitalSocial($this->capitalsocial);
        parent::setTipoLogradouro1($this->tpLog1);
        parent::setLogradouro1($this->log1);
        parent::setNr1($this->nro1);
        parent::setBairro1($this->bairro1);
        parent::setCidade1($this->cidade1);
        parent::setUf1($this->uf1);
        parent::setCep1($this->cep1);
        parent::setTelefone1($this->fone1);
    }

    /**
     * Tatamento do documento passado para retirada de caracteres especiais
     * 
     * @param type $doc => Recebe o documento para tratamento
     * @return string => Retorna o documento apenas com digitos, sem caracteres especiais
     */
    public function TrataCPF($doc) {
        $num = preg_replace('/[^0-9]/', '', $doc);
        if (strlen($num) == 11) {
            $numeros = $num;
        } elseif (strlen($num) == 10) {
            $numeros = "0" . $num;
        } elseif (strlen($num) == 9) {
            $numeros = "00" . $num;
        } elseif (strlen($num) == 8) {
            $numeros = "000" . $num;
        }
        return $numeros;
    }

    /**
     * Tatamento do documento passado para retirada de caracteres especiais
     * 
     * @param type $doc => Recebe o documento para tratamento
     * @return string => Retorna o documento apenas com digitos, sem caracteres especiais
     */
    public function TrataCNPJ($doc) {
        $num = preg_replace('/[^0-9]/', '', $doc);
        if (strlen($num) == 14) {
            $numeros = $num;
        } elseif (strlen($num) == 13) {
            $numeros = "0" . $num;
        } elseif (strlen($num) == 12) {
            $numeros = "00" . $num;
        }
        return $numeros;
    }

}
