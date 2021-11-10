<?php require_once 'includes/addDoctor.php'?>
<?php include "includes/header.php"?>
<?php include "includes/menu.php"?>

<div class="col-md-10">
    <div class="container m-2">
        
        <?php
        if(isset($_SESSION['message'])):?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          ?>
        </div>
        <?php endif?>
        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#addDoctor">
            <i class="fa fa-plus"></i> New Doctor
        </button>
    </div>
    <?php if($update==true):?>
        <div class="collapse m-3 <?php echo "show"?>" id="addDoctor">
        <?php else:?>
            <div class="collapse m-3" id="addDoctor">
        <?php endif;?>
            <div class="card card-body">
                <form action="includes/addDoctor.php" method="POST">
                <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name;?>"
                                required>
                        </div>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="female"
                                        value="Female">
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="others"
                                        value="others">
                                    <label class="form-check-label" for="others">Others</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row">
                        <label for="dob" class="col-sm-2 col-form-label">D.O.B</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="dob"  max='<?php echo date("Y-m-d") ?>' name="dob" value="<?php echo $dob;?>"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $address;?>"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="phone" name="phoneno" value="<?php echo $phoneno;?>"
                                required>
                        </div>
                    </div>
                    <div class="form-group row"> 
                                <label for="department" class="col-sm-2 col-form-label">Department</label>
                                <?php
                                    $mysqli=new mysqli('localhost','root','','hospital_management_system') or die(mysqli_error($mysqli));
                                    $result=$mysqli->query("SELECT * FROM department") or die($mysqli->error);
                                    ?>
                                <div class="col-sm-10">
                                    <select class="form-control" placeholder="Department" name="department" id="department" required>
                                        <?php while($row=$result->fetch_assoc()):?>
                                        <option value=<?php echo $row['name']; ?>><?php echo $row['name']; ?></option>
                                        <?php endwhile;?>
                                    </select>
                                </div>
                            </div>
                    <!-- <div class="form-group row">
                        <label for="dept" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="dept" name="department" value="<?php echo $dept;?>"
                                required>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <?php 
                        if($update==true):?>
                            <button type="submit" class="btn btn-outline-primary" name="update">Update</button>
                            <?php else:?>
                            <button type="submit" class="btn btn-outline-info" name="save">Submit</button>
                            <?php endif;?>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        $mysqli=new mysqli('localhost','root','','hospital_management_system') or die(mysqli_error($mysqli));
        $result=$mysqli->query("SELECT * FROM doctor") or die($mysqli->error);
        ?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Docotr ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">D.O.B</th>
                    <th scope="col">Age</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone no</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row=$result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <th scope="row"><?php echo $row['name']; ?></th>
                    <th><?php echo $row['gender']; ?></th>
                    <th><?php echo $row['dob']; ?></th>
                    <th><?php
                    // $_age calculate not finished
                    
                    $birthDate = $row['dob'];
                    $birthDate = explode("-", $birthDate);
                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                        ? ((date("Y") - $birthDate[2]) - 1)
                        : (date("Y") - $birthDate[2]));
                    echo $age;
                    ?></th>
                    <th><?php echo $row['address']; ?></th>
                    <th><?php echo $row['phoneno']; ?></th>
                    <th><?php echo $row['department']; ?></th>

                    <th>
                        <a class="btn btn-outline-info" href="patient.php?edit=<?php echo $row['id'];?>">Edit</a>
                        <a class="btn btn-outline-danger"
                            href="includes/addDoctor.php?delete=<?php echo $row['id'];?>">Delete</a>                        
                    </th>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>