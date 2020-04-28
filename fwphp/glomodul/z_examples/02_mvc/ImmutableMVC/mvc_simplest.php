<?php
/**
*             IMMUTABLE MVC STRUCTURE TO BUILD ON
* This immutable implementation of MVC has some advantages over the mutable version:
* State is better managed so that the app doesn't suffer from action at a distance where changing an object in one location (in the controller) then causes changes in a seemingly unrelated component (the view)
* There is less state overall. There are no longer references to the different objects in multiple locations. The controller and view no longer have a reference to the model, they are given an instance to work with at the moment they need it, not before
*/
class Model {
  private $text;

  public function __construct($text = 'Hello World') {
    $this->text = $text;
  }

  public function setText($text) {
    return new Model($text);
  }

  public function getText() {
    return $this->text;
  }
}


class View {
  public function output(Model $model) {
    return '<a href="mvc_simplest.php?action=textclicked">' . $model->getText() . '</a>';
  }
}


class Controller {
  public function textClicked(Model $model): Model {
    return $model->setText('Text Clicked');
  }
}


$model = new Model();
$controller = new Controller();
$view = new View();

if (isset($_GET['action'])) {
    $model = $controller->{$_GET['action']}($model);
}

echo $view->output($model);
