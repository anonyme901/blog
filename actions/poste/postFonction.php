<?php

    function inputFields($placeholder,$name,$value,$type){
        $ele="
        <div class=\"col-6 col-12-xsmall\">
        <input type='$type' name='$name' placeholder='$placeholder'
        class=\"form-control\" value='$value' autocomplete=\"off\" />
        </div>
        ";
        echo $ele;
    }
    function textarea($placeholder,$name,$value){
        $ele="
        <div class=\"col-12\"><textarea  name='$name'  placeholder='$placeholder'
         value='$value' autocomplete=\"off\" rows=\"4\">
        </textarea>
        </div>
        ";
        echo $ele;
    }
?>