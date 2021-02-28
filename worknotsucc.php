<?php
include 'database/checklogin.php'; 
include 'database/connect.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WORKs NOTEs-งานที่ยังไม่เสร็จ</title>
    <meta charset="utf-8">

<?php include 'include/linkstyle.php';?>

  </head>
  <body>

<?php include 'include/nav.php';?>
    <!-- END nav -->

<?php $sql = "SELECT * FROM work,work_type WHERE u_id = ".$_COOKIE["user_id"]." AND work.w_type = work_type.wt_id AND status = 0 ORDER BY w_date ASC";
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
    <section class="ftco-section bg-light">
      <div class="alert alert-danger text-center mb-4" role="alert">
        <strong>งานของคุณที่ทำยังไม่เสร็จ</strong>
      </div>
      <div class="container">
        <div class="row d-flex">
<?php  
    $num = mysqli_num_rows($query);
    if ($num == 0) {
    echo "<div class='col-md-4 d-flex ftco-animate'>";
    echo "<h2 style='text-align: center;padding-left:95px;' class='ml-4'>ยังไม่มีงาน</h2>";
    echo "</div>";
  }else{
    while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>  
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="#" class="block-20 rounded" style="background-image: url('https://i2.wp.com/images.pexels.com/photos/256468/pexels-photo-256468.jpeg?w=696&ssl=1');">
              </a>
              <div class="text p-4">
                <div class="meta mb-2">
                  <h3>วิชา <b><?php echo $row['w_subject']; ?></b></h3>
                  <h4><?php echo $row['w_name']; ?></h4>
                    <div><a href="#" style="font-size:16px;"><?php echo DateThai($row['w_date']); ?> น.</a></div>
                    <div><span><?php echo $row['wt_name'] ?></span>  <a href="#" class="text-danger" style="font-size:18px;">ยังไม่เสร็จ</a></div>
                    <div><a href="#" class="meta-chat"><i class="fa fa-file-text" style="font-size:18px;color:red"></i></div>
                </div>
                <h3 class="heading">
                  <a href="#"><?php echo $row['w_des']; ?></a>
                </h3>
                <div class="text-right">
                  <button type="button" class="btn btn-outline-warning" 
        onclick="showup( '<?php echo $row['w_name']; ?>','<?php echo $row['w_date']; ?>','<?php echo $row['w_des']; ?>',<?php echo $row['w_id']; ?> )">แก้ไขงาน
                  </button>
                  
                  <button type="button" class="btn btn-outline-danger" onclick="deletework(<?php echo $row['w_id']; ?>)">ลบงาน</button>
                </div>
        
              </div>
            </div>
          </div>

<?php }} ?>

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

  <div class="modal fade" id="updatemadals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color:#100B46;">
    <div class="modal-dialog">
      <div class="modal-content" style="
            background: #F77C0F;background: -webkit-linear-gradient(left top, #F77C0F, #FF4848);
            background: -o-linear-gradient(bottom right, #F77C0F, #FF4848);
            background: -moz-linear-gradient(bottom right, #F77C0F, #FF4848);
            background: linear-gradient(to bottom right, #F77C0F, #FF4848);">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="color: #ffffff"><strong>แก้ไขข้อมูลงาน</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-times" style="font-size:30px;color:#fff;"></i>
          </button>
        </div>

        <div class="modal-body">
        <section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style=" background:#F77C0F;background: -webkit-linear-gradient(left top, #F77C0F, #FF4848);
            background: -o-linear-gradient(bottom right, #F77C0F, #FF4848);
            background: -moz-linear-gradient(bottom right, #F77C0F, #FF4848);
            background: linear-gradient(to bottom right, #F77C0F, #FF4848);">
          <div class="container">
            <div class="row d-md-flex justify-content-end">
              <div class="col-md-12 ftco-animate">

                <form action="#" class="appointment mt-3">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                         <input type="hidden"id="w_id">
                        <input type="text" class="form-control" id="workname" placeholder="" autocomplete="off">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-wrap">
                          <div class="icon"><span class="fa fa-calendar"></span></div>
                          <input type="text" id="deadline" class="form-control appointment_date" placeholder="" autocomplete="off">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <div class="input-wrap">
                          <div class="icon"><span class="fa fa-clock-o"></span></div>
                          <input type="text" id="time" class="form-control appointment_time" placeholder="เดดไลน์ เวลา" autocomplete="off"  data-time-format="H:i:s" data-step="30" data-min-time="00:00" data-max-time="23:30" data-show-2400="true">
                        </div>
                      </div>
                     
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <textarea id="des" cols="30" rows="7" class="form-control" placeholder=""></textarea>
                      </div>
                    </div>

                  </div>
                </form>

              </div>
            </div>
          </div>
        </div> <!-- END madalBody -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
          <button type="button" class="btn btn-warning" onclick="updatework()">แก้ไขงาน</button>
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
function showup(w_name,deadline,des,w_id){
  $('#updatemadals').modal('show');
  var datelist = deadline.split(" ");
  var date = datelist[0].split("-");
  var h = date[0] , m = date[1] , d = date[2];
  $('#workname').val(w_name);
  $('#deadline').val(m+"/"+d+"/"+h); 
  $('#time').val(datelist[1]);
  $('#des').val(des);
  $('#w_id').val(w_id); 
}

function updatework(){
  var workname = $('#workname').val();
  var date = $('#deadline').val();
  var time = $('#time').val();
  var des = $('#des').val();
  var w_id = $('#w_id').val();

  if (workname == '') {
     Swal.fire({
      icon: 'info',
      title: 'กรอกชื่องาน',
      text: 'ตรวจสอบว่ากรอกชื่องานแล้ว !!'
    })
  }else if (date == '') {
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
        url: location.origin+"/work_note/database/updatework.php",
        data: "w_id="+w_id+"&workname="+workname+"&date="+date+"&time="+time+"&des="+des+"&check="+1,
        success:function(data){
          console.log(data);
          if (data == "updated") {
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'อัพเดตข้อมูลงานแล้ว',
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
              title: 'ไม่สามารถเพิ่มงานได้',
              text: 'ตรวจสอบการกรอกข้อมูล !!'
            })
          }
        }
      });
    }
}

  function deletework(w_id){
    Swal.fire({
      title: 'จะลบงานหรอ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'ยกเลิก',
      confirmButtonText: 'ลบออก'
    }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
            type: "POST",
            url: location.origin+"/work_note/database/updatework.php",
            data: "w_id="+w_id+"&check=2",
            success:function(data){
              console.log(data);
              if (data == "deleted") {
                Swal.fire({
                  title: 'ลบงานของคุณแล้ว !',
                  text: 'อย่าลืมทำงานอื่น ๆ นะครับ',
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