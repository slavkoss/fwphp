<?php
/*
// on medoo DBI
Search "function " (11 hits in 1 file of 1 searched)
  J:\awww\www\fwphp\glomodul\z_examples\phpenv_skvorc\src\Comment.php (11 hits)
	Line 15:     public function __construct(\medoo $medoo)
	Line 20:     public function findAll()
	Line 39:     public function setName($name)
	Line 46:     public function setEmail($email)
	Line 57:     public function setComment($comment)
	Line 68:     protected function setSubmissionDate($date)
  
	Line 75:     public function getName()
	Line 80:     public function getEmail()
	Line 85:     public function getComment()
	Line 90:     public function getSubmissionDate()
	Line 95:     public function save() // only cc (insert row)
*/

namespace SitePoint;

//class Comment
{

    protected $database;

    protected $name;
    protected $email;
    protected $comment;
    protected $submissionDate;

    public function __construct(\medoo $medoo)
    {
        $this->database = $medoo;
    }

    public function findAll()
    {
        $collection = [];
        $comments = $this->database->select('comments', '*',
            ["ORDER" => "comments.submissionDate DESC"]);
        if ($comments) {
            foreach ($comments as $array) {
                $comment = new self($this->database);
                $collection[] = $comment
                    ->setComment($array['comment'])
                    ->setEmail($array['email'])
                    ->setName($array['name'])
                    ->setSubmissionDate($array['submissionDate']);
            }
        }

        return $collection;
    }

    public function setName($name)
    {
        $this->name = (string)$name;

        return $this;
    }

    public function setEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new \InvalidArgumentException('Not a valid email!');
        }

        return $this;
    }

    public function setComment($comment)
    {
        if (strlen($comment) < 10) {
            throw new \InvalidArgumentException('Comment too short!');
        } else {
            $this->comment = $comment;
        }

        return $this;
    }

    protected function setSubmissionDate($date)
    {
        $this->submissionDate = $date;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function getSubmissionDate()
    {
        return $this->submissionDate;
    }

    public function save()
    {
        if ($this->getName() && $this->getEmail() && $this->getComment()) {
            $this->setSubmissionDate(date('Y-m-d H:i:s'));

            return $this->database->insert('comments', [
                'name' => $this->getName(),
                'email' => $this->getEmail(),
                'comment' => $this->getComment(),
                'submissionDate' => $this->getSubmissionDate()
            ]);
        }
        throw new \Exception("Failed to save!");
    }
}