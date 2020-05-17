<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM usuarios");
if($sql->rowCount() > 0) {
    //CONDICIONAL PARA SABER SE EXISTE DADOS NO BANCO
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?> 

<a href="add.php">ADICIONAR USUÁRIO</a>

<table border = "1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th> 
        <th>AÇOES</th> 
    </tr>

    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?=$usuario['id'];?></td>
            <td><?=$usuario['nome'];?></td>
            <td><?=$usuario['email'];?></td>
            <td>
                <a href="editar.php?id=<?=$usuario['id'];?>">[ Editar ]</a>
                <a href="excluir.php?id=<?=$usuario['id'];?>" onclick="return confirm('Tem certeza que quer excluir o item?')">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>