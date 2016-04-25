<?php
$this->load->helper("form");
echo form_open("controller/change/".$id);
$arr = array(
    "name" => "name",
    "type" => "text",
    "value" => $name 
);
echo form_label("Ime: ");
echo form_input($arr);
if (!empty($data)) {
    foreach ($data as $row)
        $niz[$row->SifT] = $row->Naziv;
}
echo form_dropdown("tims", $niz, $tim);
echo "<br/><br/>";
if (!empty($errors)) 
    echo $errors;
echo form_submit("", "Izmeni");
echo form_close();
?>