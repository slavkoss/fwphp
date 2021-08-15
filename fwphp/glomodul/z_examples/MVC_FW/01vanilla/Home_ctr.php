<?php

namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//namespace App\Controllers;

//use App\Helpers\Params;
//use App\Helpers\View;
//use App\Models\User;

class Home_ctr
{
    public function index()
    {
        // $users = User::getAll();
                      $users = array(
                          (object) [
                              'first_name' => 'John',
                              'last_name' => 'Doe',
                              'email' => 'john@example.com',
                              'age' => 29,
                              'country' => 'USA'
                          ]
                        , (object) [
                              'first_name' => 'Mary',
                              'last_name' => 'Moe',
                              'email' => 'mary@example.com',
                              'age' => 32,
                              'country' => 'UK'
                          ]
                      );

        //return View::render('home.php', ['users' => $users]);
        echo View::render('home.php', ['users' => $users]);
    }

    // rr
    public function get_user()
    {
        //$users[] = User::find(Params::get('id'));
        $users = array();

        return View::render('home.php', ['users' => $users]);
    }

    // cc
    // public function create_user()
    // {
    //     $user = (object) [
    //         'first_name' => 'Myra',
    //         'last_name' => 'Dalton',
    //         'email' => 'myra@example.com4',
    //         'age' => 21,
    //         'country' => 'Sweden'
    //     ];

    //     User::create($user);
    // }

    // uu

    // dd

}