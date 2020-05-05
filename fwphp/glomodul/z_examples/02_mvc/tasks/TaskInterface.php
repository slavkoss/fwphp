<?php

interface TaskInterface {
    public function addTasks($id,$title,$desc);
    public function showTasks($id);
}