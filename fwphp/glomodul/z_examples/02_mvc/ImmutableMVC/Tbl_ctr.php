<?php
namespace JokeModule; // JokeList;
class Tbl_ctr { // Controller
  //public function filterList(\JokeSite\JokeList $jokeList): \JokeSite\JokeList
  public function filterList($jokeList): \JokeModule\Tbl_mdl
  {
    if (!empty($_GET['sort'])) {
      $jokeList = $jokeList->sort($_GET['sort']);
    }

    if (!empty($_GET['search'])) {
      $jokeList = $jokeList->search($_GET['search']);
    }

    return $jokeList;
  }

  //public function delete(\JokeSite\JokeList  $jokeList): \JokeSite\JokeList
  public function delete($jokeList): \JokeModule\Tbl_mdl
  {
    return $jokeList->delete($_POST['id']);
  }
}