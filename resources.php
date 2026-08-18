<?php
require __DIR__.'/db/db.php';

$page_title = 'Parent Resources | Gracedew International School';
$page_description = 'Practical information for Gracedew parents — communication, daily routines, uniform, health & safety, and fees.';
$school = gd_api_get('school');

$sections = [
    'partnership' => 'Partnership With Parents',
    'communication' => 'Communication',
    'daily-life' => 'Daily Life',
    'uniform' => 'Uniform & Appearance',
    'health' => 'Health, Safety & Nutrition',
    'fees' => 'Fee Paying Policy',
    'complaints' => 'Complaints Procedure',
    'culture' => 'Pledge & Anthem',
];

require __DIR__.'/includes/header.php';
?>

<section class="clip-angle-b bg-brand-900 py-16 pb-24 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow-gold">For Families</p>
        <h1 class="mt-2 text-4xl font-bold sm:text-5xl">Parent Resources</h1>
        <p class="mt-4 max-w-2xl text-white/80">
            Practical information for Gracedew families — how we communicate, our daily routines,
            and the policies that keep every child safe. Full detail is provided in the
            Student/Parent Handbook given at admission.
        </p>
    </div>
</section>

<section class="section grid gap-12 lg:grid-cols-4">
    <!-- In-page navigation -->
    <nav class="lg:col-span-1">
        <div class="card sticky top-24 p-5">
            <p class="text-xs font-semibold uppercase tracking-widest text-ink-900/65">On This Page</p>
            <ul class="mt-3 space-y-2 text-sm">
                <?php foreach ($sections as $anchor => $label): ?>
                    <li><a href="#<?= $anchor ?>" class="text-ink-900/75 hover:text-brand-600"><?= htmlspecialchars($label) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>

    <div class="space-y-16 lg:col-span-3">

        <div id="partnership" class="scroll-mt-24">
            <p class="eyebrow">Working Together</p>
            <h2 class="mt-2 text-2xl font-bold">Partnership With Parents</h2>
            <p class="mt-4 text-ink-900/75">
                We recognize and affirm the crucial role parents play as their child's primary
                educators. We're committed to being open, inclusive, welcoming, and respectful of
                every family who visits the school. We provide regular opportunities for parents
                to talk individually with staff about their child's progress, a joint strategy for
                behaviour, realistic goals, and any concerns or suggestions.
            </p>
        </div>

        <div id="communication" class="scroll-mt-24">
            <p class="eyebrow">Staying Connected</p>
            <h2 class="mt-2 text-2xl font-bold">Communication</h2>
            <p class="mt-4 text-ink-900/75">
                Communication between parents and the headmaster is important — please let us know
                of any changes in your child's daily life or any concerns, at any time. Parents
                receive progress reports throughout the academic year, and a termly newsletter
                details upcoming events. Teachers are available to meet by appointment.
            </p>
            <p class="mt-3 text-ink-900/75">
                All parents/guardians are automatically members of the Gracedew Parent-Teacher
                Association (PTA), which exists to strengthen the partnership between children,
                school, and parents.
            </p>
        </div>

        <div id="daily-life" class="scroll-mt-24">
            <p class="eyebrow">Routines</p>
            <h2 class="mt-2 text-2xl font-bold">Daily Life</h2>
            <div class="mt-4 grid gap-4 sm:grid-cols-2">
                <div class="card p-5">
                    <h3 class="font-semibold">Arrival Times</h3>
                    <p class="mt-1 text-sm text-ink-900/70">Créche &amp; Nursery 1: 7:30am &middot; Nursery 2 &amp; KG: 7:00am &middot; Primary: 7:00am &middot; JHS: 6:40am. School closes at 4:00pm.</p>
                </div>
                <div class="card p-5">
                    <h3 class="font-semibold">Excused Absences</h3>
                    <p class="mt-1 text-sm text-ink-900/70">Illness, family bereavement, medical/dental appointments, religious holidays, and pre-approved educational trips.</p>
                </div>
                <div class="card p-5">
                    <h3 class="font-semibold">Early Pick-Up</h3>
                    <p class="mt-1 text-sm text-ink-900/70">No child leaves before closing time without a parent/guardian's permission being sought in advance.</p>
                </div>
                <div class="card p-5">
                    <h3 class="font-semibold">Toys, Phones &amp; Money</h3>
                    <p class="mt-1 text-sm text-ink-900/70">Please don't send toys, jewellery, phones, or large amounts of money to school — the school can't be responsible for lost personal items.</p>
                </div>
            </div>
        </div>

        <div id="uniform" class="scroll-mt-24">
            <p class="eyebrow">Dress Code</p>
            <h2 class="mt-2 text-2xl font-bold">Uniform &amp; Personal Appearance</h2>
            <p class="mt-4 text-ink-900/75">
                Helping children dress appropriately for various activities is part of the
                educational process. Monday–Wednesday: main school uniform with black shoes and
                white socks. Thursday: school polo shirt with blue jeans, white socks, and
                sneakers. Friday: P.E. uniform with white socks and sneakers.
            </p>
            <p class="mt-3 text-ink-900/75">
                Hair should be kept short and neat (preschool: cornrow all-back only, no
                extensions). School uniforms are obtained only from the school with the official
                badge — no substitutes are accepted.
            </p>
        </div>

        <div id="health" class="scroll-mt-24">
            <p class="eyebrow">Wellbeing</p>
            <h2 class="mt-2 text-2xl font-bold">Health, Safety &amp; Nutrition</h2>
            <p class="mt-4 text-ink-900/75">
                Gracedew is committed to a safe, nurturing environment for every student. Parents
                are asked to send water, fruit, and breakfast daily — lunch is provided at school.
                Please notify us in writing of any food allergies, chronic conditions, or
                medication your child requires.
            </p>
            <p class="mt-3 text-ink-900/75">
                In line with Ghana Education Service guidance, children who are unwell (fever,
                persistent cough, suspected communicable illness) should be kept home. In a
                medical emergency, we contact parents immediately and transport the child to the
                nearest hospital.
            </p>
        </div>

        <div id="fees" class="scroll-mt-24">
            <p class="eyebrow">Tuition</p>
            <h2 class="mt-2 text-2xl font-bold">Fee Paying Policy</h2>
            <p class="mt-4 text-ink-900/75">
                Gracedew opens five days a week, 7:00am–4:00pm. Parents are notified of fee changes
                a month in advance. At least half of termly fees are due before the term begins,
                with the balance due by the end of that month. Fees are paid by direct deposit to
                the school's bank account — the school does not extend credit.
            </p>
            <p class="mt-3 text-ink-900/75">
                Contact the Administrative Office for the current fee structure. If you anticipate
                difficulty meeting a payment, please reach out to the Director early to discuss
                options.
            </p>
        </div>

        <div id="complaints" class="scroll-mt-24">
            <p class="eyebrow">We're Listening</p>
            <h2 class="mt-2 text-2xl font-bold">Complaints Procedure</h2>
            <p class="mt-4 text-ink-900/75">
                We aim to partner with parents and take every concern seriously, dealt with fairly
                and confidentially. Most issues are resolved informally through direct discussion
                with management. If a concern remains unresolved, parents may put it in writing to
                Management, who will respond promptly — with a Governing Board member available to
                help mediate a resolution if needed. Confidentiality is maintained throughout.
            </p>
        </div>

        <div id="culture" class="scroll-mt-24">
            <p class="eyebrow">Our Culture</p>
            <h2 class="mt-2 text-2xl font-bold">School Pledge &amp; Anthem</h2>
            <div class="mt-4 grid gap-6 sm:grid-cols-2">
                <div class="card p-6">
                    <h3 class="font-semibold text-brand-600">School Pledge</h3>
                    <p class="mt-2 text-sm italic leading-relaxed text-ink-900/75">
                        I pledge today to do my best in reading, math and all the rest.<br>
                        I promise to obey the rules in my class and in the school.<br>
                        I will respect myself and others too.<br>
                        I will expect the best in all I do.<br>
                        I am here to learn all I can, to try my best and be all I am —<br>
                        so help me God.
                    </p>
                </div>
                <div class="card p-6">
                    <h3 class="font-semibold text-brand-600">School Anthem</h3>
                    <p class="mt-2 text-sm italic leading-relaxed text-ink-900/75">
                        O praise God Gracedewers,<br>
                        for what you have done for us.<br>
                        Make our school be the best among the rest.<br>
                        Intelligence is our portion now and forever,<br>
                        Intelligence is our portion now and forever.
                    </p>
                </div>
            </div>
        </div>

        <div class="rounded-2xl bg-brand-50 p-6">
            <p class="text-sm text-ink-900/70">
                This page summarizes our key family-facing policies. A complete Student/Parent
                Handbook, covering every policy in full, is provided to families at admission and
                is available on request from the Administrative Office.
            </p>
        </div>
    </div>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
