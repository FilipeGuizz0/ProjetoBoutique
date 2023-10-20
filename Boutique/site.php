<?php
$conectar = mysql_connect('localhost','root','');
$banco    = mysql_select_db('boutique');

 //--- pesquisar fragrancia para select -------

$sql_fragrancia      = "SELECT codigo, tipo FROM fragrancia ";
$pesquisar_fragrancia = mysql_query($sql_fragrancia);

 //--- pesquisar genero para select -------

$sql_genero       = "SELECT codigo, sexo FROM genero ";
$pesquisar_genero = mysql_query($sql_genero);

 //--- pesquisar marcas para select -------

$sql_marcas       = "SELECT codigo, nome FROM marcas ";
$pesquisar_marcas = mysql_query($sql_marcas);

$vazio = 0;
//---------------------------------------------------------------------------------------


if(!empty($_POST['pesq_fragrancia']))
{
    $fragrancia  = (empty($_POST['codfragrancia']))? 'null' : $_POST['codfragrancia'];

    if ($fragrancia <> '')
    {
     $sql_modelos = "SELECT modelos.fotochamada, modelos.nome,modelos.conteudo,modelos.valor
                      FROM modelos, fragrancia
                      WHERE modelos.codfragrancia = fragrancia.codigo and
                      modelos.codfragrancia ='$fragrancia'";
     
     $seleciona_modelos = mysql_query($sql_modelos);
     
     
     $vazio = 1;
     }
}

if(!empty($_POST['pesq_genero']))
{
    $genero  = (empty($_POST['codgenero']))? 'null' : $_POST['codgenero'];

    if ($genero <> '')
    {
     $sql_modelos = "SELECT modelos.fotochamada, modelos.nome,modelos.conteudo,modelos.valor
                      FROM modelos, genero
                      WHERE modelos.codgenero = genero.codigo and
                      modelos.codgenero ='$genero'";


     $seleciona_modelos = mysql_query($sql_modelos);
     
     
     $vazio = 1;
     }
}

if(!empty($_POST['pesq_marca']))
{
    $marca  = (empty($_POST['codmarca']))? 'null' : $_POST['codmarca'];

    if ($marca <> '')
    {
     $sql_modelos = "SELECT modelos.fotochamada, modelos.nome, modelos.conteudo, modelos.valor
                      FROM modelos, marcas
                      WHERE modelos.codmarca = marcas.codigo and
                      modelos.codmarca ='$marca'";

     $seleciona_modelos = mysql_query($sql_modelos);
     
    
     $vazio = 1;
     }
}



?>

<html>
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="stylee.css" />
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <title>Coltorti Boutique</title>
</head>
<body>
    <div id="topo">
        <a href='site.php'>
            <img src="logo.png" class="logo">
</a>
        <img src="carrinho.png" class="carrinho">
    </div>
    <div id="meio">
        <div id="pesquisa">
        <div class="tituloPesquisa">
                -Perfumes-
                <br><br> 
                <div class="textoPesquisa">
                    <hr>
                    -Categorias- 
                </div>
            </div>
            <div id="form">
            <br><br>
            
            <table>
                <tr>
                    <td width=400 height=20>
                        <form name="genero" method="post" action="site.php"> 
                            genero: <br><select name="codgenero" id="codgenero">
                                <option value=0 selected="selected">Selecione genero ...</option>
                                <?php
                                    if(mysql_num_rows($pesquisar_genero) == 0)
                                    {
                                    echo '<h1>Sua busca por genero n�o retornou resultados ... </h1>';
                                    }
                                    else
                                    {
                                    while($resultado = mysql_fetch_array($pesquisar_genero))
                                    {
                                        echo '<option value="'.$resultado['codigo'].'">'.
                                                    utf8_encode($resultado['sexo']).'</option>';
                                    }
                                    }
                                    ?>
                                </select>
                                <br>
                                <input type="submit" name="pesq_genero" id="pesq_genero" value="Pesquisar">
                                <br>
                                </form>
                        </form>
                    <td>
                </tr>
                
                <tr>
                    <td width=400 height=20>
                        <form name="marca" method="post" action="site.php"> 
                            marcas: <br><select name="codmarca" id="codmarca">
                                <option value=0 selected="selected">Selecione o marca ...</option>
                                    <?php
                                    if(mysql_num_rows($pesquisar_marcas) == 0)
                                    {
                                    echo '<h1>Sua busca por marcas n�o retornou resultados ... </h1>';
                                    }
                                    else
                                    {
                                    while($resultado = mysql_fetch_array($pesquisar_marcas))
                                    {
                                        echo '<option value="'.$resultado['codigo'].'">'.
                                                    utf8_encode($resultado['nome']).'</option>';
                                    }
                                    }
                                    ?>
                                </select>
                                <br>
                                <input type="submit" name="pesq_marca" id="pesq_marca" value="Pesquisar">
                                <br>
                        </form>
                    <td>
                </tr>
                
                <tr>
                    <td width=400 height=20>
                        <form name="fragrancia" method="post" action="site.php"> 
                            fragrancia: <br><select name="codfragrancia" id="codfragrancia">
                                <option value=0 selected="selected">Selecione a fragrancia...</option>
                                    <?php
                                    if(mysql_num_rows($pesquisar_fragrancia) == 0)
                                    {
                                    echo '<h1>Sua busca por fragrancia n�o retornou resultados ... </h1>';
                                    }
                                    else
                                    {
                                    while($resultado = mysql_fetch_array($pesquisar_fragrancia))
                                    {
                                        echo '<option value="'.$resultado['codigo'].'">'.
                                                    utf8_encode($resultado['tipo']).'</option>';
                                    }
                                    }
                                    ?>
                                </select>
                                <br>

                                <input type="submit" name="pesq_fragrancia" id="pesq_fragrancia" value="Pesquisar">
                        </form>
                    </td>
                </tr>
                </table>
            </div>
        </div>    
        <div id="resultado">
                <?php      
                if ($vazio == 0)
                {
                $sql_modelos = "select fotochamada, nome, conteudo, valor from modelos
                                ORDER BY codigo LIMIT 4";
                
                $seleciona_modelos = mysql_query($sql_modelos);
                ?>      
                <b><h1>Catalogo: </h1></b><br>
                <table border=0 width= 900 height=420 align=center>        
                <?php
                while($res = mysql_fetch_array($seleciona_modelos))
                    {
                        echo '<td width=100 height=200 align=center>'.'<img src="'.$res['fotochamada'].'"  height=190 width=90 />'.'<br><br>';
                        echo $res['nome'].'</td>';
                    }
                }
                else
                {
                echo "<br>";
                echo '</table>';
                echo "<b><h1>Catalogo: </h1></b>"."<br><br>";
                echo '<table border=0 width= 600 height=300 align=center>';
                while($res = mysql_fetch_array($seleciona_modelos))
                        {
                            echo '<td width=100 height=200 align=center> '.'<img src="'.$res['fotochamada'].'"  height="190" width="90" />'.'</a><br><br>';
                            echo $res['nome'].'<br>'.$res['conteudo'].'<br>'.$res['valor'].'</td>';
                        }
                
                }
                
                ?>
            
            </table> 
        </div>
    </div>
    <div id="Baixo">
    © Desenvolvido por Filipe Guizzo
    </div>
</body>
</html>
