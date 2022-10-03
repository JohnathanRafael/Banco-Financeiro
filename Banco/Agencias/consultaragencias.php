<?php include "envio2.php";?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Banks o banco do fracasso</title>
        <link rel="stylesheet" href="consultaragencias.css" >
    </head>
    <body>
        <fieldset>
        <form method="post">
            <p><strong>Consultar agencia por campo especifico:</strong></p>
            <select name="consulta">
                <option value="agencia">Nome da Agência </option>
                <option value="agencianum">Numéro da Agência </option>
                <option value="cidade">Cidade </option>
                <option value="estado">Estado </option>
                <option value="bandeira">Bandeira </option> 
            </select>
            <input type="submit" value="Consultar">
            <input type="submit" name="todas" value="Mostrar todas as agencias">
        </form>
        </fieldset>
    </body>
</html>

<?php
    if(isset($_POST['todas']))
    {
        $todas = pegartodas($conectar);?>
        <table>
            <tr>
                <th>Agência</th>
                <th>Número da Agência</th>
                <th>Endereço</th>
                <th>Bandeira</th>
            </tr>
    <?php foreach($todas as $todasagencias) :?>
        <tr>
            <td><?php echo$todasagencias['agencia']?></td>
            <td><?php echo$todasagencias['numagencia']?></td>
            <td><?php echo"{$todasagencias['endereco']}, {$todasagencias['numero']}, {$todasagencias['cidade']}-{$todasagencias['estado']}"?></td>
            <td><?php echo$todasagencias['bandeira']?></td>
        </tr>
<?php endforeach; 
        }
    else
    {
        $bancoespecifico = consulta($conectar);
        if(isset($bancoespecifico) &&  $bancoespecifico == 0)
        {
            echo "Informação inválida";
        }
        else if(isset($bancoespecifico)){?>
            <table>
            <tr>
                <th>Agência</th>
                <th>Número da Agência</th>
                <th>Endereço</th>
                <th>Bandeira</th>
            </tr>
    <?php foreach($bancoespecifico as $especifica) :?>
        <tr>
            <td><?php echo$especifica['agencia']?></td>
            <td><?php echo$especifica['numagencia']?></td>
            <td><?php echo"{$especifica['endereco']}, {$especifica['numero']}, {$especifica['cidade']}-{$especifica['estado']}"?></td>
            <td><?php echo$especifica['bandeira']?></td>
        </tr>
<?php endforeach;}
    }  
     ?>