<?php
include 'query/user.php';
?>
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
</div>

<div class="container">
  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Username</th>
        <th scope="col">Full Name</th>
        <th scope="col">Phone Number</th>
      </tr>
    </thead>
    <?php foreach($hasil as $row) : ?>
    <tbody>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['nomor_telepon']; ?></td>
      </tr>
    </tbody>
    <?php endforeach; ?>
  </table>
</div>

<?php
if(isset($_SESSION['message'])){
    echo "<div class='alert alert-".$_SESSION['message']['type']." alert-dismissible fade show' role='alert'>".$_SESSION['message']['message']." <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    unset($_SESSION['message']);
}
?>