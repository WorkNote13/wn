<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WORKs NOTEs-สมัครสมาชิก</title>
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
            <h2 class="mb-4">สมัครสมาชิกเข้าใช้งาน Work Note</h2>
            <form action="#" class="appointment">
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-wrap">
                      <div class="icon"><i class="fa fa-google" style="font-size:20px"></i></div>
                      <input type="email" id="email" class="form-control"  placeholder="อีเมล" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-wrap">
                      <div class="icon"><i class="fa fa-address-book" style="font-size:20px"></i></div>
                      <input type="text" id="nickname" class="form-control" placeholder="ชื่อเล่น" autocomplete="off">
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-wrap">
                      <div class="icon"><i class="fa fa-user" style="font-size:20px"></i></div>
                      <input type="text" id="user" class="form-control" placeholder="ชื่อผู้ใช้" autocomplete="off">
                    </div>
                  </div>
                </div>

                
                <div class="col-md-6">
                    <div class="alert alert-success " role="alert" id="comp" style="display: none">
                      รหัสผ่านตรงกัน
                    </div>
                    <div class="alert alert-danger" role="alert" id="fail" style="display: none">
                      รหัสผ่านไม่ตรงกัน
                    </div>
                  <div class="form-group">
                    <div class="input-wrap">
                      <div class="icon"><i class="fa fa-unlock" style="font-size:20px"></i></div>
                      <input type="password" id="pass" class="form-control mb-3" placeholder="รหัสผ่าน" autocomplete="off">
                    </div>
                  <div class="form-group">
                    <div class="input-wrap">
                      <div class="icon"><i class="fa fa-unlock-alt" style="font-size:20px"></i></div>
                      <input type="password" id="conpass" onkeyup="checkpass()" class="form-control" placeholder="ยืนยันรหัสผ่าน" autocomplete="off">
                    </div>
                  </div>

                    </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <button type="button" onclick="reg()"class="btn btn-warning py-3 px-4"><b>สมัครสมาชิก</b></button>
                  </div>
                  <div class="alert alert-light" role="alert">
                    เป็นสมาชิกแล้ว <a href="login.php" class="alert-link"> <strong class="text-primary">คลิ๊กที่นี่ </strong></a> เพื่อเข้าสู่ระบบ
                  </div>

                </div>

              </div>
            </form>

          </div>
        </div>
      </div>
    </section>





<?php include 'include/footer.php'; 
      include 'include/js.php'; 
?>


  </body>

<script>

  function reg(){
    var email = document.getElementById("email").value; 
    var nickname = document.getElementById("nickname").value; 
    var user = document.getElementById("user").value;
    var pass = document.getElementById("pass").value;
    var conpass = document.getElementById("conpass").value;

    var checkmail = email.indexOf("@");
    if(checkmail == -1){
      Swal.fire(
        'โปรดกรอกอีเมล',
        'ตรวจสอบว่ากรอกอีเมลถูกต้องหรือไม่ ?',
        'info'
      );
    }else if(nickname == ""){
       Swal.fire(
        'โปรดกรอกชื่อเล่น',
        'ตรวจสอบว่ากรอกชื่อเล่นแล้ว ?',
        'info'
      );
    }else if(user == ''){
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
    }else if(conpass == ''){
       Swal.fire(
        'โปรดยืนยันรหัสผ่าน',
        'ตรวจสอบรหัสผ่านขอวคุณ',
        'info'
      );
    }else{

       $.ajax({
            type: "POST",
            url: location.origin+"/work_note/database/registerDB.php",
            data: "email="+email+"&user="+user+"&pass="+pass+"&nickname="+nickname,
            success:function(data){
              console.log(data);
              if (data == "registered") {
                Swal.fire({
                  position: 'center',
                  icon: 'success',
                  title: 'สมัครสมาชิกสำเร็จ',
                  text: 'จะพาไปยังหน้า เข้าสู่ระบบ',
                  showConfirmButton: false,
                  timer: 2000
                });
                setTimeout(function(){ 
                  location.href = location.origin+"/work_note/login.php";
                }, 2100); 
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

function checkpass(){
    var pass = document.getElementById("pass").value;
    var conpass = document.getElementById("conpass").value;

    if (conpass.length == pass.length) {
       if (pass != conpass) {
          document.getElementById("fail").style.display = "block";
          document.getElementById("comp").style.display = "none";
        }else{
          document.getElementById("comp").style.display = "block";
          document.getElementById("fail").style.display = "none";
        }
    }else if(conpass.length > pass.length){
      document.getElementById("fail").style.display = "block";
      document.getElementById("comp").style.display = "none";
    }else if(conpass.length < pass.length){
      document.getElementById("fail").style.display = "none";
      document.getElementById("comp").style.display = "none";
    }
   
  }

</script>
</html>