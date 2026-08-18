<?php
require __DIR__.'/db/db.php';

$page_title = 'About Us | Gracedew International School';
$page_description = 'Learn about Gracedew International School\'s history, mission, vision, and core values.';
$school = gd_api_get('school');
$gallery = array_slice(gd_api_get('gallery'), 0, 3);

require __DIR__.'/includes/header.php';
?>

<section class="bg-ink-900 py-16 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow text-brand-100">About Gracedew</p>
        <h1 class="mt-2 text-4xl font-bold sm:text-5xl">Our Story</h1>
        <p class="mt-4 max-w-2xl text-white/80">A community built on love, excellence, and integrity since 2001.</p>
    </div>
</section>

<!-- Founder / History -->
<section class="section grid gap-12 lg:grid-cols-2 lg:items-center">
    <div>
        <p class="eyebrow">Our History</p>
        <h2 class="mt-2 text-3xl font-bold sm:text-4xl">Founded on a Vision of Care</h2>
        <p class="mt-5 text-ink-900/75">
            Madam Dorothy Asare Bediako was a visionary educator and leader, born on
            August 16, 1952. Her legacy continues to inspire and nurture young minds through
            Gracedew International School, which she founded in 2001.
        </p>
        <p class="mt-4 text-ink-900/75">
            Madam Dorothy's vision for Gracedew International School was to create a community
            where children feel loved, respected, and empowered to reach their full potential.
            The school's mission reflects her commitment to providing high-quality education and
            childcare in a safe, respectful, and inclusive environment.
        </p>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <?php foreach ($gallery as $i => $img): ?>
            <img src="<?= htmlspecialchars($img['url']) ?>" alt="<?= htmlspecialchars($img['title'] ?? 'Gracedew campus life') ?>"
                 class="<?= $i === 0 ? 'col-span-2' : '' ?> aspect-video w-full rounded-2xl object-cover shadow-sm">
        <?php endforeach; ?>
        <?php if (! $gallery): ?>
            <div class="col-span-2 flex aspect-video items-center justify-center rounded-2xl bg-brand-50 text-brand-500">Campus photos coming soon</div>
        <?php endif; ?>
    </div>
</section>

<!-- Mission & Vision -->
<section class="bg-brand-50">
    <div class="section grid gap-8 md:grid-cols-2">
        <div class="card p-8">
            <p class="eyebrow">Our Mission</p>
            <p class="mt-3 text-lg text-ink-900/80">
                To provide transformative education that empowers students to excel academically,
                think critically, and lead with integrity. Through holistic learning experiences,
                we cultivate global leaders committed to making a positive impact on society.
            </p>
        </div>
        <div class="card p-8">
            <p class="eyebrow">Our Vision</p>
            <p class="mt-3 text-lg text-ink-900/80">
                To be recognised locally, nationally, and internationally as a premier
                educational institution, dedicated to nurturing holistic development in
                students — principled leaders who champion excellence and integrity, with a
                commitment to serve and elevate society.
            </p>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="section">
    <p class="eyebrow">What We Stand For</p>
    <h2 class="mt-2 text-3xl font-bold sm:text-4xl">Our Core Values</h2>
    <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-5">
        <?php
        // Reconciles two differing core-values lists found on the old site
        // (about-us.php vs mission.php) into one set pending the school's
        // confirmation of an authoritative list — see CLAUDE.md.
        $values = ['Christianity', 'Love', 'Integrity', 'Excellence', 'Community'];
        foreach ($values as $v): ?>
            <div class="card p-6 text-center">
                <h3 class="font-semibold text-brand-600"><?= htmlspecialchars($v) ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- CTA -->
<section class="section">
    <div class="rounded-3xl bg-gradient-to-br from-brand-500 to-brand-700 px-6 py-14 text-center text-white sm:px-16">
        <h2 class="text-3xl font-bold">Come See Gracedew for Yourself</h2>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="/admissions/apply.php" class="btn bg-white text-brand-600 hover:bg-brand-50">Apply for Admission</a>
            <a href="/contact.php" class="btn-outline">Book a Visit</a>
        </div>
    </div>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
