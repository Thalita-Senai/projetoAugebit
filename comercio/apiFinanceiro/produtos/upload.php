<?php
    move_uploaded_file($_FILES['photo']['tmp_name'], '../../img/produtos/' . $_FILES['photo']['name']);
?>