<?php
class Task extends Model
{
    public function create($title, $description)
    {
        $sql = "INSERT INTO posts (title, summary, datetime, datetime2) VALUES (:title, :description, :created_at, :updated_at)";

        $req = Database::getBdd()->prepare($sql);

        return $req->execute([
            'title'       => $title,
            'description' => $description,
            'datetime  '  => '', //date('Y-m-d H:i:s'),
            'datetime2'   => ''

        ]);
    }

    public function showTask($id)
    {
        $sql = "SELECT * FROM posts WHERE id =" . $id;
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function showAllTasks()
    {
        $sql = "SELECT * FROM posts";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function edit($id, $title, $description)
    {
        $sql = "UPDATE posts SET title = :title, summary = :description , datetime2 = :updated_at WHERE id = :id";

        $req = Database::getBdd()->prepare($sql); // =self::$instance

        return $req->execute([
            'id'          => $id,
            'title'       => $title,
            'description' => $description,
            'updated_at'  => '' //date('Y-m-d H:i:s')
        ]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM posts WHERE id = ?';
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }
}
?>