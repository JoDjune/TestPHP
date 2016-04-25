<?php
$this->load->helper("form");
echo form_open("controller/add");
$arr = array(
    "name" => "name",
    "type" => "text",
    "value" => set_value("name")
);
echo form_label("Ime: ");
echo form_input($arr);
if (!empty($data)) {
    foreach ($data as $row)
        $niz[$row->SifT] = $row->Naziv;
}
echo form_dropdown("tims", $niz);
echo "<br/><br/>";
if (!empty($errors)) 
    echo $errors;
echo form_submit("", "Dodaj");
echo form_close();
?>