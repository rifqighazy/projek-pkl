<?php include 'query/edit.php'; ?>

<div class="container">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-dark border-bottom">
        <h1 class="h2">Edit Product</h1>
    </div>
</div>

<?php
if(isset($_SESSION['message'])){
    echo "<div class='alert alert-".$_SESSION['message']['type']." alert-dismissible fade show' role='alert'>".$_SESSION['message']['message']." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    unset($_SESSION['message']);
}
?>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mb-3 border-2">
        <div class="card-body">
          <h5 class="card-title">Edit Produk</h5>
          <p class="card-text">Jika ingin mengedit produk. Isi form dibawah ini!</p>
          <?php $data = mysqli_fetch_assoc($show); ?>
          <form action="query/query_product-edit.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id" value="<?php echo $data['id'] ?>">
            <div class="mb-3">
                <label for="namaproduk">Product</label>
                <input 
                    type="text"
                    class="form-control"
                    name="namaproduk"
                    placeholder="Product"
                    value="<?php echo $data['name'] ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="harga">Price</label>
                <input 
                    type="number"
                    class="form-control"
                    name="harga"
                    placeholder="Price"
                    value="<?php echo $data['price'] ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="stok">Stock</label>
                <input 
                    type="number"
                    class="form-control"
                    name="stok"
                    placeholder="Stock"
                    value="<?php echo $data['stock'] ?>"
                    required>
            </div>
            <div class="mb-4">
                <label for="kategori" class="form-label">Category</label>
                <select class="form-select" name="kategori" aria-label="Default select example" required>
                    <option value="">Category</option>
                    <option value="Makanan Ringan">Makanan Ringan</option>
                    <option value="Makanan Berat">Makanan Berat</option>
                    <option value="Minuman">Minuman</option>
                </select>
            </div>
            <div class="mb-3">
              <div class="row align-items-start">
                <div class="col-1">
                  <img src="uploads/images/products/<?php echo $data['image']; ?>" width="100px">
                </div>
                <div class="col-11">
                  <label for="image">Image</label>
                  <input type="file" class="form-control" name="foto" id="fileToUpload" placeholder="Gambar">
                  <input type="hidden" name="fotolama" value="<?php echo $data['image'] ?>">
                  <span style="color:red; font-size:12px;">Only JPG / JPEG / PNG format allowed.</span>
                </div>
              </div>
            </div>
            <div class="mt-4 mb-2 d-grid">
                <button type="Submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          <?php  ?>
        </div>
      </div>
    </div>
  </div>
</div>