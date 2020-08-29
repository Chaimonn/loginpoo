<html>
<main>
<div class="card-heading"><h1>Notícias</h1></div>

<?php
if(isset($noticias)){
    foreach($noticias AS $noticia){
    ?>
        <div class="card" style="width: 18rem;">
        <img src="<?php echo $noticia -> imagem ?>" alt="Imagem da Noticia" class="card-img-top">
        <div class="card-body">
        <h5 class="card-title"><?php echo $noticia->titulo ?></h5>
        <p class="card-text"> <?php echo $noticia -> descricao ?></p>
        <a href="<?php echo HOME_URI?>noticia/ver/<?php echo $noticia->id?>" class="btn btn-primary">Ver Mais</a>
        </div>
        </div>
    <?php
    }
}
?>
    
</main>
</html>

