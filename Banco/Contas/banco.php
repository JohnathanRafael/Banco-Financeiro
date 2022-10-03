<?php
$servidor = '127.0.0.1';
$usuario = 'root1';
$senha = 'root';
$banco = 'bancos';

$conectar = mysqli_connect($servidor, $usuario, $senha, $banco);

function salvarcliente($conectar, $cliente)
{
    $salvarcliente = "
        INSERT INTO contas
        (nome, cpf, endereco, numagencia)
        VALUES
        (
            '{$cliente['nome']}',
            '{$cliente['cpf']}',
            '{$cliente['endereco']}',
            '{$cliente['numagencia']}'
        )
    ";
    // aspas siples quando for string
    mysqli_query($conectar, $salvarcliente);
    // grava os dados no banco 
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

function pegartodascontas($conectar)
{
    $sqlbusca = "SELECT * FROM contas";
    $resultado = mysqli_query($conectar, $sqlbusca);
    $conta= array();

    while ($conta = mysqli_fetch_assoc($resultado)) {
        $contas[] = $conta;
    }
    return $contas;
}

function pegarcontaexclusivo($buscar, $conectar, $tabela)
{
    $sqlbusca = "SELECT * FROM contas WHERE {$tabela} LIKE '{$buscar}'";
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

function pegaragenciaexclusiva($buscar, $conectar, $tabela)
{
    $numcontas = pegartodascontas($conectar);
    $busca2 = "SELECT numagencia FROM agencias WHERE {$tabela} LIKE '{$buscar}'";
    $result2 = mysqli_query($conectar, $busca2);
    $X=0;

    while ($conta = mysqli_fetch_object($result2))
    {
        $agencia = $conta->numagencia; // referencia numagencias dentro do vetor conta
        foreach($numcontas as $conta)
        {
            if($conta['numagencia'] == $agencia){ // verifica se na matriz num contas existe o numero da agencia do cliente 
                $existe []= $conta;
                $X++;
             } 
        }
    } 

    
    if($X == 0){ // verifica se possui algum registro
        return 0;
    }
    else
    {
        return $existe;
    }
}


?>