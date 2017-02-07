<?php

/*
 * Desenvolvido por Nexxus Tecnologia Ltda  * 
 * Programador responsável: Wagner Rigoli da Rosa  * 
 * E-mail para contato: wagner@fawacom.com.br  * 
 */

echo "<!DOCTYPE html>";
echo "<html>";
echo "    <head>";
echo "        <title>Consome WebService Datawash</title>";
echo "        <meta charset='UTF-8'>";
echo "        <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "        <link rel='stylesheet' href='css/bootstrap.min.css'>";
echo "        <script type='text/javascript' src='js/mascara.js'></script>";
echo "    </head>";
echo "    <body style='max-width:97%;'>";
echo "      <div style='text-align:center; width:100%'><h1>Consumindo WebService Datawash</h1></div>";
echo "      <div class='row' style='margin-top:10px; padding-left:10px; padding-right:10px;'>";
echo "          <div class='col-sm-6'>";
echo "              ProcessaDatawash é a classe de execução do processo de captura e tratamento dos dados.<br />";
echo "              <strong>ProcessaDatawash.class.php</strong><br /><br />";
echo "              Ao instanciar a classe, deverá ser passado para o construtor padrão os dados de acesso ao webservice com:";
echo "              <br /><br />";
echo "              <strong style='color:#FBBC05;'>* Cliente => string</strong><br />";
echo "              <strong style='color:#FBBC05;'>* Usuario => string</strong><br />";
echo "              <strong style='color:#FBBC05;'>* Senha => string</strong><br /><br />";
echo '              <strong style=\'color:#34A853\'>$processa = new Datawash($cliente, $usuario, $senha);</strong><br /><br />';
echo "              A execução pode ser realizada através do método <strong>findByDoc</strong> com o CPF/CNPJ ou diretamente no método que deseja.";
echo "              <br /><br />";
echo "          </div>";
echo "          <div class='col-sm-6'>";
echo "              <strong>Métodos disponíves</strong>";
echo "              <br /><br />";
echo "              <strong style='color:#4285F4;'>1. findByDoc => Verifica se é CPF ou CNPJ para buscar o método correto.</strong>";
echo "              <br />";
echo "              <strong style='color:#4285F4;'>2. findCpf => Executa a verificação apenas do CPF.</strong>";
echo "              <br />";
echo "              <strong style='color:#4285F4;'>3. findCnpj => Executa a verificação apenas de CNPJ.</strong>";
echo "              <br /><br />";
echo '              $documento = 12345678901; // CPF ou CNPJ para execução da busca no webservice Datawash<br /><br />';
echo '              <strong style=\'color:#34A853\'>$processa->findByDoc($documento);</strong><br />';
echo "              <br />";
echo "              <br />";
echo "              Após a execução do método, você pode capturar os dados que deseja manipular através dos interceptadores GET da Classe extendida que popula as variáveis.";
echo "              <br />";
echo "              Ex.: getCelular1();<br />";
echo "              Ex.2: getNome();<br />";
echo "              <br />";
echo "          </div>";
echo "      </div>";
echo "      <hr />";
echo "      <div class='row'>";
echo "          <div class='col-sm-4'></div>";
echo "          <div class='col-sm-4'>";
echo "              <form method='post' action=''>";
echo "              <label>Cliente </label><input type='text' name='cliente' placeholder='Informe o Cliente Datawash' style='width:100%;' required='required' /><br />";
echo "              <label>Usuário </label><input type='text' name='usuario' placeholder='Informe o Usuário Datawash' style='width:100%;' required='required' /><br />";
echo "              <label>Senha </label><input type='text' name='senha' placeholder='Informe a Senha Datawash' style='width:100%;' required='required' /><br />";
echo "              <label>Documento </label><input type='text' name='documento' placeholder='Informe o CPF ou CNPJ' onkeypress='mascaraMutuario(this, cpfCnpj)' onblur='clearTimeout()' maxlength='18' style='width:100%;' required='required' /><br />";
echo "              <div class='row'><div class='col-sm-12' style='text-align:center; margin-top:10px;'><input type='submit' name='Processar' value='Processar' class='btn btn-primary' /></div></div>";
echo "              </form>";
echo "          </div>";
echo "          <div class='col-sm-4'></div>";
echo "      </div>";


