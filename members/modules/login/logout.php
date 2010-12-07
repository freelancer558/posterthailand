<?php

$q = $db->select_query('DELETE FROM session WHERE ss_user = "'.$_SESSION['usr'].'"');
header('Location: ../index.php');

?>