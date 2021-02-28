<?php
include 'database/checklogin.php'; 
include 'database/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WORKs NOTEs-หน้าแรก</title>
    <meta charset="utf-8">

<?php include 'include/linkstyle.php';?>

  </head>
  <body onload="checkwork()">


<?php include 'include/nav.php';?>
    <!-- END nav -->

<br>
<!-- จำนวนงาน -->
    <section class="ftco-counter" id="section-counter" 
    style=" background: #0031FF;background: -webkit-linear-gradient(left top, #0031FF, #48F8FF);
            background: -o-linear-gradient(bottom right, #0031FF, #48F8FF);
            background: -moz-linear-gradient(bottom right, #0031FF, #48F8FF);
            background: linear-gradient(to bottom right, #0031FF, #48F8FF);">
}
      <div class="container">
        <div class="row">
          <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 text-center">
              <div class="text">
                <span>งานที่เคยมีทั้งหมด</span>
              </div>

<?php $sql = "SELECT COUNT(w_id) w FROM work WHERE u_id =".$_COOKIE['user_id'];
    $query = mysqli_query($con,$sql) or die ("Error in query: $sql " . mysqli_error());
    $result = mysqli_fetch_array($query,MYSQLI_ASSOC); ?>
              <div class="text">
                <strong class="number" data-number="<?php echo $result['w']; ?>">0</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- จบส่วนจำนวนงาน -->


<?php $sql = "SELECT *,(DATE(w_date)-DATE(NOW())) d,HOUR(w_date) - HOUR(NOW()) tim FROM work,work_type WHERE u_id = ".$_COOKIE["user_id"]." AND status != 3 AND work.w_type = work_type.wt_id ORDER BY status,w_date ASC";
    $query = mysqli_query($con,$sql) or die ("Error in query: $sql " . mysqli_error());

  $Num_Rows = mysqli_num_rows($query);

  $Per_Page = 3;   // Per Page

  $Page = null;
  if (isset($_GET['Page'])) {
    $Page = $_GET['Page'];
  }

  if($Page == null){
    $Page = 1;
  }
  $Prev_Page = $Page-1;
  $Next_Page = $Page+1;

  $Page_Start = (($Per_Page*$Page)-$Per_Page);

  if($Num_Rows<=$Per_Page){
    $Num_Pages =1;
  }else if(($Num_Rows % $Per_Page)==0){
    $Num_Pages =($Num_Rows/$Per_Page) ;
  }else{
    $Num_Pages =($Num_Rows/$Per_Page)+1;
    $Num_Pages = (int)$Num_Pages;
  }

  $sql .=" LIMIT $Page_Start , $Per_Page";
  $query  = mysqli_query($con,$sql);



?>

<!-- แสดงงานต่างๆ -->
    <section class="ftco-section bg-light mt-4">
      <div class="container">
         <a href="#" class="btn btn-info d-block px-2 py-3 mb-4" id="addwork" onclick="addwork()">
          เพิ่มงานใหม่ <i class="fa fa-edit" style="font-size:22px;"></i></a>
        <div class="row d-flex">
<?php while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>  
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="#" class="block-20 rounded" style="background-image: url('https://s.isanook.com/ca/0/rp/r/w728/ya0xa0m1w0/aHR0cHM6Ly9zLmlzYW5vb2suY29tL2NhLzAvdWQvMjc0LzEzNzQ0ODEvMTQxNDA1NDMwNzE0MTQwNTQ0MTNsLmpwZw==.jpg');">
              </a>
              <div class="text p-4">
                <div class="meta mb-2">
                  <h3>วิชา <b><?php echo $row['w_subject']; ?></b></h3>
                  <h4><?php echo $row['w_name']; ?></h4>
                    <div><a href="#" style="font-size:16px;"><?php echo DateThai($row['w_date']); ?> น.</a></div>
                    <div><span><?php echo $row['wt_name'] ?></span>  <a href="#" class="text-danger" style="font-size:18px;"><?php 
                    if($row['status'] == 0){
                      echo "<b style='color:#FF0000;'>ยังไม่เสร็จ</b>";
                    }else if($row['status'] == 1){
                      echo "<b style='color:#0AB904;'>เสร็จแล้ว</b>";
                    }else if($row['status'] == 2){
                      echo "<b style='color:#8A1313;'>หมดเวลาส่ง</b>";
                    } ?></a>
                    </div>
                    <div>
                      <a href="#" class="meta-chat"><i class="fa fa-file-text" style="font-size:18px;color:<?php 
                      if($row['status'] == 0){
                        echo "#FF0000;";
                      }else if($row['status'] == 1){
                        echo "#0AB904;";
                      }else if($row['status'] == 2){
                        echo "#8A1313;";
                      } ?>"></i></i>
                    </div>
                  
<?php           if ($row['status'] != 0) {
                  
                }else if ($row['d'] <= 0){
                  echo '<div><a href="#" style="font-size:20px;">เหลือเวลาอีก '.$row['tim'].' ชม.</a></div>';
                }else{
                  echo '<div><a href="#" style="font-size:20px;">เหลือเวลาอีก '.$row['d'].' วัน</a></div>';
                }

?>         

                </div>
                <h3 class="heading">
                  <a href="#"><?php echo $row['w_des']; ?></a>
                </h3>
<?php if ($row['status'] == 0) { ?>
                <div class="text-center">
                  <button type="button" class="btn btn-outline-success" onclick="finished(<?php echo $row['w_id']; ?>)">กดปุ่มนี้บอกว่าเสร็จแล้ว</button>
                </div>
<?php } ?>
              </div>
            </div>
          </div>

<?php } ?>

        </div>

        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
<?php 
  if($Prev_Page){
    echo "<li><a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'>&lt;</a></li>";
  }
  for($i=1; $i<=$Num_Pages; $i++){
    if($i != $Page){
      echo "<li><a href='$_SERVER[SCRIPT_NAME]?Page=$i'>".$i."</a></li>";
    }else{
      echo "<li class='active'><span>$i</span></li>";
    }
  }
  
  if($Page!=$Num_Pages){
     echo "<li><a href='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>&gt;</a></li>";
  }
?>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </section>

   <!--  จบแสดงงาน -->


  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color:#100B46;">
    <div class="modal-dialog">
      <div class="modal-content" style="
            background: #1270C6;background: -webkit-linear-gradient(left top, #1270C6, #3DB7FA);
            background: -o-linear-gradient(bottom right, #1270C6, #3DB7FA);
            background: -moz-linear-gradient(bottom right, #1270C6, #3DB7FA);
            background: linear-gradient(to bottom right, #1270C6, #3DB7FA);">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #ffffff"><strong>เพิ่มงานใหม่</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-times" style="font-size:30px;color:#E71C1C;"></i>
          </button>
        </div>
        <div class="modal-body">
        <section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style=" background:#1270C6;background: -webkit-linear-gradient(left top, #1270C6, #3DB7FA);
            background: -o-linear-gradient(bottom right, #1270C6, #3DB7FA);
            background: -moz-linear-gradient(bottom right, #1270C6, #3DB7FA);
            background: linear-gradient(to bottom right, #1270C6, #3DB7FA);">
          <div class="container">
            <div class="row d-md-flex justify-content-end">
              <div class="col-md-12 ftco-animate">

                <form action="#" class="appointment mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="form-field">
                          <div class="select-wrap">
                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
<?php $sql = "SELECT * FROM work_type";
    $query = mysqli_query($con,$sql) or die ("Error in query: $sql " . mysqli_error());
 ?>
                            <select name="" id="type" class="form-control">
                              <option value="0">เลือกประเภทงานของคุณ</option>
<?php while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?> 
                              <option value="<?php echo $row['wt_id'];?>"><?php echo $row['wt_name']; ?></option>
<?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control"onkeypress="noxss(event)"  id="subject" placeholder="วิชา" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control"onkeypress="noxss(event)"  id="workname" placeholder="ชื่องาน" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-wrap">
                          <div class="icon"><span class="fa fa-calendar"></span></div>
                          <input type="text" id="deadline"onkeypress="noxss(event)" class="form-control appointment_date" placeholder="เดดไลน์งาน วันที่" autocomplete="off">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-wrap">
                          <div class="icon"><span class="fa fa-clock-o"></span></div>
                          <input type="text" id="time" class="form-control appointment_time" placeholder="เดดไลน์ เวลา" autocomplete="off"  data-time-format="H:i:s" data-step="30" data-min-time="00:00" data-max-time="23:30" data-show-2400="true" onkeypress="noxss(event)" >
                        </div>
                      </div>
                     
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea id="des" cols="30" rows="7" onkeypress="noxss(event)"  class="form-control" placeholder="รายละเอียดงาน (ใส่ไม่ใส่ก็ได้)"></textarea>
                      </div>
                    </div>

                  </div>
                </form>

              </div>
            </div>
          </div>


        </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
              <button type="button" class="btn btn-success" onclick="savework()">บันทึกงานใหม่</button>
            </div>
          </div>
        </div>
      </div>



<?php include 'include/footer.php'; 
      include 'include/js.php'; 
?>

  </body>
</html>

<script>

function checkwork(){
   $.ajax({
      type: "POST",
      url: location.origin+"/work_note/database/checkwork.php",
      data: "work=0",
      success:function(data){
        console.log(data);
      }
    });
}
function addwork(){
  $('#exampleModal').modal('show');
}

function noxss(event) {
  var x = event.which || event.keyCode;
  if (x == 60 || x == 62) {
     document.getElementById('subject').value = "";
     console.log(x)
  }
}

function savework(){
  var wt_type = $('#type').val();
  var subject = $('#subject').val();
  var workname = $('#workname').val();
  var deadline = $('#deadline').val();
  var time = $('#time').val();
  var des= $('#des').val();

  if (wt_type == 0) {
    Swal.fire({
      icon: 'info',
      title: 'เลือกประเภทงาน',
      text: 'ตรวจสอบว่าเลือกประเภทงานแล้ว !!'
    })
  }else if (subject == '') {
     Swal.fire({
      icon: 'info',
      title: 'กรอกวิชา',
      text: 'ตรวจสอบว่ากรอกวิชาแล้ว !!'
    })
   }else if (workname == '') {
     Swal.fire({
      icon: 'info',
      title: 'กรอกชื่องาน',
      text: 'ตรวจสอบว่ากรอกชื่องานแล้ว !!'
    })
  }else if (deadline == '') {
     Swal.fire({
      icon: 'info',
      title: 'เลือกวันที่',
      text: 'ตรวจสอบว่าเลือกวันที่แล้ว !!'
    })
  }else if (time == '') {
     Swal.fire({
      icon: 'info',
      title: 'เลือกเวลา',
      text: 'ตรวจสอบว่าเลือกเวลาแล้วแล้ว !!'
    })
  }else {
     $.ajax({
          type: "POST",
          url: location.origin+"/work_note/database/addworkDB.php",
          data: "wt_type="+wt_type+"&subject="+subject+"&workname="+workname+"&deadline="+deadline+"&time="+time+"&des="+des,
          success:function(data){
            console.log(data);
            if (data == "inserted") {
              Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'เพิ่มงานสำเร็จ',
                text: 'กำลังโหลดอีกครั้ง',
                showConfirmButton: false,
                timer: 2000
              });
              setTimeout(function(){ 
                location.reload();
              }, 2100);
            }else if ("inserted") {
              Swal.fire({
                icon: 'info',
                title: 'ไม่สามารถเพิ่มงานได้',
                text: 'คุณใส่วันที่ ที่ผ่านมาแล้ว !!'
              })
            }else{
              Swal.fire({
                icon: 'error',
                title: 'ไม่สามารถเพิ่มงานได้',
                text: 'ตรวจสอบการกรอกข้อมูล !!'
              })
            }
          }
      });
  }
}


  function finished(w_id){
    Swal.fire({
      title: 'งานเสร็จแล้วใช่มั๊ย ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'ยกเลิก',
      confirmButtonText: 'เสร็จแล้ว'
    }).then((result) => {
      if (result.isConfirmed) {
        /*ajax*/
        $.ajax({
          type: "POST",
          url: location.origin+"/work_note/database/updatework.php",
          data: "w_id="+w_id+"&check=3",
          success:function(data){
            console.log(data);
            if (data == "finished") {
              Swal.fire({
                title: 'เยี่ยมมากเลย !',
                text: 'รีบทำงานอื่น ๆ ให้เสร็จนะ.',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
              }).then((result) => {
                  if (result.isConfirmed) {
                    location.reload();
                    }
              });
            }else{
              Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาดบางอย่าง !',
                text: 'ระบบจะตรวจสอบในภายหลัง'
              })
            }
          }
        });
            
        /*ajax*/
        }
      });

  }
</script>


<?php
  function DateThai($strDate)
  {
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "เดดไลน์วันที่ $strDay $strMonthThai $strYear เวลา $strHour:$strMinute";
  }
?> 