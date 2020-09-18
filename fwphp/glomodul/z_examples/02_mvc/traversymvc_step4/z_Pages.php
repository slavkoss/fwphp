<?php

class Pages extends Controller {

    // Load Homepage
    public function index(object $pp1){
        // If logged in, redirect to posts
        if(isset($_SESSION['user_id'])){
            redirect('posts');
        }

        //Set Data
        $data = [
            'title' => 'Welcome To SharePosts',
            'description' => 'step 4 : Simple social network critic of TraversyMVC PHP fw - step 1'
        ];

        // Load homepage/index calling view method in Controller cls
        $this->view('pages/index', $data, $pp1);
    }

    public function about(){
        //Set Data
        $data = [
            'version' => '1.0.0'
        ];

        // Load about view
        $this->view('pages/about', $data);
    }
}