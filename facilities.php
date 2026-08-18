<?php
require __DIR__.'/db/db.php';

$page_title = 'Facilities | Gracedew International School';
$page_description = 'A safe, clean, well-equipped campus built for focused, joyful learning at Gracedew International School.';
$school = gd_api_get('school');
$gallery = array_values(array_filter(gd_api_get('gallery'), fn ($img) => ($img['category'] ?? null) === '2'));
if (! $gallery) {
    $gallery = array_slice(gd_api_get('gallery'), 0, 6);
}

require __DIR__.'/includes/header.php';
?>

<section class="clip-angle-b bg-brand-900 py-16 pb-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow-gold">Our Campus</p>
        <h1 class="mt-2 text-4xl font-bold sm:text-5xl">Facilities</h1>
        <p class="mt-4 max-w-2xl text-white/80">A safe, clean, and well-equipped environment, built for focused and joyful learning.</p>
    </div>
</section>

<section class="section">
    <p class="eyebrow">Built for Learning</p>
    <h2 class="mt-2 text-3xl font-bold sm:text-4xl">What Sets Our Campus Apart</h2>
    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <?php
        // Real content from the school's own admission-requirements page —
        // not generic facilities copy.
        $features = [
            ['Clean, Bright Premises', 'Our premises are well maintained, clean and hygienic, bright and well ventilated, with adequate space for comfort in rest and play.'],
            ['Secure Campus', 'A system is in place to prevent unauthorized access and to prevent a child from leaving the premises unsupervised — with CCTV cameras in every classroom and across the compound.'],
            ['Indoor & Outdoor Play', 'Secure, hazard-free outdoor play areas alongside space inside for structured activities — and a quiet area for any child who needs to relax.'],
            ['Hygienic Food Preparation', 'Facilities for the safe and hygienic preparation and storage of food, with suitable wash-up, hand-washing, and sterilizing facilities.'],
            ['Safe, Well-Maintained Equipment', 'Furniture and equipment are safe, appropriate, well maintained, and clean, with resources suited to each child\'s developmental stage.'],
            ['Fire & Child Safety Measures', 'Appropriate fire safety and child safety measures are in place, alongside a clear policy on picking up children from school.'],
        ];
        foreach ($features as $f): ?>
            <div class="card p-6">
                <h3 class="font-semibold"><?= htmlspecialchars($f[0]) ?></h3>
                <p class="mt-2 text-sm text-ink-900/70"><?= htmlspecialchars($f[1]) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php if ($gallery): ?>
<section class="bg-brand-50">
    <div class="section">
        <p class="eyebrow">A Look Around</p>
        <h2 class="mt-2 text-3xl font-bold sm:text-4xl">Our Campus in Photos</h2>
        <div class="mt-10 grid grid-cols-2 gap-4 sm:grid-cols-3">
            <?php foreach (array_slice($gallery, 0, 6) as $img): ?>
                <img src="<?= htmlspecialchars($img['url']) ?>" alt="<?= htmlspecialchars($img['title'] ?? 'Gracedew campus facility') ?>"
                     class="aspect-square w-full rounded-xl object-cover shadow-sm" loading="lazy">
            <?php endforeach; ?>
        </div>
        <a href="/gallery.php" class="btn-outline-brand mt-8">View Full Gallery</a>
    </div>
</section>
<?php endif; ?>

<section class="section">
    <div class="rounded-3xl bg-gradient-to-br from-brand-500 to-brand-700 px-6 py-14 text-center text-white sm:px-16">
        <h2 class="text-3xl font-bold">Come See Our Campus for Yourself</h2>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="/contact.php" class="btn bg-white text-brand-600 hover:bg-brand-50">Book a Visit</a>
            <a href="/admissions/apply.php" class="btn-outline">Apply for Admission</a>
        </div>
    </div>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
