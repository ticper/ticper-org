<?php
	session_start();
	if (isset($_SESSION['org_id']) == '') {
		print("<script>location.href = 'index.php';</script>");
	} else {
	}

	$acode = $_POST['acode'];
	require_once('config/config.php');
	$sql = mysqli_query($link, "SELECT acode, food, used FROM tickets WHERE acode = '$acode'");
	$result = mysqli_fetch_assoc($sql);
	$food = $result['food'];
	$sql = mysqli_query($link, "SELECT org FROM food WHERE id = '$food'");
	$result2 = mysqli_fetch_assoc($sql);
	if($result['acode'] == $acode) {
		if($result2['org'] == isset($_SESSION['org_id'])) {
			if($result['used'] == 0) {
				$sql = mysqli_query($link, "UPDATE tickets SET used = '1' WHERE acode = '$acode'");
				print("<script>alert('食券を使用済みにしました。'); location.href = 'r-qrcheck.php';</script>");
			} else {
				print("<script>alert('この食券は使用済みです。'); location.href = 'r-qrcheck.php';</script>");
			}
		} else {
			print("<script>alert('別団体の食券です。'); location.href = 'r-qrcheck.php';</script>");
		}
	} else {
		print("<script>alert('存在しない食券です。'); location.href = 'r-qrcheck.php';</script>");
	}
?>