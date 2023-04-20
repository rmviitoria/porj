<?php
    session_start();
    if(empty($_POST) or (empty($_POST['recado']) or (empty($_POST['data'])))){
        echo"<script> location.href='index.php;' </script>"; 
    }
    include("config.php");
    $recado = $_POST['recado'];
    $data = $_POST['data'];
    $data_md5 = md5($senha); // Criptografa a senha usando MD5
    $sql = "select * from tbrecado where
    recado = '$recado' and data = '$data_md5'";
    $res = $conn->query($sql) or die($conn->error);
    $row = $res->fetch_object();
    $qtd = $res->num_rows;
    if($qtd > 0 ){
        $_SESSION["id"] = $row->id;
        $_SESSION["recado"] = $recado;
        $_SESSION["data"] = $row->data;
     
        echo"<script> location.href='portal.php' </script>"; 
    }else{
        echo"<script> alert('Adicione um recado; </script>"; 
        echo"<script> location.href='form_recado.php'; </script>"; 
    }

 ?>