<main>
<div class="noticia">
<div class="card mb-3">
    <img id="noticiavermais" src="<?php echo $noticia->imagem?>" alt="Imagem da Noticia" class="card-img-top">
    <div class="card-body bg-info">
    <h4 class="card-title text-light"><?php echo $noticia->titulo ?></h4>
    <p class="card-text text-dark"><?php echo $noticia->descricao; ?></p>
    <p class="card-text"><small class="text-warning"><?php echo $noticia->data ?></small></p>
   
    <a href="<?php 
        echo HOME_URI;
    ?>noticia/delete/<?php 
        echo $noticia->id;
    ?>" class="btn btn-danger btn-sm"><i class="material-icons">delete_forever</i></a>
    </p>
</div>
</div>

        <h4>Comentários:</h4>
    </div>

    <div id="divComentarios">

    <?php
    if($noticia->comentarios != false){
            /**
            * Excluir Comentário
            * @access public
            * @since 27/08/2020
            */
        foreach ($noticia->comentarios AS $comentario){
            if(isset($_SESSION["user"])){
                if($_SESSION["user"]->id==$comentario->id_usuario){
                    $botao = '<a id="excluircomentario" class="btn btn-danger" href="'.HOME_URI.'comentario/delete/'.$comentario->id.'">Excluir Comentário</a>';
                }
                else{
                    $botao = "";
                }
            }
                else{
                    $botao = "";
                }
    
                echo '
                <div class="divComentario">
                    <div id="divAutorComent" class="bg-info">
                        <h5>'.$comentario->autor.$botao.'</h5>
                    </div>
                    <div id="divDescComent">
                        <p>'.$comentario->comentario.'</p>
                    </div>
                </div>
                  ';
            }
    }  
    ?>
</div>
    </main>

