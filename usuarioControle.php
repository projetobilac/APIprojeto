<?php
include_once "usuario.php";
include_once "usuarioDao.php";
header('Content-Type: application/json; charset=utf-8');  

$metodo = $_SERVER['REQUEST_METHOD'];

if($metodo=="GET"){

    $UsuarioDao = new UsuarioDao();

    if(isset($_GET['id'])){

        $UsuarioDao->usuarioPorId( $_GET['id']);

    }else{

        $UsuarioDao->listarUsuario();

    }


} else if($metodo=="POST"){

    
    $json = file_get_contents('php://input');
    $usuario = json_decode($json);
    $UsuarioDao = new UsuarioDao();
    $Usuario = new Usuario($usuario);
    echo $UsuarioDao->inserirUsuario($Usuario);
   
 
} else if($metodo=="PUT"){

   
    $json = file_get_contents('php://input');
    $usuario = json_decode($json);
    $UsuarioDao = new UsuarioDao();
    $Usuario = new Usuario($usuario);
    echo $UsuarioDao->atualizarUsuario($Usuario);
    

}else if($metodo=="DELETE" || $metodo=="PATCH" ){

   
    $json = file_get_contents('php://input');
    $usuario = json_decode($json);
    $UsuarioDao = new UsuarioDao();
    $Usuario = new Usuario($usuario);
    echo $UsuarioDao->apagarUsuario($Usuario);
    

   

}




?>