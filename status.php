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

		<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
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
  					<h2>ステータスチェック</h2>
  					<?php
  						$uriage = 0;
  						require_once('config/config.php');
  						$orgid = $_SESSION['org_id'];
  						$sql = mysqli_query($link, "SELECT * FROM food WHERE org = '$orgid'");
  						while($result = mysqli_fetch_assoc($sql)) {
  							print('<table>');
  							print('<tr><th colspan="2">'.$result['name'].'</th></tr>');
  							$food = $result['id'];
  							$sql2 = mysqli_query($link, "SELECT count(*) AS num FROM tickets WHERE food = '$food'");
  							$result2 = mysqli_fetch_assoc($sql2);
  							$uriage = $result['price'] * $result2['num'];
  							print('<tr><th>食券販売枚数</th><td>'.$result2['num'].'枚</td></tr>');
  							$sql2 = mysqli_query($link, "SELECT count(*) AS num FROM tickets WHERE food = '$food' AND used = '1'");
  							$result2 = mysqli_fetch_assoc($sql2);
  							print('<tr><th>使用済み食券枚数</th><td>'.$result2['num'].'枚</td></tr>');
  							$sql2 = mysqli_query($link, "SELECT count(*) AS num FROM tickets WHERE food = '$food' AND used = '0'");
  							$result2 = mysqli_fetch_assoc($sql2);
  							print('<tr><th>未使用食券枚数</th><td>'.$result2['num'].'枚</td></tr>');
  							print('<tr><th>残り販売可能食券枚数</th><td>'.$result['stock'].'枚</td></tr>');
  							print('<tr><th>売上金額</th><td>'.$uriage.'円</td></tr>');
  							print('</table>');
  							print('<br><br><br>');
  						}
  					?>
  					<br><br><br><br>
  				</div>
  			</div>
  		</div>
  	</body>
</html>