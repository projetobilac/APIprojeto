<?php
class Usuario {
  private $id;  
  private $nome;
  private $email;
  private $endereco;
  private $telefone;
  private $senha;
  private $tipo; /// acrescentei essa opção

  function __construct($usuario) {
    
    
    if(isset($usuario->id))
      $this->id = $usuario->id;
    
    $this->nome = $usuario->nome; 
    $this->email = $usuario->email; 
    $this->endereco = $usuario->endereco; 
    $this->telefone = $usuario->telefone; 
    $this->senha = $usuario->senha; 
    $this->tipo = $usuario->tipo; 
  }

  function getId() {
    return $this->id;
       
  }
  
  function getNome() {
    return $this->nome;
       
  }

 function getEmail() {
    return $this->email;
  }
  
    
 function getEndereco() {
    return $this->endereco;
  }
  
   function getTelefone() {
    return $this->telefone;
  }
  
   function getSenha() {
    return $this->senha;
  }
  
  function getTipo() {
    return $this->tipo;
  }
}




?>