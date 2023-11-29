<?php
    require_once('./dblogin.php');
    $filters = $_POST['filters'];
    $category = $_POST['category'];
    $filters = explode(',', $filters);

    $ids = [];

    foreach($filters as $filter){
        $sql = 'select product_id from `product-params` where param_value = ?';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$filter]);
        while($id = $stmt -> fetchColumn()){
            $ids[] = $id;
        }
    }
    var_dump($ids);
?>