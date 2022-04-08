<?php
function inc()
{
    include "../incs/class_db.php";
    include "../incs/class_admin.php";
}
inc();

$adminlib = new adminlib();
$category_id = intval($_GET["id"]);
if (isset($_POST["remove_action"])) {
    $adminlib->remove_category($category_id);
}

?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<script src="ckeditor/ckeditor.js"></script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Xóa chuyên mục</h2>
            </div>
        </div>

        <hr />

        <form action="category_remove.php?id=<?php echo $category_id ?>" method="post">
            Bạn chắc chắn muốn xóa?<br>
            <input type="submit" name="remove_action" value="Xóa chuyên mục" class="btn btn-success">
        </form>


    </div>

</div>

</div>
<?php include 'footer.php'; ?>