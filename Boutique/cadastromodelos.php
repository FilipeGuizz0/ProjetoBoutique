<?php
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db('boutique');

 //--- pesquisar genero para select -------
 
 $sql_genero       = "SELECT codigo, sexo FROM genero ";
 $pesquisar_genero = mysql_query($sql_genero);

 //--- pesquisar categorias para select -------
 
$sql_marcas       = "SELECT codigo, nome FROM marcas ";
$pesquisar_marcas = mysql_query($sql_marcas);

 //--- pesquisar colunistas para select -------

$sql_fragrancia      = "SELECT codigo, tipo FROM fragrancia ";
$pesquisar_fragrancia = mysql_query($sql_fragrancia);

// --------------------------------

if (isset($_POST['gravar']))
{
$codigo       = $_POST['codigo']; 
$nome       = $_POST['nome'];
$descricao       = $_POST['descricao'];
$codmarca  =$_POST['codmarca'];
$codgenero = $_POST['codgenero'];
$codfragrancia = $_POST['codfragrancia'];
$valor        = $_POST['valor'];
$conteudo     = $_POST['conteudo'];
$fotochamada  = $_FILES['fotochamada']; // campos fotos
$foto1        = $_FILES['foto1']; // campos fotos


$error = 0;


if(!preg_match("/^image\/(jpg|jpeg|png|bmp)$/",$fotochamada['type'])){
    $error[1] = "NAO é uma imagem...";
}

if ($error == 0)
{
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$fotochamada['name'],$ext);
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i",$foto1['name'],$ext);

  	$nome_imagem  = $fotochamada['name'];
    $nome_imagem1 = $foto1['name'];

    $caminho_imagem  = "fotos/".$nome_imagem;
    $caminho_imagem1 = "fotos/".$nome_imagem1;

    move_uploaded_file($fotochamada['tmp_name'],$caminho_imagem);
	move_uploaded_file($foto1['tmp_name'],$caminho_imagem1);


$sql = "INSERT INTO modelos (codigo,nome,codmarca,codgenero,codfragrancia,descricao,valor,conteudo,fotochamada,foto1)
        VALUES ('$codigo','$nome','$codmarca','$codgenero','$codfragrancia','$descricao','$valor','$conteudo','$caminho_imagem','$caminho_imagem1')";

echo $sql;
$resultado = mysql_query($sql);
echo $resultado;
if ($resultado)
{
   echo 'Dados cadastrados com Sucesso';
}
else
{  echo 'Erro ao cadastrar os dados...'; }

}
}

