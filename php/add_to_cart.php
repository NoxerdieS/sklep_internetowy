<?php
    session_start();
    $items = $_SESSION['cart'] ?? [];
    if(empty($items)){
        $items[] = [$_POST['id'], $_POST['quantity']];
    }else{
        for ($i = 0; $i < count($items); $i++) {
            $item = $items[$i];
            
            if(intval($item[0]) == $_POST['id']){
                $item[1] += intval($_POST['quantity']);
                $items[$i] = $item;
            }else{
                $items[] = [$_POST['id'], $_POST['quantity']]; 
            }
        }
    }
    $_SESSION['cart'] = $items;
?>