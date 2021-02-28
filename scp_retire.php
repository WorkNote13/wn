<?php include 'include/js.php'; ?>

<script>
function retire(){
	$.ajax({
      type: "POST",
      url: location.origin+"/work_note/database/checkretire.php",
      data: "work=0",
      success:function(data){
        console.log(data);
      }
    });
}
retire();
</script>