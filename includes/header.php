<?php
/**
 * Shared <head> + nav, included at the top of every page. Expects the
 * including page to have already required db/db.php and to set $page_title
 * and optionally $page_description before including this file.
 */
$page_title = $page_title ?? 'Gracedew International School';
$page_description = $page_description ?? 'Gracedew International School — a premium, nurturing international learning environment in Kotobabi, Accra.';
$school = $school ?? gd_api_get('school');
$current_path = basename($_SERVER['SCRIPT_NAME']);
$site_origin = (($_SERVER['HTTPS'] ?? 'off') !== 'off' ? 'https://' : 'http://').($_SERVER['HTTP_HOST'] ?? 'gracedewintschool.com');
$canonical_url = $site_origin.($_SERVER['REQUEST_URI'] ?? '/');
// Hosts that serve this same site but must never appear in search results.
// website.gracedewintschool.com is deliberately kept reachable as a test host
// (it is NOT redirected in .htaccess), so `noindex` is the only thing stopping
// it competing with the real domain for the same content. If a redirect is
// ever added there, remove this; if this is removed, add the redirect. One of
// the two must always be in place.
$noindex_hosts = ['website.gracedewintschool.com'];
$is_indexable = ! in_array(strtolower($_SERVER['HTTP_HOST'] ?? ''), $noindex_hosts, true);
// Pages may set $page_image before including this file (e.g. a news
// article's featured image); falls back to the school's backdrop/cover
// photo from oguaschoolz, then to nothing (no fabricated stock image).
$page_image = $page_image ?? ($school['backdrop'] ?? null);
// Real school-supplied logo asset (asset/images/logo.png), not a
// placeholder — prefer oguaschoolz's admin-managed logo once that's
// correctly populated for the real Gracedew tenant, but this is the known-
// good default in the meantime (local dev's API data is a different,
// unrelated test tenant — see "Backend Integration Architecture" above).
$logo_url = $school['logo'] ?? $site_origin.'/asset/images/logo.png';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($page_description) ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if (! $is_indexable): ?>
    <meta name="robots" content="noindex, nofollow">
<?php endif; ?>
    <link rel="canonical" href="<?= htmlspecialchars($canonical_url) ?>">

    <meta property="og:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($page_description) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars($canonical_url) ?>">
    <meta property="og:site_name" content="Gracedew International School">
    <?php if ($page_image): ?>
        <meta property="og:image" content="<?= htmlspecialchars($page_image) ?>">
    <?php endif; ?>

    <meta name="twitter:card" content="<?= $page_image ? 'summary_large_image' : 'summary' ?>">
    <meta name="twitter:title" content="<?= htmlspecialchars($page_title) ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($page_description) ?>">
    <?php if ($page_image): ?>
        <meta name="twitter:image" content="<?= htmlspecialchars($page_image) ?>">
    <?php endif; ?>

    <link rel="icon" type="image/png" href="/asset/images/logo.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!--
      Confirmed via a real performance trace (4x CPU / Slow 4G) that font
      loading was this site's dominant CLS culprit (~0.32, "Bad") — the
      default HTML -> Google Fonts CSS -> font-file discovery chain means
      the font file request doesn't start until the CSS has round-tripped.
      Preloading the actual current font files (URLs copied from that
      trace) lets them start downloading immediately in parallel, which is
      the real fix; the split font-display strategy below (optional for the
      decorative, very-unlike-its-fallback Lobster Two heading font; swap
      for Heebo/Inter, whose fallback is close enough that swapping barely
      shifts anything) is a smaller secondary mitigation on top of that.
      CAVEAT: these href values are Google's current hashed font-version
      URLs and will go stale whenever Google revs that font's version —
      re-derive them (view page source, or re-run this same performance
      trace) if layout-shift regresses; self-hosting the font files instead
      would remove this fragility if it becomes a maintenance burden.
    -->
    <link rel="preload" as="font" type="font/woff2" crossorigin
          href="https://fonts.gstatic.com/s/heebo/v28/NGS6v5_NC0k9P9H2TbFhsqMA.woff2">
    <link rel="preload" as="font" type="font/woff2" crossorigin
          href="https://fonts.gstatic.com/s/lobstertwo/v22/BngRUXZGTXPUvIoyV6yN5-92w7CGwR2oefDo.woff2">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@700&display=optional" rel="stylesheet">

    <?php
    // Cache-busting query string, tied to the compiled file's own mtime.
    // Without this, the 30-day CDN/browser cache lifetime set in .htaccess
    // means every deploy that changes app.css silently keeps serving the
    // OLD cached copy to everyone until that cache naturally expires —
    // confirmed live: Hostinger's edge cache (hcdn) served a stale version
    // missing the footer photo-grid rules for hours after the real deploy.
    // Appending ?v=<mtime> makes each rebuild a brand-new URL, so it's
    // never colliding with a previously cached one — no manual purge
    // needed, and the long cache lifetime is now safe to keep as-is.
    $app_css_version = @filemtime(__DIR__.'/../css/app.css') ?: time();
    ?>
    <link href="/css/app.css?v=<?= $app_css_version ?>" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script type="application/ld+json">
    <?= json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'School',
        'name' => 'Gracedew International School',
        'foundingDate' => '2001',
        'description' => 'A nurturing, safe, and academically excellent international learning environment in Kotobabi, Accra.',
        'url' => $site_origin.'/',
        'logo' => $logo_url,
        'image' => $page_image,
        'email' => 'gracedew.int.school@gmail.com',
        'telephone' => '+233508077258',
        'sameAs' => ['https://www.facebook.com/GracedewSch'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $school['postaladd'] ?? 'Abeibee Street 20',
            'addressLocality' => 'Kotobabi, Accra',
            'postalCode' => 'GA-043-4401',
            'addressCountry' => 'GH',
        ],
    ], JSON_UNESCAPED_SLASHES) ?>
    </script>
