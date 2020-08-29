<?php

/**
 * Class Inicio
 * Classe desenvolvida durante as aulas com o professor Candido Luciano de Farias do curso técnico de informática.
 * @author Saimon A. Hunger
 * @version 1.0
 * @access public
 * @copyright GPL 2020, INFO63B
 */


/**
     * Função para retornar a página inicial.
     * @access public
     * @since 10/08/2020
*/   
class Inicio{
    public function index(){
        include HOME_DIR."view/paginas/home.php";
    }
}

?>