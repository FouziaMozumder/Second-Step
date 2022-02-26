<?php include 'includes/header.php';?>
<?php
if(isset($_SESSION['id']))
{
    header('Location: user.php');
}
?>
<section class="py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header  text-center bg-success ">
                        <h3>Welcome To The Login Page</h3>
                    </div>
                    <div class="card-body">
                        <h3 class="text-danger text-center"><?php echo isset($message)? $message: '';?></h3>
                        <form action="action.php" method="POST">
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Input Your Email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Input Your Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" name="loginBtn" class="btn btn-outline-success btn-block" value="Login" />
                                </div>
                            </div>
                        </form>
                        <a href="regPage.php" class="btn btn-outline-warning text-center">Create a New Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php';?>

