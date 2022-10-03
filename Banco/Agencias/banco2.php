<?php
$servidor = '127.0.0.1';
$usuario = 'root1';
$senha = 'root';
$banco = 'bancos';

$conectar = mysqli_connect($servidor, $usuario, $senha, $banco);

if(mysqli_connect_errno())
{
    echo "Não foi possível acessar o banco de dados. Verifique com o provedor.";
    die();
}

function salvarbanco($conectar, $banco)
{
    $salvarbanco = "
        INSERT INTO agencias
        (agencia, numagencia, endereco, numero, cidade, estado, bandeira)
        VALUES
        (
            '{$banco['agencia']}',
            '{$banco['agencianum']}',
            '{$banco['endereco']}',
            '{$banco['numero']}',
            '{$banco['cidade']}',
            '{$banco['estado']}',
            '{$banco['bandeira']}'
        )
    ";
    // aspas siples quando for string
    mysqli_query($conectar, $salvarbanco);
    // grava os dados no banco no vetor tarefa
}

function pegarexclusivo($buscar, $conectar, $tabela)
{
    $sqlbusca = "SELECT * FROM agencias WHERE {$tabela} LIKE '{$buscar}'";
    $resultado = mysqli_query($conectar, $sqlbusca);
    $banco = array();

    while ($banco = mysqli_fetch_assoc($resultado)) {
        $bancos [] = $banco;
    }

    if($resultado->num_rows == 0) // verifica se a tabela possui um registro, quando a funcao mysqli_query($conectar, $sqlbusca) nao consegue ser executada ela retorna um erro de sintaxe de linhas que é o num_rows, caso ele seja 0 isso significa q nao existe nenhuma linha 
    {
        return 0;
    }
    else
    {
        return $bancos;
    }
}

function pegartodas($conectar)
{
    $sqlbusca = "SELECT * FROM agencias";
    $resultado = mysqli_query($conectar, $sqlbusca);
    $agencia = array();

    while ($agencia = mysqli_fetch_assoc($resultado)) {
        $agencias[] = $agencia;
    }
    return $agencias;
}

?>

