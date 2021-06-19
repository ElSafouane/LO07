<?php
function form_begin($class, $method, $action) {
    echo ("\n<!-- ============================================== -->\n");
    echo ("<!-- form_begin : $class $method $action) -->\n");
    printf("<form class='%s' method='%s' action='%s'>\n", $class, $method, $action);
};

function form_input_text($label, $name, $size, $value) {
    echo ("\n<!-- form_input_text : $label $name $size $value -->\n");
    echo ("  <p>\n");

    echo ("<div class='form-group'>");
    echo (" <label for='$label'>$label</label>");
    echo (" <input type='text' class='form-control' name='$name' size='$size' value='$value' >");
    echo ("</div>");
};

function form_select($label, $name, $multiple, $size, $liste) {
    echo '<div class="form-group">
            <label for="modules" class="control-label">'.$label.'</label>'.'<br><select '.$multiple.' class="form-group form-control" name='.$name.' size='.$size.'>';
    foreach ($liste as $option){
        echo '<option>'.$option.'</option>';
    }
    echo '</select> </div>';
}

function form_input_reset($value) {
    echo '<input type="reset" value="'.$value.'" class="btn btn-danger">';
};

function form_input_submit($value) {
    echo '<input type="submit" value="'.$value.'" class="btn btn-success">';
};

function form_end() {
    echo '</form>';
};
?>