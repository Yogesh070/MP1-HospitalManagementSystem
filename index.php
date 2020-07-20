<?php include "./includes/header.php"?>
<?php include "./includes/menu.php"?>
<?php $tiltle="Dashboard"?>
<div class="col-lg-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="container my-4 welcome-tab">
                    <p class="pt-4">Welcome,Alex</p>
                    <!--User name is to be displayed -->
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
                            <a class="nav-link" href="#">19 July</a>
                            <a class="nav-link" href="#">20 July</a>
                            <a class="nav-link active" href="#">21 July</a>
                            <a class="nav-link" href="#">22 July</a>
                            <a class="nav-link" href="#">21 July</a>
                            <a class="nav-link" href="#">22 July</a>
                            <a class="nav-link " href="#">21 July</a>
                            <a class="nav-link" href="#">22 July</a>
                    </div>
                </div>
                <div class="container">
                    <h2>hello world</h2>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
