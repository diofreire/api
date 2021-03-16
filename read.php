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
   
    // Tem Id?
    if(!isset($_GET['id'])) {
        $items = new Pessoa($db);
        $stmt = $items->getPessoas();

        $itemCount = $stmt->rowCount();

        if($itemCount > 0){
            $employeeArr = array();
            $employeeArr["body"] = array();
            $employeeArr["itemCount"] = $itemCount;

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $e = array(
                    "id" =>  $row['idPessoa'],
                    "nome" => $row['nome'],
                    "idade" => $row['idade'],
                    "cpf" => $row['cpf'],
                    "divida" => isset($row['divida']) ? $row['divida']: null,
                    "endereco" => $row['endereco']
                );

                array_push($employeeArr["body"], $e);
            }
            http_response_code(200);
            echo json_encode($employeeArr);
        } else{
            http_response_code(404);
            echo json_encode("Pessoa not found - all.");
        }
        
    } else {
        (int) $id = $_GET['id'];
        
        $item->setId($id);
        $dados = $item->getOnly();
        
        if($dados){
            // create array            
            $emp_arr = array(
               "id" =>  $dados['idPessoa'],
                "nome" => $dados['nome'],
                "idade" => $dados['idade'],
                "cpf" => $dados['cpf'],
                "divida" => isset($dados['divida']) ? $dados['divida']: null,
                "endereco" => $dados['endereco']
            );

            http_response_code(200);
            echo json_encode($emp_arr);
        } else{
            http_response_code(404);
            echo json_encode("Pessoa not found - only.");
        }
    }
?>