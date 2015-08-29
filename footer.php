<footer class="container"> 
  <div class="row clearfix">
    <div class="col-xs-1 column"></div>

    <div class="col-xs-4 column">
      <address>
        <p>   
          <strong>Department of <?php echo $deptLngName;?></strong>      
          <br><?php echo $addressBldg;?>, <?php echo $address2;?>
          <br><?php echo $addressStreet;?>
          <br>Ann Arbor, MI
          <br><?php echo $addressZip;?>
          <br>P: <?php echo $addressPhone;?>
          <br>F: <?php echo $addressFax;?>
        </p>
      </address> 

    </div>

    <div class="col-xs-4 hidden-xs column">
      <a href="mailto:<?php echo strtolower($addressEmail);?>"><?php echo strtolower($addressEmail);?></a><br />
        <a href="http://www.facebook.com/<?php echo $addressFacebook;?>"><img class="logo" width="29px" height="29px" src="img/fB29.png" alt="Visit us on Facebook" /></a><br />
    </div>
    <div class="col-xs-4 hidden-sm hidden-md hidden-lg visible-xs-block column">
      <a href="mailto:<?php echo strtolower($addressEmail);?>">eMail</a><br />
        <a href="http://www.facebook.com/<?php echo $addressFacebook;?>"><img class="logo" width="29px" height="29px" src="img/fB29.png" alt="Visit us on Facebook" /></a>
    </div>

    <div class="col-xs-3 column ">
      <a href="http://www.umich.edu"><img class="mlogo img-responsive img-rounded center-block" src="img/michigan.png" alt="University of Michigan" /></a>
    </div>
  </div>
</footer>

<footer class="container"> 
  <div class="row clearfix">
    <div class="col-xs-12">
    <a href="http://www.regents.umich.edu" class="btn btn-block btn-link btn-xs" type="button">© 2015 Regents of the University of Michigan</a>
    </div>
  </div>
</footer> <!-- #footer -->
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-formhelpers.min.js"></script>
<script src="js/h5Validate.js"></script>


