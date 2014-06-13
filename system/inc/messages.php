<?php 
    if(isset($messages)) {
           echo '<p>';
           foreach ($messages as $key => $msg) {
                echo '<span class="' . $msg[0] . '">' . $msg[1] . '</span>';  
           }
           echo '</p>';
     }
?>