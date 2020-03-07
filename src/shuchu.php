<style>
   body{ text-align:center}
</style>
<body>

<?php
static $i = 1;
for (; $i <=9 ; $i++) { 
   copy($filename.'_'.$i.'.'.$ext, 'Files/'.$picdir.'/'.$filename.'_'.$i.'.'.$ext);
   unlink($filename.'_'.$i.'.'.$ext);
   ?>
   <img src="<?php echo $sip.$picdir.'/'.$filename.'_'.$i.'.'.$ext;?>" alt="">
   
   <?php

      if ($i%3 == 0) {
         echo '<br>';
      }
}
?>
   
   </body>