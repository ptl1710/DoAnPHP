<?php
function inc()
{
    include "../incs/class_db.php";
    include "../incs/class_admin.php";
}
inc();

$adminlib = new adminlib();

$sql = "SELECT count(*) FROM category";
$total_records = $adminlib->get_row_number($sql);

$limit = 3;

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$total_page = ceil($total_records / $limit);

if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;

$sql = "SELECT * FROM posts a JOIN category b on a.category_id = b.category_id ORDER BY createdate DESC LIMIT $start, $limit";
$data = $adminlib->get_list($sql);
?>
<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Quản lý chuyên mục</h2>
            </div>
        </div>

        <hr />
        <a href="categoryadd.php"><input type="button" class="btn btn-success" value="Thêm chuyên mục"></a><br><br>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Chuyên Mục</th>
                    <th>Xử lý</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $data != 0 && $i < count($data); $i++) {
                    $id = $data[$i]["category_id"];
                ?>
                <tr>
                    <td><?php echo $data[$i]["name"]; ?></td>
                    <td><a href="category_update.php?id=<?php echo $id; ?>">Cập Nhật</a> | <a
                            href="category_remove.php?id=<?php echo $id; ?>">Xóa</a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <ul class="pagination">
            <?php
            if ($current_page > 1 && $total_page > 1) {
                echo '<li><a href="category.php?page=' . ($current_page - 1) . '">Lùi Lại</a></li>';
            }

            for ($i = 1; $i <= $total_page; $i++) {

                if ($current_page == $i)
                    echo '<li class="disabled"><a href="#">' . $i . '</a></li>';
                else
                    echo '<li><a href="category.php?page=' . $i . '">' . $i . '</a></li>';
            }

            if ($current_page < $total_page && $total_page > 1) {
                echo '<li><a href="category.php?page=' . ($current_page + 1) . '">Tiếp Theo</a></li>';
            }

            ?>
        </ul>
    </div>

</div>

</div>
<?php include 'footer.php'; ?>