<?php
$errors = array();
$response = array();

if(empty($_POST['name'])){
  $errors['name'] = 'Name is needed!';
}
if(empty($_POST['email'])){
  $errors['email'] = 'Email is needed!';
}

$response['errors'] = $errors;

if(!empty($errors)){
  $response['success'] = false;
  $response['message'] = 'FAIL!';
} else {
  $response['success'] = true;
  $response['message'] = 'SUCCESS!';
}

echo json_encode($response);
