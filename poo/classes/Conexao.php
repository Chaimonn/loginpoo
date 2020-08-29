<?php

/**
 * Class Conexao
 * Classe desenvolvida durante as aulas com o professor Candido Luciano de Farias do curso técnico de informática.
 * @author Saimon A. Hunger
 * @version 1.0
 * @access public
 * @copyright GPL 2020, INFO63B
 */

class Conexao {
    public static $instance;

    /**
     * Conexão dos códigos html/php com o Banco de Dados.
     * @access public
     * @since 09/08/2020
*/
    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance =new PDO(SGBD.":host=".HOST_DB.";dbname=".DB."",USER_DB,PASS_DB);
        }
        return  self::$instance;
    }
}