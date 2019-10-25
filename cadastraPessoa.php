<?php

	$conexao = mysqli_connect('localhost','id10375306_xuao','12345','id10375306_pessoa');

	try{
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
		
		if($_FILES['foto']['name'] != ''){
            $test = explode('.', $_FILES['foto']['name']);
            $extensao = end($test);
            if($extensao == "jpg" || $extensao == "png"){
                $nomeImg = rand(100,9999).'.'.$extensao;
                $local = 'fotos/'.$nomeImg;
                move_uploaded_file($_FILES['foto']['tmp_name'], $local);
            }
        }

		$sql = "INSERT INTO tb_pessoa VALUES($codigo,'$nome', $idade,'$cpf','$sexo','$rua', $numero, '$bairro', '$cidade', '$uf', '$local')";

		mysqli_query($conexao,$sql);

        echo "Pessoa cadastrada com sucesso!";

	}catch(Exception $e){
		echo ('Não foi cadastrado'.$e);
	}


?>