<?php include "./includes/header.php"?>
<?php include "./includes/menu.php"?>
<?php include './services/getNews.php'?>
<style>
<?php include 'css/style.css'; ?>
</style>
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
    </div>
</div>
</body>
</html>
