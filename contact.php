<?php
require __DIR__.'/db/db.php';

$page_title = 'Contact Us | Gracedew International School';
$page_description = 'Get in touch with Gracedew International School — visit, call, or send us a message.';
$school = gd_api_get('school');

require __DIR__.'/includes/header.php';
?>

<section class="bg-ink-900 py-16 text-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <p class="eyebrow text-brand-100">Contact</p>
        <h1 class="mt-2 text-4xl font-bold sm:text-5xl">We'd Love to Hear From You</h1>
        <p class="mt-4 max-w-2xl text-white/80">Questions about admissions, a visit, or anything else — reach out any time.</p>
    </div>
</section>

<section class="section grid gap-12 lg:grid-cols-5">
    <div class="lg:col-span-2 space-y-6">
        <div class="card p-6">
            <h2 class="font-semibold">Address</h2>
            <p class="mt-1 text-ink-900/70"><?= htmlspecialchars($school['postaladd'] ?? 'Abeibee Street C20A/12, Kotobabi, P.O. Box 4913, Accra') ?></p>
        </div>
        <div class="card p-6">
            <h2 class="font-semibold">Email</h2>
            <a href="mailto:gracedew.int.school@gmail.com" class="mt-1 block text-brand-600 hover:underline">gracedew.int.school@gmail.com</a>
        </div>
        <div class="card p-6">
            <h2 class="font-semibold">Phone / WhatsApp</h2>
            <a href="https://wa.me/233508077258" class="mt-1 block text-brand-600 hover:underline">+233 50 807 7258</a>
        </div>
        <iframe
            src="https://www.google.com/maps?q=Gracedew+International+School,+Kotobabi,+Accra&output=embed"
            class="h-64 w-full rounded-2xl border-0" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            title="Gracedew International School location"></iframe>
    </div>

    <div class="lg:col-span-3" x-data="{ state: 'idle', message: '' }">
        <div class="card p-8">
            <h2 class="text-xl font-bold">Send Us a Message</h2>

            <form x-show="state !== 'done'" class="mt-6 space-y-5" @submit.prevent="
                state = 'loading';
                fetch('/enquiry-submit.php', { method: 'POST', body: new FormData($el) })
                    .then(r => r.json())
                    .then(j => { state = j.ok ? 'done' : 'error'; message = j.message; })
                    .catch(() => { state = 'error'; message = 'Network error — please try again.'; })
            ">
                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block">
                        <span class="text-sm font-medium">Full name *</span>
                        <input type="text" name="fullname" required class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Phone *</span>
                        <input type="tel" name="phone" required class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                </div>
                <label class="block">
                    <span class="text-sm font-medium">Email</span>
                    <input type="email" name="email" class="mt-1 w-full rounded-lg border-black/10">
                </label>
                <label class="block">
                    <span class="text-sm font-medium">Message *</span>
                    <textarea name="note" rows="5" required class="mt-1 w-full rounded-lg border-black/10"></textarea>
                </label>

                <p x-show="state === 'error'" x-cloak class="text-sm text-red-600" x-text="message"></p>

                <button type="submit" :disabled="state === 'loading'" class="btn-primary w-full sm:w-auto">
                    <span x-show="state !== 'loading'">Send Message</span>
                    <span x-show="state === 'loading'">Sending…</span>
                </button>
            </form>

            <div x-show="state === 'done'" x-cloak class="text-center py-6">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-green-100 text-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                </div>
                <p class="mt-4 font-medium" x-text="message"></p>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__.'/includes/footer.php'; ?>
