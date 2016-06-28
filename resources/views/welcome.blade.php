<!DOCTYPE html>
<html>
<head>
	<title>SUNDUL GAN!!</title>

	<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
	<script src="{{ URL::asset('bootstrap/js/tests/vendor/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('bootstrap/dist/js/bootstrap.js') }}"></script>
	<link href="{{ URL::asset('bootstrap/dist/css/bootstrap.css') }}" rel="stylesheet" type="text/css">

	<style>
	/* bootstrap.css */
* {
   font-size: 14px;
   line-height: 1.428;
}

/* style.css */
* {
   font-size: 16px;
   line-height: 2;
}
		html, body {
			height: 100%;
		}

		/*body {
			margin: 0;
			padding: 0;
			width: 100%;
			display: table;
			font-weight: 100;
			font-family: 'Lato';
		}

		.container {
			text-align: center;
			display: table-cell;
			vertical-align: middle;
		}

		.content {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 96px;
		}*/
	</style>
</head>
<body>

	<div class="container">
		<div class="panel panel-success">
			<div class="panel-heading"><h2>SMARTHOME ANDROID BERBASIS ARDUINO MEGA 2560 </h2></div>
			<div class="panel-body">
				<div  class ="row">
					<div class ="col-md-6">

						<div class="panel panel-primary">
							<div class="panel-heading"> <h4>Pengaturan Lampu </h4></div>
							<div class="panel-body">

								<div class ="col-md-12">
									<a   class="btn btn-info btn-click-action" id="btnonL1" role="button">ON LAMPU 1</a>
									<a   class="btn btn-danger  btn-click-action" id="btnoffL1" role="button">OFF LAMPU 1</a>
								</div>
								<br> </br>
								<div class ="col-md-12">
									<a   class="btn btn-info btn-click-action" id="btnonL2"  role="button">ON LAMPU 2</a>
									<a   class="btn btn-danger  btn-click-action" id="btnoffL2"  role="button">OFF LAMPU 2</a>
								</div>
								<br> </br>
								<div class ="col-md-12">
									<a   class="btn btn-info btn-click-action" id="btnonL3"  role="button">ON LAMPU 3</a>
									<a   class="btn btn-danger  btn-click-action" id="btnoffL3"  role="button">OFF LAMPU 3</a>
								</div>
								<br> </br>
								<div class ="col-md-12">
									<a   class="btn btn-info btn-click-action" id="btnonL4"  role="button">ON LAMPU 4</a>
									<a   class="btn btn-danger  btn-click-action" id="btnoffL4"  role="button">OFF LAMPU 4</a>
								</div>
								<br> </br>
								<div class ="col-md-12">
									<a   class="btn btn-info btn-click-action" id="btnonL5"  role="button">ON LAMPU 5</a>
									<a   class="btn btn-danger   btn-click-action" id="btnoffL5"  role="button">OFF LAMPU 5</a>
								</div>
							</div>
						</div>
					</div>
					<div class ="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading"> <h4>Pengaturan Fan </h4></div>
							<div class="panel-body">

								<div class ="col-md-12">
									<a   class="btn btn-info btn-click-action" id="btnonL6"   role="button">ON</a>
									<a   class="btn btn-danger  btn-click-action" id="btnoffL6"   role="button">OFF</a>
								</div>
								<br> </br>

							</div>
						</div>
						<div class="panel panel-primary">
							<div class="panel-heading"> <h4>Pengaturan Pintu Gerbang </h4></div>
							<div class="panel-body">

								<div class ="col-md-12">
									<a   class="btn btn-info  btn-click-action" id="btnonL7"   role="button">Buka</a>
									<a   class="btn btn-danger  btn-click-action" id="btnoffL7"   role="button">Tutup</a>
								</div>
								<br> </br>

							</div>
						</div>

					</div>

				</div> 
				<div  class ="row">
					<div class ="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-heading"> <h4>NILAI SUHU RUANGAN</h4></div>
							<div class="panel-body">
								<div class ="col-md-4">
								</div>
								<div class ="col-md-4">
									<form class="form-horizontal" role="form">
										<div class="form-group">
											<label class="control-label col-sm-4" for="suhu"></label>
											<div class="col-sm-4">
												<input type="text" class="form-control" id="suhu" placeholder="Derajat Celcius">
											</div>
										</div>

									</form>

								</div>
								<div class ="col-md-4">
								</div>
								<br> </br>
							</div>		
						</div>
					</div>
				</div> 
			</div>
		</div>
		<script type="text/javascript">
			$( document ).ready(function() {
				setTimeout(loapdateSuhudDoc, 3000);
				function loapdateSuhudDoc() {
					$.ajax({
						url: 'Ambilsuhu',
						dataType: 'text',
						type: 'get',
						//data: "data="+datak_,
						success: function( data, textStatus, jQxhr ){
							$("#suhu").val(data+" Celcius");
							setTimeout(loapdateSuhudDoc, 3000);
						},
						error: function( jqXhr, textStatus, errorThrown ){
						console.log( errorThrown );
							setTimeout(loapdateSuhudDoc, 3000);
						}
					});

				}

				var btnClassClick = function(e){
					e.preventDefault;

					if(e.currentTarget.id=="btnonL1"){
						datak_="L1,1";
					}
					else if(e.currentTarget.id=="btnoffL1"){
						datak_="L1,0";
					}
					else if(e.currentTarget.id=="btnonL2"){
						datak_="L2,1";
					}
					else if(e.currentTarget.id=="btnoffL2"){
						datak_="L2,0";
					}
					else if(e.currentTarget.id=="btnonL3"){
						datak_="L3,1";
					}
					else if(e.currentTarget.id=="btnoffL3"){
						datak_="L3,0";
					}
					else if(e.currentTarget.id=="btnonL4"){
						datak_="L4,1";
					}
					else if(e.currentTarget.id=="btnoffL4"){
						datak_="L4,0";
					}
					else if(e.currentTarget.id=="btnonL5"){
						datak_="L5,1";
					}
					else if(e.currentTarget.id=="btnoffL5"){
						datak_="L5,0";
					}
					else if(e.currentTarget.id=="btnonL6"){
						datak_="L6,1";
					}
					else if(e.currentTarget.id=="btnoffL6"){
						datak_="L6,0";
					}
					else if(e.currentTarget.id=="btnonL7"){
						datak_="L7,1";
					}
					else if(e.currentTarget.id=="btnoffL7"){
						datak_="L7,0";
					}

					$.ajax({
						url: 'proses',
						dataType: 'text',
						type: 'get',
						
						data: "data="+datak_,
						success: function( data, textStatus, jQxhr ){
							alert(data);
						},
						error: function( jqXhr, textStatus, errorThrown ){
							alert( errorThrown+" "+textStatus );
						}
					});


				}


				$('.btn-click-action').on('click', btnClassClick);
			});

		</script>

	</body>
	</html>
