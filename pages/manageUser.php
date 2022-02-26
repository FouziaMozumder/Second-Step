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
                        <h3> All User </h3>
                    </div>
                    <div class="card-body">
                        <table class= " table table-bordered="1" ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($students as $student) { ?>

                            <tr>
                                <td><?php echo $student['name'];   ?></td>
                                <td><?php echo $student['email'];  ?></td>
                                <td><?php echo $student['mobile']; ?></td>
                                <td>
                                    <a href="actionUser.php?status=edit&id=<?php echo $student['id']; ?>" class="btn btn-outline-warning">Update</a>
                                    <a href="actionUser.php?status=delete&id=<?php echo $student['id']; ?>" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php';?>



