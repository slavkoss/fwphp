<?php
//        U T I L  fns
namespace ChessMVC;


class Cleaner {
 //const HEADER_REGEX = '/^(\[((?:\r?\n)|.)*\])(?:\r?\n){2}/';
 const HEADER_KEY_REGEX = '/^\[([A-Z][A-Za-z]*)\s.*\]$/';
 const HEADER_VALUE_REGEX = '/^\[[A-Za-z]+\s"(.*)"\]$/';
 const COMMENTS_REGEX = '/(\{[^}]+\})+?/';
 const MOVE_VARIATIONS_REGEX = '/(\([^\(\)]+\))+?/';
 const MOVE_NUMBER_REGEX = '/\d+\.(\.\.)?/';
 const MOVE_INDICATOR_REGEX = '/\.\.\./';
 const ANNOTATION_GLYPHS_REGEX = '/\$\d+/';
 const MULTIPLE_SPACES_REGEX = '/\s+/';

 function __construct() {

 }

 public function clearMoveStr($clearMoveStr, $comments = false) {
  
  if (!$comments) { $clearMoveStr = $this->deleteComments($clearMoveStr) ; }

  $clearMoveStr = $this->deleteMoveVariations($clearMoveStr);
  $clearMoveStr = $this->deleteMoveNumber($clearMoveStr);
  $clearMoveStr = $this->deleteAnnotationGlyphs($clearMoveStr);
  $clearMoveStr = $this->trimMoveStr($clearMoveStr);
  
  return $clearMoveStr;
 }

 public function trimArrayElements($array) {
  return array_map('trim', $array); 
 }

 public function removeEmptyArrayElements($array) {
  return array_filter($array);
 }




 public function deleteComments($movesText) {
  return preg_replace(self::COMMENTS_REGEX, '', $movesText);
 }

 public function deleteMoveVariations($movesText) {
  return preg_replace(self::MOVE_VARIATIONS_REGEX, '', $movesText);
 }

 public function deleteMoveNumber($movesText) {
  return preg_replace(self::MOVE_NUMBER_REGEX, '', $movesText); 
 }

 public function deleteAnnotationGlyphs($movesText) {
  return preg_replace(self::ANNOTATION_GLYPHS_REGEX, '', $movesText); 
 }

 public function deleteMultipleSpaces($movesText) {
  return preg_replace(self::MULTIPLE_SPACES_REGEX, '', $movesText); 
 }

 public function trimMoveStr($movesText) {
  $movesText = trim($movesText);

  return preg_replace(self::MULTIPLE_SPACES_REGEX, ' ', $movesText);
 }
}