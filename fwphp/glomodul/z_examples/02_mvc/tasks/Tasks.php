<?php
include "TaskInterface.php";

class Tasks implements TaskInterface
{
    private $db;
    public $pageno;
    public $totalPages;

    public function __construct() {
        $this->db = new Database();
    }

    public function addTasks($id, $title, $desc)
    {
        $id = $_SESSION['userid'];
        $status = "Pending";
        if(!empty($id) && !empty($title) && !empty($desc)) {
            //$this->db->prep_qry("INSERT INTO tasks(uid,task_title,description,status) VALUES(?,?,?,?)");
            $this->db->prep_qry("INSERT INTO posts(user_id,title,summary,status) VALUES(?,?,?,?)");
            $this->db->bind(1, $id);
            $this->db->bind(2, $title);
            $this->db->bind(3, $desc);
            $this->db->bind(4, $status);
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }else{
            return false;
        }
    }

    //public function s howTasks($id)
    public function showTasks($id = -99)
    {
      $numRecordsPerPage = 5;
      $offset = ($this->pageno - 1) * $numRecordsPerPage;

      $this->db->prep_qry("SELECT COUNT(*) cntposts FROM posts");
      $row = $this->db->single(); //echo '<pre>$row='; print_r($row);  echo '</pre>';
      $total_rows = $row['cntposts'] ;
      $this->totalPages = ceil($total_rows / $numRecordsPerPage);

      if ($id > -99) {
        $this->db->prep_qry("SELECT * FROM posts WHERE id=?");
        $this->db->bind(1, $id);
                      echo '<pre>before single $row=... $id='; print_r($id);  echo '</pre>';
                      echo '<pre>$total_rows='; print_r($total_rows);  echo '</pre>';
        //$row = $this->db->single(); echo '<pre>$row='; print_r($row);  echo '</pre>';
        $row = $this->singleTasks($id); echo '<pre>$row='; print_r($row);  echo '</pre>';
      } else { //r e a d  a l l :
        $this->db->prep_qry(
          //"SELECT * FROM posts ORDER BY title LIMIT $offset,$numRecordsPerPage"
          "SELECT * FROM posts ORDER BY title"
        );
                      echo '<pre>before resultSet $row=... $id='; print_r($id);  echo '</pre>';
        $row = $this->db->resultSet(); //echo '<pre>$row='; print_r($row);  echo '</pre>';
      }

      if($this->db->rowCount() > 0) { return $row; }else{ return false; }
    }
                    /*
                    $conn = mysqli_connect("localhost","root","","z_blogcms");

                    $total_pages_sql = "SELECT COUNT(*) FROM posts";
                    $result = mysqli_prep_qry($conn,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result)[0];
                    $this->totalPages = ceil($total_rows / $numRecordsPerPage);
                    */

    public function deleteTask($id) {
        $this->db->prep_qry("DELETE FROM posts WHERE id=?");
        $this->db->bind(1, $id);
        if($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }

    public function markComplete($id) {
        $this->db->prep_qry("UPDATE posts SET status='Completed' WHERE id=?");
        $this->db->bind(1, $id);
        if($this->db->execute()) {
            return true;
        }else{
            return false;
        }
    }

    public function singleTasks($id)
    {
      $this->db->prep_qry("SELECT * FROM posts WHERE id=? ORDER BY id DESC");
      $this->db->bind(1, $id);
      $row = $this->db->single();
      if($this->db->rowCount() > 0) {
          return $row;
      }else{
          return false;
      }
    }

    public function updateTask($id,$title,$desc) {
        //id,title,summary,status
        $this->db->prep_qry("UPDATE posts SET title=?,summary=? WHERE id=?");
        $this->db->bind(1,$title);
        $this->db->bind(2,$desc);
        $this->db->bind(3,$id);
        if($this->db->execute()) {
            return true;
        } else{
            return false;
        }
    }

    public function searchTasks($keyword) {
        ////id,title,summary,status
        $this->db->prep_qry("SELECT * FROM posts WHERE title LIKE '%$keyword%' OR summary LIKE '%$keyword%'");
        $row = $this->db->resultSet();
        if($this->db->rowCount() > 0) {
            return $row;
        } else{
            return false;
        }
    }
}