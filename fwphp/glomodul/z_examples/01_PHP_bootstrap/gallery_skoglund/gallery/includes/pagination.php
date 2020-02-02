<?php
//J:\awww\www_old_ver_5_4_3\fwphp\glomodul4\help_sw\test\books\gallery_skoglund\gallery\includes\pagination.php
class Pagination {
  
  public $cur_pg;
  public $per_page;
  public $totalrows_count;

  public function __construct($page=1, $per_page=20, $totalrows_count=0){
    $this->cur_pg = (int)$page;
    $this->per_page = (int)$per_page;
    $this->totalrows_count = (int)$totalrows_count;
  }

  public function offset() {
    // Assuming 20 items per page:
    // page 1 has an offset of 0    (1-1) * 20
    // page 2 has an offset of 20   (2-1) * 20
    // in other words, page 2 starts with item 21
    return ($this->cur_pg - 1) * $this->per_page;
  }

  public function tot_pgs() {
    return ceil($this->totalrows_count/$this->per_page);
  }



  public function prev_pg() {
    return $this->cur_pg - 1;
  }
  
  public function next_pg() {
    return $this->cur_pg + 1;
  }


  public function has_prev_pg() {
    return $this->prev_pg() >= 1 ? true : false;
  }

  public function has_next_pg() {
    return $this->next_pg() <= $this->tot_pgs() ? true : false;
  }


}

?>