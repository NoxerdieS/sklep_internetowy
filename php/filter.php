<?php
    require_once('./dblogin.php');
    $filters = $_POST['filters'];
    $category = $_POST['category'];
    $filters = explode(',', $filters);
    $ids = [[]];
    $i = 0;
    foreach($filters as $filter){
        $sql = 'select product_id from `product-params` inner join product on product.id=`product-params`.product_id inner join category on product.category_id=category.id where param_value like ? and category_name like ?';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$filter, $category]);
        while($id = $stmt -> fetchColumn()){
                $ids[$i][] = $id;
        }
        $i++;
    }
    $i = 0;
    $intersected = $ids[0];
    while($i < count($ids)-1){
        $intersected = array_intersect($ids[$i], $ids[$i+1]);
        $i++;
    }
    header("Content-Type: application/json");
    echo json_encode($intersected);
?>