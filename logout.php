<?php


setcookie("usuario_logado", "", time() - 3600, "/");
setcookie("id_usuario_logado", "", time() - 3600, "/");
header('Location: login.php');

exit;