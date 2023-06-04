
<?php
$i = 0;
foreach ($dataUser as $row) {
    $i++;
    ?>
    <tr>
        <td>
            <?= $i ?>
        </td>
        <td>
            <?= $row['name'] ?>
        </td>
        <td>
            <?= $row['phone'] ?>
        </td>
        <td>
            <?= $row['email'] ?>
        </td>
        <td>
            <button type="button" class="btn btn-warning btn-edit"
                data-url="?mod=admin&act=showUser&id=<?= $row['id'] ?>">Sửa</button>
            <button type="button" class="btn btn-danger btn-delete" data-id="<?= $row['id'] ?>">Xóa</button>
        </td>
    </tr>
    <?php
}
?>

