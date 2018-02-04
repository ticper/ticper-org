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
  					<h2>QRコードチェック</h2>
  					<p>QRコードを撮影するかアクティベーションコードを入力してください。</p>
  					<form action="r-qrcheck-do.php" method="POST" name="myForm">
  						<div class="input-field s12 m6">
  							<input id="acode" class="validate" name="acode" type="text">
  							<label for="acode">アクティベーションコード</label>
  						</div>
  						<input type="submit" value="送信" class="btn">
  					</form>
  					<video id="preview"></video>
     				<script>
      					var videoTag = document.getElementById('preview');
      					var info = document.getElementById('acode');
      					var scanner = new Instascan.Scanner({ video: videoTag });
      					
      					//QRコードを認識して情報を取得する
      					scanner.addListener('scan', function (value) {
        					info.value = value;
        					Materialize.toast('読み込みました', 4000)
       					});
      
      					//PCのカメラ情報を取得する
      					Instascan.Camera.getCameras()
      					.then(function (cameras) {
          
          					//カメラデバイスを取得できているかどうか？
          					if (cameras.length > 0) {
            	
            					//スキャンの開始
            					scanner.start(cameras[0]);
          					}
          					else {
            					alert('カメラを見つけることができませんでした。');
          					}
      					})
      					.catch(function(err) {
        					alert(err);
      					});
    				</script>
  				</div>
  			</div>
  		</div>
  	</body>
</html>