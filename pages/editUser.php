<?php include 'includes/header.php';?>
<?php
if(!isset($_SESSION['id']))
{
    header('Location: login.php');
}
?>
<?php include 'includes/header.php';?>
<section class="py-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header  text-center bg-success ">
                        <h3>Edit User</h3>
                    </div>
                    <div class="card-body">
                        <h4 class="text-center text-success"><?php echo isset($message) ? $message:''; ?> </h4>
                        <form action="actionUser.php" method="POST">
                            <input type="hidden"name="student_id" value="<?php $productInfo ['id']?>"/>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" value="<?php $productInfo ['name']?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Email</label>
                                <div class="col-md-9">

                                    <input type="email" name="email" class="form-control value="<?php $productInfo ['email']?>"" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control " />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Mobile</label>
                                <div class="col-md-9">
                                    <input type="number" name="mobile" class="form-control " />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" name="btn" class="btn btn-outline-success btn-block"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include 'includes/footer.php';?>