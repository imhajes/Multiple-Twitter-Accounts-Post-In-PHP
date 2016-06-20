<?php
@error_reporting(0);
@error_log(NULL);
@session_start();
require_once('codebird.php');
function tweet($message,$media,$cusomerkey,$cusomersecrate,$token,$tokenSecret)
{
\Codebird\Codebird::setConsumerKey($cusomerkey, $cusomersecrate);
$cb = \Codebird\Codebird::getInstance();
$cb->setToken($token, $tokenSecret);
 
$params = array(
 'status' => "$message",
 'media[]' => "$media"
);
$reply = $cb->statuses_updateWithMedia($params);
return $reply;
}
$time = $_SESSION['time'];
$perm = $time+120;
if (isset($_POST['message'])&&isset($_POST['media']))
{
if(time()<$perm)
{
echo 'Flood limit';
exit;
}
$message = $_POST['message'];
$media = $_POST['media'];
tweet($message,$media,,$cusomerkey1,$cusomersecrate1,$token1,$tokenSecret1);
tweet($message,$media,$cusomerkey2,$cusomersecrate2,$token2,$tokenSecret2);
tweet($message,$media,$cusomerkey3,$cusomersecrate3,$token3,$tokenSecret3);
$_SESSION['time']= time();
echo 'Shred Successfully!';
}
else
{
echo '<form method="post">';
echo '<b>Message:</b><br/><textarea name="message"></textarea><br/>';
echo '<b>Image Link:</b><br/><input name="media"><br/>';
echo '<input type="submit" value="Share">';
echo '</form>';
}
?>
