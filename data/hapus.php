<?php 
require 'koneksi.php';

//ambil id di url
$id = $_GET ['id'];

if(hapus($id) > 0) {   
  echo "<script>
          alert('data berhasil dihapus');
          document.location.href = 'home.php';
        </script>";
} else {
echo "Data gagal dihapus";
} 
 ?>