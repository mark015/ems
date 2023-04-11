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

					<div class="row">
                    <div class="row">
                    <?php 
                    $brgy_id =$_GET['id'];
                    $query_brgy = "SELECT brgy FROM `brgy` WHERE id = '$brgy_id'";
                    $result_brgy = mysqli_query($conn, $query_brgy);
                    $brgy_fetch = mysqli_fetch_array( $result_brgy);
                    ?>
                    <div style="background-color:#008080;padding:15px;color:#ffffff"><strong style="font-size: 30px;">Barangay <?php echo $brgy_fetch['brgy']?> Dashboard</strong></div><br>
						<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div style="background-color:#FFA07A" class="summary-icon">
															<i class="fa fa-warning"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Non supporters</h4>
															<div class="info">
																<strong class="amount" id='nonSupporters'></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-6 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-group"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Supporters</h4>
															<div class="info">
																<strong class="amount" id="supporters"></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>	
									<div class="col-md-4 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-comments"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Coordinators</h4>
															<div class="info">
																<strong class="amount" id="coordinators"></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-4 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-paw"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title" >Leaders</h4>
															<div class="info">
																<strong class="amount" id="leaders"></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-4 col-xl-12">
										<section class="panel">
											<div class="panel-body bg-primary">
												<div class="widget-summary">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon">
															<i class="fa fa-smile-o"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Members</h4>
															<div class="info">
																<strong class="amount" id="members"></strong>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-uppercase">(view all)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
									<div class="col-md-3 col-lg-3 col-xl-3">
								<section class="panel">
									<header class="panel-heading bg-white">
										<div class="panel-heading-icon bg-success mt-sm">
											<i class="fa fa-thumbs-up"></i>
										</div>
									</header>
									<div class="panel-body">
									<h3 class="text-semibold mt-none text-center">Voted</h3>
										<p class="text-center label-primary" id="voted" style="font-size:25px;padding:10px;border-radius:3px"></p>
										<p class="text-center">Out of 33000</p>
									</div>
								</section>
							</div>
							<div class="col-md-3 col-lg-3 col-xl-3">
								<section class="panel">
									<header class="panel-heading bg-white">
										<div class="panel-heading-icon bg-secondary mt-sm">
											<i class="fa fa-thumbs-down"></i>
										</div>
									</header>
									<div class="panel-body">
									<h3 class="text-semibold mt-none text-center">Not voted</h3>
										<p class="text-center label-primary" id="notVoted" style="font-size:25px;padding:10px;border-radius:3px">0.12 %</p>
										<p class="text-center">Out of 33000</p>
									</div>
								</section>
							</div>
							<div class="col-md-3 col-lg-3 col-xl-3">
								<section class="panel">
									<header class="panel-heading bg-white">
										<div class="panel-heading-icon mt-sm">
										<img class="img" src="https://downtownls.org/wp-content/uploads/uparrow.gif" wdth="35px" height="40px"/>
										</div>
									</header>
									<div class="panel-body">
										<h3 class="text-semibold mt-none text-center">Winning %</h3>
										<p class="text-center label-primary" id="WinningPercent" style="font-size:25px;padding:10px;border-radius:3px"> %</p>
										<p class="text-center">Out of 33000</p>
									</div>
								</section>
							</div>
							<div class="col-md-3 col-lg-3 col-xl-3">
								<section class="panel">
									<header class="panel-heading bg-white">
										<div class="panel-heading-icon mt-sm">
										<img class="img" src="https://upload.wikimedia.org/wikipedia/commons/8/89/Red-animated-arrow-down.gif" wdth="35px" height="40px"/>
										</div>
									</header>
									<div class="panel-body">
										<h3 class="text-semibold mt-none text-center">Lossing %</h3>
										<p class="text-center label-primary" id="LossingPercent" style="font-size:25px;padding:10px;border-radius:3px"></p>
										<p class="text-center">Out of 33000</p>
									</div>
								</section>
							</div>
						</div>

					

				
					
					<!-- end: page -->
				</section>
			</div>
			<?php
				include('include/right-sidebar.php');
			?>
			
		</section>

		<?php
			include('include/js.php');
			include('js_function/dashboard/view.php');
		?>
		<script>
			
			$(document).ready(function(){
				nonSupp();
				supp();
				coordinators();
				leaders();
				members();
				winningPercent();
				lossingPercent();
				voted();
				notVoted();
			})
		</script>
	</body>
</html>