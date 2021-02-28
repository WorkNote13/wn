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
          <div class="col-md-12">
            <div class="wrapper">
              <div class="row no-gutters">
                <div class="col-md-12">
                  <div class="contact-wrap w-100 p-md-5 p-4">
                    <h1>รับการแจ้งเตือนผ่าน</h1>
                    <p><b class="mb-4" style="font-size:30px; background-color: #15B40A;color:#fff;border-radius: 3px;">LINE Notify</b></p>

                    <form class="contactForm">
                      <div class="row">

                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="label" for="name">รหัส Token</label>
                            <input type="text" class="form-control" name="token" id="token" placeholder="กรอกรหัส Token ตรงนี้" autocomplete="off">
                          </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label><a href="howtotoken.php" class="mr-4 text-primary">วิธีรับรหัส Token ?</a></label>
                            <input type="button" onclick="sendtoken()" value="ส่ง Token" class="btn btn-primary">
                          </div>
                        </div>
                      </div>
                    </form>

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

<script>
  function sendtoken(){
    var token = document.getElementById("token").value;
    if (token == "") {
      Swal.fire({
        icon: 'info',
        title: 'โปรดกรอกรหัส Token',
      })
    }else{
      $.ajax({
        type: "POST",
        url: location.origin+"/work_note/database/addtokenDB.php",
        data: "token="+token,
        success:function(data){
          console.log(data);
          if (data == "add") {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'เพิ่ม Token สำเร็จ',
              text: 'กำลังโหลดอีกครั้ง',
              showConfirmButton: false,
              timer: 2000
            });
            setTimeout(function(){ 
              location.reload();
            }, 2100);
          }else{
            Swal.fire({
              icon: 'error',
              title: 'รหัสTokenไม่ถูกต้อง',
              text: 'หรือ บัญชีคุณอาจเคยส่ง Token ไปแล้ว'
            })
          }
        }
      });
    }
  }
</script>
  </body>
</html>

