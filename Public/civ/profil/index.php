<?php



include_once './../../../php/Config/Cfg_Master.php';
include_once './../../../php/Config/Cfg_Navbar_Public.php';






$check = $db_game->query("SELECT uid FROM players WHERE pid = '$steam'");
if($check->num_rows == 0) {
    header('location:logout.php');
} else {

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Crew | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="/dist/css//icofont/icofont.min.css">

  <!-- JQVMap -->
  <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <?php
          switch ($aufforderung) {
          case 1 : echo '<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Meldeaufforderung!</h5>
                  Bitte melde dich bei einem Ausbilder oder einer Leitung !
                </div>';
          default :''; };
                ?>
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
    <div class="row">
						<div class="col-md-3">

							<!-- Profile Image -->
							<div class="card card-primary card-outline">
								<div class="card-body box-profile">
									<div class="text-center">
										<img class="profile-user-img img-fluid img-circle" src="/img/player.jpg" alt="User profile picture">
									</div>

									<h1 class="profile-username text-center"><?php echo $name;  ?></h1>

									<p class="text-muted text-center"></p>

									<ul class="list-group list-group-unbordered mb-3">
										<li class="list-group-item">
											<b>Datenbank-ID:</b> <a class="float-right"><?php echo $uiduser;  ?> </a>
										</li>
										<li class="list-group-item">
											<b>Bargeld</b> <a class="float-right"><?php echo  number_format($cash);  ?></a>
										</li>
										<li class="list-group-item">
											<b>kontostand</b> <a class="float-right"><?php echo number_format($bankacc);  ?></a>
										</li>
										<li class="list-group-item">
											<b>Gesamtes Geld:</b> <a class="float-right"><?php echo number_format($cash+$bankacc);  ?></a>
										</li>
									</ul>


								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->

							<!-- About Me Box -->
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Stunden</h3>
								</div>
								<!-- /.card-header -->
								<div class="card-body">
									<strong><i class="fas fa-map-marker-alt mr-1"></i> Polizei Stunden</strong>
								<p class="text-muted"> <?php echo floor($coptime) ?> Stunden
										<hr>
										<strong><i class="fas fa-map-marker-alt mr-1"></i> Ark Stunden</strong>
										<p class="text-muted"><?php echo floor($medictime) ?> Stunden</p>
										<hr>
										<strong><i class="fas fa-pencil-alt mr-1"></i> Civ stunden </strong>
										<p class="text-muted"><?php echo floor($civtime); ?> Stunden </p>
										<hr>
										<strong><i class="far fa-file-alt mr-1"></i> Gesamtstunden</strong>
										<p class="text-muted"><?php echo floor($gtime); ?> Stunden </p>

										<p class="text-muted"></p>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<!-- /.col -->
						<div class="col-md-9">
							<div class="card">
								<div class="card-header p-2">
									<ul class="nav nav-pills">
										<li class="nav-item"><a class="nav-link active" href="#home" data-toggle="tab">Übersicht</a></li>
										<li class="nav-item"><a class="nav-link" href="#sendmsg" data-toggle="tab">Gesendete Nachrichten</a></li>
										<li class="nav-item"><a class="nav-link" href="#receivemsg" data-toggle="tab">Empfangene Nachrichten</a></li>
										<li class="nav-item"><a class="nav-link" href="#licence" data-toggle="tab">Lizenzen</a></li>
										<!--<li class="nav-item"><a class="nav-link" href="#moneylog" data-toggle="tab">Geldverlauf</a></li> -->
									</ul>
								</div><!-- /.card-header -->
								<div class="card-body">
									<div class="tab-content">
										<div class=" active tab-pane" id="home">

											<div class="row">
												<div class="col-md-3 col-sm-6 col-12">
													<div class="info-box bg-gradient-info">
														<span class="info-box-icon"><i class="icofont-police"></i></span>

														<div class="info-box-content">
															<span class="info-box-text">Polizei Level </span>
															<span class="info-box-number"></span>

															<div class="progress">
																<div class="progress-bar" style="width: <?php echo $coplevel ?>0%"></div>
															</div>
															<span class="progress-description">
																<?php echo $ranks['cop'][$coplevel] ?>
															</span>
														</div>
														<!-- /.info-box-content -->
													</div>
													<!-- /.info-box -->
												</div>
												<!-- /.col -->
												<div class="col-md-3 col-sm-6 col-12">
													<div class="info-box bg-gradient-warning">
														<span class="info-box-icon"><i class="icofont-doctor"></i></span>

														<div class="info-box-content">
															<span class="info-box-text">Altis Rotes Kreuz Level</span>
															<span class="info-box-number"></span>

															<div class="progress">
																<div class="progress-bar" style="width: <?php echo $mediclevel ?>0%"></div>
															</div>
															<span class="progress-description">
																<?php echo $ranks['med'][$mediclevel] ?>
															</span>
														</div>
														<!-- /.info-box-content -->
													</div>
													<!-- /.info-box -->
												</div>
												<!-- /.col -->
												<div class="col-md-3 col-sm-6 col-12">
													<div class="info-box bg-gradient-danger">
														<span class="info-box-icon"><i class="icofont-business-man"></i></span>

														<div class="info-box-content">
															<span class="info-box-text">Admin Level</span>
															<span class="info-box-number"></span>

															<div class="progress">
																<div class="progress-bar" style="width: <?php echo $adminlevel ?>0%"></div>
															</div>
															<span class="progress-description">
																<?php echo $ranks['admin'][$adminlevel] ?>
															</span>
														</div>
														<!-- /.info-box-content -->
													</div>
													<!-- /.info-box -->
												</div>
												<!-- /.col -->
												<div class="col-md-3 col-sm-6 col-12">
													<div class="info-box bg-gradient-danger">
														<span class="info-box-icon"><i class="fas fa-comments"></i></span>

														<div class="info-box-content">
															<span class="info-box-text">Nachrichten</span>
															<span class="info-box-number"></span>

															<div class="progress">
																<div class="progress-bar" style="width: 100%"></div>
															</div>
															<span class="progress-description">
																<?php echo  $countmessege ?>
															</span>
														</div>
														<!-- /.info-box-content -->
													</div>
													<!-- /.info-box -->
												</div>
												<!-- /.col -->
											</div>
											<!-- /.row -->





										</div>
										<!-- /.tab-pane -->
										<div class=" tab-pane" id="sendmsg">


              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
				  <?php

			  $Gesendet = "SELECT * FROM messages where fromID='$pid'  ";


              echo ' <table class="table table-striped">
              	<thead>
              	<tr>
              		<th>Von</th>
              		<th>Nachricht</th>
              		<th>An</th>

              	</tr>
              	</thead>';


              if ($result = mysqli_query($db_game, $Gesendet)) {
              while ($row = $result->fetch_assoc()) {
              $from = $row["fromName"];
              $msg = $row["message"];
			  $to = $row['toName'];

			  if(startsWith($msg,"\"")) {
				$msg = substr($msg, 1);
			}
			if(endsWith($msg,"\"")) {
				$msg = substr($msg, 0, -1);
			}


              echo '<tr>
              		<td>'.$from.'</td>
              		<td>'.$msg.'</td>
              		<td>'.$to.'</td>
              </tr>';
              }
              $result->free();
              }



			  ?>
			   </tbody>
				  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->





										</div>
										<!-- /.tab-pane -->
										<div class=" tab-pane" id="receivemsg">

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
				  <?php


			  $empfangen = "SELECT * FROM messages where toID='$pid'  ";

              echo ' <table class="table table-striped">
              	<thead>
              	<tr>
              		<th>Von</th>
              		<th>Nachricht</th>
              		<th>An</th>

              	</tr>
              	</thead>';


              if ($result = mysqli_query($db_game, $empfangen)) {
              while ($row = $result->fetch_assoc()) {
              $from = $row["fromName"];
              $msg = $row["message"];
			  $to = $row['toName'];

			  if(startsWith($msg,"\"")) {
				$msg = substr($msg, 1);
			}
			if(endsWith($msg,"\"")) {
				$msg = substr($msg, 0, -1);
			}


              echo '<tr>
              		<td>'.$from.'</td>
              		<td>'.$msg.'</td>
              		<td>'.$to.'</td>
              </tr>';
              }
              $result->free();
              }



			  ?>
			   </tbody>
				  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

										</div>


										<div class=" tab-pane" id="licence">


											<!-- Table row -->
											<div class="row">
                <div class="col-12 table-responsive">
				  <?php




              echo ' <table class="table table-striped">
              	<thead>
              	<tr>
              		<th>Vergebene Lizenzen:</th>

              	</tr>
				  </thead>';






			  	foreach($licenses['civ'] as $lic) {
					  if(contains('[`license_civ_'.$lic[0].'`,1]',$civ_licenses)) {
						 	echo "<tr>
							<td>".$lic[1]."</td>
							</tr>";
					  }

		   		}






			  ?>
			   </tbody>
				  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

										</div>

										<!-- /.tab-pane -->
										<div class="tab-pane" id="level">
											<form class="form-horizontal" method="post">
												<div class="form-group">

													<div class="form-group">

														<label>Polizei Rang</label>

														<select name="cop" class="form-control">
															<?php
															foreach ($ranks['cop'] as $k => $v) { ?>
																<option value="<?php echo $k ?>" <?php if ($copsee == $k) {
																											echo 'selected';
																										} ?>><?php echo $v ?></option>
															<?php
															}
															?>
														</select>
													</div>


													<input type="submit" name="submitcoplvl" value="Update" class="btn btn-danger">
												</div>
										</div>
										</form>
									</div>
									<!-- /.tab-pane -->
								</div>
								<!-- /.tab-content -->
							</div><!-- /.card-body -->
						</div>
						<!-- /.nav-tabs-custom -->
					</div>
					<!-- /.col -->
				</div>
				<!-- /.row -->






        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-rc.3
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
</body>
</html>
