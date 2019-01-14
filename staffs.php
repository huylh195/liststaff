<?php
session_start();
function getAllStaffs()
{
    return isset($_SESSION['staffs']) ? $_SESSION['staffs'] : array();
}
function getStaff($staff_id)
{
    $staffs = getAllStaffs();
    foreach ($staffs as $item)
    {
        if ($item['staff_id'] == $staff_id){
            return $item;
        }
    }
     
    return array();
}
function deleteStaff($staff_id)
{
    $staffs = getAllStaffs();
    foreach ($staffs as $key => $item)
    {
        if ($item['staff_id'] == $staff_id){
            unset($staffs[$key]);
        }
    }
    $_SESSION['staffs'] = $staffs;
     
    return $staffs;
} 
function updateStaff($staff_id, $staff_name, $staff_Sex, $staff_Age )
{
    $staffs = getAllStaffs();
    $new_staff = array(
        'staff_id' => $staff_id,
        'staff_name' => $staff_name,
        'staff_Sex' => $staff_Sex,
        'staff_Age' => $staff_Age
    );
    $is_update_action = false;
    foreach ($staffs as $key => $item)
    {
        if ($item['staff_id'] == $staff_id){
            $staffs[$key] = $new_staff;
            $is_update_action = true;
        }
    }
    if (!$is_update_action){
        $staffs[] = $new_staff;
    }
    $_SESSION['staffs'] = $staffs;
     
    return $staffs;
}
?>
