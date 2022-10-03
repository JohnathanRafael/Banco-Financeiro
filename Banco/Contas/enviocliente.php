<?php
 include "banco.php";

 function salvarconta($conectar)
 {
    if(!isset($_POST['nome']) && !isset($_POST['cpf']) && !isset($_POST['endereco']) && !isset($_POST['numagencia']))
    {
        return 0;
    }
    else 
    {
        $cliente = array(); 
        $cliente['nome'] = $_POST['nome']; 
        $cliente['cpf'] = $_POST['cpf'];
        $cliente['endereco'] = $_POST['endereco'];
        $cliente['numagencia'] = $_POST['numagencia'];

        $numagencia = $cliente['numagencia']; // parte que pega o numero da agencia do cadastro
        $sqlbusca = "SELECT numagencia FROM agencias WHERE agencia LIKE '{$numagencia}'";
        $resultado = mysqli_query($conectar, $sqlbusca);
        $conta = mysqli_fetch_object($resultado); // Pega um array que cada posicao é o nome de uma coluna e seus respectivos valores como valor para posicao do array
        $cliente['numagencia'] = $conta->numagencia; // sendo assim na posicao conta num agencia existe o valor da agencia cadastrada
 
        salvarcliente($conectar, $cliente);
        return 1;
    }
 }

 function consultaconta($conectar)
 {
    if(isset($_POST['consulta']) && $_POST['consulta'] != " ")
        {
            $consulta = $_POST['consulta'];
        
            if($consulta == 'nome') // seleciona tudo onde a pesquisa for igual a agencia escrita no banco 
            {
                $tabela = 'nome';
                if(isset($_POST['nome2']) && $_POST['nome2'] != "")
                {
                    $buscar = $_POST['nome2'];
                    $secbanco = pegarcontaexclusivo($buscar, $conectar, $tabela);
                    return $secbanco;
                }
                else
                {   //reenvia o consulta e faz um breve formulario para enviar o que deseja buscar
                    echo"
                    <div class='teste'>
                        <form method='post'>
                        <p>Digite o nome do titular da conta:</p> 
                        <input type='text' required name='nome2'>
                        <input type='submit' value='Buscar'>
                        <input type='hidden' name='consulta' value='{$consulta}'> 
                        </form>
                    </div>
                    ";
                }
            }
    
                else if($consulta == 'cpf')
                {
                    $tabela = 'cpf';
                    if(isset($_POST['cpf2']) && $_POST['cpf2'] != "")
                    {
                        $buscar = $_POST['cpf2'];
                        $secbanco = pegarcontaexclusivo($buscar, $conectar, $tabela);
                        return $secbanco;
                    }
                    else
                    {
                        echo"
                        <div class='teste'>
                            <form method='post'>
                            <p>Digite o CPF do Titular da conta:</p>
                            <input type='text' required name='cpf2'>
                            <input type='submit' value='Buscar'>
                            <input type='hidden' name='consulta' value='{$consulta}'>
                            </form>
                        </div>
                        ";
                    }
                }
                    else if($consulta == 'bandeira')
                    {
                        $tabela = 'bandeira';
                        if(isset($_POST['bandeira2']) && $_POST['bandeira2'] != "")
                        {
                            $buscar = $_POST['bandeira2'];
                            $numagenciasacontas = pegaragenciaexclusiva($buscar, $conectar, $tabela); // pega todos os numeros de agencias da tabela agencias q conincidem com a bandeira digitada
                            return $numagenciasacontas;
                        }
                        else
                        {
                            echo"
                            <div class='teste'>
                                <form method='post'>
                                <p>Digite a bandeira do banco:</p>
                                <input type='text' required name='bandeira2'>
                                <input type='submit' value='Buscar'>
                                <input type='hidden' name='consulta' value='{$consulta}'>
                                </form>
                            <div>
                            ";
                        }
                    }
                        else if($consulta == 'agencia')
                        {
                            $tabela = 'agencia';
                            if(isset($_POST['agencia2']) && $_POST['agencia2'] != "")
                            {
                                $buscar = $_POST['agencia2'];
                                $numagenciasacontas = pegaragenciaexclusiva($buscar, $conectar, $tabela); // pega todos os numeros de agencias da tabela agencias q conincidem com a bandeira digitada
                                return $numagenciasacontas;
                            }
                            else
                            {
                                echo"
                                <div class='teste'>
                                    <form method='post'>
                                    <p>Digite a Agência:</p>
                                    <input type='text' required name='agencia2'>
                                    <input type='submit' value='Buscar'>
                                    <input type='hidden' name='consulta' value='{$consulta}'>
                                    </form>
                                </div>
                                ";
                            }
                        }
        }
}
?>