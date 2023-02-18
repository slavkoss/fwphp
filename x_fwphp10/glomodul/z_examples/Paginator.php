<?php

class Paginator{

    private $rel_request_url;
    public $per_page;
    //the current page number
    public $page =  false;
    //last page is rows_found/rows/results to display per page
    private $last_page = "";
    private $pagination_links = ""; //html pagination links rendered on the view
     /* used to determine the last page, last page will be total_rows / per page e.g 10 rows found / 5
    rows per page = last page = 2 */
    private $rows_found = "";
    private $limit = false;

    public function __construct($rows_found,$per_page)
    {
        $this->rows_found = $rows_found;
        $this->per_page = $per_page;
        $this->page = isset($_GET['p']) ?  $_GET['p'] : 1;
        $this->last_page = ceil($rows_found/$per_page);
        $this->rel_request_url = $this->get_rel_request_url();
        
    }
    
    public function get_rel_request_url(){
        $rel_request_url = $_SERVER['REQUEST_URI'];
        return parse_url($rel_request_url)['path'];
        //return $rel_request_url;
   }

   public function get_pagination_links(){
        $this->create_previous();
        $this->create_pagination_links();
        $this->create_next();
		
        return $this->pagination_links;
   }

   public function get_offset_and_limit(){

        return "LIMIT $this->per_page OFFSET ".($this->page - 1) * $this->per_page;

    }







   private function get_query_strings(){
        parse_str($_SERVER['QUERY_STRING'],$query_strings);
        return $query_strings;
   }


   private function create_html_for_pagination_links($page_number,$rel_request_url,$page,$is_link_active =''){
        return "<li class='page-item' $is_link_active >
                    <a class = 'page-link'  href='$rel_request_url&p=$page_number' class = 'page-link'>$page                        
                    </a>
               </li>";
   }

   private function create_pagination_links(){
       for($page = 1; $page <= $this->last_page; $page++){
            $active = "";
            if($this->page == $page){
                $active = "active";
            }
            $query_strings = $this->get_query_strings();
			unset($query_strings['p']);
            $rel_request_url =  $this->get_rel_request_url()."?".http_build_query($query_strings);

            $this->pagination_links .= 
			   $this->create_html_for_pagination_links($page,$rel_request_url,$page,$active);
       }
   }

   private function create_next(){

        if($this->last_page != 1){
            if($this->page != 1 && $this->page != $this->last_page){

                $next_page = $this->page + 1;
                $query_strings = $this->get_query_strings();
                   echo '<br /><pre>'. __METHOD__ .' SAYS query_strings='; print_r($query_strings) ; echo '</pre>'; 
                unset($query_strings['p']);
                $rel_request_url =  $this->get_rel_request_url()."?".http_build_query($query_strings);
                $this->pagination_links .= $this->create_html_for_pagination_links($next_page,$rel_request_url,"Next");
            }
        }
   }

    private function create_previous(){
        if ($this->page > 1) {
            //Show 'Previous' only if page number is greater than 1,
            $previous_page = $this->page - 1;
            $query_strings = $this->get_query_strings();
            unset($query_strings['p']);
            $rel_request_url = $this->get_rel_request_url()."?".http_build_query($query_strings);
            $this->pagination_links .= $this->create_html_for_pagination_links($previous_page,$rel_request_url,"Previous");
        }
    }



}

