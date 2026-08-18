<?php
require __DIR__.'/../db/db.php';

$page_title = 'Admissions | Gracedew International School';
$page_description = 'Admission requirements and how to apply to Gracedew International School.';
$school = gd_api_get('school');

require __DIR__.'/../includes/header.php';
?>

<section class="clip-angle-b bg-brand-900 py-16 pb-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow-gold">Admissions</p>
        <h1 class="mt-2 text-4xl font-bold sm:text-5xl">Join the Gracedew Family</h1>
        <p class="mt-4 max-w-2xl text-white/80">Everything you need to know to apply, plus a
            fast online application you can complete in a few minutes.</p>
    </div>
</section>

<section class="section grid gap-12 lg:grid-cols-3">
    <div class="lg:col-span-2 space-y-10">
        <div>
            <h2 class="text-2xl font-bold">Required Documents</h2>
            <ul class="mt-4 space-y-2 text-ink-900/75 list-disc pl-5">
                <li>Signed admission application (submitted through the online form below)</li>
                <li>Copy of birth certificate</li>
                <li>Previous school reports (last 3 terms), where applicable</li>
                <li>Recent passport-sized photograph</li>
                <li>Completed medical/health information</li>
            </ul>
        </div>
        <div>
            <h2 class="text-2xl font-bold">Admission Process</h2>
            <ol class="mt-4 space-y-3 text-ink-900/75">
                <li><strong>1. Apply online</strong> — complete the application form with applicant, guardian, and programme details.</li>
                <li><strong>2. Document review</strong> — our admissions team reviews your submitted documents.</li>
                <li><strong>3. Assessment</strong> — an entrance assessment/interview may be scheduled.</li>
                <li><strong>4. Confirmation</strong> — successful applicants receive an official offer and fee/payment information.</li>
            </ol>
        </div>
    </div>

    <aside class="card p-8 h-fit bg-brand-50 border-none">
        <h2 class="text-xl font-bold">Ready to Apply?</h2>
        <p class="mt-2 text-sm text-ink-900/70">Our online application takes about 10 minutes.
            You'll get a reference number and a printable copy immediately after submitting.</p>
        <a href="/admissions/apply.php" class="btn-primary mt-6 w-full">Start Application</a>
        <p class="mt-4 text-xs text-ink-900/70">Have questions first? <a href="/contact.php" class="underline">Contact admissions</a>.</p>
    </aside>
</section>

<?php require __DIR__.'/../includes/footer.php'; ?>
