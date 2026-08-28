<?php
require __DIR__.'/db/db.php';

http_response_code(404);

$page_title = 'Page Not Found | Gracedew International School';
$page_description = 'The page you were looking for could not be found.';
$school = gd_api_get('school');

require __DIR__.'/includes/header.php';
?>

<section class="section text-center py-24">
    <p class="eyebrow">404</p>
    <h1 class="page-title">We Couldn't Find That Page</h1>
    <p class="mx-auto mt-4 max-w-md text-ink-900/70">
        The page you're looking for may have moved or no longer exists. Let's get you back on track.
    </p>
    <div class="mt-8 flex flex-wrap justify-center gap-4">
        <a href="/index.php" class="btn-primary">Return Home</a>
        <a href="/contact.php" class="btn-outline-brand">Contact Us</a>
    </div>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
