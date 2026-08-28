<?php
require __DIR__.'/db/db.php';

$page_title = 'Terms of Use | Gracedew International School';
$page_description = 'Terms governing use of the Gracedew International School website.';
$school = gd_api_get('school');

require __DIR__.'/includes/header.php';
?>

<section class="clip-angle-b bg-brand-900 py-16 pb-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow-gold">Legal</p>
        <h1 class="mt-2 text-4xl font-bold sm:text-5xl">Terms of Use</h1>
        <p class="mt-4 max-w-2xl text-white/80">Last updated: <?= date('F Y') ?></p>
    </div>
</section>

<section class="section max-w-3xl space-y-10">
    <p class="text-ink-900/75">
        These terms govern your use of this website. By browsing this site, submitting the
        contact form, applying for admission online, or subscribing to our newsletter, you agree
        to them. If you don't agree, please don't use the site — you're always welcome to contact
        the school directly instead.
    </p>

    <div>
        <h2 class="panel-title">Using This Website</h2>
        <p class="mt-3 text-ink-900/75">
            This site is provided for prospective and current families, and the wider public, to
            learn about Gracedew International School and to apply for admission or get in
            touch. Please don't use it to submit false information, attempt to access parts of
            the site or its backing systems you're not authorized to use, or interfere with its
            normal operation.
        </p>
    </div>

    <div>
        <h2 class="panel-title">Online Admission Applications</h2>
        <p class="mt-3 text-ink-900/75">
            Submitting an application through this website does not guarantee admission.
            Applications are reviewed by our admissions team following the same process described
            on our <a href="/admissions/index.php" class="text-brand-600 underline">Admissions</a>
            page, and you're responsible for the accuracy of the information and documents you
            submit. A reference number is issued on submission so you can follow up with our
            office; it is not an offer of a place.
        </p>
    </div>

    <div>
        <h2 class="panel-title">Content &amp; Intellectual Property</h2>
        <p class="mt-3 text-ink-900/75">
            The text, photos, and branding on this site belong to Gracedew International School
            unless otherwise noted, and are shared here to inform prospective and current
            families. Please don't reproduce or reuse them elsewhere without asking us first.
        </p>
    </div>

    <div>
        <h2 class="panel-title">Accuracy of Information</h2>
        <p class="mt-3 text-ink-900/75">
            We work to keep fees, programme details, and school information on this site current,
            but details can change between updates. For anything time-sensitive — fee amounts,
            term dates, admission deadlines — please confirm with the Administrative Office
            directly before relying on it.
        </p>
    </div>

    <div>
        <h2 class="panel-title">External Links</h2>
        <p class="mt-3 text-ink-900/75">
            This site links to a small number of external services — Google Maps, YouTube, and
            our Facebook page. We aren't responsible for the content or privacy practices of
            those external sites.
        </p>
    </div>

    <div>
        <h2 class="panel-title">No Warranty</h2>
        <p class="mt-3 text-ink-900/75">
            We aim to keep this website accurate and available, but it's provided "as is," without
            guarantees of uninterrupted availability or that it will always be error-free.
        </p>
    </div>

    <div>
        <h2 class="panel-title">Governing Law</h2>
        <p class="mt-3 text-ink-900/75">
            These terms are governed by the laws of Ghana.
        </p>
    </div>

    <div>
        <h2 class="panel-title">Changes to These Terms</h2>
        <p class="mt-3 text-ink-900/75">
            We may update these terms as the website changes. The date at the top of this page
            shows when it was last revised. See also our
            <a href="/privacy.php" class="text-brand-600 underline">Privacy Policy</a>, which
            covers how we handle the information you share with us.
        </p>
    </div>

    <p class="text-xs text-ink-900/70">
        These terms describe our current practices in plain language and have not been reviewed
        by outside legal counsel. If you have specific compliance requirements, please consult a
        qualified advisor.
    </p>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
