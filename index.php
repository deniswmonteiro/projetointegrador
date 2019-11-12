<?php
	include("connect.php");  

	$link=Connection();
	$result=mysqli_query($link, "SELECT * FROM dados_recebidos ORDER BY dia_hora DESC limit 0,1;");

	date_default_timezone_set('America/Belem');
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>EEEM Deodoro de Mendonça</title>
		<link href='css/uikit.min.css' rel='stylesheet'>
		<link href="css/style.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
		<script src="js/uikit.min.js"></script>
		<script src="js/uikit-icons.min.js"></script>
		<script src="js/script.js"></script>
  </head>
  <body>
		<div id="offcanvas-slide" uk-offcanvas="mode: slide; overlay: true">
			<div class="uk-offcanvas-bar">
				<ul class="uk-nav">
					<a class="uk-navbar-item uk-logo uk-width-1-3 uk-align-center" href=".">
						<img src="img/logo.png" alt="Logo do site">
					</a>
					<hr class="uk-divider-icon">
					<li><a href="sobre.html">Sobre</a></li>
					<li><a href="historia.html">História</a></li>
				</ul>
			</div>
		</div>

		<nav class="uk-navbar-container" uk-navbar>
			<div class="uk-navbar-left">
				<a class="uk-navbar-toggle" uk-toggle="target: #offcanvas-slide" uk-navbar-toggle-icon href=""></a>
				<a class="uk-navbar-item uk-logo uk-width-1-3" href="." data-logo>
					<img src="img/logo.png" alt="Logo do site">
				</a>
			</div>
			<div class="uk-navbar-right">
				<ul class="uk-navbar-nav">
					<li><a href="sobre.html">Sobre</a></li>
					<li><a href="historia.html">História</a></li>
				</ul>
			</div>
		</nav>
		
		<section class="home">
			<div class="uk-container">
				<h1>Alerta Anti-incêndio</h1>
				<div id="dados-arduino">
					<div class="uk-child-width-1-4@m uk-grid-small uk-grid-match" uk-grid>
						<?php
							if($result!==FALSE){
								while($row = mysqli_fetch_array($result)) {
									echo "
										<div>
											<div class='uk-card uk-card-default uk-card-body uk-border-rounded'>
												<p class='uk-text-bold'>
													Dia/Hora
													<span class='uk-text-normal'> ";
														echo date('d/m/Y – H:i:s');
												echo
													"</span>
												</p>
											</div>
										</div>
										<div>";
											if($row["temperatura"] <= '38') {
												echo "
													<div class='uk-card uk-card-default uk-card-body uk-border-rounded'>
														<p class='uk-text-bold'>
															Sensor de Temperatura
															<span class='uk-text-normal'>";
																echo $row["temperatura"];
														echo "
															ºC
															</span>
														</p>
													</div>";
											}

											else {
												echo "
													<div class='uk-card uk-card-default uk-card-body uk-border-rounded card-alerta'>
														<p class='uk-text-bold'>
															Sensor de Temperatura
															<span class='uk-text-normal'>";
																echo $row["temperatura"];
														echo "
															ºC
															</span>
														</p>
													</div>";
											}
										
									echo "
										</div>
										<div>";
											if($row["gas"] === '1') {
												echo"
													<div class='uk-card uk-card-default uk-card-body uk-border-rounded'>
														<p class='uk-text-bold'>
															Sensor de Gás
															<span class='uk-text-normal'>
																Valores aceitáveis de gás e fumaça no ambiente
															</span>
														</p>
													</div>";
											}

											else {
												echo "
													<div class='uk-card uk-card-default uk-card-body uk-border-rounded card-alerta'>
														<p class='uk-text-bold'>
															Sensor de Gás
															<span class='uk-text-normal'>
																Alta concentração de gás ou fumaça no ambiente!
															</span>
														</p>
													</div>";
											}
									
									echo"
										</div>
										<div>";
										if($row["chamas"] === '1') {
											echo "
												<div class='uk-card uk-card-default uk-card-body uk-border-rounded'>
													<p class='uk-text-bold'>
														Sensor de Chamas
														<span class='uk-text-normal sensor-chamas'>
															Ambiente sem presença de fogo
														</span>
													</p>
												</div>";
										}

										else {
											echo "
												<div class='uk-card uk-card-default uk-card-body uk-border-rounded card-alerta'>
													<p class='uk-text-bold'>
														Sensor de Chamas
														<span class='uk-text-normal'>
															Fogo detectado!
														</span>
													</p>
												</div>";
										}

									echo "
											</div>";
								}

								mysqli_free_result($result);
								mysqli_close($link);
							}
						?>
					</div>
				</div>
			</div>
		</section>

		<footer>
      <div class="contatos">
			  <div class="uk-container">
				  <div uk-grid>
            <div>
              <h3>Contatos</h3>
              <ul class="uk-list">
                <li>
                  Endereço: Av. Governador José Malcher 1600, Nazaré Belém - PA - CEP: 66060-230
                </li>
                <li>Telefone: (091) 3242-6974</li>
                <li>Email: deodorom@yahoo.com.br</li>
              </ul>    
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="uk-container">
          <div uk-grid>
          <div class="copy">
            <p>
              Copyright &copy; 2019 &ndash; Todos os direitos reservados
            </p>
          </div>
        </div>
      </div>
		</footer>

		<script src="js/jquery-3.4.1.min.js"></script>
	</body>
</html>