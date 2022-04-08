<?php
function inc()
{
    include "../incs/class_db.php";
    include "../incs/class_admin.php";
}
inc();

$adminlib = new adminlib();

if (isset($_POST["add_action"])) {
    $message = $adminlib->add_category();
    $error = $message[0];
    $data = $message[1];
}

$sql = "SELECT * FROM category";
$list_category = $adminlib->get_list($sql);

?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Thêm chuyên mục</h2>
            </div>
        </div>

        <hr />
        <?php echo isset($error['note']) ? $error['note'] : ''; ?>
        <form action="categoryadd.php" method="post" enctype="multipart/form-data">

            Chuyên mục:<?php echo isset($error['name']) ? $error['name'] : ''; ?><br>
            <input type="text" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" class="form-control"><br>

            <input type="submit" name="add_action" value="Thêm chuyên mục" class="btn btn-success">
        </form>

    </div>

</div>

</div>
<?php include 'footer.php'; ?>