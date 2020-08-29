
<main>
    <?php
            echo '<a href="'.HOME_URI.'usuario/criar" class="btn btn-primary">ADICIONAR USUÁRIO</a>';
    ?>
<table class="table">
    <thead>
        <tr>
            <th>#ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $conexao = Conexao::getInstance();
        $resultado = $conexao->query('SELECT * FROM usuario');
        echo '<h3>Só professores e administradores podem ver os usuarios cadastrados, e só administradores podem excluir contas</h3>';
        while($usuarios = $resultado->fetch(PDO::FETCH_OBJ)){

            if($_SESSION['user'] -> id != $usuarios -> id){
                $botoes = '<button id="botaozinho" onclick = "editar('.$usuarios -> id.')"class="btn btn-primary btn-sm" id="botaoAzul"><i class="material-icons">build</i></button>';

                $botoes .= '<a id="botaozinho" href="'.HOME_URI.'usuario/deletar/'.$usuarios->id.'" class="btn btn-danger btn-sm"> <i class="material-icons">delete_forever</i> </a>';
            }
            else{
                $botoes = '';
            }
            echo
            '
            <tr>
                <td>'.$usuarios->id.'</td>
                <td>'.$usuarios->nome.'</td>
                <td>'.$usuarios->email.'</td>
                <td>'.$botoes.'</td>
            </tr>
            ';

        }
    ?>
    </tbody>
</table>
    <div id="formula">
    <form action="<?php echo HOME_URI;?>usuario/editar" method="POST">
        <legend id="legenda">Editar</legend>
        <div class="form-group">
            <input type="hidden" id="enviaridusuario">
            <label for="inputEmailTrocar">Endereço de Email</label>
            <input type="email" name="emailSalvar" class="form-control" id="inputEmailTrocar" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="inputNomeTrocar">Nome Completo</label>
            <input type="text" name="nomeSalvar" class="form-control" id="inputNomeTrocar" placeholder="Nome Completo">
        </div>
        <a id="botaoenviar" class="btn btn-primary">Enviar</a>
        <a class="btn btn-danger" href="<?php echo HOME_URI;?>usuario">Voltar</a>

    </form>
    </div>
</main>