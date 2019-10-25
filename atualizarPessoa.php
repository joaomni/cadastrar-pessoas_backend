
<?php
    try {
        $conexao = mysqli_connect('localhost','id10375306_xuao','12345','id10375306_pessoa');
                                //servidor , usuario banco, senha, livro do banco
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
		$idade = $_POST['idade'];
		$cpf = $_POST['cpf'];
		$sexo = $_POST['sexo'];
		$rua = $_POST['rua'];
		$numero = $_POST['numero'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$uf = $_POST['uf'];
		
		if(@$_FILES['foto']['name'] != ''){
            $test = explode('.', $_FILES['foto']['name']);
            $extensao = end($test);
            if($extensao == "jpg" || $extensao == "png"){
                $nomeImg = rand(100,9999).'.'.$extensao;
                $local = 'fotos/'.$nomeImg;
                move_uploaded_file($_FILES['foto']['tmp_name'], $local);
            
            $query = "UPDATE tb_pessoa SET nm_pessoa = '$nome', nr_idade = $idade, nr_cpf = '$cpf', ds_sexo = '$sexo', nm_rua = '$rua', nr_casa = '$numero', nm_bairro = '$bairro', nm_cidade = '$cidade', ds_uf = '$uf', ds_img = '$local' WHERE cd_pessoa = $codigo";
            }
        }else{
            $query = "UPDATE tb_pessoa SET nm_pessoa = '$nome', nr_idade = $idade, nr_cpf = '$cpf', ds_sexo = '$sexo', nm_rua = '$rua', nr_casa = '$numero', nm_bairro = '$bairro', nm_cidade = '$cidade', ds_uf = '$uf' WHERE cd_pessoa = $codigo";
        }
        
        mysqli_query($conexao,$query);

        echo "O perfil foi atualizado!";

    } catch (Exception $e ) {
        echo "Erro ao cadastrar: ".$e;
    }