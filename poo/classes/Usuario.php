<?php

/**
 * Class Usuario
 * Classe desenvolvida durante as aulas com o professor Candido Luciano de Farias do curso técnico de informática.
 * @author Saimon A. Hunger
 * @version 1.0
 * @access public
 * @copyright GPL 2020, INFO63B
 */

class Usuario{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNome($nome){
        $this->nome=$nome;
    }
    
    public function getNome(){
        return $this->nome;
    }

    public function setEmail($email){
        $this->email=$email;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function setSenha($senha){
        $this->senha=$senha;
    }
    
    public function getSenha(){
        return $this->senha;
    }

/**
     * Função que é chamada caso o usuário não esteja logado no site.
     * @access public
     * @since 12/08/2020
*/  
    public function index(){
        if (!isset($_SESSION['user'])){
            $this->login();
        }
        else {
            $this->listar();
        }

    }

/**
     * Página de usuários.
     * @access public
     * @since 13/08/2020
*/  
    public function listar(){
        include HOME_DIR."view/paginas/usuarios/listar.php";
    }


    /**
     * Criação de usuários.
     * @access public
     * @since 13/08/2020
*/  
    public function criar(){
        include HOME_DIR."view/paginas/usuarios/form_usuario.php";
    }

/**
     * Salvar usuário.
     * @access public
     * @since 13/08/2020
*/  
    public function salvar(){
        $conexao = Conexao::getInstance();
        $sql = 'INSERT INTO usuario (nome, email, senha) VALUES ("'.$_POST['nomeSalvar'].'","'.$_POST['emailSalvar'].'","'.md5('123').'")';
        if ($conexao->query($sql)){
        }
        else{
        }
    }

/**
     * Exibe o id do usuário.
     * @access public
     * @since 13/08/2020
*/  
    public function exibir($id){
        echo "O id do usuario é".$id;
    }

    public function login(){
        include HOME_DIR."view/paginas/usuarios/login.php";
    }

    public function senha(){
        include HOME_DIR."view/paginas/usuarios/senha_padrao.php";
    }

    /**
     * Deletar usuário.
     * @access public
     * @since 13/08/2020
*/  
    public function deletar($id){
        $conexao = Conexao::getInstance();
        $sql = 'DELETE FROM usuario WHERE id='.$id;
        if ($conexao->query($sql)){
            
        }
        $this->listar();
    }

    /**
     * Alterar senha do usuário.
     * @access public
     * @since 13/08/2020
*/  
    public function trocar_senha(){
        $conexao = Conexao::getInstance();
        $sql = 'UPDATE usuario SET senha = "'.md5($_POST['senhaTrocar']).'" WHERE id = '.$_SESSION['user']->id;
        if ($conexao->query($sql)){
            
        }
    }

    /**
     * Autenticação de Email e Senha do Usuário.
     * @access public
     * @since 13/08/2020
*/  

    public function autenticar(){
        $conexao = Conexao::getInstance();

        $email = $_POST['email'];

        $sql = 'SELECT senha FROM usuario WHERE email ="'.$email.'"';

        $resultado = $conexao->query($sql);

        $senha = $resultado->fetch(PDO::FETCH_OBJ);

            if (md5($_POST['senha']) === $senha -> senha){

                $sql = 'SELECT * FROM usuario WHERE email="'.$email.'"';
                $resultado = $conexao->query($sql);

                $_SESSION['user'] = $resultado -> fetch(PDO::FETCH_OBJ);

                if ($_SESSION['user'] -> senha == md5('123') ){
                
                    $this->senha();
                }

                else{
                    header('Location:'.HOME_URI);
                }

            }

            else{
                $this->login();
            }  

        }

/**
     * Sair do usuário conectado.
     * @access public
     * @since 13/08/2020
*/  
    public function logout(){
        session_destroy();
        header('Location:'.HOME_URI);
    }

/**
     * Editar o usuário.
     * @access public
     * @since 13/08/2020
*/  
    public function editar($usuario){
        list($id, $email, $nome) = explode('!', $usuario);
        $conexao = Conexao::getInstance();
        $sql = 'UPDATE usuario SET nome = "'.$nome.'", email = "'.$email.'" WHERE id = '.$id;
        if ($conexao->query($sql));
        header("location:".HOME_URI."usuario");
    }

}