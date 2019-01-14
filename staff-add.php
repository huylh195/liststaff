<?php
require ("./staffs.php");
 $data = array();
$errors = array();
 $is_update_action = false;
if (!empty($_GET['id']))
{
    $data = getStaff($_GET['id']);
    $is_update_action  = true;
}
if (!empty($_POST['add_staff']))
{
    $data['staff_id'] = isset($_POST['id']) ? $_POST['id'] : '';
    $data['staff_name'] = isset($_POST['name']) ? $_POST['name'] : '';
    $data['staff_Sex'] = isset($_POST['Sex']) ? $_POST['Sex'] : '';
    $data['staff_Age'] = isset($_POST['Age']) ? $_POST['Age'] : ''; 
    if (empty($data['staff_id'])){
        $errors['staff_id'] = 'Ban chua nhap ID';
    }
     
    if (empty($data['staff_name'])){
        $errors['staff_name'] = 'Ban chua nhap name';
    }
     
    if (empty($data['staff_Sex'])){
        $errors['staff_Sex'] = 'Ban chua nhap Sex';
    }
    if (empty($data['staff_Age'])){
        $errors['staff_Age'] = 'Ban chua nhap Age';
    }
    if (empty($errors)){
        updateStaff($data['staff_id'], $data['staff_name'], $data['staff_Sex'], $data['staff_Age']);
        header("Location:staff-list.php");
    }
}
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm nhan viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href="staff1-list.php">BACK</a>
        <form method="post">
            <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Id</td>
                    <td>
                        <input type="text" name="id" value="<?php echo !empty($data['staff_id']) ? $data['staff_id'] : ''; ?>" />
                        <?php echo !empty($errors['staff_id']) ? $errors['staff_id'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo !empty($data['staff_name']) ? $data['staff_name'] : ''; ?>" />
                        <?php echo !empty($errors['staff_name']) ? $errors['staff_name'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>Sex</td>
                    <td>
                        <input type="text" name="Sex" value="<?php echo !empty($data['staff_Sex']) ? $data['staff_sex'] : ''; ?>" />
                        <?php echo !empty($errors['staff_Sex']) ? $errors['staff_sex'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>
                        <input type="text" name="Age" value="<?php echo !empty($data['staff_age']) ? $data['staff_age'] : ''; ?>" />
                        <?php echo !empty($errors['staff_age']) ? $errors['staff_age'] : ''; ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="add_staff" value="<?php echo ($is_update_action) ? "Cap nhat" : "Them moi"; ?>" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>