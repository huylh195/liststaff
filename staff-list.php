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
        .table-bordered {
    margin: 40px;
    border: 1px solid #ddd;
}
        /* .danger
        {
        text-transform: uppercase;
        /* color: red; */
        /* }
        a:-webkit-any-link 
        {
            color: red;
            cursor: pointer;
            text-decoration: underline;
            margin: 10px;
        } */
        /* td, th  */
        /* {
            display: table-cell;
            vertical-align: inherit;
            text-align: center;
            text-decoration: underline; */
        /* } */
        /* tr 
        {
            display: table-row;
            vertical-align: inherit;
            border-color: blue; */
        /* } */ */

        /* table 
        {
            display: table;
            border-collapse: separate;
            border-spacing: 2px;
            border-color: grey;
            padding: 0 350px;
            caption-side: top|bottom; */
        /* }
        input[type="button" i], input[type="submit" i], input[type="reset" i], input[type="file" i]::-webkit-file-upload-button, button
        {
            padding: 1px 6px;
            color: blue; */
        /* }
        td:hover 
        {
            background-color: #ddd;
        }
        body{ */
            /* background: #DEB887;
        }
        i, cite, em, var, address, dfn 
        {
            font-style: italic; */
            /* color: green;
            margin: 400px;
            font-size: 50px;
        }
        .row { */
            /* margin-right: -15px;
            margin-left: -15px;
        }
        .table-bordered {
        border: 1px solid #ddd;
        } */
    </style>
    </head>
    <body>
        <a href="staff-add.php">THÊM</a>
        <!-- <i>List Staff</i> -->
        <div class="example">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">    
                        <table class="table table-bordered">
                        <thead>
                        <tr class="text">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Age</th>
                            <th>Go..</th>
                        </tr>
                    </thead>
            <?php foreach ($staffs as $item){ ?>
            <tr class="active"> 
                <td><?php echo $item['staff_id']; ?></td>
                <td>
                    
                    <a href="staff-add.php?id=<?php echo $item['staff_id']; ?>"><?php echo $item['staff_name']; ?></a>
                </td>
                <td><?php echo $item['staff_sex']; ?></td> 
                <td><?php echo $item['staff_age']; ?></td>
                <td>
                    <form method="post" action="staff-delete.php">
                        <input type="hidden"  value="<?php echo $item['staff_id']; ?>" name="staff_id"/>
                        <input  class="btn btn-danger" onclick="return confirm('Ban co chac muon xoa nhan vien nay hay khong?');" type="submit" value="Delete" name="delete"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>