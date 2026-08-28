<?php
require __DIR__.'/db/db.php';

$page_title = 'Gracedew International School | A Premier International School in Accra';
$page_description = 'Gracedew International School — transformative, student-centered education in Kotobabi, Accra. Discover our programmes, campus, and online admissions.';

$school = gd_api_get('school');
$banners = gd_api_get('banners');
$stats = gd_api_get('stats');
$news = gd_api_get('news');
$testimonials = gd_api_get('testimonials');
// Full pool, not pre-sliced — gd_sample() below draws a random subset from
// the whole gallery rather than always the same "latest N", and the IDs it
// picks are excluded from the footer's own photo grid so the two don't
// just repeat each other on the same page.
$gallery_pool = gd_api_get('gallery');
$gallery = gd_sample($gallery_pool, 4);
$gallery_shown_ids = array_column($gallery, 'id');

require __DIR__.'/includes/header.php';
?>

<!-- Hero slider.
     Crossfading full-bleed slides with a slow Ken Burns push on the photo
     layer only (never the text), a side-weighted maroon scrim so the copy
     stays legible over any banner the school uploads, and progress-bar
     indicators that fill over exactly the same 6s the timer waits, so they
     read as a real countdown instead of decoration.

     Deliberately NOT x-cloak'd: slide 0 and all the copy are correct in
     plain pre-Alpine HTML, and cloaking a full-height above-the-fold block
     is the exact CLS mistake documented in CLAUDE.md. The :class object
     bindings take over once Alpine loads; the static classes are the
     no-JS/pre-JS state. -->
<section class="relative" aria-label="Featured"
         x-data="{
             slide: 0,
             count: <?= max(count($banners), 1) ?>,
             timer: null,
             reduced: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
             start() {
                 if (this.reduced || this.count < 2) return;
                 clearTimeout(this.timer);
                 /* setTimeout, rescheduled on every change, rather than a
                    setInterval — a manual dot click restarts the full 6s so
                    the fill animation never lies about the time remaining. */
                 this.timer = setTimeout(() => this.go((this.slide + 1) % this.count), 6000);
             },
             go(i) { this.slide = i; this.start(); }
         }"
         x-init="start()">
    <div class="relative h-[85svh] min-h-[560px] w-full overflow-hidden bg-brand-900">
        <?php if ($banners): ?>
            <?php foreach ($banners as $i => $banner): ?>
                <div class="absolute inset-0 overflow-hidden transition-opacity duration-1000 <?= $i === 0 ? 'opacity-100' : 'opacity-0' ?>"
                     :class="{ 'opacity-100': slide === <?= $i ?>, 'opacity-0': slide !== <?= $i ?> }">
                    <img src="<?= htmlspecialchars($banner['image']) ?>" alt=""
                         <?= $i === 0 ? 'fetchpriority="high"' : 'loading="lazy"' ?>
                         class="h-full w-full object-cover transition-transform duration-[7000ms] ease-out <?= $i === 0 ? 'scale-105' : 'scale-100' ?> motion-reduce:scale-100"
                         :class="{ 'scale-105': slide === <?= $i ?>, 'scale-100': slide !== <?= $i ?> }">
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="absolute inset-0 bg-gradient-to-br from-brand-700 to-brand-950"></div>
        <?php endif; ?>

        <!-- Two scrims: a side-weighted one carrying the text column, plus a
             light bottom vignette so the indicators and arc keep contrast. -->
        <div class="absolute inset-0 bg-gradient-to-r from-brand-950/92 via-brand-950/70 to-brand-950/25 sm:to-brand-950/10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-950/60 via-transparent to-transparent"></div>

        <div class="relative flex h-full items-center">
            <div class="mx-auto w-full max-w-7xl px-4 pb-16 sm:px-6 lg:px-8">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-3">
                        <span class="h-px w-10 bg-gold-400"></span>
                        <p class="text-sm font-semibold uppercase tracking-widest text-gold-400">Est. 2001 &middot; Kotobabi, Accra</p>
                    </div>
                    <h1 class="mt-5 text-4xl font-bold leading-tight text-white sm:text-5xl lg:text-6xl">
                        Empowering Minds. Shaping Leaders.
                    </h1>
                    <p class="mt-5 max-w-xl text-lg text-white/90">
                        A nurturing, safe, and academically excellent international learning environment
                        where every child is known, loved, and challenged to reach their full potential.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="/admissions/apply.php" class="btn-gold">Apply for Admission</a>
                        <a href="/about.php" class="btn-outline">Explore Our School</a>
                    </div>
                </div>
            </div>
        </div>

        <?php if (count($banners) > 1): ?>
        <div class="absolute bottom-16 left-0 right-0 z-20">
            <div class="mx-auto flex max-w-7xl gap-2 px-4 sm:px-6 lg:px-8">
                <?php foreach ($banners as $i => $banner): ?>
                    <button type="button" @click="go(<?= $i ?>)"
                            class="hero-dot<?= $i === 0 ? ' is-active' : '' ?>"
                            :class="{ 'is-active': slide === <?= $i ?> }"
                            :aria-current="slide === <?= $i ?>"
                            aria-current="<?= $i === 0 ? 'true' : 'false' ?>"
                            aria-label="Show slide <?= $i + 1 ?>">
                        <span class="hero-dot-fill"></span>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- Curved sweep into the next section instead of a hard edge (the
             angled .clip-angle-b band stays the inner pages' signature; the
             homepage hero gets the softer arc). -->
        <svg class="absolute bottom-[-1px] left-0 z-10 h-10 w-full text-white sm:h-14" viewBox="0 0 1440 60" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,60 L0,22 Q720,-38 1440,22 L1440,60 Z" fill="currentColor"></path>
        </svg>
    </div>
