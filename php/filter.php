<?php
    require_once('./dblogin.php');
    $filters = $_POST['filters'];
    $category = $_POST['category'];
    $filters = explode(',', $filters);
    $ids = [];

    foreach($filters as $filter){
        $sql = 'select product_id from `product-params` inner join product on product.id=`product-params`.product_id inner join category on product.category_id=category.id where param_value = ? and category_name like ?';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$filter, $category]);
        while($id = $stmt -> fetchColumn()){
            if(!in_array($id, $ids)){
                $ids[] = $id;
            }
        }
    }
    header("Content-Type: application/json");
    echo json_encode($ids);
?>