if (isset($_POST['alterar']))
        {
            $codigo       = $_POST['codigo']; 
            $nome       = $_POST['nome'];
            $descricao       = $_POST['descricao'];
            $codmarca  =$_POST['codmarca'];
            $codgenero = $_POST['codgenero'];
            $codfragrancia = $_POST['codfragrancia'];
            $valor       = $_POST['valor'];
            $conteudo       = $_POST['conteudo'];
            $fotochamada        = $_FILES['foto1']; // campos fotos
            $foto1        = $_FILES['foto1']; // campos fotos

            //comando MYSQL para alterar no banco
            $sql = "update modelos set valor= '$valor', descricao= '$descricao', fotochamada= '$fotochamada',
                    foto1 = '$foto1'
                    where codigo = '$codigo'";
            
            //executar o comando SQL no banco de dados
            $resultado = mysql_query($sql);
            
            //verificar se alterou (sem erros)
            if ($resultado)
            {
                echo "Dados alterados com sucesso!";
            }
            else
            {
                echo "ERRO ao alterar...!";
            } 
            //encerrar o botão gravar
        }
        //se escolher a opção EXCLUIR
        if (isset($_POST['excluir']))
        {
            $codigo       = $_POST['codigo']; 
            $nome       = $_POST['nome'];
            $descricao       = $_POST['descricao'];
            $codmarca  =$_POST['codmarca'];
            $codgenero = $_POST['codgenero'];
            $codfragrancia = $_POST['codfragrancia'];
            $valor       = $_POST['valor'];
            $conteudo       = $_POST['conteudo'];
            $fotochamada        = $_FILES['foto1']; // campos fotos
            $foto1        = $_FILES['foto1']; // campos fotos

            //comando MYSQL para alterar no banco
            $sql = "delete from modelos
                    where codigo = '$codigo'";
            
            //executar o comando SQL no banco de dados
            $resultado = mysql_query($sql);
            
            //verificar se alterou (sem erros)
            if ($resultado)
            {
                echo "Dados excluidos com sucesso!";
            }
            else
            {
                echo "ERRO ao excluir...!";
            } 
            //encerrar o botão gravar
        }

        if (isset($_POST['pesquisar']))
        {
            $sql = "select * from modelos";
            $resultado = mysql_query($sql);
            
            echo $sql;
            //verifica o resultado da pesquisa (0 ou 1)
            if (mysql_num_rows($resultado) == 0)
            {
                echo "Sua pesquisa não retornou resultados..."; 
            }
            else
            {
                echo "Resultado da pesquisa dos modelos: "."<br>";
                //mostrar na tela os valores encontrados
                while($modelos = mysql_fetch_array($resultado))
                {
                    echo "Codigo: ".$modelos['codigo']."<br><br>".
                    "Nome: ".$modelos['nome']."<br><br>".
                    "Descrição: ".$modelos['descricao']."<br><br>".
                    "Cod Marcas: ".$modelos['codmarcas']."<br><br>".
                    "Cod Genero: ".$modelos['codgenero']."<br><br>".
                    "Cod Fragrancia: ".$modelos['codfragrancia']."<br><br>".
                    "Valor: ".$modelos['valor']."<br><br>".
                    "Conteudo: ".$modelos['conteudo']."<br><br>".
                    "Foto Chamada: "."<br>".
                    utf8_encode('<img src="'.$modelos['fotochamada'].'" heigth="100" width="150" />')."<br><br>".
                    "Fotos      : "."<br>".
                    utf8_encode('<img src="'.$modelos['foto1'].'" heigth="100" width="150" />')."<br>";
                }
            }                          

        }

        
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro Colunistas</title>
</head>
<body>
    <form name="formulario" method="post" action="cadastromodelos.php"  enctype="multipart/form-data">
        <h1>Cadastro dos Modelos - Boutique 
        </h1><br><br>
        Codigo: <input type ="text" name="codigo" id="codigo" size="10">
        <br><br>
        Nome: <input type ="text" name="nome" id="nome" size="50">
        <br><br>
        Descrição: <br><textarea name="descricao" id="descricao" rows=6 cols=70></textarea>
        <br><br>
        Cod Marcas:
        <select name="codmarca" id="codmarca">
        <option value=0>Selecinar a Marcas</option>
        <?php
        if(mysql_num_rows($pesquisar_marcas) <> 0)
        {
            while($marcas= mysql_fetch_array($pesquisar_marcas))
            {
                echo '<option value="'.$marcas['codigo'].'">'.
                                       $marcas['nome'].'</option>';
            }
        }
        ?>
        </select>
        <br><br>
        Cod Genero:
        <select name="codgenero" id="codgenero">
        <option value=0>Selecinar a Genero</option>
        <?php
        if(mysql_num_rows($pesquisar_genero) <> 0)
        {
            while($genero= mysql_fetch_array($pesquisar_genero))
            {
                echo '<option value="'.$genero['codigo'].'">'.
                                       $genero['sexo'].'</option>';
            }
        }
        ?>
        </select>
        <br><br>
        Cod fragrancia:
        <select name="codfragrancia" id="codfragrancia">
        <option value=0>Selecinar o fragrancia</option>
        <?php
        if(mysql_num_rows($pesquisar_fragrancia) <> 0)
        {
            while($fragrancia= mysql_fetch_array($pesquisar_fragrancia))
            {
                echo '<option value="'.$fragrancia['codigo'].'">'.
                                       $fragrancia['tipo'].'</option>';
            }
        }
        ?>
        </select>
        <br><br>
        Valor: <input type ="text" name="valor" id="valor" size="10">
        <br><br>
        conteudo: <input type ="text" name="conteudo" id="conteudo" size="50">
        <br><br>
        Foto Chamada: <input type ="file" name="fotochamada" id="fotochamada" size="50">
        <br><br>
        Foto1: <input type ="file" name="foto1" id="foto1" size="50">
   

        <br><br> 
        <input type="submit" name="gravar" id="gravar" value="Gravar">
        <input type="submit" name="alterar" id="alterar" value="Alterar">
        <input type="submit" name="excluir" id="excluir" value="Excluir">
        <input type="submit" name="pesquisar" id="pesquisar" value="Pesquisar">
    </form>
</body>
</html>