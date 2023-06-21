<?php
if($_SESSION['uid']==NULL)
{
	header("location:index.php");
}