<html>
<head>
</head>
<body>
    <div class="page-header">
        <h3 class="page-title">
            User profile
        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="container emp-profile">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile-img">
                                        <img src="<?php echo site_url('images/userimages/'.$users['Photo']);?>"
                                             alt=""/>
<!--                                        <div class="file btn btn-sm btn-primary">-->
<!--                                            Change Photo-->
<!--                                            <input type="file" name="file"/>-->
<!--                                        </div>-->
                                    </div>
                                    <br/><br/>
                                </div>
                                <div class="col-md-6">
                                    <div class="profile-head">
                                        <h5>
                                            <?php echo $users['FullName']; ?>
                                        </h5>
<!--                                        <p class="proile-rating">Rating : <span>8/10</span></p>-->
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                   role="tab" aria-controls="home" aria-selected="true">About</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
<!--                                <div class="col-md-2">-->
<!--                                    <input type="submit" class="profile-edit-btn" name="btnAddMore"-->
<!--                                           value="Edit Profile"/>-->
<!--                                </div>-->
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="tab-content profile-tab" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                             aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>User Id</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $users['UserId']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $users['FullName']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $users['Email']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

