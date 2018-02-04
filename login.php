<?php
	session_start();
	require_once('config/config.php');
	
	$user_id = $_POST['org_id'];
	$password = $_POST['password'];
	if(!empty($user_id) OR !empty($password)) {
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = mysqli_query($link, "SELECT * FROM org WHERE id = '$user_id';");
		$result = mysqli_fetch_assoc($sql);

		if ($result['id'] == $user_id AND $result['password'] == $password) {
			$_SESSION['org_id'] = $user_id;
			print('<script>location.href="home.php";</script>');
		} else {
			print('<script>alert("入力内容が間違っています。"); location.href="index.php";</script>');
		}
	} else {
		print("<script>alert('クリスサイトスクリプティングの可能性があるため、初期ページに転移します。'; location.href='index.php';</script>");
	}
?>