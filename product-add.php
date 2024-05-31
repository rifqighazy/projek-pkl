<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-dark border-bottom">
    <h1 class="h2">Add Product</h1>
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
          <h5 class="card-title">Tambah Produk</h5>
          <p class="card-text">Jika ingin menambah produk. Isi form dibawah ini!</p>
          <form action="query/query_product-add.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="namaproduk">Product</label>
              <input type="text" class="form-control" name="namaproduk" placeholder="Product" required>
            </div>
            <div class="mb-3">
              <label for="harga">Price</label>
              <input type="number" class="form-control" name="harga" placeholder="Price" required>
            </div>
            <div class="mb-3">
              <label for="stok">Stock</label>
              <input type="number" class="form-control" name="stok" placeholder="Stock" required>
            </div>
            <div class="mb-3">
              <label for="kategori" class="form-label">Category</label>
              <select class="form-select" name="kategori" aria-label="Default select example" required>
                <option value="">Category</option>
                <option value="Makanan Ringan">Makanan Ringan</option>
                <option value="Makanan Berat">Makanan Berat</option>
                <option value="Minuman">Minuman</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="image">Image</label>
              <input type="file" class="form-control" name="foto" id="fileToUpload" placeholder="Gambar" required>
              <span style="color:red; font-size:12px;">Only JPG / JPEG / PNG format allowed.</span>
            </div>
            <br>
            <div class="mb-3 d-grid">
              <button type="Submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>