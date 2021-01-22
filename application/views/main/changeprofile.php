<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/profilepicture.css">

</head>
<body>
<div class="page-header">
    <h3 class="page-title">
       <center> Edit profile</center>
    </h3>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <?php if ($error = $this->session->flashdata('msg')) { ?>
                    <p style="color: green;"><?php
                        if ($error != null) {
                            foreach ($error as $err) {
                                echo $err;
                            }
                        } ?></p>
                <?php } ?>
                <?php echo form_open_multipart('welcome/editprofile/' . $users['UserId']); ?>
                <div class="form-group">
                    <div class="preview text-center">
                        <input type="hidden" name="Photo" value="<?php echo $users['Photo'] ?>"/>
                        <img class="preview-img" src="<?php echo site_url('images/userimages/' . $users['Photo']); ?>"
                             value="<?php echo $users['Photo'] ?>" alt="Preview Image" width="200" height="200"/>
                        <div class="browse-button" title="Change Image">
                            <i class="fa fa-pencil-alt"></i>
                            <input class="browse-input" type="file" name="userfile" id="userfile"/>
                        </div>
                        <span class="Error"></span>
                    </div>
                    <label for="exampleInputUsername1">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputUsername1"
                           value="<?php echo $users['FullName'] ?>" placeholder="Username" name="FullName">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"
                           value="<?php echo $users['Email'] ?>" placeholder="Email" name="Email">
                </div>
                <div class="form-group">
                    <label for="exampleProfession">Description</label>

                    <textarea name="description"><?php echo $users['Description'] ?></textarea>
                    <script>
                        CKEDITOR.replace('description');
                    </script>
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <a class="btn btn-light" href="<?php base_url() ?>index">Cancel</a>
                    </form>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <div class="col-md-2">

        </div>
    </div>
</div>
</body>
</html>
	