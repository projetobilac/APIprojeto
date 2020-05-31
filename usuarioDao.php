<?php
include_once "conexao.php";
include_once "usuario.php";

class UsuarioDao {
  //public $Usuario;  
  public $con;
  

function __construct() {
    
    $conexao = new Conexao();
    $this->con = $conexao->getCon();
   // $this->Usuario = $Usuario;


}

function __destruct() {
    $this->con->close();
  }


function listarUsuario() {
    
    
    $sql = "SELECT * FROM usuario";
    $result = $this->con->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
       // $pontos = array("Zé"=>"11", "José"=>"4", "Zéca"=>"22");

       $usuarios = array();
       
        while($row = $result->fetch_assoc()) {

            $usuario = ["id"=>$row["id"], "nome"=>$row["nome"], "email"=>$row["email"], "endereco"=>$row["endereco"], "telefone"=>$row["telefone"], "senha"=>$row["senha"], ["tipo"=>$row["tipo"]] ];
           // echo "id: " . $row["id"]. " - Nome: " . $row["nome"]. " Telefone" . $row["telefone"]. " email" . $row["email"]. "<br>"; //json
            array_push($usuarios,$usuario);
        }
        
        $dados = array('usuarios' => $usuarios);
        
        echo  json_encode($dados);

          //echo  json_encode($usuarios);
        

    } else {
        echo "0 results";
    }


}



function usuarioPorId($id) {
    
    
    $sql = "SELECT * FROM usuario Where id=$id";
    $result = $this->con->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
       // $pontos = array("Zé"=>"11", "José"=>"4", "Zéca"=>"22");

       //$usuarios = [];
       
        while($row = $result->fetch_assoc()) {
      
                $value = json_encode($row);        
                echo($value);
        }
       // echo  json_encode($usuarios);

    } else {
        $status=["status"=>"0 Resultado"];
        echo json_encode($status);
    }
    

}




function inserirUsuario($Usuario) {
 
    $sql = "INSERT INTO usuario (nome, email, endereco, telefone, senha, tipo)
    VALUES ('".$Usuario->getNome()."', '".$Usuario->getEmail()."', '".$Usuario->getEndereco()."', '".$Usuario->getTelefone()."', '".$Usuario->getSenha()."', '".$Usuario->getTipo()."')"; //ACRESCENTAR getTipo '".$Usuario->getTipo()."'

    if ($this->con->query($sql) === TRUE) {
        $status=["status"=>"sucesso"];
        
    } else {
        $status=["status"=>"error:". $this->con->error];
        
    }

    return json_encode($status);

}


function apagarUsuario($Usuario) {
 
    $sql = "DELETE FROM usuario WHERE id ='".$Usuario->getId()."'";

    if ($this->con->query($sql) === TRUE) {
        $status=["status"=>"sucesso"];
        
    } else {
        $status=["status"=>"error:". $this->con->error];
        
    }

    return json_encode($status);
}



function atualizarUsuario($Usuario) {

    
    $sql = "UPDATE usuario SET nome='".$Usuario->getNome()."', email='".$Usuario->getEmail()."', endereco='".$Usuario->getEndereco()."', telefone='".$Usuario->getTelefone()."', senha='".$Usuario->getSenha()."', tipo='".$Usuario->getTipo()."' WHERE id='".$Usuario->getId()."'";

    if ($this->con->query($sql) === TRUE) {
        $status=["status"=>"sucesso"];
    } else {
        $status=["status"=>"error:". $this->con->error];
    }
    return json_encode($status);
}





}



?>