<?php

/*  ##           **   ##
   ##           **     ##
  ##           **       ##
 ##   ---  ----  ---  ----  -  -   -   --   --  ---  ---- ---
##    |    |  |  |  | |---  |--|  /_\  | \ / |  |__| |--- |__|
 ##   ---  ----  ---  ----  -  - -   - -  -  -  -    ---- - \
  ##       **           ##  {.com}
   ##     **           ##
    ##   **          ##  */



include_once("conecta.class.php");

/*

tabela login
---------------
cod int
nome varchar,
senha varchar
---------------

*/


function Loga($user, $senha) {

    $SQL = "SELECT nome FROM login WHERE nome ='$user' AND senha = '$senha' LIMIT 1";
    $re = $this->CONECTA->ConsultarDados($SQL);
        
    if(mysql_num_rows($re)>0){
         $Linha = mysql_fetch_object($re);
         session_start();
         $_SESSION['SISTEMATra'] = $Linha->nome;
         $this->user = $Linha->nome;
         setcookie('cookieSISTEMA', true, time()+3000);
         return TRUE;
    }else{
         return FALSE;
    }

}
/*

Verifica se usuario esta logado e se é valido seu login

*/
function Verifica(){
   if(!isset($_SESSION['SISTEMATra']) or !isset($_COOKIE['cookieSISTEMA'])){
        expulsa();
   }else{
        setcookie('cookieSISTEMA', true, time()+3000);
   }
}

/*====================================
 *  expulsa user 
======================================*/
function expulsa(){
    unset($_SESSION['SISTEMATra'], $_COOKIE['cookieSISTEMA']);
    session_destroy();
    header("Location: index.php");
}

