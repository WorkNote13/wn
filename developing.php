<?php
include 'database/checklogin.php'; 
include 'database/connect.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WORKs NOTEs-หน้าแรก</title>
    <meta charset="utf-8">

<?php include 'include/linkstyle.php';?>

  </head>
  <body>


    <div class="wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-6 d-flex align-items-center">
            <p class="mb-0 phone pl-md-2">
              <a href="#" class="mr-2"><i class="fa fa-hand-o-right mr-2" style="font-size:20px"></i>ติดต่องาน</a> 
              <a href="#" class="mr-2"><span class="fa fa-phone mr-1"></span> 0972100132</a> 
              <a href="#"><span class="fa fa-paper-plane mr-1"></span> chettha13062543@gmail.com</a>
            </p>
          </div>

          <div class="col-md-6 d-flex justify-content-md-end">
            <div class="social-media">
              <p class="mb-0 d-flex">
                <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                <span style="padding-top: 5px;color: #fff"><b></b></span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>


     <section class="ftco-section bg-light ftco-faqs">
      <div class="container">
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="heading-section mb-5 mt-5 mt-lg-0">
            </div>
            <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
              <div class="card">
                <div class="collapse show" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                  <div class="card-body py-3 px-0" style="text-align:center;background-color: #C8EBFF;">
                    <img src="images/settings.png" alt="img" class="mt-4">
                    <h1 class="mb-0 mt-4"><strong>ฟังก์ชันนี้</strong></h1>
                    <h1 class="mb-0 mt-4"><strong>กำลังพัฒนา</strong></h1>
                    <i class="fa fa-gear fa-spin mb-4" style="font-size:60px;"></i><br>
                    <a href="index.php" style="font-size: 19px;"><i class="fa fa-arrow-left" style="font-size:18px"></i> กลับหน้าแรก </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3"></div>

        </div>
         <div class="row" style="height: 350px;"></div>
      </div>
    </section>


<?php 
      include 'include/js.php'; 
?>

  </body>
</html>
