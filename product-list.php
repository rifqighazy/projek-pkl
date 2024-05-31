<?php
include 'query/list.php';
?>
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-dark border-bottom">
    <h1 class="h2">List Product</h1>
  </div>
</div>

<div class="container">
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Products</th>
        <th scope="col">Prices</th>
        <th scope="col">Stocks</th>
        <th scope="col">Categories</th>
        <th scope="col">Images</th>
        <th scope="col">Edit / Delete</th>
      </tr>
    </thead>
    <?php while($row = $hasil->fetch_assoc()) { ?>
    <tbody>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['stock']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td style="text-align: center;"><img src="uploads/images/products/<?php echo $row['image']; ?>" class="img-thumbnail" style="width: 80px;"></td>
        <td><a href="index.php?page=edit&id=<?php echo $row['id'] ?>" type="button" class="btn btn-warning">Edit</a> <a href="query/delete.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin menghapus data ini?')">Hapus</a></td>
      </tr>
    </tbody>
    <?php } ?>
  </table>
</div>

<?php
if(isset($_SESSION['message'])){
    echo "<div class='alert alert-".$_SESSION['message']['type']." alert-dismissible fade show' role='alert'>".$_SESSION['message']['message']." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    unset($_SESSION['message']);
}
?>