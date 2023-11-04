<?php
class Product
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    //CREATE
    public function createProducts()
    {
        if (isset($_POST['submit'])) {
            $direktori = "../assets/images/pos-shop/";
            $gambar = $_FILES['gambar']['name'];
            $tmp_gambar = $_FILES['gambar']['tmp_name'];

            $arrayGambar = array();

            for ($i = 0; $i < count($gambar); $i++) {
                move_uploaded_file($tmp_gambar[$i], $direktori . $gambar[$i]);
                $arrayGambar[] = $gambar[$i];
            }

            $jsonGambar = json_encode($arrayGambar);
            $nama_produk = $_POST['nama'];
            $deskripsi_produk = $_POST['deskripsi'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $kode_produk = $_POST['kode_produk'];
            $kategori = $_POST['kategori'];

            if (empty($kode_produk)) {
                echo "Kode produk tidak boleh kosong.";
            } else {
                $db = $this->db->getConnection();

                $query = "SELECT id FROM products WHERE product_code = '$kode_produk'";
                $resultk = $db->query($query);

                if ($resultk->num_rows > 0) {
                    $error_message = "Kode produk sudah ada.";
                } else {
                    $sql = "INSERT INTO products(image, product_name, description, price, stock, product_code, category_id) VALUES('$jsonGambar','$nama_produk','$deskripsi_produk','$harga','$stok','$kode_produk','$kategori')";
                    $resultk = $db->query($sql);
                    header('location:produk.php');
                }
            }

            if (isset($error_message)) {
                echo "<script>alert('$error_message');</script>";
            }
        }
    }

    //READ
    public function readProducts()
    {
        $sql = "SELECT * FROM product_view";
        return $this->db->query($sql);
    }

    //UPDATE
    public function updateProducts()
    {
        $id = $_GET['updateid'];
        if (isset($_POST['submit'])) {

            $sql2 = "SELECT * FROM products WHERE id=$id";
            $result2 = $this->db->query($sql2);
            $data = mysqli_fetch_assoc($result2);

            $nama_produk = $_POST['nama'];
            $deskripsi_produk = $_POST['deskripsi'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];
            $kode_produk = $_POST['kode_produk'];
            $kategori = $_POST['category_id'];
            $editGambar = [];
            $direktori = "../assets/images/pos-shop/";

            if (!empty($_FILES['gambar']['name'][0])) {
                $totalGambar = count($_FILES['gambar']['name']);
                for ($i = 0; $i < $totalGambar; $i++) {
                    $editNamaGambar = $_FILES['gambar']['name'][$i];
                    $file_tmp = $_FILES['gambar']['tmp_name'][$i];
                    $path = $direktori . $editNamaGambar;

                    if (move_uploaded_file($file_tmp, $path)) {
                        $editGambar[] = $editNamaGambar;
                    }
                }
            }

            if (!empty($editGambar)) {
                $editGambar_json = json_encode($editGambar);
                $sql = "UPDATE products SET image='$editGambar_json', product_name='$nama_produk', description='$deskripsi_produk', price='$harga', 
                    stock='$stok', product_code='$kode_produk', category_id='$kategori'
                    where id=$id";
            } else {
                $sql = "UPDATE products SET product_name='$nama_produk', description='$deskripsi_produk', price='$harga', 
                                stock='$stok', product_code='$kode_produk', category_id='$kategori'
                                where id=$id";
            }

            $result = $this->db->query($sql);

            if (!$result) {
                die(mysqli_error($this->db));
            } else {
                header('location:produk.php');
            }

        }
    }

    //DELETE
    public function deleteProducts()
    {
        if (isset($_GET['deleteid'])) {
            $id = $_GET['deleteid'];
    
            $sql2 = "SELECT * FROM products WHERE id=$id";
            $result2 = $this->db->query($sql2);
            $data = mysqli_fetch_assoc($result2);
    
            unlink("../assets/images/pos-shop/".$data['image']);
    
            $sql = "DELETE FROM products where id=$id";
            $result = $this->db->query($sql);
    
            if ($result) {
                header("location:produk.php");
            }else {
                die(mysqli_error($this->db));
            }
        }
    }

}
?>