<?php
$page_title = "Home";
require_once "includes/header.php";
require_once "includes/navbar.php";
?>

<!-- ================= HERO SECTION ================= -->
<section class="hero">
    <div class="container py-5">
        <div class="col-lg-8">

            <span class="">
                PHOTOGRAPHY • FRAMES • ALBUMS • EVENTS
            </span>

            <h1>
                <?= e($shop['shop_name'] ?? 'Vaishnavi Art Photography') ?>
            </h1>

            <p>
                <?= e($shop['description'] ?? 'We turn real moments into timeless memories.') ?>
            </p>

            <a href="services.php" class="btn btn-gold btn-lg me-2">
                Book a Service
            </a>

            <a href="products.php" class="btn btn-outline-light btn-lg">
                Visit Shop
            </a>

        </div>
    </div>
</section>


<!-- ================= FEATURES ================= -->
<section class="section">

    <div class="container">

        <div class="section-title">

            <h2>Beautiful Moments. Beautifully Preserved.</h2>

            <div class="line"></div>

            <p class="text-muted">
                Professional photography and premium products for every special occasion.
            </p>

        </div>


        <div class="row g-4">

            <!-- Events -->
            <div class="col-md-4">

                <div class="feature-card p-4 h-100 text-center">

                    <div class="display-4">💍</div>

                    <h4>Events</h4>

                    <p>
                        Wedding, pre-wedding, birthday, baby shower,
                        puja and family events.
                    </p>

                </div>

            </div>


            <!-- Products -->
            <div class="col-md-4">

                <div class="feature-card p-4 h-100 text-center">

                    <div class="display-4">🖼️</div>

                    <h4>Photo Products</h4>

                    <p>
                        Frames, albums, canvas prints and custom memory gifts.
                    </p>

                </div>

            </div>


            <!-- Contact -->
            <div class="col-md-4">

                <div class="feature-card p-4 h-100 text-center">

                    <div class="display-4">📞</div>

                    <h4>Direct Contact</h4>

                    <p>
                        Talk directly with the photographer for your
                        event requirements.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- ================= PHOTOGRAPHER ================= -->
<section class="section bg-white">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">

                <img
                    src="assets/images/print.png"
                    class="img-fluid rounded-xl shadow"
                    alt="Photographer"
                >

            </div>


            <div class="col-lg-6">

                <span class="text-uppercase fw-bold text-warning">
                    Meet the Photographer
                </span>

                <h2 class="display-6 fw-bold mt-2">

                    <?= e($shop['photographer_name'] ?? 'Your Photographer') ?>

                </h2>

                <p class="lead">

                    <?= e($shop['description'] ?? 'Passionate about preserving your most meaningful moments.') ?>

                </p>

                <a
                    href="about.php"
                    class="btn btn-dark rounded-pill px-4"
                >
                    Know More
                </a>

            </div>

        </div>

    </div>

</section>


<!-- ================= FEATURED PRODUCTS ================= -->
<section class="section">

    <div class="container">

        <div class="section-title">

            <h2>Our Photo Products</h2>

            <div class="line"></div>

            <p class="text-muted">
                Preserve your favorite memories with our premium products.
            </p>

        </div>


        <div class="row g-4">

            <!-- Frame -->
            <div class="col-md-6 col-lg-3">

                <div class="product-card h-100">

                    <img
                        src="assets/images/products/frame.jpg"
                        class="product-img"
                        alt="Photo Frame"
                    >

                    <div class="p-4">

                        <h4>Photo Frames</h4>

                        <p class="text-muted">
                            Elegant frames for your favorite memories.
                        </p>

                        <a
                            href="products.php"
                            class="btn btn-gold"
                        >
                            View Product
                        </a>

                    </div>

                </div>

            </div>


            <!-- Album -->
            <div class="col-md-6 col-lg-3">

                <div class="product-card h-100">

                    <img
                        src="assets/images/products/album.jpg"
                        class="product-img"
                        alt="Photo Album"
                    >

                    <div class="p-4">

                        <h4>Photo Albums</h4>

                        <p class="text-muted">
                            Premium albums for weddings and special events.
                        </p>

                        <a
                            href="products.php"
                            class="btn btn-gold"
                        >
                            View Product
                        </a>

                    </div>

                </div>

            </div>


            <!-- Canvas -->
            <div class="col-md-6 col-lg-3">

                <div class="product-card h-100">

                    <img
                        src="assets/images/products/canvasprints.webp"
                        class="product-img"
                        alt="Canvas Print"
                    >

                    <div class="p-4">

                        <h4>Canvas Prints</h4>

                        <p class="text-muted">
                            Turn your photographs into beautiful wall art.
                        </p>

                        <a
                            href="products.php"
                            class="btn btn-gold"
                        >
                            View Product
                        </a>

                    </div>

                </div>

            </div>


            <!-- Gift -->
            <div class="col-md-6 col-lg-3">

                <div class="product-card h-100">

                    <img
                        src="assets/images/products/gift.jpg"
                        class="product-img"
                        alt="Photo Gift"
                    >

                    <div class="p-4">

                        <h4>Photo Gifts</h4>

                        <p class="text-muted">
                            Personalized gifts made from your photographs.
                        </p>

                        <a
                            href="products.php"
                            class="btn btn-gold"
                        >
                            View Product
                        </a>

                    </div>

                </div>

            </div>

        </div>


        <div class="text-center mt-5">

            <a
                href="products.php"
                class="btn btn-dark rounded-pill px-5"
            >
                View All Products
            </a>

        </div>

    </div>

</section>


<!-- ================= CONTACT CTA ================= -->
<section class="section">

    <div class="container text-center">

        <h2 class="fw-bold">
            Let's Create Something You Will Treasure
        </h2>

        <p class="text-muted">
            Have an event or need a custom photo product?
        </p>

        <a
            href="contact.php"
            class="btn btn-gold btn-lg"
        >
            Contact Photographer
        </a>

    </div>

</section>


<?php
require_once "includes/footer.php";
?>