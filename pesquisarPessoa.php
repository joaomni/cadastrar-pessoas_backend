<?php
    try {
        $conexao = mysqli_connect('localhost','id10375306_xuao','12345','id10375306_pessoa');
                                //servidor , usuario banco, senha, nome do banco
        $id = $_GET['id'];
        
        $query = "SELECT * FROM tb_pessoa WHERE cd_pessoa = $id";
        
        $resultado = mysqli_query($conexao,$query);
        
        while($linha = mysqli_fetch_assoc($resultado)){
            $registro = array(
                'pessoas'=>array(
                    'codigo' => $linha['cd_pessoa'],
                    'nome' => $linha['nm_pessoa'],
                    'idade' => $linha['nr_idade'],
                    'cpf' => $linha['nr_cpf'],
                    'sexo' => $linha['ds_sexo'],
                    'rua' => $linha['nm_rua'],
                    'numero' => $linha['nr_casa'],
                    'bairro' => $linha['nm_bairro'],
                    'cidade' => $linha['nm_cidade'],
                    'uf' => $linha['ds_uf'],
                    'imagem' => $linha['ds_img']
                )
            );
        }
       
        echo json_encode($registro);
 
    } catch (Exception $e ) {
        echo "Erro ao buscar: ".$e;
    }