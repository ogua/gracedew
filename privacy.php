<?php
require __DIR__.'/db/db.php';

$page_title = 'Privacy Policy | Gracedew International School';
$page_description = 'How Gracedew International School collects, uses, and protects personal information submitted through this website.';
$school = gd_api_get('school');

require __DIR__.'/includes/header.php';
?>

<section class="clip-angle-b bg-brand-900 py-16 pb-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow-gold">Legal</p>
        <h1 class="mt-2 text-4xl font-bold sm:text-5xl">Privacy Policy</h1>
        <p class="mt-4 max-w-2xl text-white/80">Last updated: <?= date('F Y') ?></p>
    </div>
</section>

<section class="section max-w-3xl space-y-10">
    <div class="rounded-2xl bg-brand-50 p-6 text-sm text-ink-900/75">
        This page explains what happens to information you share with us through this website.
        It's written in plain language and reflects what this website actually does — it isn't
        boilerplate copied from elsewhere. If anything here is unclear, contact us at
        <a href="mailto:gracedew.int.school@gmail.com" class="text-brand-600 underline">gracedew.int.school@gmail.com</a>.
    </div>

    <div>
        <h2 class="panel-title">Information We Collect</h2>
        <p class="mt-3 text-ink-900/75">We only collect what you choose to give us, through three forms on this site:</p>
        <ul class="mt-3 list-disc space-y-2 pl-5 text-ink-900/75">
            <li><strong>Contact form</strong> — your name, phone number, email, and message.</li>
            <li><strong>Online admission application</strong> — the applicant's name, date of birth, and other personal details; a guardian's name, relationship, phone, email, and address; and, if you choose to upload them, a photograph and supporting documents such as a birth certificate or previous school report.</li>
            <li><strong>Newsletter signup</strong> — your email address.</li>
        </ul>
        <p class="mt-3 text-ink-900/75">
            We don't use tracking cookies of our own, and we don't sell or rent any information
            to third parties. A small number of embedded services on this site (Google Fonts,
            Google Maps, and YouTube video embeds where used) may set their own cookies or collect
            technical data such as your IP address, under Google's own privacy terms — this
            happens independently of this website and isn't something we control.
        </p>
    </div>

    <div>
        <h2 class="panel-title">How We Use It</h2>
        <ul class="mt-3 list-disc space-y-2 pl-5 text-ink-900/75">
            <li>Contact-form messages are used only to respond to your enquiry.</li>
            <li>Admission applications are submitted to the school's student information system so our admissions team can review them, exactly as if you'd submitted a paper form in person. Approved applications become part of the enrolled student's official school record.</li>
            <li>Newsletter emails are used only to send school news and announcements, and you can unsubscribe at any time by contacting us.</li>
        </ul>
    </div>

    <div>
        <h2 class="panel-title">Where It's Stored</h2>
        <p class="mt-3 text-ink-900/75">
            This website itself does not store any of your information — every submission is
            sent directly, over an authenticated connection, to the school's student information
            system, which is where it's retained. We don't keep a separate copy on this website's
            server.
        </p>
    </div>

    <div>
        <h2 class="panel-title">Children's Information</h2>
        <p class="mt-3 text-ink-900/75">
            Our online admission form collects information about prospective students, including
            minors, because that's necessary to process a school application — submitted by a
            parent or guardian on the child's behalf. This information is used solely for
            admissions and, if the child enrolls, ordinary school administration, and is treated
            with the same care as the physical records our admissions office already keeps.
        </p>
    </div>

    <div>
        <h2 class="panel-title">Your Rights</h2>
        <p class="mt-3 text-ink-900/75">
            Under Ghana's Data Protection Act, 2012 (Act 843), you have the right to know what
            personal information we hold about you or your child, to request a correction, or to
            ask us to delete it (subject to our need to retain official school records). To
            exercise any of these rights, contact the Administrative Office at
            <a href="mailto:gracedew.int.school@gmail.com" class="text-brand-600 underline">gracedew.int.school@gmail.com</a>
            or <a href="https://wa.me/233508077258" class="text-brand-600 underline">WhatsApp</a>.
        </p>
    </div>

    <div>
        <h2 class="panel-title">Security</h2>
        <p class="mt-3 text-ink-900/75">
            Submissions from this website travel over an authenticated, access-controlled
            connection to our school management system — this website never stores a database
            password or other credential, and file uploads (photos, documents) are validated for
            type and size before being accepted.
        </p>
    </div>

    <div>
        <h2 class="panel-title">Changes to This Policy</h2>
        <p class="mt-3 text-ink-900/75">
            We may update this policy as the website changes. The date at the top of this page
            shows when it was last revised.
        </p>
    </div>

    <p class="text-xs text-ink-900/70">
        This policy describes our current practices in plain language and has not been reviewed
        by outside legal counsel. If you have specific compliance requirements, please consult a
        qualified advisor.
    </p>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
