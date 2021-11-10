<?php include "includes/header.php" ?>
<?php include "includes/menu.php" ?>
<?php require_once 'includes/addSchedule.php' ?>
<link rel="stylesheet" href="css/schedule-style.css" />
<div class="col-sm-10">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="home" aria-selected="true">Profile</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">Change Password</button>
      </li>
      <!-- <li class="nav-item" role="presentation">
        <button class="nav-link" id="theme-tab" data-bs-toggle="tab" data-bs-target="#theme" type="button" role="tab" aria-controls="theme" aria-selected="false">Theme</button>
      </li> -->
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <h3>Change your Profile</h3>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full Name" aria-label="name" aria-describedby="basic-addon2">
          <!-- <span class="input-group-text" id="basic-addon2">@example.com</span> -->
        </div>
        <!-- <div class="input-group mb-3">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
          <span class="input-group-text">.00</span>
        </div> -->

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" aria-label="password">
          <span class="input-group-text">---</span>
          <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm">
        </div>

        <div class="input-group">
          <span class="input-group-text">Description</span>
          <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>
        <button class="btn btn-primary">Save</button>
      </div>
      <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
        <h3>Change your Password</h3>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Old Password" aria-label="password">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="New Password" aria-label="newpassword">
          <span class="input-group-text"> </span>
          <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm">
        </div>
        <button class="btn btn-primary">Save</button>

      </div>
      <!-- <div class="tab-pane fade" id="theme" role="tabpanel" aria-labelledby="theme-tab">

        <div class="color-theme-button">
          <h4>Select Color</h4>
          <button type="button" class="btn btn-danger circle-btn"></button>
          <button type="button" class="btn btn-warning circle-btn"></button>
          <button type="button" class="btn btn-success circle-btn"></button>
          <button type="button" class="btn btn-danger circle-btn"></button>
          <button type="button" class="btn btn-success circle-btn"></button>

        </div>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
          <label class="form-check-label" for="flexSwitchCheckDefault">Dark Mode</label>
        </div>
        <div class="custom-color-setting">
          <h4>Select custom Color</h4>
          <div class="color-theme-button">
            <h6>Primary Color</h6>
            <button type="button" class="btn btn-danger circle-btn"></button>
            <button type="button" class="btn btn-warning circle-btn"></button>
            <button type="button" class="btn btn-success circle-btn"></button>
          </div>
          <div class="color-theme-button">
            <h6>Background Color</h6>
            <button type="button" class="btn btn-danger circle-btn"></button>
            <button type="button" class="btn btn-warning circle-btn"></button>
            <button type="button" class="btn btn-success circle-btn"></button>
          </div>
          <div class="color-theme-button">
            <h6>Header Color</h6>
            <button type="button" class="btn btn-danger circle-btn"></button>
            <button type="button" class="btn btn-warning circle-btn"></button>
            <button type="button" class="btn btn-success circle-btn"></button>
          </div>
        </div>
        <button class="btn btn-primary">Save Changes</button>
      </div>
    </div> -->
  </div>
</div>

<style>
  .circle-btn {
    height: 40px;
    width: 40px;
    border-radius: 50%;
    margin: 0 30px;
  }

  .container {
    margin: 40px;
  }

  .nav-item button:focus {
    outline: none;
  }

  .tab-pane {
    margin: 40px 0;
  }

  .tab-pane h3 {
    margin-bottom: 40px;
  }

  .tab-pane button {
    margin: 20px 0;
  }
</style>
<script>
  var triggerTabList = [].slice.call(document.querySelectorAll('#myTab a'))
  triggerTabList.forEach(function(triggerEl) {
    var tabTrigger = new bootstrap.Tab(triggerEl)

    triggerEl.addEventListener('click', function(event) {
      event.preventDefault()
      tabTrigger.show()
    })
  })
</script>