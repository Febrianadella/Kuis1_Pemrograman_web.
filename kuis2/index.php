<?php
$conn = mysqli_connect("localhost", "root", "", "kuis2");

if ($_POST) {
    if (isset($_POST['tambah'])) {
        $u = $_POST['username'];
        $p = password_hash($_POST['password'], PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$u', '$p')");
    }
    if (isset($_POST['hapus'])) {
        mysqli_query($conn, "DELETE FROM users WHERE id=".$_POST['id']);
    }
}
$data = mysqli_query($conn, "SELECT * FROM users");
?>

<form method="post">
  <input name="username" placeholder="Username">
  <input name="password" placeholder="Password">
  <button name="tambah">Tambah</button>
</form>

<table border="1">
  <tr><th>ID</th><th>User</th><th>Hapus</th></tr>
  <?php while ($d = mysqli_fetch_assoc($data)) { ?>
  <tr>
    <td><?= $d['id'] ?></td>
    <td><?= $d['username'] ?></td>
    <td>
      <form method="post">
        <input type="hidden" name="id" value="<?= $d['id'] ?>">
        <button name="hapus">X</button>
      </form>
    </td>
  </tr>
  <?php } ?>
</table>
