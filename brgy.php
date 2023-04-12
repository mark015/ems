<?php
	$brgy_id = $_GET['id'];
?>
<!doctype html>
<html class="fixed">
	<head>
		<?php
			include('include/css.php');
		?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
	
ul.ui-front {
    z-index: 1100;
}
@keyframes autofill {
  100% {
    background: transparent;
    color: inherit;
    font-size: inherit;
  }
}
  </style>
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
					<h3 id="positionNames"></h3>
					<h3 id='position'></h3>
					<h3 id='coor_hidden'></h3>
					<h3 id='lead_hidden'></h3>
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-1">
								<button type="button" class="btn btn-primary" id='addModals' data-toggle="modal" data-target="#exampleModal">
									<i class="fa fa-plus"></i>
								</button>
							</div>
							<div class="col-md-1">
								<button type="button" class="btn btn-success" onclick="jQuery('#print_table').print()">
									<i class="fa fa-print"></i>
								</button>
							</div>
							
							<div class="col-md-1 " id="qr_code"></div>
						
							<div class="col-md-9" id="search"></div>
						</div>
						
					</div>
					
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
								<div class="panel-body" id="print_table">
									<div class="">
                                    	<table id="residents_breakdown" class="table table-striped"></table>
									</div>
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
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title">Add Coordinator</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h4>Name:</h4>
					<div id="input_name"></div>
					<div id="names"></div>
					
					
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Add</button>
				</div>
				</div>
			</div>
		</div>

		
		<!-- Update Modal -->
		<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title">Add Coordinator</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h4>Name:</h4>
					<div id="viewNameCoor"></div>
					
					<div id="namePos"></div>
					<div class="ui-widget">
						<label for="changeName">Coordinator Name: </label>
						<input id="changeName" class="form form-control">
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id="update" class="btn btn-primary">Update</button>
				</div>
				</div>
			</div>
		</div>

		<!-- Leader Update Modal -->
		<div class="modal fade" id="leaderUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title">Add Coordinator</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h4>Name:</h4>
					<div id="viewNameLead"></div>
					
					<div id="namePos"></div>
					<div class="ui-widget" id="inputDiv">
						<label for="changeName" style="font-size: 18px;" id="labelPosition"></label>
						<input id="LeaderChangeName" class="form form-control">
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id="updateLeaderButton" class="btn btn-primary">Update</button>
				</div>
				</div>
			</div>
		</div>
		<!-- end leader update modal -->

		<!-- member update modal -->
		<div class="modal fade" id="MemberUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="title">Add Coordinator</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h4>Name:</h4>
					<div id="viewNameMem"></div>
					
					<div id="namePos"></div>
					<div class="ui-widget" id="inputDiv">
						<label for="changeName" style="font-size: 18px;" id="labelPosition"></label>
						<input id="MemChangeName" class="form form-control">
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" id="updateMemberButton" class="btn btn-primary">Updates</button>
				</div>
				</div>
			</div>
		</div>
		<!-- end member modal updates -->



		<?php
			include('include/js.php');
			include('js_function/view.php');
			include('js_function/add.php');
			include('js_function/delete.php');
			include('js_function/update.php');
			include('js_function/search.php');
		?>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			leaderUpdateModal();
			add_leader();
			add_coordinator();
			// add_list_coordinator();
			add_member();
			residents_breakdown();
			member();
			leader();
			delete_coordinator();
			delete_leader();
			delete_member();
			qr_code();
			viewUpdate();
			name();
			updateCoor();
			leaderAutocomplete();
			updateleaderButton();
			membersUpdateModal();
			MemAutocomplete();
			updateMember();
			backCoor();
			backLead();
		});
		</script>
	</body>
</html>