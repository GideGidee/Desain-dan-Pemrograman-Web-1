<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>

<body>
    <?php include "config/koneksi.php"; ?>
    <section class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
    </section>

    <section class="container">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <?php 
                    $sql = "SELECT * FROM slider";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="carousel-item active">
                                <img src="<?php echo $row["gambar"]; ?>" class="d-block w-100" alt="...">
                            </div>
                            <?php
                        }
                    } else {
                        echo "No data";
                    }
                    
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="container berita">
        <div class="row">
            <h2 class="text-center">Berita</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php 
                    $sql = "SELECT * FROM berita";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="col">
                    <div class="card h-100">
                        <img src="<?php echo $row["gambar"]?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["judul"]; ?></h5>
                            <p class="card-text"><?php echo $row["konten"]; ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary"><?php echo $row["created_at"];?></small>
                        </div>
                    </div>
                </div>
                            <?php
                        }
                    } else {
                        echo "No data";
                    }
                    
                ?>
            </div>
        </div>
    </section>

    <section>
        <div class="bg-success text-center p-3 text-light">
            <small>Copyright &copy; 2023. BelajarBootsteap.com | All rights
                reserved.</small>
        </div>
    </section>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>

</html>