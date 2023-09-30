<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <style><?php include __DIR__ . '/home.css' ?></style>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php include __DIR__ . '/../components/navbar/navbar.php'?>
    <section class="home-section">
        <div class="header">
            <div class="slideshow-container">
    
                <div class="mySlides fade">
                    <img src="../../../resources/banner1.png" style="width:100%">
                </div>
    
                <div class="mySlides fade">
                    <img src="../../../resources/banner2.png" style="width:100%">
                </div>
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>
        </div>
    </section>
    <script>
        <?php include __DIR__ . '/home.js';?>
    </script>
</body>
</html>