<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="Rangga Wisnu Aji M" content="" />
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=3">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="swiper.css">

    <!-- Demo styles -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #000;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;

            color: #000;
            margin: 0;
            padding: 0;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #000;

        }

        .swiper-slide img {
            width: auto;
            height: auto;
            max-width: 100%;
            max-height: 100%;
            -ms-transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            position: absolute;
            left: 50%;
            top: 50%;
        }
    </style>
</head>

<body>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'toko_kelontong');
            $query = mysqli_query($conn, "SELECT * FROM barang");

            ?>

            <?php
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {

                    echo '
                 <div class="swiper-slide">
                 <img src="./admin/images/' . $row['gambar_barang'] . '" alt="' . $row['nama_barang'] . '" class="swiper-lazy">
                 <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                 </div>';
                }
            } ?>




        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Navigation -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>

    <!-- Swiper JS -->
    <script src="swiper.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            // Enable lazy loading
            lazy: true,
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    </script>
</body>

</html>