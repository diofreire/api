<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../api/config/config.php';
    include_once '../api/class/Pessoa.php';
    
    $database = new Database();
    $db = $database->getConnection('basea');
    
    $item = new Pessoa($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->setId($data->id);
    $item->setNome($data->nome);
    $item->setIdade($data->idade);
    $item->setCpf($data->cpf);
    $item->setEndereco($data->endereco);
    
    // Verifica se passou Divida
    if(isset($data->divida)) {
        $item->setDivida($data->divida);
    } else {
        $item->setDivida(null);
    }
    
    if($item->update()){
        echo json_encode("Pessoa data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>