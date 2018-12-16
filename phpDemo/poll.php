
<html>
<head>
    <script>
<?php
//supervariable that gets the value of the specified html field
$vote = $_REQUEST['vote'];
//get content of textfile
$filename = "poll_result.txt";
$content = file($filename);

//put content in array, explode is comprable to split() in Java
$array = explode("||", $content[0]);
//creates vaiables with old vote data
$cool = $array[0];
$kinda = $array[1];
$no = $array[2];

//edits count variables with new vote data
if ($vote == 0) {
$cool = $cool + 1;
}
if ($vote == 1) {
$kinda = $kinda + 1;
}if ($vote == 2) {
$no = $no +1;
}

//variable of string to write to file
$insertvote = $cool."||".$kinda."||".$no;
//opens file and creats stream, first param is filepath, second param is "mode" which sets permissions of file edits
//"w" write only and creates new file if doesn't exist
$fp = fopen($filename,"w");
//writes to the file stream
fputs($fp,$insertvote);
//closes the file stream
fclose($fp);
?>

</script>
</head>
<body>

<h2>Result:</h2>
<table>
    <tr>
        <td>Very Cool!</td>
        <td>
            <img src="poll.gif"
                 width='<?php echo(100*round($cool/($cool+$kinda+$no),2)); ?>'
                 height='20'>
            <?php echo(100*round($cool/($cool+$kinda+$no),2)); ?>%
        </td>
    </tr>
    <tr>
        <td>Kinda Cool</td>
        <td>
            <img src="poll.gif"

                 width='<?php echo(100*round($kinda/($cool+$kinda+$no),2)); ?>'
                 height='20'>
            <?php echo(100*round($kinda/($cool+$kinda+$no),2)); ?>%
        </td>
    </tr>
    <tr>
        <td>Not Cool</td>
        <td>
            <img src="poll.gif"

                 width='<?php echo(100*round($no/($cool+$kinda+$no),2)); ?>'
                 height='20'>
            <?php echo(100*round($no/($cool+$kinda+$no),2)); ?>%
        </td>
    </tr>
</table>
</body>
</html>
