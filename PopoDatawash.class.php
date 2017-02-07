<?php

/*
 * Desenvolvido por Nexxus Tecnologia Ltda  * 
 * Programador responsável: Wagner Rigoli da Rosa  * 
 * E-mail para contato: wagner@fawacom.com.br  * 
 */

/**
 * Plain Old PHP Object
 * 
 * Popular os Interceptadores
 *
 * @author wagner
 */
class PopoDatawash {

    private $id;
    private $Nome;
    private $sexo;
    private $DataNascimento;
    private $Idade;
    private $CPF;
    private $CNH;
    private $ValidadeCNH;
    private $CategoriaCNH;
    private $RG;
    private $OrgaoEmissor;
    private $Nacionalidade;
    private $ClasseEconomica;
    private $TipoLogradouro1;
    private $Logradouro1;
    private $Nro1;
    private $Complemento1;
    private $Bairro1;
    private $Cidade1;
    private $UF1;
    private $CEP1;
    private $TipoLogradouro2;
    private $Logradouro2;
    private $Nro2;
    private $Complemento2;
    private $Bairro2;
    private $Cidade2;
    private $UF2;
    private $CEP2;
    private $Telefone1;
    private $Telefone2;
    private $Telefone3;
    private $Telefone4;
    private $Celular1;
    private $Celular2;
    private $Celular3;
    private $Celular4;
    private $Comercial1;
    private $Comercial2;
    private $Comercial3;
    private $Comercial4;
    private $Email1;
    private $Email2;
    private $Email3;
    private $Email4;
    private $cnpj;
    private $razaosocial;
    private $fantasia;
    private $dataabertura;
    private $situacao;
    private $datasituacao;
    private $cnae;
    private $cnaedesc;
    private $cnaesec;
    private $cnaesecdesc;
    private $natureza;
    private $descnatureza;
    private $capitalsocial;

    /**
     * Interceptador de retorno de ID
     * 
     * @return type integer
     */
    public function getID() {
        return $this->id;
    }

    /**
     * Interceptador de captação do valor de ID
     * 
     * @param type $id
     * @return type integer
     */
    public function setID($id) {
        return $this->id = $id;
    }

    /**
     * Interceptador de retorno de Nome Completo
     * 
     * @return type string
     */
    public function getNome() {
        return $this->Nome;
    }

    /**
     * Interceptador de captação do valor de Nome Completo
     * 
     * @param type $nome
     * @return type string
     */
    public function setNome($nome) {
        return $this->Nome = $nome;
    }

    /**
     * Interceptador de retorno do Sexo
     * 
     * @return type char
     */
    public function getSexo() {
        return $this->sexo;
    }

    /**
     * Interceptador de captação do valor do Sexo
     * 
     * @param type $sx
     * @return type char
     */
    public function setSexo($sx) {
        return $this->sexo = $sx;
    }

    /**
     * Interceptador de retorno da Data de Nascimento
     * 
     * @return type date (YYYY-MM-DD)
     */
    public function getNascimento() {
        return $this->DataNascimento;
    }

    /**
     * Interceptador de captação do valor da Data de Nascimento
     * 
     * @param type $dtNasc
     * @return type date (YYYY-MM-DD)
     */
    public function setNascimento($dtNasc) {
        return $this->DataNascimento = $dtNasc;
    }

    /**
     * Interceptador de retorno da Idade
     * Executado o cálculo da idade através da Classe de Processamento do webservice
     * 
     * @return type integer
     */
    public function getIdade() {
        return $this->Idade;
    }

    /**
     * Interceptador de captação da Idade
     * Executado o cálculo da idade através da Classe de Proessamento do webservice
     * 
     * @param type $idade
     * @return type integer
     */
    public function setIdade($idade) {
        return $this->Idade = $idade;
    }

    /**
     * Interceptador de retorno do Documento informado
     * CPF ou CNPJ
     * 
     * @return type string
     */
    public function getCpf() {
        return $this->CPF;
    }

    /**
     * Interceptador de captação do Documento informado
     * CPF ou CNPJ
     * 
     * @param type $cpf
     * @return type string
     */
    public function setCpf($cpf) {
        return $this->CPF = $cpf;
    }

    /**
     * Intercepatador de retorno do RG
     * 
     * @return type string
     */
    public function getRg() {
        return $this->RG;
    }

    /**
     * Interceptador de captação do RG
     * 
     * @param type $rg
     * @return type string
     */
    public function setRg($rg) {
        return $this->RG = $rg;
    }

