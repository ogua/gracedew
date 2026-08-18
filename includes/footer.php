<?php
/**
 * Shared footer, included at the bottom of every page. Expects $school to
 * already be set (header.php sets it) — falls back to fetching it again if
 * a page includes footer.php without header.php for some reason.
 */
$school = $school ?? gd_api_get('school');
$logo_url = $logo_url ?? ($school['logo'] ?? '/asset/images/logo.png');
?>
</main>

<footer class="bg-ink-900 text-white">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-5">
            <div class="md:col-span-2 lg:col-span-2">
                <div class="flex items-center gap-3">
                    <img src="/asset/images/logo.png" alt="Gracedew International School logo" class="h-12 w-auto" width="48" height="47">
                    <span class="font-display text-2xl">Gracedew International School</span>
                </div>
                <p class="mt-3 max-w-sm text-white/70">
                    A nurturing, safe, and academically excellent international learning
                    environment in Kotobabi, Accra — cultivating principled leaders since 2001.
                </p>
                <div class="mt-5 flex gap-4">
                    <a href="https://www.facebook.com/GracedewSch" class="text-white/70 hover:text-white" aria-label="Gracedew on Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.9h2.54V9.85c0-2.5 1.49-3.89 3.78-3.89 1.1 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.44 2.9h-2.34V22c4.78-.8 8.44-4.94 8.44-9.94z"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="font-semibold">Quick Links</h3>
                <ul class="mt-3 space-y-2 text-white/70">
                    <li><a href="/about.php" class="hover:text-white">About Gracedew</a></li>
                    <li><a href="/admissions/index.php" class="hover:text-white">Admission Requirements</a></li>
                    <li><a href="/admissions/apply.php" class="hover:text-white">Apply Online</a></li>
                    <li><a href="/gallery.php" class="hover:text-white">Gallery</a></li>
                    <li><a href="/news.php" class="hover:text-white">News</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold">Contact</h3>
                <ul class="mt-3 space-y-2 text-white/70">
                    <li><?= htmlspecialchars($school['postaladd'] ?? 'Abeibee Street, Kotobabi, Accra') ?></li>
                    <li><a href="mailto:gracedew.int.school@gmail.com" class="hover:text-white">gracedew.int.school@gmail.com</a></li>
                    <li><a href="https://wa.me/233508077258" class="hover:text-white">WhatsApp: +233 50 807 7258</a></li>
                </ul>
            </div>

            <div x-data="{ email: '', state: 'idle', message: '' }">
                <h3 class="font-semibold">Stay Updated</h3>
                <p class="mt-3 text-sm text-white/70">Get school news and announcements by email.</p>
                <form class="mt-3 flex gap-2" @submit.prevent="
                    state = 'loading';
                    fetch('/newsletter-submit.php', { method: 'POST', body: new URLSearchParams({ email }) })
                        .then(r => r.json())
                        .then(j => { state = j.ok ? 'done' : 'error'; message = j.message; if (j.ok) email = ''; })
                        .catch(() => { state = 'error'; message = 'Network error — please try again.'; })
                ">
                    <label for="footer-newsletter-email" class="sr-only">Email address</label>
                    <input id="footer-newsletter-email" type="email" x-model="email" required placeholder="you@example.com"
                           class="min-w-0 flex-1 rounded-full border-0 bg-white/10 px-4 py-2 text-sm text-white placeholder:text-white/40 focus:bg-white/20 focus:ring-2 focus:ring-brand-400">
                    <button type="submit" :disabled="state === 'loading'" class="shrink-0 rounded-full bg-brand-500 px-4 py-2 text-sm font-medium hover:bg-brand-600 disabled:opacity-60">
                        <span x-show="state !== 'loading'">Subscribe</span>
                        <span x-show="state === 'loading'">…</span>
                    </button>
                </form>
                <p x-show="message" x-cloak class="mt-2 text-xs" :class="state === 'error' ? 'text-red-300' : 'text-green-300'" x-text="message"></p>
            </div>
        </div>

        <div class="mt-12 flex flex-col gap-4 border-t border-white/10 pt-6 text-sm text-white/60 sm:flex-row sm:items-center sm:justify-between">
            <p>&copy; <?= date('Y') ?> Gracedew International School. All rights reserved.</p>
            <p>Est. 2001 &middot; Kotobabi, Accra</p>
        </div>
    </div>
</footer>

</body>
</html>
