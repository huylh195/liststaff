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
        <style type="text/css">
        .example
        {
            margin: 20px;
        }
        body
        {
            background: white;
        }
        .danger
        {
        text-transform: uppercase;
        /* color: red; */
        }
        a:-webkit-any-link 
        {
            color: red;
            cursor: pointer;
            text-decoration: underline;
            margin: 100px;
        }
        td, th 
        {
            display: table-cell;
            vertical-align: inherit;
            text-align: center;
            /* text-decoration: underline; */
        }
        tr 
        {
            display: table-row;
            vertical-align: inherit;
            border-color: blue;
        }

        table 
        {
            display: table;
            border-collapse: separate;
            border-spacing: 2px;
            border-color: grey;
            padding: 0 350px;
            caption-side: top|bottom;
        }
        input[type="button" i], input[type="submit" i], input[type="reset" i], input[type="file" i]::-webkit-file-upload-button, button
        {
            padding: 1px 6px;
            color: blue;
        }
        td:hover 
        {
            background-color: #ddd;
        }
        body{
            background: #FFE4E1;
        }
        i, cite, em, var, address, dfn 
        {
            font-style: italic;
            color: green;
            margin: 300px;
            font-size: 50px;
        }
    


    </style>
    </head>
    <body>
        <a href="staff-add.php">THÊM</a>
        <i>List Staff</i>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr class = "danger">
                <td>ID</td>
                <td>Fullname</td>
                <td>Sex</td>
                <td>Age</td>
                <td>note</td>
            </tr>
            <?php foreach ($staffs as $item){ ?>
            <tr>
                <td><?php echo $item['staff_id']; ?></td>
                <td>
                    
                    <a href="staff-add.php?id=
                    <?php echo $item['staff_id']; ?>"><?php echo $item['staff_name']; ?></a>
                </td>
                <td><?php echo $item['staff_Sex']; ?></td> 
                <td><?php echo $item['staff_Age']; ?></td>
                <td>
                    <form method="post" action="staff-delete.php">
                        <input type="hidden" value="<?php echo $item['staff_id']; ?>" name="staff_id"/>
                        <input onclick="return confirm('Ban co chac muon xoa nhan vien nay hay khong?');" type="submit" value="Delete" name="delete"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>