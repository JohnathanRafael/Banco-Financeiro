<html>
    <head>
        <meta charset="UTF-8" />
        <title>Banks o banco do fracasso</title>
        <link rel="stylesheet" href="envio2.css" />
    </head>
    <body>
    </body>
</html>


<?php
    include "banco2.php";
    function cadastro($conectar)
    {
    if(!isset($_POST['agencianum']) && !isset($_POST['agencia']) && !isset($_POST['endereco']) && !isset($_POST['numero']) && !isset($_POST['cidade']) && !isset($_POST['estado']) && !isset($_POST['bandeira']))
    {
        return 0;
    }
    else
    {
        $banco = array();
        $banco['agencia'] = $_POST['agencia'];
        $banco['agencianum'] = $_POST['agencianum'];
        $banco['endereco'] = $_POST['endereco'];
        $banco['numero'] = $_POST['numero'];
        $banco['cidade'] = $_POST['cidade'];
        $banco['estado'] = $_POST['estado'];
        $banco['bandeira'] = $_POST['bandeira'];

        salvarbanco($conectar, $banco);
        return 1;
    }
}

    function consulta($conectar)
    {
        
        if(isset($_POST['consulta']) && $_POST['consulta'] != " ")
        {
            $consulta = $_POST['consulta'];
        
            if($consulta == 'agencia') // seleciona tudo onde a pesquisa for igual a agencia escrita no banco 
            {
                $tabela = 'agencia';
                if(isset($_POST['agencia2']) && $_POST['agencia2'] != "")
                {
                    $buscar = $_POST['agencia2'];
                    $secbanco = pegarexclusivo($buscar, $conectar, $tabela);
                    return $secbanco;
                }
                else
                {
                    echo"
                    <div class='teste'>
                        <form method='post'>
                        <p>Digite o nome da agencia:</p> 
                        <input type='text' required name='agencia2'>
                        <input type='submit' value='Buscar'>
                        <input type='hidden' name='consulta' value='{$consulta}'>
                        </form>
                    </div>
                    
                    ";
                }
            }
    
                else if($consulta == 'agencianum')
                {
                    $tabela = 'numagencia';
                    if(isset($_POST['num']) && $_POST['num'] != "")
                    {
                        $buscar = $_POST['num'];
                        $secbanco = pegarexclusivo($buscar, $conectar, $tabela);
                        return $secbanco;
                    }
                    else
                    {
                        echo"
                        <div class='teste'>
                            <form method='post'>
                            <p>Digite o número da agencia:</p>
                            <input type='number' required name='num'>
                            <input type='submit' value='Buscar'>
                            <input type='hidden' name='consulta' value='{$consulta}'>
                            </form>
                        </div>
                        
                        ";
                    }
                }
    
                    else if($consulta == 'cidade')
                    {
                        $tabela = 'cidade';
                        if(isset($_POST['cidade']) && $_POST['cidade'] != "")
                        {
                            $buscar = $_POST['cidade'];
                            $secbanco = pegarexclusivo($buscar, $conectar, $tabela);
                            return $secbanco;
                        }
                        else
                        {
                            echo"
                            <div class='teste'>
                                <form method='post'>
                                <p>Digite o nome da cidade:</p>
                                <input type='text' required name='cidade'>
                                <input type='submit' value='Buscar'>
                                <input type='hidden' name='consulta' value='{$consulta}'>
                                </form>
                            </div>
                        
                            ";
                        }
                    }
    
                        else if($consulta == 'estado')
                        {
                            $tabela = 'estado';
                            if(isset($_POST['estado']) && $_POST['estado'] != "")
                            {
                                $buscar = $_POST['estado'];
                                $secbanco = pegarexclusivo($buscar, $conectar, $tabela);
                                return $secbanco;
                            }
                            else
                            {
                                echo"
                                <div class='teste'>
                                    <form method='post'>
                                    <p>Digite a sigla do estado:</p>
                                    <input type='text' required name='estado'>
                                    <input type='submit' value='Buscar'>
                                    <input type='hidden' name='consulta' value='{$consulta}'>
                                    </form>
                                </div>
                        
                                ";
                            }
                        }
    
                            else
                            {
                                $tabela = 'bandeira';
                                if(isset($_POST['bandeira']) && $_POST['bandeira'] != "")
                                {
                                    $buscar = $_POST['bandeira'];
                                    $secbanco = pegarexclusivo($buscar, $conectar, $tabela);
                                    return $secbanco;
                                }
                                else
                                {
                                    echo"
                                    <div class='teste'>
                                        <form method='post'>
                                        <p>Digite a bandeira:</p>
                                        <input type='text' required name='bandeira'>
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