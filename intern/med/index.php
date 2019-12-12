

<head>
          <div id="custom-bootstrap-menu" class="navbar navbar-default " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="#">Lost4gaming Dav</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  body {
      font-family: "Lato", sans-serif;
  }

  .sidenav {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #2E2E2E;
      overflow-x: hidden;
      padding-top: 20px;
  }

  .sidenav a {
      padding: 6px 6px 6px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #F2F2F2;
      display: block;
  }

  .sidenav a:hover {
      color: #f1f1f1;
  }

  .main {
      margin-left: 200px; /* Same as the width of the sidenav */
  }

  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
  </style>
  </head>
  <body>

  <div class="sidenav">
    <a href="#">Start</a>
    <a href="https://dav.lost4gaming.de/public/Verify">Ts3 Verify</a>
    <a href="https://dav.lost4gaming.de/public/Team">Team</a>
    <a href="https://dav.lost4gaming.de/public/Ausbildung">Ausbildung</a>
    <a href="logout.php" style="font-size:18px">Logout</a>
  </div>

  <div class="main">
    <h2>Dav V.1.0</h2>
		<p>
 		<?php
  	session_start();
  	if (isset($_SESSION['username'])) {
  		echo "<div class='loginbox'>Name: ".$_SESSION['username']."</div>";
  	}
  	else {

  	}
  	?></p>
  </div>

  </body>


    </div>
</div>
          <title>Lost4Gaming-Dav</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <link rel="stylesheet" href="css/footer-distributed.css">
      </head>
      <?php
       function fetch_data()
       {
            $output = '';
            $conn = mysqli_connect("localhost:3306", "sup", "pwpw12", "Dav");
            $sql = "SELECT * FROM tbl_sample";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {
            $output .= '<tr>
                                <td>'.$row["first_name"].'</td>
                                <td>'.$row["last_name"].'</td>


                           </tr>
                                ';
            }
            return $output;
          }
          if(isset($_POST["generate_pdf"]))
          {
               require_once('tcpdf/tcpdf.php');
               $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
               $obj_pdf->SetCreator(PDF_CREATOR);
               $obj_pdf->SetTitle("Generate HTML Table Data To PDF From MySQL Database Using TCPDF In PHP");
               $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
               $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
               $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
               $obj_pdf->SetDefaultMonospacedFont('helvetica');
               $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
               $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);
               $obj_pdf->setPrintHeader(false);
               $obj_pdf->setPrintFooter(false);
               $obj_pdf->SetAutoPageBreak(TRUE, 10);
               $obj_pdf->SetFont('helvetica', '', 11);
               $obj_pdf->AddPage();
               $content = '';
               $content .= '

                 <tr>
                      <th width="30%">first_name</th>
                      <th width="30%">last_Name</th>


                 </tr>
            ';
            $content .= fetch_data();
            $content .= '</table>';
            $obj_pdf->writeHTML($content);
          $obj_pdf->Output('file.pdf', 'I');
        }
       ?>



            <body>
                 <br />
                 <div class="container">
                      <h4 align="center">Team Liste</h4><br />
                      <div class="table-responsive">
                      	<div class="col-md-12" align="right">
                           <form method="post">

                           </form>
                           </div>
                           <br/>
                           <br/>
                           <table class="table table-bordered">
                                <tr>
                                     <th width="15%">Name</th>
                                     <th width="20%">Rang</th>


                                </tr>
                           <?php
                           echo fetch_data();
                           ?>
                           </table>
                      </div>
                 </div>
            </body>
