<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    #banner {
        width: 100%;
        height: 70vh;
        overflow: hidden;
        margin:5vh 0 ;
    }

    #bannerImage {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius:30px;
    }
</style>
</head>
<body>
<div id="banner">
    <?php
    $images = ['img/1.webp', 'img/2.webp', 'img/3.webp', 'img/4.webp'];
    $currentImageIndex = 0;
    ?>
    <img id="bannerImage" src="<?php echo $images[0]; ?>">
</div>

<script>
    var images = <?php echo json_encode($images); ?>;
    var currentImageIndex = 0;
    
    setInterval(function () {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        document.getElementById("bannerImage").src = images[currentImageIndex];
    }, 2000);
</script>
</body>
</html>