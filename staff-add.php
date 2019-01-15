<?php
require ("./staffs.php");
$staffs = getAllStaffs();
foreach($staffs as $key){
    $a[]= $key['staff_id'];
}
$data = array();
$errors = array();
$is_update_action = false;
// $allStaff = getAllStaff();
if (!empty($_GET['id']))
{
    $data = getStaff($_GET['id']);
    $is_update_action  = true;
}
if (!empty($_POST['add_staff']))
{
    $data['staff_id'] = isset($_POST['id']) ? $_POST['id'] : '';
    $id = $data['staff_id'];
    $data['staff_name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['staff_sex'] = isset($_POST['sex']) ? $_POST['sex'] : '';
    $data['staff_age'] = isset($_POST['age']) ? $_POST['age'] : ''; 
    if (empty($data['staff_id'])){
        $errors['staff_id'] = 'Ban chua nhap ID';
    }
    if (empty($data['staff_name']))
    {
        $errors['staff_name'] = 'Ban chua nhap name';
    }
     
    if (empty($data['staff_sex']))
    {
        $errors['staff_sex'] = 'Ban chua nhap sex';
    } 
    if (empty($data['staff_age']))
    {
        $errors['staff_age'] = 'Ban chua nhap age';
    }
    if(in_array("$id",$a))
    { // tìm so sánh với giá trị id đã có
        $loi = true; 
    }
        else   
        {
            if (empty($errors)){
                updateStaff($data['staff_id'], $data['staff_name'], $data['staff_sex'],$data['staff_age']);
                header("Location:staff-list.php");
        }
    }
}
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    </head>
    <body>
        <a href="staff-list.php">BACK</a>
        <form method="post">
            <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Id</td>
                    <td>
                        <input type="text" name="id" value="<?php echo !empty($data['staff_id']) ? $data['staff_id'] : ''; ?>" />
                        <!-- <?php echo !empty($errors['staff_id']) ? $errors['staff_id'] : ''; ?> -->
                    </td>
                </tr>
                <?php if(isset($loi)){?>
                    <div class="alert alert-warning">
                    <strong>Warning!</strong> 
                        identical staff
                </div>
                        <?php } ?>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo !empty($data['staff_name']) ? $data['staff_name'] : ''; ?>" />
                        <?php echo !empty($errors['staff_name']) ? $errors['staff_name'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>sex</td>
                    <td>
                        <input type="text" name="sex" value="<?php echo !empty($data['staff_sex']) ? $data['staff_sex'] : ''; ?>" />
                        <?php echo !empty($errors['staff_sex']) ? $errors['staff_sex'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>age</td>
                    <td>
                        <input type="text" name="age" value="<?php echo !empty($data['staff_age']) ? $data['staff_age'] : ''; ?>" />
                        <?php echo !empty($errors['staff_age']) ? $errors['staff_age'] : ''; ?>
                    </td>
                </tr>
                <tr class ="">
                <tr>
                    <td></td>
                    <td><input type="submit" name="add_staff" value="<?php echo ($is_update_action) ? "Cap nhat" : "Them moi"; ?>" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>