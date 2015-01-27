<?php
ob_start();
session_unset();

/*  ##           **   ##
   ##           **     ##
  ##           **       ##
 ##   ---  ----  ---  ----  -  -   -   --   --  ---  ---- ---
##    |    |  |  |  | |---  |--|  /_\  | \ / |  |__| |--- |__|
 ##   ---  ----  ---  ----  -  - -   - -  -  -  -    ---- - \
  ##       **           ##  {.com}
   ##     **           ##
    ##   **          ##  */

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="style.css" rel="stylesheet" type="text/css" media="all" />
  </head>
  <body>
 
   <?php
   
   if(isset($_POST['user'])) {
     $user = strip_tags(trim($_GET['nome']));
     $senha = strip_tags(trim($_GET['senha']));
     

     include('conecta.php');     
     
     $retorno = Loga($user, $senha);
     if($retorno){
        header("Location: admin.php");
     }else{
        echo '<script>alert("Erro"); </script>';  
     }  
   }
   
   ?>
  
    <form action="" method="post">
     <label>Usuario</label><br />
     <input type="text" name="user" placeholder="Seu usuario" required /><br />
     <label>Senha</label><br />
     <input type="password" name="senha" placeholder="Sua senha" required /><br />
     <input type="submit" value="Logar" /><br />
    </form>

 <?php ob_end_flush(); ?>
  </body>
</html>
