<?php include "./includes/header.php"?>
<?php include "./includes/menu.php"?>
<?php include './services/getNews.php'?>
<style>
<?php include 'css/style.css'; ?>
</style>
<?php $tiltle="Dashboard"?>
<div class="col-lg-10">
    <!-- <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="container my-4 welcome-tab">
                    <p class="pt-4">Welcome,Alex</p>
                    <p class="py-4">Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Iste eius maxime saepe quisquam eveniet minima veniam ad velit fugiat. Rerum.
                    </p>
                </div>
                <div class="container my-4 dashboard-info-panel">
                    <div class="row p-4">
                        <div class="col-lg"><i class="fas fa-calendar-check"></i>Appointment</div>
                        <div class="col-lg"><i class="fas fa-info-circle"></i>Help</div>
                        <div class="col-lg"><i class="fas fa-user-md"></i>Doctor avilable</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 dashboard-timeline">
                <div class="container my-4">
                    <h3><?php echo date("M-Y")?></h3>
                    <div class="nav-tab calender"> 
                    <div class="date-card active">
                            <p><?php $date = strtotime("-1 day");
                                            echo date("D", $date); ?></p>
                            <p><?php $date = strtotime("-1 day");
                                            echo date("d", $date); ?></p>
                            </div>
                            
                            <div class="date-card active">
                            <p> <?php echo date("D")?></p>
                            <p><?php echo date("d")?></p>
                            </div>
                            <div class="date-card ">
                            <p><?php $date = strtotime("+1 day");
                                            echo date("D", $date); ?></p>
                            <p><?php $date = strtotime("+1 day");
                                            echo date("d", $date); ?></p>
                            </div>
                            <div class="date-card">
                            <p><?php $date = strtotime("+2 day");
                                            echo date("D", $date); ?></p>
                            <p><?php $date = strtotime("+2 day");
                                            echo date("d", $date); ?></p>
                            </div>
                    </div>
                </div> 
                <div class="container" id="news-container">
                    <h3>Latest News</h3>
              <?php  foreach ($decodedData['articles'] as $i=> $title) {
                    if ($i++ > 3) break;
                    echo '<h6>'.$title['title'].'</h6>';} ?>

                </div>
            </div>
        </div>
    </div> -->
    <div class="container my-4">
        <div class="row">
            <div class="card col-sm">
                <h2>Patients</h2>
                <span class="count"><?php
                    $conn = new mysqli('localhost','root','','hospital_management_system') ;
                    $sql = "SELECT * FROM patient";
                    if ($result=mysqli_query($conn,$sql)) {
                        $rowcount=mysqli_num_rows($result);
                        echo $rowcount; 
                    }
                    ?>
                </span>
                <p><span>5.5%</span>More patient than usual</p>
                <div class="card-icon"><i class="fas fa-hospital-user"></i></div>
            </div>
            <div class="card col-sm mx-4">
                <h2>Doctors</h2>
                <span class="count"><?php
                    $conn = new mysqli('localhost','root','','hospital_management_system') ;
                    $sql = "SELECT * FROM doctor";
                    if ($result=mysqli_query($conn,$sql)) {
                        $rowcount=mysqli_num_rows($result);
                        echo $rowcount; 
                    }
                    ?></span>
                <p><span>5.5%</span>Doctors are avilable</p>
                <div class="card-icon"><i class="fas fa-user-md"></i></div>
            </div>
            <div class="card col-sm">
                <h2>Rooms Avilable</h2>
                <span class="count">12</span>
                <p><span>5.5%</span>Rooms Avilable</p>
                <div class="card-icon"><i class="fas fa-home"></i></div>
            </div>
        </div>
    </div>
    
    <div class="col-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<div class="card-actions float-end">
										<a href="#" class="me-1">
											<i class="align-middle" data-feather="refresh-cw"></i>
										</a>
										<div class="d-inline-block dropdown show">
											<a href="#" data-bs-toggle="dropdown" data-bs-display="static">
												<i class="align-middle" data-feather="more-vertical"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
											</div>
										</div>
									</div>
									<h5 class="card-title mb-0">Latest Patients</h5>
								</div>
								<table id="datatables-dashboard-projects" class="table table-striped my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Start Date</th>
											<th class="d-none d-xl-table-cell">End Date</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Assignee</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Project Apollo</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Carl Jenkins</td>
										</tr>
										<tr>
											<td>Project Fireball</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">Bertha Martin</td>
										</tr>
										<tr>
											<td>Project Hades</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Stacie Hall</td>
										</tr>
										<tr>
											<td>Project Nitro</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Carl Jenkins</td>
										</tr>
										<tr>
											<td>Project Phoenix</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Bertha Martin</td>
										</tr>
										<tr>
											<td>Project X</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Stacie Hall</td>
										</tr>
										<tr>
											<td>Project Romeo</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Ashley Briggs</td>
										</tr>
										<tr>
											<td>Project Wombat</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Bertha Martin</td>
										</tr>
										<tr>
											<td>Project Zircon</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">Stacie Hall</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
</div>
</body>
</html>
