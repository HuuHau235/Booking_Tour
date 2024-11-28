<?php
    session_start();
    if (isset($_SESSION['user_id'])){
        echo json_encode(['logged_in' => true]);
        // mã hóa logged_in thành true
    }
    else {
        echo json_encode(['logged_in' => false]);
        // mã hóa logged_in thành false
    }
?>
