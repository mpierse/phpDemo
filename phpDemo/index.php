
<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet">

    <script>
        function getVote(int) {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("poll").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","poll.php?vote="+int,true);
            xmlhttp.send();
        }

    </script>
</head>
<body>
<?php
echo "<h1>PHP Demo</h1>";
echo "<h2>Let's learn some PHP!</h2>";
echo "<br>";
?>


<div id="poll">
    <h3>How cool is PHP?</h3>
    <form>
        <input type="radio" name="vote" value="0" onclick="getVote(this.value)">
        It's the coolest language ever!
        <br>
        <input type="radio" name="vote" value="1" onclick="getVote(this.value)">
        Pretty cool, not as cool as the language my group's presenting.
        <br>
        <input type="radio" name="vote" value="2" onclick="getVote(this.value)">
        Sorry, I only code in Go because I'm too cool for school.
    </form>
</div>

</body>
</html>
