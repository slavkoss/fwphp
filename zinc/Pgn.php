<?php
// J:\awww\www\zinc\Pgn.php
//       NOT USED !!
namespace B12phpfw ;
class Pgn {
  // Pagination (gallery_skoglund)
  public $pgordno;
  public $rblk;
  public $rtbl;

  public function __construct($pgordno=1, $rblk=20, $rtbl=0
     )
  {
    $this->pgordno = (int)$pgordno;
    $this->rblk = (int)$rblk;
    $this->rtbl = (int)$rtbl;
  }

  public function first_inpg() {
    // Assuming 20 items per page:
    // page 1 has an o ffset of 0    (1-1) * 20
    // page 2 has an o ffset of 20   (2-1) * 20
    // in other words, page 2 starts with item 21
    return ($this->pgordno - 1) * $this->rblk;
  }

  public function tot_pgs() {
    return ceil($this->rtbl/$this->rblk);
  }



  public function prev_pg() {
    return $this->pgordno - 1;
  }
  
  public function next_pg() {
    return $this->pgordno + 1;
  }


  public function has_prev_pg() {
    return $this->prev_pg() >= 1 ? true : false;
  }

  public function has_next_pg() {
    return $this->next_pg() <= $this->tot_pgs() ? true : false;
  }


}
