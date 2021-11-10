<?php include "includes/header.php"?>
<?php include "includes/menu.php"?>
<div class="col-md-10 " >
    <h2 class="h2 mt-5" style="font-weight:bold">Department</h2>
    <table class="table mt-3"  style="text-align:center">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Department Id</th>
        <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $mysqli=new mysqli('localhost','root','','hospital_management_system') or die(mysqli_error($mysqli));
            $result=$mysqli->query("SELECT * FROM department") or die($mysqli->error);
        ?>
        <?php while($row=$result->fetch_assoc()):?>
            <tr>
                <th scope="row"><?php echo $row['dept_id']; ?></th>
                <td><?php echo $row['name']; ?></td>
            </tr>
        <?php endwhile;?>
    </tbody>
    </table>
</div>