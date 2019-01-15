<?php
if (!empty($_POST['delete']))
{
    require ("./staffs.php");
    $staff_id = isset($_POST['staff_id']) ? $_POST['staff_id'] : '';
    deleteStaff($staff_id);
}
header("Location:staff-list.php");
?>