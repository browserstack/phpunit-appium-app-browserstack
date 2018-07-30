<?php
$run_cmd = "composer ios_parallel";
$num_of_tests = 2;
$procs = array();
for($x = 0; $x < $num_of_tests; $x++) {
  putenv("TASK_ID=$x");
  $procs[$x] = popen($run_cmd, "r");
}
for($x = 0; $x < $num_of_tests; $x++) {
  while (!feof($procs[$x])) {
        print fgets($procs[$x], 4096);
  }
  pclose($procs[$x]);
}
?>
