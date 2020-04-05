<?php
//namespace App\Controllers;
namespace B12phpfw\backend\app\controllers ; //last is dir (=module) name

//use Core\Base\Controller;

class MenusController //extends Controller
{
  public function index()
  {
    $menus = [];
    for ($i = 0; $i < 3; $i++) {  //3 was 20
        $menus[] = [
            'id' => $i,
            'image' => 'http://via.placeholder.com/128x128',
            'name' => 'Menu' . $i,
            'description' => $i . 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation',
            'price' => rand(1, 50)
        ];
    }


    echo '<pre>'; 
    echo json_encode($menus, JSON_PRETTY_PRINT);
    echo '</pre>'; 
  }
}