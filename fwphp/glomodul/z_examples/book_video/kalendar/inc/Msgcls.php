<?php
//J:\awww\apl\dev1\04knjige\kalendar\kal\inc\msgcls.php
//declare(strict_types=1); // php 7
/**
 * Stores  r o w    PHP version 7
 */
class Msgcls
{
    public $id; // int
    public $title;
    public $summary;
    public $description;
    public $start; // string
    public $end; // string
    /**
     * Accepts an array of r o w data and stores it,
     * otherwise stores an empty r o w
     *
     * @param array $row Associative array of  r o w  data
     * @return void
     */
    public function __construct($row=NULL)
    {
        if ( is_array($row) )
        {
            $this->id          = $row['event_id'];
            $this->title       = $row['event_title'];
            $this->summary     = $row['event_summary'];
            $this->description = $row['event_desc'];
            $this->start       = $row['event_start'];
            $this->end         = $row['event_end'];
        }
        else
        {
            $this->id          = NULL;
            $this->title       = '';
            $this->summary     = '';
            $this->description = '';
            $this->start       = '';
            $this->end         = '';
        }
    }

}

?>