<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include "config/koneksi.php"; ?>
    <section class="container">
        <nav class="navbar navbar-expand-lg bg-biru">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="index.php">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <?php
    // Periksa apakah parameter id_berita ada dalam URL
    if (isset($_GET['id'])) {
        // Escape parameter id_berita untuk mencegah SQL injection
        $id_berita = mysqli_real_escape_string($conn, $_GET['id']);

        // Query untuk mengambil data berita berdasarkan id_berita
        $sql = "SELECT * FROM berita WHERE id_berita = $id_berita";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Tampilkan judul dan konten berita
            ?>
            <br>
            <br>
            <div class="judul">
                <h2 class="text-center">
                    <?php echo $row["judul"] ?>
                </h2>
            </div>
            <br><br>
            <div class="gambar-berita">
                <img src="<?php echo $row["gambar"]; ?>" alt="">
            </div>
            <?php
        } else {
            echo "Berita tidak ditemukan.";
        }
    } else {
        echo "Parameter id tidak ditemukan.";
    }
    ?>
    </section>

    <section class="container isi-berita">
    <?php
    // Periksa apakah parameter id_berita ada dalam URL
    if (isset($_GET['id'])) {
        // Escape parameter id_berita untuk mencegah SQL injection
        $id_berita = mysqli_real_escape_string($conn, $_GET['id']);

        // Query untuk mengambil data berita berdasarkan id_berita
        $sql = "SELECT * FROM berita WHERE id_berita = $id_berita";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Tampilkan konten berita
            ?>
            <br><br>
            <br>
            <div class="konten">
                <?php
                // Memisahkan setiap paragraf dalam konten
                $paragraf = explode("\n", $row["konten"]);
                foreach ($paragraf as $p) {
                    echo "<p style='text-align: justify; text-justify: inter-word;'>$p</p>";
                }
                ?>
            </div>
            <?php
        } else {
            echo "Berita tidak ditemukan.";
        }
    } else {
        echo "Parameter id tidak ditemukan.";
    }
    ?>
</section>
<br>
<br>
<section>
        <div class="bg-hijo text-center p-3 text-light">
            <small>Copyright &copy; 2023. BelajarBootsteap.com | All rights
                reserved.</small>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>