if (filter_input_array(INPUT_POST)) {

    /**
     * ProcessaDatawash é a classe de execução do processo de captura e tratamento dos dados
     */
    require('ProcessaDatawash.class.php');

    /**
     * Ao instanciar a classe, deverá ser passado para o construtor padrão
     * os dados de acesso ao webservice com:
     * 
     * Cliente => string
     * Usuario => string
     * Senha => string
     */
    $cliente = filter_input(INPUT_POST, 'cliente'); //Cliente Datawash
    $usuario = filter_input(INPUT_POST, 'usuario'); //Usuário Datawash
    $senha = filter_input(INPUT_POST, 'senha'); //Senha Datawash
    $processa = new Datawash($cliente, $usuario, $senha);

    /**
     * A execução pode ser realizada através do método
     * findByDoc com o CPF/CNPJ ou diretamente no método que deseja
     * 
     * Métodos disponíves
     * 
     * findByDoc => Verifica se é CPF ou CNPJ para buscar o método correto
     * 
     * findCpf => Executa a verificação apenas do CPF
     * 
     * FindCnpj => Executa a verificação apenas de CNPJ
     */
    $documento = filter_input(INPUT_POST, 'documento'); // CPF ou CNPJ para execução da busca no webservice Datawash

    if (strlen($documento) == 14) {
        //Execução do sub-método referente a busca através do CPF
        $doc = $processa->TrataCPF($documento);
    } elseif (strlen($documento) >= 18) {
        //Execução do sub-método referente a busca através do CNPJ
        $doc = $processa->TrataCNPJ($documento);
    }

    $processa->findByDoc($doc);

    /**
     * Após a execução do método, você pode capturar os dados que deseja manipular através dos
     * interceptadores GET da Classe extendida que popula as variáveis.
     * 
     * Ex.: getCelular1();
     * Ex.2: getNome();
     */
    //EXIBE OS DADOS RETORNADOS PARA CPF
    if ($processa->getCpf()) {
        echo "<div style='height:10px;'></div>";
        echo "<div style='text-align:center; width:100%'><h2>Resultado da Execução (CPF)</h2></div>";
        echo "<div class='row' style='padding-left:10px; padding-right:10px;'>";
        echo "  <div class='col-sm-6'>";
        echo "      <p>";
        echo "          <h3>Dados Pessoais</h3>";
        echo "          Nome => {$processa->getNome()}<br />";
        echo "          CPF => {$processa->getCpf()}<br />";
        echo "          RG => {$processa->getRg()}<br />";
        echo "          Sexo => {$processa->getSexo()}<br />";
        echo "          Data de Nascimento => {$processa->getNascimento()}<br />";
        echo "          Idade => {$processa->getIdade()}<br />";
        echo "      </p>";
        echo "      <p>";
        echo "          <h3>Endereço Principal</h3>";
        echo "          Tipo de Logradouro => {$processa->getTipoLogradouro1()}<br />";
        echo "          Logradouro => {$processa->getLogradouro1()}<br />";
        echo "          Número => {$processa->getNr1()}<br />";
        echo "          Complemento => {$processa->getComp1()}<br />";
        echo "          Bairro => {$processa->getBairro1()}<br />";
        echo "          Cidade => {$processa->getCidade1()}<br />";
        echo "          UF => {$processa->getUf1()}<br />";
        echo "          CEP => {$processa->getCep1()}<br />";
        echo "      </p>";
        echo "      <p>";
        echo "          <h3>Endereço Alternativo</h3>";
        echo "          Tipo de Logradouro => {$processa->getTipoLogradouro2()}<br />";
        echo "          Logradouro => {$processa->getLogradouro2()}<br />";
        echo "          Número => {$processa->getNr2()}<br />";
        echo "          Complemento => {$processa->getComp2()}<br />";
        echo "          Bairro => {$processa->getBairro2()}<br />";
        echo "          Cidade => {$processa->getCidade2()}<br />";
        echo "          UF => {$processa->getUf2()}<br />";
        echo "          CEP => {$processa->getCep2()}<br />";
        echo "      </p>";
        echo "  </div>";
        echo "  <div class='col-sm-6'>";
        echo "      <p>";
        echo "          <h3>Telefones Fixo</h3>";
        echo "          Telefone 1 => {$processa->getTelefone1()}<br />";
        echo "          Telefone 2 => {$processa->getTelefone2()}<br />";
        echo "          Telefone 3 => {$processa->getTelefone3()}<br />";
        echo "          Telefone 4 => {$processa->getTelefone4()}<br />";
        echo "      </p>";
        echo "      <p>";
        echo "          <h3>Telefones Celulares</h3>";
        echo "          Celular 1 => {$processa->getCelular1()}<br />";
        echo "          Celular 2 => {$processa->getCelular2()}<br />";
        echo "          Celular 3 => {$processa->getCelular3()}<br />";
        echo "          Celular 4 => {$processa->getCelular4()}<br />";
        echo "      </p>";
        echo "      <p>";
        echo "          <h3>Telefones Comerciais</h3>";
        echo "          Comercial 1 => {$processa->getComercial1()}<br />";
        echo "          Comercial 2 => {$processa->getComercial2()}<br />";
        echo "          Comercial 3 => {$processa->getComercial3()}<br />";
        echo "          Comercial 4 => {$processa->getComercial4()}<br />";
        echo "      </p>";
        echo "      <p>";
        echo "          <h3>E-mails de Contato</h3>";
        echo "          E-mail 1 => {$processa->getEmail1()}<br />";
        echo "          E-mail 2 => {$processa->getEmail2()}<br />";
        echo "          E-mail 3 => {$processa->getEmail3()}<br />";
        echo "          E-mail 4 => {$processa->getEmail4()}<br />";
        echo "      </p>";
        echo "  </div>";
        echo "</div>";
    }

    //EXIBE OS DADOS RETORNADOS PARA CNPJ
    if ($processa->getCnpj()) {
        echo "<div style='height:10px;'></div>";
        echo "<div style='text-align:center; width:100%'><h2>Resultado da Execução (CNPJ)</h2></div>";
        echo "<div class='row' style='padding-left:10px; padding-right:10px;'>";
        echo "  <div class='col-sm-12'>";
        echo "      <p>";
        echo "          <h3>Dados Empresariais</h3>";
        echo "          Razão Social => {$processa->getRazaoSocial()}<br />";
        echo "          Nome Fantasia => {$processa->getNomeFantasia()}<br />";
        echo "          CNPJ => {$processa->getCnpj()}<br />";
        echo "          Data de Abertura => {$processa->getDataAbertura()}<br />";
        echo "          Situação Cadastral => {$processa->getSituacao()}<br />";
        echo "          Data da Situação => {$processa->getDataSituacao()}<br />";
        echo "          CNAE => {$processa->getCnae()}<br />";
        echo "          Descrição do CNAE => {$processa->getCnaeDesc()}<br />";
        echo "          CNAE Secundário => {$processa->getCnaeSecundaria()}<br />";
        echo "          Descrição do CNAE Secundário => {$processa->getCnaeSecDesc()}<br />";
        echo "          Natureza Jurídica => {$processa->getNatureza()}<br />";
        echo "          Descrição da Natureza => {$processa->getDescNatureza()}<br />";
        echo "          Capital Social => {$processa->getCapitalSocial()}<br />";
        echo "      </p>";
        echo "      <p>";
        echo "          <h3>Endereço Empresarial</h3>";
        echo "          Tipo de Logradouro => {$processa->getTipoLogradouro1()}<br />";
        echo "          Logradouro => {$processa->getLogradouro1()}<br />";
        echo "          Número => {$processa->getNr1()}<br />";
        echo "          Complemento => {$processa->getComp1()}<br />";
        echo "          Bairro => {$processa->getBairro1()}<br />";
        echo "          Cidade => {$processa->getCidade1()}<br />";
        echo "          UF => {$processa->getUf1()}<br />";
        echo "          CEP => {$processa->getCep1()}<br />";
        echo "      </p>";
        echo "      <p>";
        echo "          <h3>Telefones Fixo</h3>";
        echo "          Telefone 1 => {$processa->getTelefone1()}<br />";
        echo "      </p>";
        echo "  </div>";
        echo "</div>";
    }
}
echo "  </body>";
echo "</html>";
