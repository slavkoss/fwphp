<?php
/*
// J:\awww\www\fwphp\glomodul\z_examples\csvtodo\todo.csv
"name", "date", "description", "accountable", "subprocess of", "todo", "start", "check"
"first", "24-10-2018", "", "", "2", "", "", "1"
"first3", "24-10-2018", "", "", "2", "", "", "1"
"15", "24-10-2018", "mama mia", "", "2", "", "", "1"


Note that while specifying yours headers with the methods createToDo::setHeader(),
the first header will always be taken as index(primary id) and the last header as done/undone case.

Use PHPclasses forum to suggest improvement ,report bug and send feedback
Or contact me at leizmo@gmail.com. 
*/
require_once('ToDo.class.php');
//echo '<pre>';

// **********************************
// 1. create TODO file
// **********************************
//start your todo file; you can use your own one dimension array here to specify your heders
$x=new createToDo(); 

$x->setHeader(
  ["name", "date", "description", "accountable", "subprocess of", "todo"]
);//or add your headers eg   , "start", "check"

echo '<p><b>print_r($x->get_headers())</b></p>';
echo '<pre>'.'$x->headers='; print_r($x->get_headers()); echo '</pre>';

// add things to do
$x->add(0,["00001","2018-10-24","c s v  r o w 1 Todo 1","","","1"]);
$x->add(1,["00002","24-10-2018","c s v  r o w 2 Todo 2","","","0"]);

//$x->toggle_rnums(0,1);//$position,$new = change some todo position if necessary


$x->makefile('todo.csv');


// **********************************
// 2. start you todo file manager
// **********************************
$y=new manageToDo('todo.csv');

echo '1st description='; print_r($y->get('description','00001')); ;
echo '<br />'.'date='; print_r($y->get('date','00001')); 
echo '<br />'.'todo/done='; print_r($y->get('todo','00001')); 

echo '<br /><br />2nd description='; print_r($y->get('description','00002')); ;
echo '<br />'.'date='; print_r($y->get('date','00002'));
echo '<br />'.'todo/done='; print_r($y->get('todo','00002')); 

echo '<h3>All c s v  r o w s  print_r($x->get_data())</h3>';
echo '<pre>'.'$x->data='; print_r($x->get_data()); echo '</pre>';


exit(0) ;






$x->delete(0);//d elete a todo by position  if necessary
$x->makefile('todo.csv'); //make todo file. Note: this must always be the last statement .any statement after this won't be saved  


/* manage a TODO file*/

// get a value knowing header and row values
//var_dump($y->get('todo','r o w')).'<br>';
$y->check('r o w');//mark as done

echo $y->get('todo','r o w').'<br>';
$y->check('r o w');//mark as done 
echo $y->get('todo','r o w').'<br>';

// $y->delete('r o w');// d elete a task
// $y->delete_checked();//d elete all done tasks

$y->save();//save the modification

var_dump($z=$y->getHeader());//get the headers 
var_dump($y->change_Header('todo','check'));//change a header value
var_dump($y->getHeader());
$y->add(["r o w","24-10-2018","","","2","1"],true);/*add a task .
This become an edition instead of addition because 
r o w already exists and the second parameter is true instead of false .
To avoid edition two option another name or pass false as second parameter
*/

$y->add(["r o w3","24-10-2018","","","2","1"],true);//add a task
$y->add(["15","24-10-2018","","","2","1"],true);//add a task

$y->uncheck('15');//mark as undone
$y->uncheck('r o w3');//mark as undone

var_dump($y->add_Header('todo'));//add a new header
var_dump($y->add_Header('start'));var_dump($y->getHeader());//add a new header

echo $y->count_all().'<br>';
echo $y->count_checked().'<br>';
echo $y->count_unchecked().'<br>';

var_dump($y->get_checked());//get all done tasks;
var_dump($y->get_unchecked());//get all undone tasks;
$y->uncheck_checked();//make undone all done tasks;
$y->check_all();//mark all tasks as done 

$y->edit('description','15','mama mia');// edit a task here we change the task 15's description

$y->save($z[0]);//always do this to be sure to save all your modifications and also to specify the r o w header in parameter to avoid primary id renaming.
// $y->delete_checked();
?>