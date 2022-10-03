<?php include "envio2.php"; ?>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="dialog.css">   
        <meta charset="UTF-8">
        <title>Banks O seu banco Universal.</title>
        <link >
    </head>
    <body>
        <form method='post'>
            <fieldset>
                <label>Nome da Agência: <input required type="text" name="agencia" maxlength="30"></label> 
                <label>Número da Agência: <input required type="text" name="agencianum" maxlength="5"></label> 
            <fieldset>
                <label>Endereço: <input required type="text" name="endereco" maxlength="500"></label>
                <label>Número: <input required type="number" name="numero" maxlength="4"></label>
                <label>Cidade: <input required type="text" name="cidade" maxlength="50"></label>
                <label>UF: <input required type="text" name="estado" maxlength="2"></label> 
            </fieldset>
                <label> Bandeira do banco: <input required type="text" name="bandeira" maxlength="30"> </label> 
            </fieldset>
                <?php
                    $resultcadast = cadastro($conectar);
                    if($resultcadast == 0)
                    {
                        echo '<div class="dados">Cadastre a sua agência no Banks.</div>';
                        echo '<div class="cad"><input type="submit" value="Cadastrar"></div>';
                    }
                    else
                    { ?>
                        <script>
                            $( function() {
                            $( "#dialog" ).dialog();
                            } );
                        </script>
                        <div id="dialog" title="">Sua agência foi cadastrada no Banks com sucesso.</div>
                        <input type="button" value="Voltar para página inicial" onclick="location.href='http://localhost/Banks/paginainicial.php'">
                        <input type="submit" value="Cadastrar Outra Agencia">
                    <?php } ?>
                
            
        </form>
    </body>
</html>

