<?php
if(isset($_POST['q1']) && isset($_POST['a12'])&& isset($_POST['a13'])&& isset($_POST['a14'])&& isset($_POST['a11'])&& isset($_POST['1'])) {
	$id = substr($_POST['1'], strrpos($_POST['1'], '.') );
	$names=file('Qbank.csv');
	$k = count($names);
    $data = $k+1 . ',"' .$_POST['q1'] . '","' . $_POST['a11'] . '","' . $_POST['a12'] . '","' . $_POST['a13'] . '","' . $_POST['a14'] . '",' . $id . "\r\n";
    $ret = file_put_contents('Qbank.csv', $data, FILE_APPEND | LOCK_EX);
    if($ret === false) {
        die('Problem in file handling');
    }
    else {
        header("Location:homepage.html");
  		exit();
    }
}
else {
   die('unexpected input');
   echo '<a href="index1.htm">Wrong input! Click here to go back.</a>';
}
?>