</section>

<!-- Welcome -->
<section class="section grid gap-12 lg:grid-cols-2 lg:items-center">
    <div>
        <p class="eyebrow">Welcome to Gracedew</p>
        <h2 class="section-title">A Community Where Every Child Thrives</h2>
        <p class="mt-5 text-lg text-ink-900/75">
            To provide transformative education that empowers students to excel academically,
            think critically, and lead with integrity. Through holistic learning experiences, we
            cultivate global leaders committed to making a positive impact on society.
        </p>
        <p class="mt-4 text-ink-900/75">
            Our vision is to be recognised locally, nationally, and internationally as a premier
            educational institution, dedicated to nurturing holistic development in students —
            principled leaders who champion excellence and integrity, with a commitment to serve
            and elevate society.
        </p>
        <a href="/about.php" class="btn-outline-brand mt-6">Learn About Our School</a>
    </div>
    <div class="grid grid-cols-2 gap-4">
        <?php foreach (array_slice($gallery, 0, 4) as $img): ?>
            <img src="<?= htmlspecialchars($img['url']) ?>" alt="<?= htmlspecialchars($img['title'] ?? 'Gracedew campus life') ?>" class="aspect-square w-full rounded-2xl object-cover shadow-sm">
        <?php endforeach; ?>
        <?php if (! $gallery): ?>
            <div class="col-span-2 flex aspect-video items-center justify-center rounded-2xl bg-brand-50 text-brand-500">Campus photos coming soon</div>
        <?php endif; ?>
    </div>
</section>

<!-- Why Choose Us -->
<section id="why-us" class="scroll-mt-24 bg-brand-50">
    <div class="section">
        <p class="eyebrow">Why Gracedew</p>
        <h2 class="section-title">Why Families Choose Us</h2>
        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <?php
            $reasons = [
                ['International Learning Environment', 'A globally-minded curriculum that prepares students for life beyond the classroom.'],
                ['Qualified, Caring Teachers', 'Experienced educators dedicated to knowing and nurturing every child.'],
                ['Student-Centered Learning', 'Holistic development that balances academics, character, and creativity.'],
                ['Safe, Modern Facilities', 'A secure campus built for focused, joyful learning.'],
            ];
            foreach ($reasons as $r): ?>
                <div class="card p-6">
                    <h3 class="card-title"><?= htmlspecialchars($r[0]) ?></h3>
                    <p class="mt-2 text-sm text-ink-900/70"><?= htmlspecialchars($r[1]) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="section">
    <div class="grid grid-cols-2 gap-8 rounded-3xl bg-brand-900 px-6 py-12 text-center text-white sm:grid-cols-4">
        <?php
        $statBlocks = [
            ['students', 'Students Enrolled'],
            ['staff', 'Total Staff'],
            ['subjects', 'Subjects Offered'],
            ['graduated_students', 'Graduates'],
        ];
        foreach ($statBlocks as [$key, $label]): ?>
            <div>
                <div class="font-display text-4xl text-gold-400"><?= (int) ($stats[$key] ?? 0) ?>+</div>
                <div class="mt-1 text-sm text-white/70"><?= htmlspecialchars($label) ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- News -->
<?php if ($news): ?>
<section class="section">
    <div class="flex items-end justify-between">
        <div>
            <p class="eyebrow">Stay Informed</p>
            <h2 class="section-title">Latest News &amp; Events</h2>
        </div>
        <a href="/news.php" class="hidden sm:block font-medium text-brand-500 hover:underline">View all</a>
    </div>
    <div class="mt-10 grid gap-6 md:grid-cols-3">
        <?php foreach (array_slice($news, 0, 3) as $item): ?>
            <article class="card overflow-hidden">
                <?php if (! empty($item['image'])): ?>
                    <img src="<?= htmlspecialchars($item['image']) ?>" alt="" class="h-44 w-full object-cover">
                <?php endif; ?>
                <div class="p-5">
                    <p class="eyebrow"><?= htmlspecialchars($item['type'] ?? 'News') ?></p>
                    <h3 class="card-title mt-1"><?= htmlspecialchars($item['title']) ?></h3>
                    <p class="mt-2 line-clamp-3 text-sm text-ink-900/70"><?= htmlspecialchars(strip_tags($item['description'] ?? '')) ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- Testimonials -->
<?php if ($testimonials): ?>
<section class="bg-brand-50">
    <div class="section">
        <p class="eyebrow">What Families Say</p>
        <h2 class="section-title">Our Community Speaks</h2>
        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <?php foreach (array_slice($testimonials, 0, 4) as $t): ?>
                <blockquote class="card p-6">
                    <p class="text-ink-900/80">&ldquo;<?= htmlspecialchars($t['quote']) ?>&rdquo;</p>
                    <footer class="mt-4 text-sm font-medium text-brand-600">
                        <?= htmlspecialchars($t['name']) ?><?= ! empty($t['relation']) ? ', '.htmlspecialchars($t['relation']) : '' ?>
                    </footer>
                </blockquote>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Admission CTA -->
<section class="section">
    <div class="cta-band">
        <h2 class="cta-title">Ready to Join the Gracedew Family?</h2>
        <p class="mx-auto mt-4 max-w-xl text-white/90">
            Applications are open. Start your child's journey with us today — our online
            admission process takes just a few minutes.
        </p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <a href="/admissions/apply.php" class="btn-on-brand">Apply for Admission</a>
            <a href="/contact.php" class="btn-outline">Book a Visit</a>
        </div>
    </div>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