    /**
     * Interceptador de retorno da Classe Economica/Faixa de Renda
     * 
     * @return type char
     */
    public function getClasseEconomica() {
        return $this->ClasseEconomica;
    }

    /**
     * Interceptador de captação da Classe Economica/Faixa de Renda
     * 
     * @param type $cleco
     * @return type char
     */
    public function setClasseEconomica($cleco) {
        return $this->ClasseEconomica = $cleco;
    }

    /**
     * Interceptador de retorno do Tipo de Logradouro do Endereço Principal
     * 
     * @return type string
     */
    public function getTipoLogradouro1() {
        return $this->TipoLogradouro1;
    }

    /**
     * Interceptador de captação do Tipo de Logradouro doEndereço Principal
     * 
     * @param type $tlog
     * @return type string
     */
    public function setTipoLogradouro1($tlog) {
        return $this->TipoLogradouro1 = $tlog;
    }

    /**
     * Interceptador de retorno do Endereço Principal
     * 
     * @return type string
     */
    public function getLogradouro1() {
        return $this->Logradouro1;
    }

    /**
     * Interceptador de captação do Endereço Principal
     * 
     * @param type $log
     * @return type string
     */
    public function setLogradouro1($log) {
        return $this->Logradouro1 = $log;
    }

    /**
     * Interceptador de retorno do Número do Endereço Principal
     * 
     * @return type integer
     */
    public function getNr1() {
        return $this->Nro1;
    }

    /**
     * Interceptador de captação do Número do Endereço Principal
     * 
     * @param type $nr
     * @return type integer
     */
    public function setNr1($nr) {
        return $this->Nro1 = $nr;
    }

    /**
     * Interceptador de retorno do Complemente referente ao Endereço Principal
     * 
     * @return type string
     */
    public function getComp1() {
        return $this->Complemento1;
    }

    /**
     * Interceptador de captação do Complemento referente ao Endereço Principal
     * 
     * @param type $comp
     * @return type string
     */
    public function setComp1($comp) {
        return $this->Complemento1 = $comp;
    }

    /**
     * Interceptador de retorno do Bairro do Endereço Principal
     * 
     * @return type string
     */
    public function getBairro1() {
        return $this->Bairro1;
    }

    /**
     * Interceptador de captação do Bairro do Endereço Principal
     * 
     * @param type $bairro
     * @return type string
     */
    public function setBairro1($bairro) {
        return $this->Bairro1 = $bairro;
    }

    /**
     * Interceptador de retorno da Cidade referente ao Endereço Principal
     * 
     * @return type string
     */
    public function getCidade1() {
        return $this->Cidade1;
    }

    /**
     * Interceptador de captação da Cidade referente ao Endereço Principal
     * 
     * @param type $cidade
     * @return type string
     */
    public function setCidade1($cidade) {
        return $this->Cidade1 = $cidade;
    }

    /**
     * Interceptador de retorno da Unidade Federativa referente ao Endereço Principal
     * 
     * @return type char
     */
    public function getUf1() {
        return $this->UF1;
    }

    /**
     * Interceptador de captação da Unidade Federativa referente ao Endereço Principal
     * 
     * @param type $uf
     * @return type char
     */
    public function setUf1($uf) {
        return $this->UF1 = $uf;
    }

    /**
     * Interceptador de retorno do CEP referente ao Endereço Principal
     * 
     * @return type integer
     */
    public function getCep1() {
        return $this->CEP1;
    }

    /**
     * Interceptador de captação do CEP referente ao Endereço Principal
     * 
     * @param type $cep
     * @return type integer
     */
    public function setCep1($cep) {
        return $this->CEP1 = $cep;
    }

    /**
     * Interceptador de retorno do Tipo de Logradouro do Endereço Alternativo
     * 
     * @return type string
     */
    public function getTipoLogradouro2() {
        return $this->TipoLogradouro2;
    }

    /**
     * Interceptador de captação do Tipo de Logradouro doEndereço Alternativo
     * 
     * @param type $tlog
     * @return type string
     */
    public function setTipoLogradouro2($tlog) {
        return $this->TipoLogradouro2 = $tlog;
    }

    /**
     * Interceptador de retorno do Endereço Alternativo
     * 
     * @return type string
     */
    public function getLogradouro2() {
        return $this->Logradouro2;
    }

