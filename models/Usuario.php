<?php 



class Usuario extends Conectar{

    public function login()
    {
        $conectar=parent::conexion();
        parent::set_names();

        if(isset($_POST["enviar"]))
        {
            $correo= $_POST["usu_correo"];
            $pass= $_POST["usu_pass"];

            if(empty($correo) and empty($pass))
            {
                header("Location:".conectar::ruta()."index.php?m=2");
                exit();
            }
            else
            {
                $sql="SELECT * FROM tm_usuario WHERE usu_correo=? and usu_pass=? and estado=1";
                $stm=$conectar->prepare($sql);
                $stm=bindValue(1, $correo);
                $stm=bindValue(2, $pass);
                $stm->execute();
                $resultado =$stmt->fetch();
                if(is_array($resultado) and count($resultado)>0)
                {
                    $_SESSION["usu_id"]=$resultado["usu_id"];
                    $_SESSION["usu_nombre"]=$resultado["usu_nombre"];
                    $_SESSION["usu_ape"]=$resultado["usu_ape"];
                    
                    header("Location:" . Conectar::ruta()."views/Home/");
                    exit();
                }
                else
                {
                    header("Location:" . Conectar::ruta()."index.php?m=1");
                    exit();
                }

            
            }

        }
    }
}






?>