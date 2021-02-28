<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WORKs NOTEs-เข้าสู่ระบบ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END nav -->


    <section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url(https://missiontothemoon.co/wp-content/uploads/2019/04/hand-writting-on-diary-book_feature.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row d-md-flex justify-content-end">
          <div class="col-md-12 col-lg-6 half p-3 py-5 pl-lg-5 ftco-animate">
            <h2 class="mb-4">เข้าสู่ระบบ Work Note</h2>
            <form class="appointment">
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-wrap">
                      <div class="icon"><i class="fa fa-user" style="font-size:20px"></i></div>
                      <input type="text" id="user" class="form-control" placeholder="ชื่อผู้ใช้">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-wrap">
                      <div class="icon"><i class="fa fa-unlock" style="font-size:20px"></i></div>
                      <input type="password" id="pass" autocomplete="off" class="form-control mb-3" placeholder="รหัสผ่าน">
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <input type="button" value="เข้าสู่ระบบ" onclick="login()" class="btn btn-primary py-3 px-4">
                  </div>

                  <div class="alert alert-light" role="alert">
                    ลืมชื่อผู้ใช้หรือรหัสผ่าน <a href="#" onclick="showforgot()" class="alert-link"><strong class="text-danger"> เปลี่ยน</strong></a>
                  </div>

                  <div class="form-group">
                    <a href="register.php" class="btn btn-warning py-3 px-4">สมัครสมาชิก</a>
                  </div>

                </div>

              </div>
            </form>
<br>
          <div id="forgot-password" style="display: none;">
            <h2 class="" style="color: #FF4747;-webkit-text-stroke: 0.5px #ffffff">เปลี่ยนรหัสผ่าน</h2>
            <form class="appointment">
              <div class="row">
                 <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-wrap">
                      <div class="icon"><i class="fa fa-google" style="font-size:20px"></i></div>
                      <input type="email" id="email" class="form-control"  placeholder="อีเมล" autocomplete="on">
                    </div>
                  </div>
                </div>

                 <div class="col-md-12">
                  <h6 class="" style="color:#FF4747;">** <strong style="color: #FFF;">กรอกข้อมูลเเค่ที่จะเปลี่ยน</strong></h6>
                    <div class="form-group">
                      <div class="input-wrap">
                        <div class="icon"><i class="fa fa-user" style="font-size:20px"></i></div>
                        <input type="text" id="fuser" class="form-control" placeholder="ชื่อผู้ใช้">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="input-wrap">
                        <div class="icon"><i class="fa fa-unlock" style="font-size:20px"></i></div>
                        <input type="password" id="fpass" autocomplete="off" class="form-control mb-3" placeholder="รหัสผ่าน">
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="button" value="อัพเดตข้อมูล" onclick="forgotpass()" class="btn btn-danger py-3 px-4">
                    </div>

                  </div>

                </div>
            </form>
          </div>



          </div>
        </div>
      </div>
    </section>



<?php include 'include/footer.php'; 
      include 'include/js.php'; 
?>
<script type="text/javascript">
  function login(){
    var user = document.getElementById("user").value;
    var pass = document.getElementById("pass").value;

    if(user == ''){
       Swal.fire(
        'โปรดกรอกชื่อผู้ใช้',
        'ตรวจสอบว่ากรอกชื่อผู้ใช้แล้ว ?',
        'info'
      );
    }else if(pass == ''){
       Swal.fire(
        'โปรดกรอกรหัสผ่าน',
        'ตรวจสอบว่ากรอกรหัสผ่านแล้ว ?',
        'info'
      );
    }else{
      $.ajax({
            type: "POST",
            url: location.origin+"/work_note/database/loginDB.php",
            data: "user="+user+"&pass="+pass,
            success:function(data){
              console.log(data);
              if (data == "logined") {
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'กำลังเข้าสู่ระบบ',
                  text: 'จะพาไปยังหน้า หน้าแรก',
                  showConfirmButton: false,
                  timer: 2000
                });
                setTimeout(function(){ 
                  location.href = location.origin+"/work_note/"; 
                }, 2200);
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'ไม่สามารถเข้าสู่ระบบได้',
                  text: 'ตรวจสอบชื่อผู้ใช้หรือรหัสผ่าน !!'
                })
              }
            }
        });
    }
   
  }


  function forgotpass(){
    var email= document.getElementById("email").value;
    var user = document.getElementById("fuser").value;
    var pass = document.getElementById("fpass").value;

    var checkmail = email.indexOf("@");
    if(checkmail == -1){
      Swal.fire(
        'โปรดกรอกอีเมล',
        'ตรวจสอบว่ากรอกอีเมลถูกต้องหรือไม่ ?',
        'info'
      );
    }else if(user == '' && pass == ''){
      Swal.fire(
        'โปรดกรอกข้อมูลก่อน',
        'เช็คว่ากรอกชื่อผู้ใช้หรือรหัสผ่านแล้ว ?',
        'info'
      );
    }else{
       $.ajax({
            type: "POST",
            url: location.origin+"/work_note/database/forgotpass.php",
            data: "email="+email+"&user="+user+"&pass="+pass,
            success:function(data){
              console.log(data);
              if (data == "updateuser" || data == "updatepass") {
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'อัพเดตข้อมูลแล้ว',
                  text: 'ลองเข้าสู่ระบบ',
                  showConfirmButton: false,
                  timer: 2000
                });
                setTimeout(function(){ 
                  document.getElementById("user").focus();
                  document.getElementById('forgot-password').style.display = 'none';
                }, 2000);
                  
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'มีชื่อผู้ใช้นี้แล้ว',
                  text: 'โปรดกรอกชื่อผู้ใช้ที่ไม่ซ้ำ !!'
                })
              }
            }
        });
    }
  }


  function showforgot(){
     document.getElementById('forgot-password').style.display = 'block';
  }
</script>
  </body>
</html>