    /**
     * Interceptador de captação do Endereço Alternativo
     * 
     * @param type $log
     * @return type string
     */
    public function setLogradouro2($log) {
        return $this->Logradouro2 = $log;
    }

    /**
     * Interceptador de retorno do Número do Endereço Alternativo
     * 
     * @return type integer
     */
    public function getNr2() {
        return $this->Nro2;
    }

    /**
     * Interceptador de captação do Número do Endereço Alternativo
     * 
     * @param type $nr
     * @return type integer
     */
    public function setNr2($nr) {
        return $this->Nro2 = $nr;
    }

    /**
     * Interceptador de retorno do Complemente referente ao Endereço Alternativo
     * 
     * @return type string
     */
    public function getComp2() {
        return $this->Complemento2;
    }

    /**
     * Interceptador de captação do Complemento referente ao Endereço Alternativo
     * 
     * @param type $comp
     * @return type string
     */
    public function setComp2($comp) {
        return $this->Complemento2 = $comp;
    }

    /**
     * Interceptador de retorno do Bairro do Endereço Alternativo
     * 
     * @return type string
     */
    public function getBairro2() {
        return $this->Bairro2;
    }

    /**
     * Interceptador de captação do Bairro do Endereço Alternativo
     * 
     * @param type $bairro
     * @return type string
     */
    public function setBairro2($bairro) {
        return $this->Bairro2 = $bairro;
    }

    /**
     * Interceptador de retorno da Cidade referente ao Endereço Alternativo
     * 
     * @return type string
     */
    public function getCidade2() {
        return $this->Cidade2;
    }

    /**
     * Interceptador de captação da Cidade referente ao Endereço Alternativo
     * 
     * @param type $cidade
     * @return type string
     */
    public function setCidade2($cidade) {
        return $this->Cidade2 = $cidade;
    }

    /**
     * Interceptador de retorno da Unidade Federativa referente ao Endereço Alternativo
     * 
     * @return type char
     */
    public function getUf2() {
        return $this->UF2;
    }

    /**
     * Interceptador de captação da Unidade Federativa referente ao Endereço Alternativo
     * 
     * @param type $uf
     * @return type char
     */
    public function setUf2($uf) {
        return $this->UF2 = $uf;
    }

    /**
     * Interceptador de retorno do CEP referente ao Endereço Alternativo
     * 
     * @return type integer
     */
    public function getCep2() {
        return $this->CEP2;
    }

    /**
     * Interceptador de captação do CEP referente ao Endereço Alternativo
     * 
     * @param type $cep
     * @return type integer
     */
    public function setCep2($cep) {
        return $this->CEP2 = $cep;
    }

    /**
     * Interceptador de retorno do Telefone Fixo 1
     * 
     * @return type integer
     */
    public function getTelefone1() {
        return $this->Telefone1;
    }

