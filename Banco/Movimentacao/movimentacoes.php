<?php include "enviomovi.php";?>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="movimentacoes.css">   
        <meta charset="UTF-8">
        <title>Fazer Movimentacao</title>
        <link >
    </head>
    <body>
            <p>Selecione o tipo de movimentação que deseja fazer</p>
            <div class="form1">
            <form method='post'>
                    <label>Depósito<input required type="radio" name="movimento" checked value="deposito"></label>
                    <label>Saque<input required type="radio" name="movimento" value="saque"></label>
                    <label>Transferência<input required type="radio" name="movimento" value="transf"></label>
                    <div class="conf">
                        <input required type="submit" value="Confirmar">
                    </div>    
            </form>
            </div>               
        <?php 
        testamovi($conectar);?>
    </body>
</html>