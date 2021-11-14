<?php


class Usuario
{
###Autenticacion##
    public function login()
    {
        //validar + registrar login
        $usuEmail=$_POST['usuEmail'];
        $usuClave=$_POST['usuClave'];

        $link=Conexion::conectar();
        $sql="SELECT usuNombre FROM usuarios WHERE usuEmail= :usuEmail AND usuClave= :usuClave";

        $stmt=$link->prepare($sql);

        $stmt->bindParam(':usuEmail',$usuEmail,PDO::PARAM_STR);
        $stmt->bindParam(':usuClave',$usuClave,PDO::PARAM_STR);

        $stmt->execute();

        $cantidad=$stmt->rowCount();//es como cuando haciamos mysqli_num_rows con mysql
        if($cantidad == 0){
            //redireccion
            header('location: formlogin.php?error=1');
        }else{
            $_SESSION['login']=1;
            $datosUsuario=$stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['usuNombre']=$datosUsuario['usuNombre'];
            //redireccion admin
            header('location: admin.php');

        }

    }

    public function logout()
    {
        session_destroy();
        header('location: formLogin.php');
    }

    public function autenticar()
    {
        if(!isset($_SESSION['login'])){
            header('location :formLogin.php?error=1');
        }
    }
}