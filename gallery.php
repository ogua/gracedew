<?php
require __DIR__.'/db/db.php';

$page_title = 'Gallery | Gracedew International School';
$page_description = 'Photos and videos from life at Gracedew International School.';
$school = gd_api_get('school');
$gallery = gd_api_get('gallery');
$videos = gd_api_get('videos');

// The old site's category codes ('0'/'1'/'2' etc.) are opaque tenant-specific
// values with no label stored in the API — map the ones the old site's pages
// (excursions.php, carrier-day.php, school-premises.php) confirmed in use.
$categoryLabels = ['0' => 'Excursions', '1' => 'Career Day', '2' => 'School Premises'];
// array_filter()'s default callback treats the string "0" as falsy and would
// drop it — a real category value here, not an empty one — so filter
// explicitly for null/empty instead.
$categoriesPresent = array_unique(array_filter(
    array_column($gallery, 'category'),
    fn ($c) => $c !== null && $c !== ''
));

require __DIR__.'/includes/header.php';
?>

<section class="clip-angle-b bg-brand-900 py-16 pb-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow-gold">Gallery</p>
        <h1 class="mt-2 text-4xl font-bold sm:text-5xl">Life at Gracedew</h1>
        <p class="mt-4 max-w-2xl text-white/80">A look at our campus, classrooms, and community in action.</p>
    </div>
</section>

<section class="section" x-data="{ filter: 'all', lightbox: null }">
    <?php if ($categoriesPresent): ?>
    <div class="flex flex-wrap gap-2">
        <button @click="filter = 'all'" :class="filter === 'all' ? 'bg-brand-500 text-white' : 'bg-brand-50 text-brand-600'" class="rounded-full px-4 py-2 text-sm font-medium">All Photos</button>
        <?php foreach ($categoriesPresent as $cat): ?>
            <button @click="filter = '<?= htmlspecialchars($cat) ?>'" :class="filter === '<?= htmlspecialchars($cat) ?>' ? 'bg-brand-500 text-white' : 'bg-brand-50 text-brand-600'" class="rounded-full px-4 py-2 text-sm font-medium">
                <?= htmlspecialchars($categoryLabels[$cat] ?? 'Category '.$cat) ?>
            </button>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="mt-8 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
        <?php foreach ($gallery as $img): ?>
            <button type="button"
                    x-show="filter === 'all' || filter === '<?= htmlspecialchars($img['category'] ?? '') ?>'"
                    @click="lightbox = '<?= htmlspecialchars(addslashes($img['url'])) ?>'"
                    class="group aspect-square overflow-hidden rounded-2xl bg-brand-50">
                <img src="<?= htmlspecialchars($img['url']) ?>" alt="<?= htmlspecialchars($img['title'] ?? 'Gracedew campus photo') ?>"
                     class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105" loading="lazy">
            </button>
        <?php endforeach; ?>
    </div>

    <?php if (! $gallery): ?>
        <p class="mt-6 text-ink-900/70">No photos published yet — check back soon.</p>
    <?php endif; ?>

    <!-- Lightbox -->
    <div x-show="lightbox" x-cloak @click="lightbox = null" @keydown.escape.window="lightbox = null"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 p-4" role="dialog" aria-modal="true">
        <button type="button" @click="lightbox = null" aria-label="Close" class="absolute right-6 top-6 text-white/80 hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <img :src="lightbox" alt="" class="max-h-[85vh] max-w-full rounded-lg object-contain" @click.stop>
    </div>
</section>

<!-- Videos -->
<?php if ($videos): ?>
<section id="videos" class="scroll-mt-24 bg-brand-50">
    <div class="section">
        <p class="eyebrow">Watch</p>
        <h2 class="section-title">Video Showcase</h2>
        <div class="mt-8 grid gap-6 md:grid-cols-2">
            <?php foreach ($videos as $video): ?>
                <div class="card overflow-hidden">
                    <?php if (str_contains($video['url'] ?? '', 'youtube.com') || str_contains($video['url'] ?? '', 'youtu.be')): ?>
                        <div class="aspect-video">
                            <iframe class="h-full w-full" src="<?= htmlspecialchars(str_replace('watch?v=', 'embed/', $video['url'])) ?>"
                                    title="<?= htmlspecialchars($video['title'] ?? 'Gracedew video') ?>" loading="lazy"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    <?php else: ?>
                        <video class="aspect-video w-full" controls preload="none">
                            <source src="<?= htmlspecialchars($video['url']) ?>">
                        </video>
                    <?php endif; ?>
                    <div class="p-4">
                        <h3 class="font-semibold"><?= htmlspecialchars($video['title'] ?? '') ?></h3>
                        <?php if (! empty($video['description'])): ?>
                            <p class="mt-1 text-sm text-ink-900/70"><?= htmlspecialchars($video['description']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php require __DIR__.'/includes/footer.php'; ?>
