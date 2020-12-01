<?php
namespace ChessMVC;

 
class Tag {
 private $tag;
 private $key;
 private $value;

 function __construct($tag, $key, $value) {
  $this->tag = $tag;
  $this->key = $key;
  $this->value = $value;
 }



 public function getTag() {
  return $this->tag;
 }

 public function getKey() {
  return $this->key;
 }

 public function getValue() {
  return $this->value;
 }
}