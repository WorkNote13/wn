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

    <section class="ftco-section testimony-section" style="background-image: url('images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="heading-section">วิธีรับ Token</h2>
            <h2 class="heading-section"><b>LINE Notify</b></h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">

              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><b style="color: #fff;">1</b></div>
                  <div class="text">
                    <p class="mb-4">ไปที่เว็บไซต์ <a href="https://notify-bot.line.me/th/">notify-bot.line.me/th/ </a> จากนั้นกดเข้าสู่ระบบมุมขวาบน และกรอกอีเมลและรหัสผ่าน LINE ของคุณ จากนั้นกดเข้าสู่ระบบ.</p>
                    <div class="d-flex align-items-center">
                      <img src="images/line1.JPG" alt="img">
                    </div>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><b style="color: #fff;">2</b></div>
                  <div class="text">
                    <p class="mb-4">หลังจากเข้าสู่ระบบ กดไปที่ชื่อผู้ใช้ของคุณและไปที่หน้าของฉัน ตามภาพด้านล่าง ( ต้องขอเวอชั่นเดสท๊อป )</p>
                    <div class="d-flex align-items-center">
                      <img src="images/line2.JPG" alt="img">
                    </div>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><b style="color: #fff;">3</b></div>
                  <div class="text">
                    <p class="mb-4">เลื่อนหาปุ่ม ออก Token จากนั้นกดปุ่ม ออก Token ตามภาพด้านล่าง.</p>
                    <div class="d-flex align-items-center">
                      <img src="images/line3.JPG" alt="img">
                    </div>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><b style="color: #fff;">4</b></div>
                  <div class="text">
                    <p class="mb-4">หลังจากกดปุ่มออก Token แล้วจะเด้งหน้าให้กรอกข้อมูลขึ้นมาตามภาพด้านล่าง 1.กรอกชื่อ Token 2.เลือกรับการแจ้งเตือนแบบตัวต่อตัวจาก LINE Notify 3.กดออก Token.</p>
                    <div class="d-flex align-items-center">
                      <img src="images/line4.JPG" alt="img">
                    </div>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><b style="color: #fff;">5</b></div>
                  <div class="text">
                    <p class="mb-4">จากนั้นคัดลอกรหัส Token ที่ได้นั้นเก็บไว้ เพื่อนำไปใส่ที่หน้ารับการแจ้งเตือนในแอพ.</p>
                    <div class="d-flex align-items-center">
                      <img src="images/line5.JPG" alt="img">
                    </div>
                  </div>
                </div>
              </div>

               <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><b style="color: #fff;">6</b></div>
                  <div class="text">
                    <p class="mb-4">กดที่เมนูหลักเพื่อไปที่หน้า รับการแจ้งเตือนจากแอพผ่าน LINE.</p>
                    <div class="d-flex align-items-center">
                       <img src="images/line6.JPG" alt="img">
                    </div>
                  </div>
                </div>
              </div>

               <div class="item">
                <div class="testimony-wrap py-4">
                  <div class="icon d-flex align-items-center justify-content-center"><b style="color: #fff;">7</b></div>
                  <div class="text">
                    <p class="mb-4">นำรหัส Token ที่ได้ มากรอกในช่อง กรอกรหัส Token จากนั้นกดส่ง Token  ตามภาพด้านล่าง เป็นอันเสร็จ.</p>
                    <div class="d-flex align-items-center">
                      <img src="images/line7.JPG" alt="img">
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

