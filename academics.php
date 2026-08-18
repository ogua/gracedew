<?php
require __DIR__.'/db/db.php';

$page_title = 'Academics | Gracedew International School';
$page_description = 'Explore Gracedew International School\'s academic programmes, from Crèche through Junior High School.';
$school = gd_api_get('school');
$classes = gd_api_get('classes');

/**
 * Groups the real class list from oguaschoolz into programme bands for
 * display. This is presentation-only grouping (by name prefix), not a
 * separate "programme" concept in the backend — oguaschoolz only models
 * individual classes, not programme tiers.
 */
function gd_group_classes(array $classes): array
{
    $bands = [
        'Crèche & Nursery' => ['CRÈCHE', 'NURSERY'],
        'Kindergarten' => ['K. G.', 'KG'],
        'Primary (Basic 1–6)' => ['BASIC', 'CLASS'],
        'Junior High School' => ['J. H. S.', 'JHS'],
    ];

    $grouped = array_fill_keys(array_keys($bands), []);
    $other = [];

    foreach ($classes as $class) {
        $name = strtoupper($class['name']);
        $matched = false;
        foreach ($bands as $band => $prefixes) {
            foreach ($prefixes as $prefix) {
                if (str_starts_with($name, $prefix)) {
                    $grouped[$band][] = $class['name'];
                    $matched = true;
                    break 2;
                }
            }
        }
        if (! $matched) {
            $other[] = $class['name'];
        }
    }

    if ($other) {
        $grouped['Other'] = $other;
    }

    return array_filter($grouped);
}

$programmes = gd_group_classes($classes);

$programmeCopy = [
    'Crèche & Nursery' => 'A warm, secure introduction to learning through play, sensory exploration, and early social development.',
    'Kindergarten' => 'Building foundational literacy, numeracy, and social skills through guided, hands-on learning.',
    'Primary (Basic 1–6)' => 'A well-rounded core curriculum building strong academic fundamentals alongside character and creativity.',
    'Junior High School' => 'Preparing students for BECE success and beyond, with deeper subject specialization and critical thinking.',
    'Other' => 'Additional class groupings.',
];

require __DIR__.'/includes/header.php';
?>

<section class="bg-ink-900 py-16 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow text-brand-100">Academics</p>
        <h1 class="mt-2 text-4xl font-bold sm:text-5xl">Our Academic Programmes</h1>
        <p class="mt-4 max-w-2xl text-white/80">
            A student-centered curriculum from Crèche through Junior High School, built to
            challenge, nurture, and prepare every child for what's next.
        </p>
    </div>
</section>

<section class="section">
    <div class="grid gap-8 md:grid-cols-2">
        <?php foreach ($programmes as $band => $classNames): ?>
            <div class="card p-8">
                <h2 class="text-2xl font-bold"><?= htmlspecialchars($band) ?></h2>
                <p class="mt-3 text-ink-900/70"><?= htmlspecialchars($programmeCopy[$band] ?? '') ?></p>
                <p class="mt-4 text-sm font-medium text-brand-600">
                    Classes: <?= htmlspecialchars(implode(', ', $classNames)) ?>
                </p>
            </div>
        <?php endforeach; ?>

        <?php if (! $programmes): ?>
            <p class="text-ink-900/70">Programme information is temporarily unavailable — please check back shortly.</p>
        <?php endif; ?>
    </div>
</section>

<section class="section">
    <div class="rounded-3xl bg-gradient-to-br from-brand-500 to-brand-700 px-6 py-14 text-center text-white sm:px-16">
        <h2 class="text-3xl font-bold">Find the Right Fit for Your Child</h2>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="/admissions/apply.php" class="btn bg-white text-brand-600 hover:bg-brand-50">Apply for Admission</a>
            <a href="/admissions/index.php" class="btn-outline">Admission Requirements</a>
        </div>
    </div>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
