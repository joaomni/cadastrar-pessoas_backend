<?php
	try {
        $conexao = mysqli_connect('localhost','id10375306_xuao','12345','id10375306_pessoa');
                                //servidor , usuario banco, senha, nome do banco
    
        $id = $_GET['id'];
        
        $query = "DELETE FROM tb_pessoa WHERE cd_pessoa = $id";
        
        mysqli_query($conexao,$query);

        echo "Pessoa removida do sistema";

    } catch (Exception $e ) {
        echo "Erro ao deletar: ".$e;
    }

?>