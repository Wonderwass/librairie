<?php

session_start();

// $GLOBALS;
// $_SERVER;
// $_REQUEST;
// $_GET;
// $_POST;
// $_FILES;
// $_ENV;
// $_COOKIE;
// $_SESSION .

require_once('./inc/header.php');
var_dump($_SESSION);
echo "test";
?>

<h1>Page d'accueil</h1>
<?php

require_once('./inc/footer.php');
?>