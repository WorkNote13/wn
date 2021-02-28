<?php
include 'database/checklogin.php'; 
include 'database/connect.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WORKs NOTEs-รับการแจ้งเตือน</title>
    <meta charset="utf-8">

<?php include 'include/linkstyle.php';?>

  </head>
  <body>

<?php include 'include/nav.php';?>
    <!-- END nav -->

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">คู่มือการใช้งาน</h2>
            <h2 class="heading-section"><b>Works Notes</b></h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="wrapper">
              <div class="row mb-5">

                <div class="col-md-3">
                  <div class="dbox w-100 text-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                      <a href="howtotoken.php"><i class="fa fa-bell-o" style="font-size:25px;color:#fff;"></i></a>
                    </div>
                    <div class="text">
                      <a href="howtotoken.php"><p style="color:blue;"><span>ดูวิธีการรับ Token LINE Notify</span> ? </p></a>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<?php include 'include/footer.php'; 
      include 'include/js.php'; 
?>

  </body>
</html>

