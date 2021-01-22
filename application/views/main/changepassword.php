<html>
<head></head>
<body><div class="page-header">
    <h3 class="page-title" align="center">
        Change password
    </h3>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <?php echo form_open('welcome/updatepassword'); ?>
                    <input type="hidden" name="UserId" id="UserId" value="<?php echo $users['UserId']; ?>" />
                    <input type="hidden" name="OldPs" id="OldPs" value="<?php echo $users['Password']; ?>" />
                    <div class="form-group">
                        <input type="password" class="form-control" name="OldPassword" id="OldPassword" placeholder="Old Password " value="" required="required" />
                        <span class="text-danger" id="message"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="Password" id="Password" placeholder="New Password " value="" required="required" />
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword" placeholder="Confirm Password " value="" required="required"/>
                        <span class="text-danger" id="Errormessage"></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-block btn-default btn-gradient-primary" id="btn" value="Change Password" />
                    </div>
                <?php echo form_close(); ?>
            </div>

        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
    $('#OldPassword').blur(function () {

        if (document.getElementById('OldPassword').value == document.getElementById('OldPs').value) {
            document.getElementById('message').style.color = '';
            document.getElementById('message').innerHTML = '';
            document.getElementById('btn').disabled = false;
        }
        else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Incorrect Old Password';
            document.getElementById('btn').disabled = true;
        }
    });


    $('#Password').keyup(function () {
        //function checkPassword() {
        if (document.getElementById('Password').value == document.getElementById('ConfirmPassword').value) {
            document.getElementById('Errormessage').style.color = '';
            document.getElementById('Errormessage').innerHTML = '';
            document.getElementById('btn').disabled = false;
        }

        else {
            document.getElementById('Errormessage').style.color = 'red';
            document.getElementById('Errormessage').innerHTML = 'Password mismatch';
            document.getElementById('btn').disabled = true;
        }
    });

    $('#ConfirmPassword').keyup(function () {
        //function checkPassword() {
        if (document.getElementById('Password').value == document.getElementById('ConfirmPassword').value) {
            document.getElementById('Errormessage').style.color = '';
            document.getElementById('Errormessage').innerHTML = '';
            document.getElementById('btn').disabled = false;
        }

        else {
            document.getElementById('Errormessage').style.color = 'red';
            document.getElementById('Errormessage').innerHTML = 'Password mismatch';
            document.getElementById('btn').disabled = true;
        }
    });
</script>

</html>
