<?php include "includes/header.php" ?>
<?php include "includes/menu.php" ?>
<?php require_once 'includes/addSchedule.php' ?>
<link rel="stylesheet" href="css/schedule-style.css" />
<div class="col-sm-10">
    <div class="container">
        <?php
        if(isset($_SESSION['message'])):?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
          ?>
        </div>
        <?php endif?>
        <div class="top-section">
            <h2>Schedules</h2>
            <div class="button-group">
                <button class="active">Member</button>
                <button>Week</button>
                <button>Day</button>
            </div>
        </div>
        <span>Member</span>
        <div class="group-form">
            <!-- <div>
                <select class="form-control" placeholder="Role" name="role" required>
                    <option>Admin</option>
                    <option>Doctor</option>
                    <option>Patient</option>
                    <option>Receptionist</option>
                </select>
            </div> -->
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addSchedule">
                <i class="fa fa-plus"></i> Add Schedule
            </button>
        </div>
        <div class="modal fade" id="addSchedule" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="includes/addSchedule.php" method="POST">
                            <div class="form-group row"> 
                                <label for="doctor" class="col-sm-2 col-form-label">Doctor</label>
                                <?php
                                    $mysqli=new mysqli('localhost','root','','hospital_management_system') or die(mysqli_error($mysqli));
                                    $result=$mysqli->query("SELECT * FROM doctor") or die($mysqli->error);
                                    ?>
                                <div class="col-sm-10">
                                    <select class="form-control" placeholder="doctor" name="name" id="doctor" required>
                                        <?php while($row=$result->fetch_assoc()):?>
                                        <option value=<?php echo $row['name']; ?>><?php echo $row['name']; ?></option>
                                        <?php endwhile;?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                            </div>
                            <span>Shift Duration</span>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <input type="date" class="form-control" name="from_date">
                                </div>
                                <div class="form-group col-md">
                                    <input type="time" class="form-control" name="from_time">
                                </div>
                                <span style="font-size: 1rem;line-height:2.5rem;font-weight:bold;">TO</span>
                                <div class="form-group col-md">
                                    <input type="date" class="form-control" name="to_date">
                                </div>
                                <div class="form-group col-md">
                                    <input type="time" class="form-control" name="to_time">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="minimum_hrs">Minimum Hours</label>
                                <input type="number" class="form-control" id="minimum_hrs"  name="minimum_hrs">
                            </div> -->
                            <div class="form-group row">
                                <label for="recurring_shift" class="col-sm-2 col-form-label">Recurring Shift</label>
                                <div class="col-sm-10">
                                    <select class="form-control" placeholder="recurring_shift" name="recurring_shift" id="recurring_shift" required>
                                        <option value="0">Never</option>
                                        <option value="1">1 day</option>
                                        <option value="2">2 days</option>
                                        <option value="3">3 days</option>
                                        <option value="4">4 days</option>
                                        <option value="5">5 days</option>
                                        <option value="6">6 days</option>
                                        <option value="7">7 days</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add-schedule">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'hospital_management_system') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM schedule") or die($mysqli->error);
    $doctor = $mysqli->query("SELECT * FROM doctor") or die($mysqli->error);
    ?>
    <div class="container schedule-panel">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col" class="table-head">
                        <p>Doctor</p>
                        <!-- <button class="btn-sm btn-primary">Show unscheduled</button> -->
                    </th>
                    <th scope="col" class="table-head">
                        <div class="date-column">
                            <div id="date"><?php $date = strtotime("-1 day");
                                            echo date("d", $date); ?>
                            </div>
                            <div>
                                <div><?php $date = strtotime("-1 day");
                                        echo date("l", $date); ?></div>
                                <div class="month"><?php $date = strtotime("-1 day");
                                                    echo date("M", $date); ?></div>
                            </div>
                        </div>
                    </th>
                    <th scope="col" class="table-head">
                        <div class="date-column">
                            <div id="date"><?php echo date("d"); ?></div>
                            <div>
                                <div><?php echo date("l"); ?></div>
                                <div class="month"><?php echo date("M"); ?></div>
                            </div>
                        </div>
                    </th>
                    <th scope="col" class="table-head">
                        <div class="date-column">
                            <div id="date"><?php $date = strtotime("+1 day");
                                            echo date("d", $date); ?>
                            </div>
                            <div>
                                <div><?php $date = strtotime("+1 day");
                                        echo date("l", $date); ?></div>
                                <div class="month"><?php $date = strtotime("+1 day");
                                                    echo date("M", $date); ?></div>
                            </div>
                        </div>
                    </th>
                    <th scope="col" class="table-head">
                        <div class="date-column">
                            <div id="date"><?php $date = strtotime("+2 day");
                                            echo date("d", $date); ?>
                            </div>
                            <div>
                                <div><?php $date = strtotime("+2 day");
                                        echo date("l", $date); ?></div>
                                <div class="month"><?php $date = strtotime("+2 day");
                                                    echo date("M", $date); ?></div>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <th scope="row"><img src="<?php
                        // while ($member_row = $doctor->fetch_assoc()) {
                        //     if ($row['name']==$member_row['name']) {
                        //         echo $member_row['name'];
                        // }else {
                            echo "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSgMQyeXHo2tzPRatT5CCO9xkei66IqM4Pn2g&usqp=CAU";
                            // }}
                            ?>" id="profile_picture" alt="profilepicture">
                        <?php echo $row['name']?></th>
                        <td><?php 
                        $date = strtotime("-1 day");
                        if (date("Y-m-d", $date)==$row['shift_from_day']) {
                            echo $row['shift_from_time']." to ". $row['shift_to_time'];
                        }else {
                            echo "Free";
                        }?></td>
                        <td><?php 
                        if (date("Y-m-d")==$row['shift_from_day']) {
                            echo $row['shift_from_time']."-". $row['shift_to_time'];
                        }
                        else {
                            echo "Free";
                        } ?></td>
                        <td><?php 
                        $date = strtotime("+1 day");
                        if (date("Y-m-d", $date)==$row['shift_from_day']) {
                            echo $row['shift_from_time']." to ". $row['shift_to_time'];
                        }else {
                            echo "Free";
                        }?></td>
                        <td><?php 
                        $date = strtotime("+2 day");
                        if (date("Y-m-d", $date)==$row['shift_from_day']) {
                            echo $row['shift_from_time']." to ". $row['shift_to_time'];
                        }else {
                            echo "Free";
                        }?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
       
    </div>