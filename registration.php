<?php
require_once('user.php');

$post_data = json_decode(file_get_contents('php://input'));

$new_user = new User();
$reg_res = $new_user->registration($post_data);

if ($reg_res =="Registration succes!") {
    $log_res = $new_user->login($post_data);

    if ($log_res == "Login success!") {
        echo json_encode($log_res);
    } else {
        http_response_code(403);
        echo json_encode($reg_res.$log_res);
    }

} else {
    http_response_code(403);
    echo json_encode($reg_res);
}

