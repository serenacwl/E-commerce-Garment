<!DOCTYPE html>
<html lang="">
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="mystyles/navbar.css">
    <link rel="stylesheet" type="text/css" href="mystyles/footer.css">
    <link rel="stylesheet" type="text/css" href="mystyles/home.css">
</head>
<body>

<header>
    <?php include 'include/navbar.php'; ?>
</header>

<section>
    <div class = "home_header">
        <h1 class = "welcome_text">Welcome to SIMP Garment Shop</h1>
    </div>
    <div class = "home_pictures">
        <div class="slider-container"></div>
        <button class="slider-btn next">&#10095;</button>
        <button class="slider-btn prev">&#10094;</button>
    </div>
    <div class = "home_footer">
        <h2 class = "welcome_text">We speciallize in the latest design of garments.</h2>
        <p class = "welcome_text">May the swag be with you</p>
    </div>
</section>


<footer>
    <?php include 'include/footer.php'; ?>
</footer>

</body>
<script>
    const images = [
        './images/Home1.jpg',
        './images/Home2.jpg',
        './images/Home3.jpg'
    ];
    const sliderContainer = document.querySelector('.slider-container');

    images.forEach((src) => {
        const img = document.createElement('img');
        img.src = src;
        sliderContainer.appendChild(img);
    });
    let currentSlide = 0;
    const slides = document.querySelectorAll(".home_pictures img");
    const prevBtn = document.querySelector(".slider-btn.prev");
    const nextBtn = document.querySelector(".slider-btn.next");

    function showSlide(n) {
        slides[currentSlide].classList.remove("active");
        currentSlide = (n + slides.length) % slides.length;
        slides[currentSlide].classList.add("active");
    }

    prevBtn.addEventListener("click", () => {
        showSlide(currentSlide - 1);
    });

    nextBtn.addEventListener("click", () => {
        showSlide(currentSlide + 1);
    });

    setInterval(() => {
        showSlide(currentSlide + 1);
    }, 2800);
</script>

</html>

