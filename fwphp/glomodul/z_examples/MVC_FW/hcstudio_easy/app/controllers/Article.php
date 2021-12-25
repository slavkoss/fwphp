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
        $stmt = $this->app->connection->prepare(
        "SELECT * FROM posts"); //articles  article
        $stmt->execute();
        //while($row = $stmt->fetchObject()){}
        $articles = $stmt->fetchAll(\PDO::FETCH_OBJ);
        $this->render([
            'index', [
                'articles' => $articles,
            ],
        ]);
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
        $this->render([
            'view', [
                'id' => $id,
                'article' => $article,
            ],
        ]);
    }

}