    /**
     * Interceptador de captação do Telefone Fixo 1
     * 
     * @param type $fone
     * @return type integer
     */
    public function setTelefone1($fone) {
        return $this->Telefone1 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Fixo 2
     * 
     * @return type integer
     */
    public function getTelefone2() {
        return $this->Telefone2;
    }

    /**
     * Interceptador de captação do Telefone Fixo 2
     * 
     * @param type $fone
     * @return type integer
     */
    public function setTelefone2($fone) {
        return $this->Telefone2 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Fixo 3
     * 
     * @return type integer
     */
    public function getTelefone3() {
        return $this->Telefone3;
    }

    /**
     * Interceptador de captação do Telefone Fixo 3
     * 
     * @param type $fone
     * @return type
     */
    public function setTelefone3($fone) {
        return $this->Telefone3 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Fixo 4
     * 
     * @return type integer
     */
    public function getTelefone4() {
        return $this->Telefone4;
    }

    /**
     * Interceptador de captação do Telefone Fixo 4
     * 
     * @param type $fone
     * @return type
     */
    public function setTelefone4($fone) {
        return $this->Telefone4 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Celular 1
     * 
     * @return type integer
     */
    public function getCelular1() {
        return $this->Celular1;
    }

    /**
     * Interceptador de captação do Telefone Celular 1
     * 
     * @param type $fone
     * @return type integer
     */
    public function setCelular1($fone) {
        return $this->Celular1 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Celular 2
     * 
     * @return type integer
     */
    public function getCelular2() {
        return $this->Celular2;
    }

    /**
     * Interceptador de captação do Telefone Celular 2
     * 
     * @param type $fone
     * @return type integer
     */
    public function setCelular2($fone) {
        return $this->Celular2 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Celular 3
     * 
     * @return type integer
     */
    public function getCelular3() {
        return $this->Celular3;
    }

    /**
     * Interceptador de captação do Telefone Celular 3
     * 
     * @param type $fone
     * @return type integer
     */
    public function setCelular3($fone) {
        return $this->Celular3 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Celular 4
     * 
     * @return type string
     */
    public function getCelular4() {
        return $this->Celular4;
    }

    /**
     * Interceptador de captação do Telefone Celular 4
     * 
     * @param type $fone
     * @return type integer
     */
    public function setCelular4($fone) {
        return $this->Celular4 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Comercial 1
     * 
     * @return type integer
     */
    public function getComercial1() {
        return $this->Comercial1;
    }

    /**
     * Interceptador de captação do Telefone Comercial 1
     * 
     * @param type $fone
     * @return type integer
     */
    public function setComercial1($fone) {
        return $this->Comercial1 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Comercial 2
     * 
     * @return type integer
     */
    public function getComercial2() {
        return $this->Comercial2;
    }

    /**
     * Interceptador de captação do Telefone Comercial 2
     * 
     * @param type $fone
     * @return type
     */
    public function setComercial2($fone) {
        return $this->Comercial2 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Comercial 3
     * 
     * @return type integer
     */
    public function getComercial3() {
        return $this->Comercial3;
    }

    /**
     * Interceptador de captação do Telefone Comercial 3
     * 
     * @param type $fone
     * @return type integer
     */
    public function setComercial3($fone) {
        return $this->Comercial3 = $fone;
    }

    /**
     * Interceptador de retorno do Telefone Comercial 4
     * 
     * @return type integer
     */
    public function getComercial4() {
        return $this->Comercial4;
    }

    /**
     * Interceptador de captação do Telefone Comercial 4
     * 
     * @param type $fone
     * @return type integer
     */
    public function setComercial4($email) {
        return $this->Comercial4 = $email;
    }

    /**
     * Interceptador de retorno do E-mail 1
     * 
     * @return type string
     */
    public function getEmail1() {
        return $this->Email1;
    }

    /**
     * Interceptador de captação do E-mail 1
     * 
     * @param type $fone
     * @return type string
     */
    public function setEmail1($email) {
        return $this->Email1 = $email;
    }

    /**
     * Interceptador de retorno do E-mail 2
     * 
     * @return type string
     */
    public function getEmail2() {
        return $this->Email2;
    }

    /**
     * Interceptador de captação do E-mail 2
     * 
     * @param type $fone
     * @return type string
     */
    public function setEmail2($email) {
        return $this->Email2 = $email;
    }

    /**
     * Interceptador de retorno do E-mail 3
     * 
     * @return type string
     */
    public function getEmail3() {
        return $this->Email3;
    }

    /**
     * Interceptador de captação do E-mail 3
     * 
     * @param type $fone
     * @return type string
     */
    public function setEmail3($email) {
        return $this->Email3 = $email;
    }

    /**
     * Interceptador de retorno do E-mail 4
     * 
     * @return type string
     */
    public function getEmail4() {
        return $this->Email4;
    }

    /**
     * Interceptador de captação do E-mail 4
     * 
     * @param type $fone
     * @return type string
     */
    public function setEmail4($email) {
        return $this->Email4 = $email;
    }

    /**
     * Interceptador de retorno do CNPJ
     * 
     * @return type string
     */
    public function getCnpj() {
        return $this->cnpj;
    }

    /**
     * Interceptador de captação do CNPJ
     * 
     * @param type $cnpj
     * @return type string
     */
    public function setCnpj($cnpj) {
        return $this->cnpj = $cnpj;
    }

    /**
     * Interceptador de retorno da Razão Social da Empresa
     * 
     * @return type string
     */
    public function getRazaoSocial() {
        return $this->razaosocial;
    }

    /**
     * Interceptador de captação da Razão Social da Empresa
     * 
     * @param type $razao
     * @return type string
     */
    public function setRazaoSocial($razao) {
        return $this->razaosocial = $razao;
    }

    /**
     * Interceptador de retorno do Nome Fantasia da Empresa
     * 
     * @return type string
     */
    public function getNomeFantasia() {
        return $this->fantasia;
    }

    /**
     * Interceptador de captação do Nome Fantasia da Empresa
     * 
     * @param type $fantasia
     * @return type string
     */
    public function setNomeFantasia($fantasia) {
        return $this->fantasia = $fantasia;
    }

    /**
     * Interceptador de retorno da Data de Abertura da Empresa
     * 
     * @return type date (YYYY-MM-DD)
     */
    public function getDataAbertura() {
        return $this->dataabertura;
    }

    /**
     * Interceptador da captação da Data de Abertura da Empresa
     * 
     * @param type $abertura
     * @return type date (YYYY-MM-DD)
     */
    public function setDtaAbertura($abertura) {
        return $this->dataabertura = $abertura;
    }

    /**
     * Interceptador de retorno da Situação Cadastral da Empresa
     * 
     * @return type string
     */
    public function getSituacao() {
        return $this->situacao;
    }

    /**
     * Interceptador de captação da Situação Cadastral da Empresa
     * 
     * @param type $situacao
     * @return type string
     */
    public function setSituacao($situacao) {
        return $this->situacao = $situacao;
    }

    /**
     * Interceptador de retorno da Data da Situação Cadastral da Empresa
     * 
     * @return type date (YYYY-MM-DD)
     */
    public function getDataSituacao() {
        return $this->datasituacao;
    }

    /**
     * Interceptador de captação da Data da Situação Cadastral da Empresa
     * 
     * @param type $dtsit
     * @return type date (YYYY-MM-DD)
     */
    public function setDataSituacao($dtsit) {
        return $this->datasituacao = $dtsit;
    }

    /**
     * Interceptador de retorno do CNAE Principal da Empresa
     * 
     * @return type integer
     */
    public function getCnae() {
        return $this->cnae;
    }

    /**
     * Interceptador de captação do CNAE Principal da Empresa
     * 
     * @param type $cnae
     * @return type integer
     */
    public function setCnae($cnae) {
        return $this->cnae = $cnae;
    }

    /**
     * Interceptador de retorno da Descrição do CNAE Principal da Empresa
     * 
     * @return type string
     */
    public function getCnaeDesc() {
        return $this->cnaedesc;
    }

    /**
     * Interceptador de captação da Descrição do CNAE Principal da Empresa
     * 
     * @param type $cnaedesc
     * @return type string
     */
    public function setCnaeDesc($cnaedesc) {
        return $this->cnaedesc = $cnaedesc;
    }

    /**
     * Interceptador de retorno do CNAE Secundário da Empresa
     * 
     * @return type integer
     */
    public function getCnaeSecundaria() {
        return $this->cnaesec;
    }

    /**
     * Interceptador de captação do CNAE Secundário da Empresa
     * 
     * @param type $cnae2
     * @return type integer
     */
    public function setCnaeSecundaria($cnae2) {
        return $this->cnaesec = $cnae2;
    }

    /**
     * Interceptador de retorno da Descrição do CNAE Secundário da Empresa
     * 
     * @return type string
     */
    public function getCnaeSecDesc() {
        return $this->cnaesecdesc;
    }

    /**
     * Interceptador de captação da Descrição do CNAE Secundário da Empresa
     * 
     * @param type $desCnae2
     * @return type string
     */
    public function setCnaeSecDesc($desCnae2) {
        return $this->cnaesecdesc = $descCnae2;
    }

    /**
     * Interceptador de retorno da Natureza da Empresa
     * 
     * @return type string
     */
    public function getNatureza() {
        return $this->natureza;
    }

    /**
     * Interceptador de captação da Natureza da Empresa
     * 
     * @param type $nat
     * @return type string
     */
    public function setNatureza($nat) {
        return $this->natureza = $nat;
    }

    /**
     * Interceptador de retorno da Descrição da Natureza da Empresa
     * 
     * @return type string
     */
    public function getDescNatureza() {
        return $this->descnatureza;
    }

    /**
     * Interceptador de captação da Descrição da Natureza da Empresa
     * 
     * @param type $descnat
     * @return type string
     */
    public function setDescNatureza($descnat) {
        return $this->descnatureza = $descnat;
    }

    /**
     * Interceptador de retorno do Capital Social da Empresa
     * 
     * @return type string
     */
    public function getCapitalSocial() {
        return $this->capitalsocial;
    }

    /**
     * Interceptador de captação do Capital Social da Empresa
     * 
     * @param type $cap
     * @return type string
     */
    public function setCapitalSocial($cap) {
        return $this->capitalsocial = $cap;
    }

}
