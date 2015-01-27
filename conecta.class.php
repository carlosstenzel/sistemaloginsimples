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


/*

class para conectar ao banco de dados no mysql
----------------------------------------------------
exemplo

$Conecta = new conectaBD();

//consulta SQL no resultado
$SQL = 'SELECT * FROM tabela';
$Result = $Conecta->ConsultarDados($SQL);

//inserir, deletar, update,
//retorna true se ocorreu tudo certo

$Result = $Conecta->InserirDados($SQL_INSERT);

if($Result){
 echo 'Operação funcionou';
}else{
 echo 'Ocorreu um erro, verique o SQL';
}

*/

class conectaBD{
    
    private $host = 'localhost';
    private $user = 'user';
    private $senha = 'senha';
    private $banco = 'banco';
    private $conecta;
    private $ba;
    public $sql;
    public $query;
  
    
    function InserirDados($query){
        $conecta = @mysql_connect($this->host, $this->user,$this->senha);
        if(!$conecta){die('Erro ao tentar conectar ao banco, verifique hostname, user, senha');}
        $ba =@mysql_select_db($this->banco, $conecta);
        if(!$ba){die('Erro ao tentar conectar ao banco de dados, verifique nome do banco');}
        $sql = @mysql_query($query, $conecta);
        return (!$sql) ? false : true;
        mysql_close($conecta);
    }
    
    function ConsultarDados($query){
        $conecta = @mysql_connect($this->host, $this->user, $this->senha);
        if(!$conecta){die('Erro ao tentar conectar ao banco, verifique hostname, user, senha');}
        $ba =@mysql_select_db($this->banco, $conecta);
        if(!$ba){die('Erro ao tentar conectar ao banco de dados, verifique nome do banco');}
        $sql = mysql_query($query, $conecta);
        return $sql;
        mysql_close($conecta);
    }
}
?>
