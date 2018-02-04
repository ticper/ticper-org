<?php
	session_start();
	if (isset($_SESSION['org_id']) == '') {
		print("<script>location.href = 'index.php';</script>");
	} else {
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		
		<meta name="robots" content="noindex,nofollow" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<meta name="description" content="食券管理Webアプリケーションツール「Ticper」" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="ログイン" />
		<meta property="og:site_name" content="Ticper" />
		<title>ホーム - Ticper</title>

		<!-- Jquery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Materialize -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/css/materialize.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.3/js/materialize.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<nav>
			<div class="nav-wrapper blue darken-4">
				<div class="container">
					<a href="#!" class="brand-logo">Ticper</a>
					<a href="#" data-target="mobilemenu" class="sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="right hide-on-med-and-down">
						<li><a href="r-qrcheck.php">交換</a></li>
						<li><a href="status.php">ステータスチェック</a></li>
						<li><a href="logout.php">ログアウト</a></li>
					</ul>
					<ul class="sidenav" id="mobilemenu">
						<li><a href="r-qrcheck.php">交換</a></li>
						<li><a href="status.php">ステータスチェック</a></li>
						<li><a href="logout.php">ログアウト</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<script>
			$(document).ready(function(){
    			$('.sidenav').sidenav();
    			$(".dropdown-trigger").dropdown();
  			});
  		</script>
  		<div class="container">
  			<div class="row">
  				<div class="col s12">
  					<?php
  						$user_id = $_SESSION['org_id'];
  						require_once('config/config.php');
  						$sql = mysqli_query($link, "SELECT name FROM org WHERE id = '$user_id'");
  						$result = mysqli_fetch_assoc($sql);
  					?>
  					<h2>メニュー</h2>
  					<p><?php print($result['name']); ?>さん、お疲れ様です、<br>画面上部のメニューからやりたいことを選択してください。</p>
  				</div>
  			</div>
  		</div>
 	</body>
</html>