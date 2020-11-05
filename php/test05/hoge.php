<?php require '../header.php'; ?>
<?php require 'UDbConnecition.php'; ?>
<?php
$db = new dbUtil();
$dbServer     =  $db-> dbServer();
$dbUser       =  $db-> dbUser();
$dbPassword   =  $db-> dbPassword();
echo '<p>';
echo $dbServer;
echo '</p>';

echo '<p>';
echo $dbUser;
echo '</p>';

echo '<p>';
echo $dbPassword;
echo '</p>';

        echo '</p>';
?>
<?php require '../footer.php'; ?>