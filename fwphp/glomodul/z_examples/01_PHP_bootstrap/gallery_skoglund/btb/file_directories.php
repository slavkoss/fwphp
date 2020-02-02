<?php

// we already used:
// 	dirname()
//	is_dir()

// getcwd(): Current Working Directory
echo getcwd() . "<br />";

// mkdir()
mkdir('new', 0777); // 0777 is the PHP default

// you can use umask() to change default permission settings
// default may be 0022

// recursive dir creation
mkdir('new/test/test2', 0777, true);

// changing dirs
chdir('new');
echo getcwd() . "<br />";

// removing a directory
rmdir('test/test2');

// must be closed and EMPTY before removal (and be CAREFUL)
// scripts to help you wipe out directories with files:
//  http://www.php.net/manual/en/function.rmdir.php

?>