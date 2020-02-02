<?php
    /* IMPORTANT: READ BEFORE DOWNLOADING, COPYING, INSTALLING OR USING.

     By downloading, copying, installing or using the software you agree to this license.
     If you do not agree to this license, do not download, install,
     copy or use the software.


            License Agreement
           For  PHP TODO Tasks Manager package   V 1.0.0

    Copyright (C) 2018, Akpe Aurelle Emmanuel Moïse Zinsou, all rights reserved.

    Redistribution and use in source and binary forms, with or without modification,
    are permitted provided that the following conditions are met:

      * Redistribution's of source code must retain the above copyright notice,
     this list of conditions and the following disclaimer.

      * Redistribution's in binary form must reproduce the above copyright notice,
     this list of conditions and the following disclaimer in the documentation
     and/or other materials provided with the distribution.

      * The name of the copyright holders may not be used to endorse or promote products
     derived from this software without specific prior written permission.

    This software is provided by the copyright holders and contributors "as is" and
    any express or implied warranties, including, but not limited to, the implied
    warranties of merchantability and fitness for a particular purpose are disclaimed.
    In no event shall Akpe Aurelle Emmanuel Moïse Zinsou or contributors be liable for
    any direct, indirect, incidental, special, exemplary, or consequential damages(including,
    but not limited to, procurement of substitute goods or services;loss of use,  data, or
    interruption) however caused and on any theory of profits; or business liability,
    whether  in contract, strict liability, or tort (including negligence or otherwise)
    arising in any way out of the use of this software, even if advised of the possibility
    of such damage.

    EZAMA contact:leizmo@gmail.com*/

    class createToDo
    {
     protected $headers=false,$data=array();

     public function setHeader($array=array()){
      $defaults=["name","date","description","accountable","subprocess of","todo"];
      if(!empty($array)) $this->headers=$array;
      else $this->headers=$defaults;
     }

     public function makefile($path)
     {
        if($path)
        {
          array_unshift($this->data, $this->headers);
          $fp = fopen($path, 'w');
          foreach ($this->data as $fields) {
           fputcsv($fp, $fields);
          }
          fclose($fp);
          return true;
        }else return false;
     }

     public function add($position,$data){
      if(!is_int($position)) return false;
      if(count($data)!=count($this->headers)) return false;
      if(array_key_exists($position,$this->data)) {
         $track=$this->data[$position];
         $this->data[$position]=$data;
         $this->data[]=$track;
         return true;
      }else{
       $this->data[$position]=$data;
       return true;
      }

     }

     public function delete($position){
      unset($this->data[$position]);
     }

     public function toggle_rnums($old_rowno, $new_rowno){
      if(!is_int($old_rowno)&&!is_int($new_rowno)) return false;
      if(array_key_exists($old_rowno, $this->data)) {
       $old_row=$this->data[$old_rowno];
       $new_row=$this->data[$new_rowno];
       $this->data[$new_rowno]=$old_row;
       if($new_row) $this->data[$old_rowno]=$new_row;
       return true;
      }else{
       return false;
      }
     }


     public function get_headers(){
       return $this->headers;
     }

     public function get_data(){
       return $this->data;
     }

    }





    class CSV_Data
    {

     protected $cache = array();
     protected $lang;
     protected $file;

     public function __construct($file){
      $this -> setFile($file);
     }

     public function setFile($file) {
      $this -> file = preg_replace("#[\////]+#",DIRECTORY_SEPARATOR, $file);
      $path = $this -> file;
      if(!array_key_exists($path, $this -> cache)){
       if(file_exists($path)){
        $found = true;
       } else {
        $found = false;
       }
       if($found){
        $file = fopen($path, 'r');
        $flex = true;
        $array = array();
        $names = array();
        while (($line = fgetcsv($file,0,',','"',"\\")) !== FALSE) {
         if($line){
          $name = array_shift($line);
          if($flex){
           if(!$line){
            break;
           }
           $indexes = array();
           foreach($line as $index1){
            if(!array_key_exists($index1, $array)){
             $array[$index1] = array();
             $indexes[] = $index1;
            }
           }
           $flex = false;
          } else {
           if(!array_key_exists($name, $names)){
            foreach($indexes as $i => $index1){
             if(array_key_exists($i, $line)){
              $array[$index1][$name] = stripslashes($line[$i]);
             } else {
              $array[$index1][$name] = null;
             }
            }
            $names[$name] = true;
           }
          }
         }
        }
       } else {
        $array = array();
       }
       $this -> cache[$path] = $array;
      }
      return $this;
     }

     public function get($x, $y){
        $path = $this -> file;
        if( !empty($this -> cache[$path][$x]) 
            && array_key_exists($y, $this -> cache[$path][$x])
        )
        { return $this -> cache[$path][$x][$y];
        } else { return ""; }
     }

     public function edit($x, $y, $new_value){
      reset($this -> cache[$this -> file]);
      $key = key($this -> cache[$this -> file]);
      if(!array_key_exists($y,$this -> cache[$this -> file][$key])){
       $keys_z = array();
       foreach($this -> cache[$this -> file][$key] as $keyz=>$val){
        if(empty($this -> cache[$this -> file][$x])||
         !array_key_exists($keyz,$this -> cache[$this -> file][$x])){
         $this -> cache[$this -> file][$x][$keyz] = "";
         $this -> cache[$this -> file][$key][$y] = "";
        }
       }
      }
      $this -> cache[$this -> file][$x][$y] = $new_value;
      return $this;
     }

     public function save($index="index")
     {
      $lines = array(array($index));
      $xindex = 1;
      $yindex = 0;
      foreach($this -> cache[$this -> file] as $x => $value1)
      {
       $no = 0;
       $lines[0][$xindex] = $x;
       $xindex++;
       $yindex++;
       foreach($value1 as $y => $value){
        $no++;
        $lines[$no][0] = $y;
        $lines[$no][$yindex] = $value;
       }
      }
      $fp = fopen($this -> file, 'w');
      foreach($lines as $i1=>$line){
       fwrite($fp, ($i1?"\n":""));
       end($line);
       $key = key($line);
       reset($line);
       for($i2=0;$i2<=$key;$i2++){
        fwrite($fp, (($i2)?', ':'').'"'.(array_key_exists($i2,$line)?addcslashes($line[$i2],'\"'):"").'"');
       }
      }
      fclose($fp);
     }
    }







    class manageToDo  extends CSV_Data
    {
     protected $headers,$todo,$count_all=false,$count_checked=false,$count_unchecked=false,$get_unchecked,$get_checked;
     public function __construct($file){
      parent::__construct($file);
      $this->getHeader();
      $this->todo=end($this->headers);
     }

     public function getHeader(){
      if($this->headers) return ($this->headers);
      if($this -> file){
       $fp=fopen($this -> file,'r');
       fseek($fp, 0);
       return $this->headers=fgetcsv($fp,0,',','"',"\\");
      }else return false;
     }

     public function change_header($x,$y){

      if(in_array($x,$this->headers)){
       $this->headers[array_search($x,$this->headers)]=$y;
       $this->todo=end($this->headers);
       $this->cache[$this->file][$y]=$this->cache[$this->file][$x];
       unset($this->cache[$this->file][$x]);
       $this->save($this->headers[0]);
       return true;
      }else return false;

     }

     public function add_header($x){

      if(!in_array($x,$this->headers)){
       $y=array_pop($this->cache[$this->file]);
       $cy=count($y);
       $this->cache[$this->file][$x]=array();
       foreach($this->cache[$this->file][$this->headers[1]] as $k=>$v){
        $this->cache[$this->file][$x][$k]="";

       }
       array_pop($this->headers);
       $this->headers[]=$x;
       $this->headers[]=$this->todo;
       $this->cache[$this->file][$this->todo]=$y;
       unset($y);
       $this->save($this->headers[0]);
       return true;
      }else return false;

     }

     public function check($x){
      $this -> edit($this->todo, $x, "1");
      // $this->save($this->headers[0]);
     }
     public function uncheck($x){
      $this -> edit($this->todo, $x, "0");
      // $this->save($this->headers[0]);
     }
     public function delete($x){
      foreach($this->cache[$this->file] as $k=>$v){
       unset($this->cache[$this->file][$k][$x]);
      }
      // $this->save($this->headers[0]);
     }

     public function delete_checked(){
      foreach($this->cache[$this->file][$this->todo] as $key=>$val){
       if($val=="1") $this->delete($key);
      }
      // $this->save($this->headers[0]);
     }

     public function uncheck_checked(){
      foreach($this->cache[$this->file][$this->todo] as $key=>$val){
       if($val=="1") $this->uncheck($key);
      }
      // $this->save($this->headers[0]);
     }

     public function check_all(){
      foreach($this->cache[$this->file][$this->todo] as $key=>$val){
       if($val=="0") $this->check($key);
      }
      // $this->save($this->headers[0]);
     }

     public function count_all(){
      if($this->count_all!==false) return $this->count_all;
      return $this->count_all=count($this->cache[$this->file][$this->todo]);
     }

     public function count_checked(){
      if($this->count_checked!==false) return $this->count_checked;
      $i=0;
      foreach($this->cache[$this->file][$this->todo] as $key=>$val){
       if($val=="1") $i++;
      }
      return $this->count_checked=$i;
     }

     public function count_unchecked(){
      if($this->count_unchecked!==false) return $this->count_unchecked;
      $i=0;
      foreach($this->cache[$this->file][$this->todo] as $key=>$val){
       if($val=="0") $i++;
      }
      return $this->count_unchecked=$i;
     }

     public function get_checked(){
      if($this->get_checked) return $this->get_checked;
      $array=array();
      foreach($this->cache[$this->file][$this->todo] as $key=>$val){
       if($val=="1") $array[]=$key;
      }
      return $this->get_checked=$array;
     }

     public function get_unchecked(){
      if($this->get_unchecked) return $this->get_unchecked;
      $array=array();
      foreach($this->cache[$this->file][$this->todo] as $key=>$val){
       if($val=="0") $array[]=$key;
      }
      return $this->get_unchecked=$array;
     }

     public function add($array,$forced=false){
      if(count($array)==count($this->headers)){
       if($this->get($this->todo,$array[0])==="0"||$this->get($this->todo,$array[0])==="1"){
        if($forced){
         $array=array_values($array);
         $name=array_shift($array);
         $i=0;
         foreach($this->cache[$this->file] as $k=>$v){
          $this->cache[$this->file][$k][$name]=$array[$i];
          $i++;
         }
         $this->save($this->headers[0]);
        }else{
         return false;
        }
       }else{
        $array=array_values($array);
        $name=array_shift($array);
        $i=0;
        foreach($this->cache[$this->file] as $k=>$v){
         $this->cache[$this->file][$k][$name]=$array[$i];
         $i++;
        }

        $this->save($this->headers[0]);
        // var_dump($this->cache);
       }
      }else{
       return false;
      }

     }
    }
?>