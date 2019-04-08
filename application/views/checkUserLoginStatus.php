<?php 
if(isset($_SESSION['admin']) == true) 
  $name = $_SESSION['admin'];
else 
  redirect('Admin_controller/logIn','refresh'); 
?>