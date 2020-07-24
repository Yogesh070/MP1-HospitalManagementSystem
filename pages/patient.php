<?php include "../includes/header.php"?>
<?php include "../includes/menu.php"?>
<div class="col-md-10">
    <div class="container m-2">
        <?php require_once '../includes/addNewPatient.php'?>
        <?php
        if(isset($_SESSION['message'])):?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          ?>
        </div>
        <?php endif?>
        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#addNewPatient">
            <i class="fa fa-plus"></i> New Patient
        </button>
    </div>
    <?php if($update==true):?>
        <div class="collapse m-3 <?php echo "show"?>" id="addNewPatient">
        <?php else:?>
            <div class="collapse m-3" id="addNewPatient">
        <?php endif;?>
            <div class="card card-body">
                <form action="./includes/addNewPatient.php" method="POST">
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
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $dob;?>"
                                required>
                        </div>
                    </div>
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
$mysqli=new mysqli('localhost','root','','patientinfo') or die(mysqli_error($mysqli));
$result=$mysqli->query("SELECT * FROM patientdata") or die($mysqli->error);
// pre_r($result->fetch_assoc());
//  function pre_r($array){
//      echo '<pre>';
//      print_r($array);
//      echo '<pre>';
//  }
?>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">D.O.B</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row=$result->fetch_assoc()):?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <th scope="row"><?php echo $row['Name']; ?></th>
                    <th><?php echo $row['Gender']; ?></th>
                    <th><?php echo $row['DOB']; ?></th>
                    <th>
                        <a class="btn btn-outline-info" href="patient.php?edit=<?php echo $row['ID'];?>">Edit</a>
                        <a class="btn btn-outline-danger"
                            href="./includes/addNewPatient.php?delete=<?php echo $row['ID'];?>">Delete</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                            data-target="#<?php echo $row['Name'];?>">
                            View
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="<?php echo $row['Name'];?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h2><?php echo $row['Name'];?></h2>
                                        <p>
                                            ID : <?php echo $row['ID'];?><br>
                                            DATE OF BIRTH: <?php echo $row['DOB'];?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-primary">Edit</button> -->
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>