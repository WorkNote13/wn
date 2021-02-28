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

<?php $sql = "SELECT * FROM work,work_type WHERE u_id = ".$_COOKIE["user_id"]." AND work.w_type = work_type.wt_id AND status = 1 ORDER BY w_date ASC";
    $query = mysqli_query($con,$sql) or die ("Error in query: $sql " . mysqli_error());


  $Num_Rows = mysqli_num_rows($query);

  $Per_Page = 3;   // จำนวนที่แสดง

  $Page = null;
  if (isset($_GET['Page'])) {
    $Page = $_GET['Page']; 
  }

  if($Page == null){ //เช็คว่าให้อยู่หน้า แรก
    $Page = 1; 
  }
  $Prev_Page = $Page-1; //ย้อนกลับ
  $Next_Page = $Page+1; //ถัดไป

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
  $num = mysqli_num_rows($query);

?>

<!-- แสดงงานต่างๆ -->
    <section class="ftco-section bg-light">
      <div class="alert alert-success text-center mb-4" role="alert">
        <strong>งานที่ทำเสร็จไปแล้ว</strong>
      </div>
      <div class="container">
        <div class="row d-flex">
<?php 

  $num = mysqli_num_rows($query);
  if ($num == 0) {
    echo "<div class='col-md-4 d-flex ftco-animate'>";
    echo "<h2 style='text-align: center;padding-left:55px;' class='ml-4'>ยังไม่มีงานที่เสร็จ</h2>";
    echo "</div>";
  }else{
while($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) { ?>  
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="#" class="block-20 rounded" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTj-s5cxKL4R_Y38ZtTtyVlmVASwNkkc1Brbg&usqp=CAU');">
              </a>
              <div class="text p-4">
                <div class="meta mb-2">
                  <h3>วิชา <b><?php echo $row['w_subject']; ?></b></h3>
                  <h4><?php echo $row['w_name']; ?></h4>
                    <div><a href="#" style="font-size:16px;"><?php echo DateThai($row['w_date']); ?> น.</a></div>
                    <div><span><?php echo $row['wt_name'] ?></span>  <a href="#" class="text-success" style="font-size:18px;">เสร็จแล้ว</a></div>
                    <div><a href="#" class="meta-chat"><i class="fa fa-file-text" style="font-size:18px;color:#0AB904;"></i></div>
                </div>
                <h3 class="heading">
                  <a href="#"><?php echo $row['w_des']; ?></a>
                </h3>
                <div class="text-right">
                  <button type="button" class="btn btn-outline-danger" onclick="deletework(<?php echo $row['w_id']; ?>)">นำงานออก</button>
                </div>
        
              </div>
            </div>
          </div>

<?php } }?>

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


<?php include 'include/footer.php'; 
      include 'include/js.php'; 
?>

  </body>
</html>

<script>
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