<?php $phpArray = array(
          array(0 => "Mon", 
          1 => "Tue", 
          2 => "Wed", 
          3 => "Thu",
          4 => "Fri", 
          5 => "Sat",
          6 => "Sun"),
          array(0 => "Mona", 
          1 => "Tuea", 
          2 => "Weda", 
          3 => "Thua",
          4 => "Fria", 
          5 => "Sata",
          6 => "Suna"));
?>

<script type="text/javascript">

    var jArray= <?php echo json_encode($phpArray ); ?>;

    for(var i=0;i<jArray.length;i++){
      for(var j=0;j<jArray[i].length;j++){
        alert(jArray[i][j]);
      }
    }

 </script>