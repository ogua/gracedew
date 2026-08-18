<?php
require __DIR__.'/db/db.php';

$page_title = 'News & Events | Gracedew International School';
$page_description = 'The latest news, announcements, and upcoming events at Gracedew International School.';
$school = gd_api_get('school');
$news = gd_api_get('news');

usort($news, fn ($a, $b) => strtotime($b['date'] ?? 'now') <=> strtotime($a['date'] ?? 'now'));

require __DIR__.'/includes/header.php';
?>

<section class="bg-ink-900 py-16 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow text-brand-100">News &amp; Events</p>
        <h1 class="mt-2 text-4xl font-bold sm:text-5xl">Stay Informed</h1>
        <p class="mt-4 max-w-2xl text-white/80">Announcements, stories, and upcoming events from around our school.</p>
    </div>
</section>

<section class="section" x-data="{ filter: 'all', expanded: null }">
    <div class="flex flex-wrap gap-2">
        <button @click="filter = 'all'" :class="filter === 'all' ? 'bg-brand-500 text-white' : 'bg-brand-50 text-brand-600'" class="rounded-full px-4 py-2 text-sm font-medium">All</button>
        <button @click="filter = 'News'" :class="filter === 'News' ? 'bg-brand-500 text-white' : 'bg-brand-50 text-brand-600'" class="rounded-full px-4 py-2 text-sm font-medium">News</button>
        <button @click="filter = 'Event'" :class="filter === 'Event' ? 'bg-brand-500 text-white' : 'bg-brand-50 text-brand-600'" class="rounded-full px-4 py-2 text-sm font-medium">Events</button>
    </div>

    <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($news as $i => $item): ?>
            <article x-show="filter === 'all' || filter === '<?= htmlspecialchars($item['type'] ?? '') ?>'" class="card overflow-hidden flex flex-col">
                <?php if (! empty($item['image'])): ?>
                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="" class="h-44 w-full object-cover">
                <?php endif; ?>
                <div class="p-5 flex-1 flex flex-col">
                    <div class="flex items-center gap-3 text-xs text-ink-900/70">
                        <span class="eyebrow"><?= htmlspecialchars($item['type'] ?? 'News') ?></span>
                        <?php if (! empty($item['date'])): ?>
                            <span><?= htmlspecialchars(date('M j, Y', strtotime($item['date']))) ?></span>
                        <?php endif; ?>
                    </div>
                    <h2 class="mt-2 font-semibold text-lg"><?= htmlspecialchars($item['title']) ?></h2>
                    <?php if (! empty($item['location'])): ?>
                        <p class="mt-1 text-sm text-ink-900/70">📍 <?= htmlspecialchars($item['location']) ?></p>
                    <?php endif; ?>
                    <p class="mt-3 text-sm text-ink-900/70" :class="expanded === <?= $i ?> ? '' : 'line-clamp-3'">
                        <?= htmlspecialchars(strip_tags($item['description'] ?? '')) ?>
                    </p>
                    <button type="button" @click="expanded = expanded === <?= $i ?> ? null : <?= $i ?>" class="mt-3 text-left text-sm font-medium text-brand-500 hover:underline">
                        <span x-text="expanded === <?= $i ?> ? 'Show less' : 'Read more'"></span>
                    </button>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <?php if (! $news): ?>
        <p class="mt-6 text-ink-900/70">No news or events published yet — check back soon.</p>
    <?php endif; ?>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
