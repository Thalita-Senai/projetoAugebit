<?php
    move_uploaded_file($_FILES['photo']['tmp_name'], '../../img/contas/' . $_FILES['photo']['name']);
?>