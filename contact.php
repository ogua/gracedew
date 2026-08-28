<?php
require __DIR__.'/db/db.php';

$page_title = 'Contact Us | Gracedew International School';
$page_description = 'Get in touch with Gracedew International School — visit, call, or send us a message.';
$school = gd_api_get('school');

require __DIR__.'/includes/header.php';
?>

<section class="page-band">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow-gold">Contact</p>
        <h1 class="page-title">We'd Love to Hear From You</h1>
        <p class="mt-4 max-w-2xl text-white/80">Questions about admissions, a visit, or anything else — reach out any time.</p>
    </div>
</section>

<section class="section grid gap-12 lg:grid-cols-5 lg:items-start">
    <div class="lg:col-span-2 space-y-4">
        <div>
            <p class="eyebrow">Reach Us</p>
            <h2 class="panel-title mt-1">School Contact Details</h2>
        </div>
        <div class="card flex items-start gap-4 p-6">
            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-brand-50 text-brand-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </span>
            <div>
                <h3 class="card-title">Address</h3>
                <p class="mt-1 text-ink-900/70"><?= htmlspecialchars($school['postaladd'] ?? 'Abeibee Street 20, Kotobabi-Accra, GA-043-4401') ?></p>
            </div>
        </div>
        <div class="card flex items-start gap-4 p-6">
            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-brand-50 text-brand-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </span>
            <div>
                <h3 class="card-title">Email</h3>
                <a href="mailto:gracedew.int.school@gmail.com" class="mt-1 block text-brand-600 hover:underline">gracedew.int.school@gmail.com</a>
            </div>
        </div>
        <div class="card flex items-start gap-4 p-6">
            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-brand-50 text-brand-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </span>
            <div>
                <h3 class="card-title">Phone / WhatsApp</h3>
                <a href="https://wa.me/233508077258" class="mt-1 block text-brand-600 hover:underline">+233 50 807 7258</a>
            </div>
        </div>
        <div class="card flex items-start gap-4 p-6">
            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-brand-50 text-brand-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </span>
            <div>
                <h3 class="card-title">Office Hours</h3>
                <p class="mt-1 text-ink-900/70">Monday – Friday, 7:00am – 4:00pm</p>
            </div>
        </div>
        <iframe
            src="https://www.google.com/maps?q=Gracedew+International+School,+Kotobabi,+Accra&output=embed"
            class="h-64 w-full rounded-2xl border-0 shadow-sm" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            title="Gracedew International School location"></iframe>
    </div>

    <div class="lg:col-span-3" x-data="{ state: 'idle', message: '' }">
        <div class="card p-8 sm:p-10">
            <p class="eyebrow">Send a Message</p>
            <h2 class="panel-title mt-1">We'll Respond Within One Business Day</h2>

            <form x-show="state !== 'done'" class="mt-8 space-y-5" @submit.prevent="
                state = 'loading';
                fetch('/enquiry-submit.php', { method: 'POST', body: new FormData($el) })
                    .then(r => r.json())
                    .then(j => { state = j.ok ? 'done' : 'error'; message = j.message; })
                    .catch(() => { state = 'error'; message = 'Network error — please try again.'; })
            ">
                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block">
                        <span class="form-label">Full name *</span>
                        <input type="text" name="fullname" required class="mt-1.5">
                    </label>
                    <label class="block">
                        <span class="form-label">Phone *</span>
                        <input type="tel" name="phone" required class="mt-1.5">
                    </label>
                </div>
                <label class="block">
                    <span class="form-label">Email</span>
                    <input type="email" name="email" class="mt-1.5">
                </label>
                <label class="block">
                    <span class="form-label">Message *</span>
                    <textarea name="note" rows="5" required class="mt-1.5"></textarea>
                </label>

                <p x-show="state === 'error'" x-cloak class="text-sm text-red-600" x-text="message"></p>

                <button type="submit" :disabled="state === 'loading'" class="btn-primary w-full sm:w-auto">
                    <span x-show="state !== 'loading'">Send Message</span>
                    <span x-show="state === 'loading'">Sending…</span>
                </button>
            </form>

            <div x-show="state === 'done'" x-cloak class="py-6 text-center">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-green-100 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                </div>
                <p class="mt-4 font-medium" x-text="message"></p>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
