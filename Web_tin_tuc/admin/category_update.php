<?php
function inc()
{
    include "../incs/class_db.php";
    include "../incs/class_admin.php";
}
inc();

$adminlib = new adminlib();

$category_id = intval($_GET["id"]);
$sql = "
SELECT name
FROM category
WHERE category_id = $category_id";
$data = $adminlib->get_row($sql);

if (isset($_POST["update_action"])) {
    $message = $adminlib->update_category($category_id);
    $error = $message[0];
    $data = $message[1];
}

?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Cập nhật chuyên mục</h2>
            </div>
        </div>

        <hr />

        <?php echo isset($error['note']) ? $error['note'] : ''; ?>
        <form action="category_update.php?id=<?php echo $category_id ?>" method="post" enctype="multipart/form-data">

            Tên chuyên mục:<?php echo isset($error['name']) ? $error['name'] : ''; ?><br>
            <input type="text" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>"
                class="form-control"><br>



            <input type="submit" name="update_action" value="Cập nhật chuyên mục" class="btn btn-success">
        </form>


    </div>

</div>

</div>
<?php include 'footer.php'; ?>