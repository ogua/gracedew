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
$site_origin = (($_SERVER['HTTPS'] ?? 'off') !== 'off' ? 'https://' : 'http://').($_SERVER['HTTP_HOST'] ?? 'gracedew.edu.gh');
$canonical_url = $site_origin.($_SERVER['REQUEST_URI'] ?? '/');
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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script type="application/ld+json">
    <?= json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'School',
        'name' => 'Gracedew International School',
        'foundingDate' => '2001',
        'description' => 'A nurturing, safe, and academically excellent international learning environment in Kotobabi, Accra.',
        'url' => 'https://'.($_SERVER['HTTP_HOST'] ?? 'gracedew.edu.gh').'/index.php',
        'logo' => $logo_url,
        'image' => $page_image,
        'email' => 'gracedew.int.school@gmail.com',
        'telephone' => '+233508077258',
        'sameAs' => ['https://www.facebook.com/GracedewSch'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $school['postaladd'] ?? 'Abeibee Street, Kotobabi',
            'addressLocality' => 'Accra',
            'addressCountry' => 'GH',
        ],
    ], JSON_UNESCAPED_SLASHES) ?>
    </script>
</head>
<body class="min-h-screen flex flex-col">

<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:z-50 focus:bg-brand-500 focus:text-white focus:px-4 focus:py-2">Skip to content</a>

<header x-data="{ open: false }" class="sticky top-0 z-40 bg-white/95 backdrop-blur border-b border-black/5">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
        <a href="/index.php" class="flex items-center gap-3">
            <img src="/asset/images/logo.png" alt="Gracedew International School logo" class="h-14 w-auto">
            <span class="hidden sm:block leading-tight">
                <span class="block font-semibold text-ink-900">Gracedew International School</span>
                <span class="block text-xs text-ink-900/70"><?= htmlspecialchars($school['schoolmoto'] ?? "Play, Learn 'n' Develop") ?></span>
            </span>
        </a>

        <nav class="hidden lg:flex items-center gap-8 font-medium">
            <a href="/index.php" class="hover:text-brand-500 <?= $current_path === 'index.php' ? 'text-brand-500' : '' ?>">Home</a>
            <a href="/about.php" class="hover:text-brand-500">About</a>
            <a href="/academics.php" class="hover:text-brand-500">Academics</a>
            <a href="/admissions/index.php" class="hover:text-brand-500">Admissions</a>
            <a href="/gallery.php" class="hover:text-brand-500">Gallery</a>
            <a href="/news.php" class="hover:text-brand-500">News</a>
            <a href="/contact.php" class="hover:text-brand-500">Contact</a>
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

    <nav id="mobile-nav" x-show="open" x-cloak x-transition class="lg:hidden border-t border-black/5 bg-white px-4 py-4">
        <div class="flex flex-col gap-3 font-medium">
            <a href="/index.php" class="py-1">Home</a>
            <a href="/about.php" class="py-1">About</a>
            <a href="/academics.php" class="py-1">Academics</a>
            <a href="/admissions/index.php" class="py-1">Admissions</a>
            <a href="/gallery.php" class="py-1">Gallery</a>
            <a href="/news.php" class="py-1">News</a>
            <a href="/contact.php" class="py-1">Contact</a>
            <a href="/admissions/apply.php" class="btn-primary mt-2 justify-center">Apply for Admission</a>
        </div>
    </nav>
</header>

<main id="main" class="flex-1">
