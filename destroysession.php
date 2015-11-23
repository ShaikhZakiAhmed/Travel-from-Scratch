<?Php
session_start();
if(isset($_SESSION['train_id']))
  unset($_SESSION['train_id']);
?>