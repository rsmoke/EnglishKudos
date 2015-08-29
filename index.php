<?php
session_start();
require_once($_SERVER["DOCUMENT_ROOT"] . "/../Support/configEnglishKudos.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/../Support/basicLib.php");

$uniqname = $login_name;

if (isset($_POST["submit"])) {
// form was submitted
  $userFname = mysqli_real_escape_string($db, (trim($_POST["userFname"])));
  $userLname = mysqli_real_escape_string($db, (trim($_POST["userLname"])));
  $kudoType = trim($_POST["kudoType"]);
  $kudoTitle = mysqli_real_escape_string($db, (trim($_POST["kudoTitle"])));
  $kudoDesc = mysqli_real_escape_string($db, (trim($_POST["kudoDesc"])));
  //insert data into database
  try {
    $sql = "INSERT INTO `tbl_kudos` (`userFname`, `userLname`, `uniqname`, `kudoType`, `kudoTitle`, `kudoDesc`) VALUES ('$userFname', '$userLname', '$uniqname', '$kudoType', '$kudoTitle', '$kudoDesc')";
    if ($db->query($sql) === TRUE) {
    //echo "New record created successfully";
      $userFname = "";
      $userLname = "";
      $kudoType = "";
      $kudoTitle = "";
      $kudoDesc = "";
      echo "<script type='text/javascript'>alert(\"Sucessfully submitted\");</script>";
      header("Location: " . "https://webapps.lsa.umich.edu/english/secure/userservices/profile.asp");
              exit();
    } else {
    die(db_fatal_error("Database query failed. "));
    }
    $db->close();
  } catch (Exception $e){
    $result[] = $e->getMessage();
  }
}
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
          <div class="form">
            <h1>English Kudos</h1>
            <form action="index.php" method="post">
              <div id="userInfo" >
                <div class="row-fluid clearfix">
                  <div class="form-group">
                    <label for="userFname" >First name</label>
                    <input class="form-control input-sm" type="text" tabindex="100" required name="userFname" autofocus />
                    <label for="userLname">Last name</label>
                    <input class="form-control input-sm" type="text" tabindex="110"required name="userLname" />
                  </div>
                  <hr>
                  <label for="kudoType">Select a category:</label>
                  <label class="radio">
                    <input type="radio" tabindex="150" required name="kudoType" id="inlineRadiokudoType" value="award"> Award
                  </label>
                  <label class="radio">
                    <input type="radio" name="kudoType" id="inlineRadiokudoType2" value="conf_lect"> Conference / Lecture
                  </label>
                  <label class="radio">
                    <input type="radio" name="kudoType" id="inlineRadiokudoType3" value="publication"> Publication
                  </label>
                  <div class="form-group">
                    <label for="kudoTitle">Title / Name</label>
                    <input class="form-control input-sm" type="text" tabindex="160" required name="kudoTitle" />
                    <label for="kudoDesc">Description <small><em>100 word limit</em></small></label>
                    <textarea class="form-control input-sm" rows=5  tabindex="170" required id="kudoDesc" name="kudoDesc"></textarea>
                    Total word count: <span id="display_count">0</span> words. Words left: <span id="word_left">100</span>
                  </div>
                </div>
              </div>
              <div class="row-fluid clearfix btnControl">
                <button class="btn btn-success btn-sm" name="submit" id="submit" >Submit</button>
              </div>
            </form>
          </div>
          <div id="footerInnerWrap">
            <div class="footerClmn">
              <p><strong>Dept. of English Language and Literature</strong></p>
              <p><a href="/english/" class="footerLinkFirst">home</a> <a href="/english/mission_statement.asp" class="footerLink">mission statement</a><br> <a href="/english/sitemap.asp" class="footerLink">sitemap</a> <a href="/english/contact.asp" class="footerLink">contact</a></p>
            </div>
            <div class="footerClmn">435 S. State Street, 3187 Angell Hall<br>
              Ann Arbor, MI 48109-1003 <br>
            Phone: (734) 764-6330 Fax: (734) 763-3128</div>
            <div class="footerClmn">© 2009 <a href="http://www.regents.umich.edu/">Regents of the University of Michigan</a><br>
          </div>
        </div>
        <div class="clearAll"></div>
      </div>
      <div id="rightShadow"></div>
    </div>
  </div>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-formhelpers.min.js"></script>
  <script src="js/h5Validate.js"></script>
  <script src="js/myScript.js"></script>
</body>
</html>