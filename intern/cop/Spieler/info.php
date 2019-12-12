<?php



include_once './../../../php/Config/Cfg_Master.php';

$check = $db_game->query("SELECT uid FROM players WHERE pid = '$steam' and coplevel >=9");
if($check->num_rows == 0) {
  header('Location:/test/logout.php');
  exit;
} else {

};




include_once './../../../php/Config/Cfg_Navbar_Public.php';
?>
<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Crew | Spieler Profil</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- Main Sidebar Container -->
		<!-- Sidebar Menu -->

		<!-- /.sidebar -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Profile</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">User Profile</li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

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

									<h1 class="profile-username text-center"><?php print_r($name_get);  ?></h1>

									<p class="text-muted text-center"></p>

									<ul class="list-group list-group-unbordered mb-3">
										<li class="list-group-item">
											<b>Datenbank-ID:</b> <a class="float-right"><?php print_r($uid_get);  ?> </a>
										</li>
										<li class="list-group-item">
											<b>Bargeld</b> <a class="float-right"><?php echo  number_format($cash_get);  ?></a>
										</li>
										<li class="list-group-item">
											<b>kontostand</b> <a class="float-right"><?php echo number_format($bankacc_get);  ?></a>
										</li>
										<li class="list-group-item">
											<b>Gesamtes Geld:</b> <a class="float-right"><?php echo number_format($bankacc_get+$cash_get);  ?></a>
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
								<p class="text-muted"> <?php echo floor($coptime_get) ?> Stunden
										<hr>
										<strong><i class="fas fa-map-marker-alt mr-1"></i> Ark Stunden</strong>
										<p class="text-muted"><?php echo floor($medictime_get) ?> Stunden</p>
										<hr>
										<strong><i class="fas fa-pencil-alt mr-1"></i> Civ stunden </strong>
										<p class="text-muted"><?php echo floor($civtime_get); ?> Stunden </p>
										<hr>
										<strong><i class="far fa-file-alt mr-1"></i> Gesamtstunden</strong>
										<p class="text-muted"><?php echo floor($gtime_get); ?> Stunden </p>

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
										<li class="nav-item"><a class="nav-link" href="#note" data-toggle="tab">Einträge</a></li>
										<li class="nav-item"><a class="nav-link" href="#ausbildung" data-toggle="tab">Ausbildungen</a></li>
										<li class="nav-item"><a class="nav-link" href="#level" data-toggle="tab">Rang</a></li>
										<li class="nav-item"><a class="nav-link" href="#kummer" data-toggle="tab">Kummer</a></li>
										<li class="nav-item"><a class="nav-link" href="#melden" data-toggle="tab">Melde aufforderung</a></li>
									</ul>
								</div><!-- /.card-header -->
								<div class="card-body">
									<div class="tab-content">
										<div class=" active tab-pane" id="home">

											<div class="row">
												<div class="col-md-3 col-sm-6 col-12">
													<div class="info-box bg-gradient-info">
														<span class="info-box-icon"><i class="far fa-bookmark"></i></span>

														<div class="info-box-content">
															<span class="info-box-text">Polizei Level </span>
															<span class="info-box-number"></span>

															<div class="progress">
																<div class="progress-bar" style="width: <?php echo $coplevel_get ?>0%"></div>
															</div>
															<span class="progress-description">
																<?php echo $ranks['cop'][$coplevel_get] ?>
															</span>
														</div>
														<!-- /.info-box-content -->
													</div>
													<!-- /.info-box -->
												</div>
												<!-- /.col -->
												<div class="col-md-3 col-sm-6 col-12">
													<div class="info-box bg-gradient-warning">
														<span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

														<div class="info-box-content">
															<span class="info-box-text">Altis Rotes Kreuz Level</span>
															<span class="info-box-number"></span>

															<div class="progress">
																<div class="progress-bar" style="width: <?php echo $mediclevel_get ?>0%"></div>
															</div>
															<span class="progress-description">
																<?php echo $ranks['med'][$mediclevel_get] ?>
															</span>
														</div>
														<!-- /.info-box-content -->
													</div>
													<!-- /.info-box -->
												</div>
												<!-- /.col -->
												<div class="col-md-3 col-sm-6 col-12">
													<div class="info-box bg-gradient-danger">
														<span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

														<div class="info-box-content">
															<span class="info-box-text">Sek Level</span>
															<span class="info-box-number"></span>

															<div class="progress">


																<div class="progress-bar" style="width: <?php echo $sekbar_get?>%"></div>
															</div>
															<span class="progress-description">
																  <?php echo $ranks['sek'][$seklevel_get]?>
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
															<span class="info-box-text">Einträge</span>
															<span class="info-box-number"></span>

															<div class="progress">
																<div class="progress-bar" style="width: 100%"></div>
															</div>
															<span class="progress-description">
																<?php echo   (mysqli_num_rows(mysqli_query($db_game,"SELECT * FROM crew_note where uid='$uid_get' and type='cop'")));   ?>
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
										<div class=" tab-pane" id="note">


              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
				  <?php
              $note = "SELECT * FROM crew_note where uid='$uid_get' and type='cop'";

              echo ' <table class="table table-striped">
              	<thead>
              	<tr>
              		<th>ID</th>
              		<th>Notiz</th>
              		<th>Ersteller</th>

              	</tr>
              	</thead>';


                if ($result = mysqli_query($db_game, $note)) {
                while ($row = $result->fetch_assoc()) {
              $id = $row["id"];
              $customer = $row["ersteller"];
              $notiz = $row['note'];


              echo '<tr>
              		<td>'.$id.'</td>
                  <td>'.$notiz.'</td>
              		<td>'.$customer.'</td>

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

			  <div class="card-footer">
                <form  method="post">
                  <div class="input-group">
                    <input type="text" name="note" placeholder="Notiz eintragen" class="form-control">
                    <span class="input-group-append">
                      <input type="submit" name="notecop" class="btn btn-primary" value="Abschicken" >
                    </span>
                  </div>
                </form>
              </div>



										</div>
										<!-- /.tab-pane -->
										<div class=" tab-pane" id="ausbildung">
                      <form method="post">
                        <input type="hidden" name="actionc" value="updatecLicenses" /><br />

                            <td valign="top">
                              <table class="ui celled striped table">
                                <thead>
                                  <tr>
                                    <th colspan="2">Ausbildung </th>
                                  </tr>
                                </thead>
                                <?php
                                foreach ($licenses['cop'] as $lic) {
                                  echo "<tr><td><input name='license_cop_" . $lic[0] . "' type='checkbox' ";
                                  if (contains('[`license_cop_' . $lic[0] . '`,1]', $cop_licenses_get)) {
                                    echo "checked";
                                  }
                                  echo " /></td><td>" . $lic[1] . "</td></tr>";
                                }
                                ?>
                              </table>
                            </td>

                          <tr>
                            <td>
                              <input type="submit" value="Ausbildung eintragen" class="btn btn-danger" />
                            </td>
                          </tr>
                        </table>
                      </form>
										</div>


										<div class=" tab-pane" id="melden">

											<form class="form-horizontal" method="post">
												<div class="form-group">

													<div class="form-group">

														<label>aufforderung </label>

														<select name="cop" class="form-control">
															<option value="1">Aufordern!</option>
															<option value="0">Aufordern reseten</option>

														</select>
													</div>


													<input type="submit" name="copmelden" value="Update" class="btn btn-danger">
												</div>
										</div>
										</form>









										<div class=" tab-pane" id="Kummer">


                          <!-- Table row -->
                          <div class="row">
                            <div class="col-12 table-responsive">
            				  <?php


            			  $kummertext = "SELECT * FROM crew_messege where uid='$uid_get' and type='cop'  ";

                          echo ' <table class="table table-striped">
                          	<thead>
                          	<tr>

                          		<th>Zeitpunkt</th>
                              <th>Kummer</th>
                          	</tr>
                          	</thead>';


                          if ($result = mysqli_query($db_game, $kummertext)) {
                          while ($row = $result->fetch_assoc()) {
                          $text = $row["Text"];
                          $date = $row["date"];




                          echo '<tr>

                          		<td>'.$date.'</td>
                              <td>'.$text.'</td>
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
										<div class="tab-pane" id="level">
											<form class="form-horizontal" method="post">
												<div class="form-group">

													<div class="form-group">

														<label>Polizei Rang</label>

														<select name="cop" class="form-control">
															<?php
															foreach ($ranks['cop'] as $k => $v) { ?>
																<option value="<?php echo $k ?>" <?php if ($coplevel_get == $k) {
																											echo 'selected';
																										} ?>><?php echo $v ?></option>
															<?php
															}
															?>
														</select>
													</div>



													<input type="submit" name="submitcoplvl" value="Speichern" class="btn btn-danger">
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
		</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>

	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="float-right d-none d-sm-block">
			<b>Version</b> 3.0.0-beta.2
		</div>
		<strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
		reserved.
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="/../../plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="/../../plugins/fastclick/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="/../../dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="/../../dist/js/demo.js"></script>
</body>

</html>
