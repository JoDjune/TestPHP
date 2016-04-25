<?php
$this->load->helper("url");
echo "<ul>";
if (!empty($data)) {
    foreach ($data as $row) {
        echo "<li><h4>"; echo $row->SifF." ".$row->Ime." ";
        echo anchor("controller/getTim/".$row->SifT, "Podaci o timu ".$row->SifT);
        echo " "; echo anchor("controller/delete/".$row->SifF, "Brisi");
        echo " "; echo anchor("controller/update/".$row->SifF, "Izmeni");
        echo "</h4></li>";
    }
}
echo "</ul>";
?>