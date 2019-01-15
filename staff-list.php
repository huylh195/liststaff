<?php
require ("./staffs.php");
$staffs = getAllStaffs();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách sinh viên</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bootstrap 3 Simple Tables</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
    <style type="text/css">
        .example
        {
            margin: 20px;
        }
        .table-bordered 
        {
            margin: 40px;
            border: 1px solid #ddd;
        }
        td:hover 
        { 
            background-color: #ddd;
        }  
    </style>
    </head>
    <body>
        <a href="staff-add.php">THÊM</a>
        <!-- <i class="text-center">List Staff</i> -->
        <div class="example">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">    
                        <table class="table table-bordered">
                        <thead>
                        <tr class="text-success">
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Sex</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Go..</th>
                        </tr>
                    </thead>
            <?php foreach ($staffs as $item){ ?>
            <tr class="text-danger"> 
                <td class="text-center"><?php echo $item['staff_id']; ?></td>
                <td class="text-center">
                    
                    <a href="staff-add.php?id=<?php echo $item['staff_id']; ?>"><?php echo $item['staff_name']; ?></a>
                </td>
                <td class="text-center"><?php echo $item['staff_sex']; ?></td> 
                <td class="text-center"><?php echo $item['staff_age']; ?></td>
                <td>
                    <form class="text-center" method="post" action="staff-delete.php">
                        <input type="hidden"  value="<?php echo $item['staff_id']; ?>" name="staff_id"/>
                        <input  class="btn btn-danger" onclick="return confirm('Ban co chac muon xoa nhan vien nay hay khong?');" type="submit" value="Delete" name="delete"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>