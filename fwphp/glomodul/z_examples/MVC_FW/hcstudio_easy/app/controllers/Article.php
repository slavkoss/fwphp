<?php
namespace App\Controllers;

use Core\Controller;

class Article extends Controller
{
    public function middleware()
    {
        return [
            [
                'class' => 'Core\Authentication',
                'actions' => ['*'],
            ]
        ];
    }

    public function actionIndex()
    {
        // M -> V  data flow : This C does know what V does, but does not know details (how V does) !
        $this->render([ 'articles_tbl', [ ], ]); // or index
        /* 
        // M -> C -> V  data flow : C pulls data from M and pushes it to V :
        // How to do pagination ?   How to read cursor row by row in V ?
        $c_articles = $this->app->connection->prepare( 
           "SELECT * FROM posts" ); //articles  article
        $c_articles->execute(); // CREATE CURSOR OBJECT
                           //while($row = $c_articles->fetchObject()){} // read cursor row by row
        $articles = $c_articles->fetchAll(\PDO::FETCH_OBJ);
        $this->r ender([
            'index', [
                'articles' => $articles,
            ],
        ]); */
    }

    public function actionView($params)
    {
        $id = (int) $params['id'];
        $stmt = $this->app->connection->prepare("
      SELECT * FROM posts WHERE id=:id LIMIT 1
    ");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $article = $stmt->fetchObject();
        $this->render([ 'view', [ 'id' => $id, 'article' => $article, ], ]);
    }

}
