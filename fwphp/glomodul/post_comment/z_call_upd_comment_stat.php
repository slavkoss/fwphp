<?php
// J:\awww\www\fwphp\glomodul\post_category\call_upd_comment_stat.php

namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

$Db_post_comment = new Db_post_comment ;

$Db_post_comment->upd_comment_stat($db, $this->uriq->id, $this->uriq->stat);

$this->Redirect_to($this->pp1->comments);


//also works (is same as above): $this->Redirect_to( 'index.php?i/../post_comment/comments.php' );
/*
//also works (is same as above): 
//err :  http://dev1:8083/fwphp/glomodul/post_comment/comments
// http://dev1:8083/fwphp/glomodul/blog/?i/..|post_comment|comments
if (isset($this->ctrakcpar_arr['redir'])) { $this->Redirect_to(
  str_replace('|','/', $this->ctrakcpar_arr['redir'])
  );
} */

//foreach($this->ctrakcpar_arr as $k=>$v) {if ($v=='stat') { $stat = $this->ctrakcpar_arr[$k+1]; } }
