<?php
namespace JokeModule; // namespace J okeForm;
class Frm_ctr { // Controller
  //public function edit(\J okeSite\J okeForm  $jokeForm): \J okeSite\J okeForm  {
  public function edit($Frm_mdl): \JokeModule\Frm_mdl
  {
    if (isset($_GET['id'])) {
      return $Frm_mdl->load($_GET['id']); // return $j okeForm->load($_GET['id']);
    }
    else {
      return $Frm_mdl ; //$j okeForm
    }
  }

  //public function submit(\J okeSite\J okeForm  $j okeForm): \J okeSite\J okeForm
  public function submit($Frm_mdl): \JokeModule\Frm_mdl
  {
    return $Frm_mdl->save($_POST['joke']);  //return $j okeForm->save($_POST['joke']);
  }
}