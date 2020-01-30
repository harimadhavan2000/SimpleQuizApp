<?php

$names=file('Qbank.csv');
$k = count($names);
$query = mt_rand(1,$k);

if (($query > 0) and ($query < $k+1)) {
    $count = 0;    
    foreach ($names as $line) {
        $count++;
        if($count>$query){
        	break;
        }
        else{
        	//$field = explode(',', $line);
          $field = str_getcsv($line);
        }    		
    }
} 
  

$a = array(
1 => array(
   0 => $field[0],
   1 => trim($field[1], '"'),
   2 => trim($field[2], '"'),
   3 => trim($field[3], '"'),
   4 => trim($field[4], '"'),
   5 => trim($field[5], '"'),
   6 => $field[6]
),
);

?>

<html>
<head>
<title>Multiple Choice Questions:  <?php print "Quiz"; ?></title>

<script language='Javascript'>
<!-- 
function Goahead(number){
        if (number ==<?php echo $a[1][6]; ?>){
                document.question.response.value="Correct"
        }else{
                document.question.response.value="Incorrect"
        }
    }

</script>
</head>

<body>
<center>
<h1><?php print "Quiz"; ?></h1>
<table border=0 width=500>

<?php?>
<tr><td align=right>
<form method=post name="quiz" action="<?php print 'homepage.html'; ?>"> 
<br><input type=submit value="Finish">
<input type=hidden name=response value=0>
</form>
<hr>
</td></tr>

<tr><td>
<form method=post name="question" action="">
<?php print "<b>".$a[1][0].".</b><b>".$a[1][1]."</b>"; ?> 
<br>     <input type=radio name="option" value="1"  onclick=" Goahead(1);"><?php print $a[1][2] ; ?>
<br>     <input type=radio name="option" value="2"  onclick=" Goahead(2);"><?php print $a[1][3] ; ?>
<?php if ($a[1][4]!=""){ ?>
<br>     <input type=radio name="option" value="3"  onclick=" Goahead(3);"><?php print $a[1][4] ; } ?>
<?php if ($a[1][5]!=""){ ?>
<br>     <input type=radio name="option" value="4"  onclick=" Goahead(4);"><?php print $a[1][5] ; } ?>
<br>     <input type=text name=response size=8>
</form>
</td></tr>
</table>

</center>
</body>
</html>