</head>
<body class="min-h-screen flex flex-col">

<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:z-50 focus:bg-brand-500 focus:text-white focus:px-4 focus:py-2">Skip to content</a>

<header x-data="{ open: false, menu: null, mobileMenu: null }" @keydown.escape="menu = null" class="sticky top-0 z-40 bg-white/95 backdrop-blur border-b border-black/5">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
        <a href="/index.php" class="flex items-center gap-3">
            <img src="/asset/images/logo.png" alt="Gracedew International School logo" class="h-14 w-auto" width="57" height="56">
            <span class="hidden sm:block leading-tight">
                <span class="block font-semibold text-ink-900">Gracedew International School</span>
                <span class="block text-xs text-ink-900/70"><?= htmlspecialchars($school['schoolmoto'] ?? "Play, Learn 'n' Develop") ?></span>
            </span>
        </a>

        <nav class="hidden lg:flex items-center gap-1 font-medium">
            <a href="/index.php" class="rounded-md px-3 py-2 hover:text-brand-500 <?= $current_path === 'index.php' ? 'text-brand-500' : '' ?>">Home</a>

            <!-- About dropdown -->
            <div class="relative" @click.outside="menu = (menu === 'about') ? null : menu">
                <button type="button" class="flex items-center gap-1 rounded-md px-3 py-2 hover:text-brand-500" @click="menu = (menu === 'about') ? null : 'about'" :aria-expanded="menu === 'about'">
                    About
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 transition-transform" :class="menu === 'about' && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="menu === 'about'" x-cloak x-transition.opacity.duration.150ms class="absolute left-0 top-full mt-1 w-56 rounded-xl border border-black/5 bg-white py-2 shadow-lg">
                    <a href="/about.php#story" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Our Story</a>
                    <a href="/about.php#mission" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Mission &amp; Vision</a>
                    <a href="/about.php#values" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Core Values</a>
                    <a href="/index.php#why-us" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Why Choose Us</a>
                </div>
            </div>

            <a href="/academics.php" class="rounded-md px-3 py-2 hover:text-brand-500">Academics</a>

            <!-- Admissions dropdown -->
            <div class="relative" @click.outside="menu = (menu === 'admissions') ? null : menu">
                <button type="button" class="flex items-center gap-1 rounded-md px-3 py-2 hover:text-brand-500" @click="menu = (menu === 'admissions') ? null : 'admissions'" :aria-expanded="menu === 'admissions'">
                    Admissions
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 transition-transform" :class="menu === 'admissions' && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="menu === 'admissions'" x-cloak x-transition.opacity.duration.150ms class="absolute left-0 top-full mt-1 w-56 rounded-xl border border-black/5 bg-white py-2 shadow-lg">
                    <a href="/admissions/index.php" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Admission Requirements</a>
                    <a href="/admissions/apply.php" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Apply Online</a>
                </div>
            </div>

            <!-- School Life dropdown -->
            <div class="relative" @click.outside="menu = (menu === 'life') ? null : menu">
                <button type="button" class="flex items-center gap-1 rounded-md px-3 py-2 hover:text-brand-500" @click="menu = (menu === 'life') ? null : 'life'" :aria-expanded="menu === 'life'">
                    School Life
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 transition-transform" :class="menu === 'life' && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div x-show="menu === 'life'" x-cloak x-transition.opacity.duration.150ms class="absolute left-0 top-full mt-1 w-56 rounded-xl border border-black/5 bg-white py-2 shadow-lg">
                    <a href="/facilities.php" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Facilities</a>
                    <a href="/gallery.php" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Gallery</a>
                    <a href="/resources.php" class="block px-4 py-2 text-sm hover:bg-brand-50 hover:text-brand-600">Parent Resources</a>
                </div>
            </div>

            <a href="/news.php" class="rounded-md px-3 py-2 hover:text-brand-500">News</a>
            <a href="/contact.php" class="rounded-md px-3 py-2 hover:text-brand-500">Contact</a>
        </nav>

        <div class="hidden lg:block">
            <a href="/admissions/apply.php" class="btn-primary">Apply for Admission</a>
        </div>

        <button type="button" class="lg:hidden p-2" @click="open = !open" :aria-expanded="open" aria-controls="mobile-nav" aria-label="Toggle menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Mobile nav: accordion-style groups, not a flat dump of links -->
    <nav id="mobile-nav" x-show="open" x-cloak x-transition class="lg:hidden border-t border-black/5 bg-white px-4 py-4">
        <div class="flex flex-col gap-1 font-medium">
            <a href="/index.php" class="py-2">Home</a>

            <button type="button" class="flex items-center justify-between py-2 text-left" @click="mobileMenu = (mobileMenu === 'about') ? null : 'about'">
                About
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="mobileMenu === 'about' && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="mobileMenu === 'about'" x-cloak x-transition class="ml-3 flex flex-col gap-1 border-l border-black/10 pl-3 text-sm text-ink-900/75">
                <a href="/about.php#story" class="py-1.5">Our Story</a>
                <a href="/about.php#mission" class="py-1.5">Mission &amp; Vision</a>
                <a href="/about.php#values" class="py-1.5">Core Values</a>
                <a href="/index.php#why-us" class="py-1.5">Why Choose Us</a>
            </div>

            <a href="/academics.php" class="py-2">Academics</a>

            <button type="button" class="flex items-center justify-between py-2 text-left" @click="mobileMenu = (mobileMenu === 'admissions') ? null : 'admissions'">
                Admissions
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="mobileMenu === 'admissions' && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="mobileMenu === 'admissions'" x-cloak x-transition class="ml-3 flex flex-col gap-1 border-l border-black/10 pl-3 text-sm text-ink-900/75">
                <a href="/admissions/index.php" class="py-1.5">Admission Requirements</a>
                <a href="/admissions/apply.php" class="py-1.5">Apply Online</a>
            </div>

            <button type="button" class="flex items-center justify-between py-2 text-left" @click="mobileMenu = (mobileMenu === 'life') ? null : 'life'">
                School Life
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform" :class="mobileMenu === 'life' && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div x-show="mobileMenu === 'life'" x-cloak x-transition class="ml-3 flex flex-col gap-1 border-l border-black/10 pl-3 text-sm text-ink-900/75">
                <a href="/facilities.php" class="py-1.5">Facilities</a>
                <a href="/gallery.php" class="py-1.5">Gallery</a>
                <a href="/resources.php" class="py-1.5">Parent Resources</a>
            </div>

            <a href="/news.php" class="py-2">News</a>
            <a href="/contact.php" class="py-2">Contact</a>
            <a href="/admissions/apply.php" class="btn-primary mt-3 justify-center">Apply for Admission</a>
        </div>
    </nav>
</header>

<main id="main" class="flex-1">
