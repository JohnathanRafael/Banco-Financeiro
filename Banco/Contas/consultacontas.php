<?php
 include "enviocliente.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Consulta de contas</title>
        <link link rel="stylesheet" href="consultacontas.css" />
    </head>
    <body>
        <fieldset>
        <form method="post">
            <p><strog>Consultar conta por campo especifico:</strong></p>
            <select name="consulta">
                <option value="nome">Nome do Titular</option>
                <option value="cpf">CPF do Titular</option>
                <option value="bandeira">Bandeira</option>
                <option value="agencia">Agência</option>
            </select>
            <input type="submit" value="Consultar">
            <input type="submit" name="todas" value="Mostrar todas as contas">
        </form>
        </fieldset>
    </body>
</html>

<?php
    if(isset($_POST['todas']))
    {
        $todas = pegartodascontas($conectar);?>
        <table>
            <tr>
                <th>Número da conta</th>
                <th>Nome do titular</th>
                <th>CPF do Titular</th>
                <th>Enderço do Titular</th>
                <th>Número da Agência</th>
                <th>Saldo</th>
            </tr>
    <?php foreach($todas as $todascontas) :?>
        <tr>
            <td><?php echo$todascontas['id']?></td>
            <td><?php echo$todascontas['nome']?></td>
            <td><?php echo"{$todascontas['cpf']}"?></td>
            <td><?php echo$todascontas['endereco']?></td>
            <td><?php echo$todascontas['numagencia']?></td>
            <td><?php echo$todascontas['saldo']?></td>
        </tr>
<?php endforeach; 
        }
    else
    {
        $contaespecifica = consultaconta($conectar);
        if(isset($contaespecifica) &&  $contaespecifica == 0)
        {
            echo "Nenhum cadastro encontrado.";
        }
        else if(isset($contaespecifica)){?>
            <table>
            <tr>
                <th>Número da conta</th>
                <th>Nome do titular</th>
                <th>CPF do Titular</th>
                <th>Enderço do Titular</th>
                <th>Número da Agência</th>
                <th>Saldo</th>
            </tr>
    <?php foreach($contaespecifica as $especifica) :?>
        <tr>
            <td><?php echo$especifica['id']?></td>
            <td><?php echo$especifica['nome']?></td>
            <td><?php echo$especifica['cpf']?></td>
            <td><?php echo$especifica['endereco']?></td>
            <td><?php echo$especifica['numagencia']?></td>
            <td><?php echo$especifica['saldo']?></td>
        </tr>
<?php endforeach;}
    }  
     ?>