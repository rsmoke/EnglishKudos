<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/../Support/configEnglishKudos.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/../Support/basicLib.php");

$recordID = $_SESSION['userEntry'];

if (isset($_POST["confirmEntry"])) {
  //do check related stuff
  header("Location: " . "https://webapps.lsa.umich.edu/english/secure/userservices/profile.asp");
    exit();

} elseif (isset($_POST["deleteentry"])) {

  //preserve entry but mark a cancelled"
  $cancelquery  = "UPDATE tbl_kudos SET ";
  $cancelquery .= "selectedDelete = 'deleted' ";
  $cancelquery .= "WHERE id = {$recordID}";
  if ($result = $db->query($cancelquery)) {
    $db->close();
  //sending user to an address outside of this webapp 
  header("Location: " . "https://webapps.lsa.umich.edu/english/secure/userservices/profile.asp");
      exit(); 
  } else {
      die(db_fatal_error("Database query failed for cancel. "));
  }

} else {
  $message = "Please review your information"; 
 
  $sql = "SELECT * ";
  $sql .= "FROM tbl_kudos ";
  $sql .= "WHERE id=$recordID";

  $result = $db->query($sql);

  if ($result && $result->num_rows > 0 ) {

      // 3. Use returned data (if any)
      while($subject = mysqli_fetch_assoc($result)) {
        // output data from each row
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>LSA-<?php echo "$pageTitle";?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo "$pageTitle";?>">
    <meta name="keywords" content="LSA-English, Kudos, UniversityofMichigan">
    <meta name="author" content="LSA-MIS_rsmoke">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap-formhelpers.min.css" media="screen">
    <link rel="stylesheet" href="css/normalize.css" media="all">
    <link rel="stylesheet" href="css/default.css" media="all">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    input[type=number] {
    -moz-appearance:textfield;
    }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div class="outerWrap">
        <div id="leftShadow"></div>
        <div id="innerWrapper">
          <header>
            <a href="http://www.lsa.umich.edu/english"><img src="img/banner.png" id="banner" width=388px height="85" alt="English Department website"></a><br>
          </header>
          <div id="headerBarBtm"></div>
          <div id="kudoForm" class="form">
            <h1>Department Member News</h1>
            <form action="confirm.php" method="post">
              <div id="userInfo" >
                <div class="row-fluid clearfix">
                  <div class="form-group">
                    <label for="userFname" >First name</label><?php echo ": " . $subject['userFname']?><br>
                    <label for="userLname">Last name</label><?php echo ": " . $subject['userLname']?><br>
                    <?php if ($subject['kudoType'] == "AwardPrize" ) { echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'>&nbsp;</span>Award / Prize<br>"; } ?>
                    <?php if ($subject['kudoType'] == "Conf_Lect" ) { echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'>&nbsp;</span>Conference / Lecture<br>"; } ?>
                    <?php if ($subject['kudoType'] == "Publication" ) { echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'>&nbsp;</span>Publication<br>"; } ?>
                    <?php if ($subject['kudoType'] == "Fellowship" ) { echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'>&nbsp;</span>Fellowship<br>"; } ?>
                    <?php if ($subject['kudoType'] == "Other" ) { echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'>&nbsp;</span>Other<br>"; } ?>
                    <br>
                    <label for="kudoDesc">Title / Name</label><?php echo ": " . $subject['kudoTitle']?><br>
                    <label for="kudoDesc">Description</label><?php echo ": " . $subject['kudoDesc']?><br>
                  </div>
                </div>
              </div>

               <div id="editentry">
                <div class="row clearfix">
                  <div class="col-sm-6 col-sm-offset-3">
                    <div class="well well-sm">
                      <div class="text-center">
                        <p>Confirm or delete this entry now.</p>
                          <input class="btn btn-success btn-xs" type="submit" name="confirmEntry" value="Confirm" />
                          <input class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Cancel your entry and return to your profile page" type="submit" name="deleteentry" value="Delete" />
                          <p><em>Do not use the browser back button</em></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            </div>
          <div id="footerInnerWrap">
            <div class="footerClmn">
              <p><strong>Dept. of English Language and Literature</strong></p>
              <p><a href="/english/" class="footerLinkFirst">home</a> 
              <a href="/english/mission_statement.asp" class="footerLink">mission statement</a><br>
              <a href="/english/sitemap.asp" class="footerLink">sitemap</a>
              <a href="/english/contact.asp" class="footerLink">contact</a></p>
            </div>
            <div class="footerClmn">435 S. State Street, 3187 Angell Hall<br>
              Ann Arbor, MI 48109-1003 <br>
            Phone: (734) 764-6330 Fax: (734) 763-3128</div>
          <div class="footerClmn">
            © 2015 <a href="http://www.regents.umich.edu/">Regents of the University of Michigan</a><br>
          </div>
        </div>
        <div class="clearAll"></div>
      </div>
      <div id="rightShadow"></div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-formhelpers.min.js"></script>
  <script type="text/javascript" src="js/h5Validate.js"></script>
  <script type="text/javascript" src="js/myScript.js"></script>
</body>
</html>
<?php }
    }
  }
?>