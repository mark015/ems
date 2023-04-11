<?php
	$brgy_id = $_GET['id'];
?>
<!doctype html>
<html class="fixed">
	<head>
		<?php
			include('include/css.php');
		?>


	</head>
	<body>
		<section class="body">

			<?php
				include('include/navbar.php');
			?>

			<div class="inner-wrapper">
				<?php
					include('include/sidebar.php');
				?>

				<section role="main" class="content-body">
					<?php
						include('include/header.php');
					?>
						<h3 id='position' style="float: left;"></h3>
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
								<header class="panel-heading">
									<div class="panel-actions">
										<div class="row">
											
												<a href="#" class="fa fa-caret-down"></a>
												<a href="#" class="fa fa-times"></a>

										</div>
										
										
									</div>

									
								</header>
								<div class="panel-body">
                                    <table id="residents_breakdown" class="table"></table>
								</div>
							</section>
						</div>
						
					</div>

					<!-- start: page -->
					<!-- end: page -->
				</section>
			</div>
			<?php
				include('include/right-sidebar.php');
			?>
			
		</section>

		<?php
			include('include/js.php');
		?>

		<script type="text/javascript">
			function residents_breakdown(val)
			{
				$.ajax({
					type: 'post',
					url: 'coordinator.php',
					data: {
						get_option:val, brgy_id:<?php echo $brgy_id;?>
					},
					success: function (val) {
						document.getElementById("residents_breakdown").innerHTML=val;
						document.getElementById("position").innerHTML='Coordinator List'; 
					}
				});
			}
			function coordinator(val){
				$(document).on('click','#view_coor',function(){
				event.preventDefault(); // prevent form submit
				var form = event.target.form; // storing the form
				var id = $(this).attr('data-id');
				$.ajax({
					type: 'post',
					url: 'leader.php',
					data: {
						get_option:val, id:id
					},
					success: function (val) {
						document.getElementById("residents_breakdown").innerHTML=val;
						document.getElementById("position").innerHTML='Leader List';  
					}
				});
				
				})
			}
			$(document).ready(function(){
				residents_breakdown();
				coordinator();
			});
		</script>
	</body>
</html>