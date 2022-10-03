<?php
 include "enviocliente.php";
?>
<html>
<head>
    <meta charset="utf-8">
	<title>Criar Conta Corrente</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="dialog.css">
</head>
<body>
	<div id="cadastro">
    	<form name="signup" method="post">
    		<table id="tab_cadastro">
            	<tr>
                	<td>Nome:</td>
                    <td><input type="text" name="nome" required placeholder="Nome " id="nome" class="txt" /></td>
                </tr>
                <tr>    
                    <td>CPF:</td>
                    <td><input type="text" name="cpf" required placeholder="CPF" id="numero" class="txt" /></td>
                </tr>
				 <tr>    
                    <td>Endereço:</td>
                    <td><input type="text" name="endereco" required placeholder="Endereço" id="endereco" class="txt" /></td>
                </tr>
                <tr>    
                    <td>Selecionar Agência:</td>
                    <td>
                        <select name="numagencia">
                        <?php $todasagenc = pegartodas($conectar); 
                            foreach($todasagenc as $todasagen) :?>
                                <option value=<?php echo$todasagen['agencia']?>><?php echo$todasagen['agencia']?></option>
                        <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr> 
                <?php
                    $resultcadast = salvarconta($conectar);
                    if($resultcadast == 0)
                    {
                        echo '<tr><td><div class="dados">Criar conta corrente com o Banks.</div></tr></td>';
                        echo '<tr><td><input type="submit" value="Cadastrar"></tr></td>';
                    }
                    else
                    { ?>
                        <script>
                            $( function() {
                            $( "#dialog" ).dialog();
                            } );
                        </script>
                        <div id="dialog" title="">Sua conta foi criada com sucesso.</div>
                        <tr><td><input type="button" value="Voltar para página inicial" onclick="location.href='http://localhost/Banks/paginainicial.php'"></tr></td>
                        <tr><td><input type="submit" value="Criar outra conta"></tr></td>
                    <?php } ?>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>