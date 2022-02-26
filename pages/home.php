<?php include 'includes/header.php';?>
<?php
if(!isset($_SESSION['id']))
{
    header('Location: login.php');
}
?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10 max-auto">
                <div class="card">
                    <div class="card-header text-center py-5">

                        <h3>Add Product Form</h3>
                    </div>
                        <div class="card-body">
                            <h4 class="text-success text-center">
                                <?php echo isset($message) ? $message : ''; ?>
                            </h4>
                            <form action="action.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Product Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Product Price</label>
                                    <div class="col-md-9">
                                        <input type="number" name="price" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Stock Amount</label>
                                    <div class="col-md-9">
                                        <input type="number" name="stock" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Product Description</label>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Product Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control-file"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" name="btn" class="btn btn-outline-success btn-block" value="Create New Product"/>
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


