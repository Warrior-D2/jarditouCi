<?php
include"assets/php/headerJarditou.php";

$message ='
<html>
<body>
<div align="center">
<a href="http://localhost:8888/Zone/Jarditou3.0/confirmation.php?login='.urlencode($login).'&key='.$key.'"> confirmez votre compte</a>
</div>
</body>
</html>

';

include("assets/php/footer.php");

?>