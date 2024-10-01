<?php


$sqlko = "
SELECT  t_email FROM tbl_bgmi WHERE t_email = '$email'
UNION
SELECT t_email FROM tbl_coding WHERE t_email = '$email'
UNION
SELECT t_email  FROM tbl_escape WHERE t_email = '$email'
UNION
SELECT t_email FROM tbl_football WHERE t_email = '$email'
UNION
SELECT t_email FROM tbl_memory WHERE t_email = '$email'
UNION
SELECT t_email FROM tbl_reels WHERE t_email = '$email'
UNION
SELECT t_email FROM tbl_treasure WHERE t_email = '$email'
UNION
SELECT t_email FROM tbl_word WHERE t_email = '$email'
";

$re = $con->query($sqlko);



?>