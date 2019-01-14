<?php
// Nếu là delete thì thực hiện thao tác này
if (!empty($_POST['delete']))
{
    require ("./staffs.php");
    $staff_id = isset($_POST['staff_id']) ? $_POST['staff_id'] : '';
    deleteStaff($staff_id);
}
 
// Cuối cùng là chuyển hướng về trang danh sách
header("Location:staff-list.php");
?>