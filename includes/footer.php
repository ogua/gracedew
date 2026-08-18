<?php
/**
 * Shared footer, included at the bottom of every page. Expects $school to
 * already be set (header.php sets it) — falls back to fetching it again if
 * a page includes footer.php without header.php for some reason.
 */
$school = $school ?? gd_api_get('school');
$logo_url = $logo_url ?? ($school['logo'] ?? '/asset/images/logo.png');
// Small photo grid, matching the legacy footer's "Photo Gallery" column —
// real campus photos, not decorative stock images.
$footer_gallery = array_slice(gd_api_get('gallery'), 0, 6);
?>
</main>

<footer class="bg-brand-900 text-white">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-6">
            <div class="md:col-span-2 lg:col-span-2">
                <div class="flex items-center gap-3">
                    <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-white p-1.5">
                        <img src="/asset/images/logo.png" alt="Gracedew International School logo" class="h-full w-full object-contain" width="48" height="47">
                    </span>
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
                    <!-- TODO: real handles pending from the school — update these href="#" once given -->
                    <a href="#" class="text-white/70 hover:text-white" aria-label="Gracedew on Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="text-white/70 hover:text-white" aria-label="Gracedew on YouTube">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a2.994 2.994 0 0 0-2.107-2.117C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.391.524A2.994 2.994 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a2.994 2.994 0 0 0 2.107 2.117c1.886.524 9.391.524 9.391.524s7.505 0 9.391-.524a2.994 2.994 0 0 0 2.107-2.117C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    <a href="#" class="text-white/70 hover:text-white" aria-label="Gracedew on TikTok">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M16.6 5.82c-1.36-1.57-1.6-3.19-1.62-3.82h-3.14v13.4c-.02 1.35-1.11 2.44-2.47 2.44a2.47 2.47 0 0 1-2.47-2.47c0-1.5 1.34-2.72 2.87-2.42V9.66c-3.45-.46-6.47 2.22-6.47 5.64 0 3.33 2.76 5.7 5.69 5.7 3.14 0 5.69-2.55 5.69-5.7V9.01a7.35 7.35 0 0 0 4.3 1.38V7.3c0 0-1.88.09-3.24-1.48z"/></svg>
                    </a>
                    <a href="#" class="text-white/70 hover:text-white" aria-label="Gracedew on X">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="font-semibold">Quick Links</h3>
                <ul class="mt-3 space-y-2 text-white/70">
                    <li><a href="/about.php" class="hover:text-white">About Gracedew</a></li>
                    <li><a href="/admissions/index.php" class="hover:text-white">Admission Requirements</a></li>
                    <li><a href="/admissions/apply.php" class="hover:text-white">Apply Online</a></li>
                    <li><a href="/facilities.php" class="hover:text-white">Facilities</a></li>
                    <li><a href="/gallery.php" class="hover:text-white">Gallery</a></li>
                    <li><a href="/resources.php" class="hover:text-white">Parent Resources</a></li>
                    <li><a href="/news.php" class="hover:text-white">News</a></li>
                </ul>
            </div>

            <?php if ($footer_gallery): ?>
            <div>
                <h3 class="font-semibold">Photo Gallery</h3>
                <div class="mt-3 grid grid-cols-3 gap-1.5">
                    <?php foreach ($footer_gallery as $img): ?>
                        <a href="/gallery.php" class="block aspect-square overflow-hidden rounded-md bg-white/10">
                            <img src="<?= htmlspecialchars($img['url']) ?>" alt="<?= htmlspecialchars($img['title'] ?? 'Gracedew campus life') ?>" class="h-full w-full object-cover" loading="lazy">
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>

            <div>
                <h3 class="font-semibold">Contact</h3>
                <ul class="mt-3 space-y-2 text-white/70">
                    <li><?= htmlspecialchars($school['postaladd'] ?? 'Abeibee Street 20, Kotobabi-Accra, GA-043-4401') ?></li>
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
            <div class="flex flex-wrap items-center gap-x-4 gap-y-1">
                <a href="/privacy.php" class="hover:text-white">Privacy Policy</a>
                <a href="/terms.php" class="hover:text-white">Terms of Use</a>
                <span>Est. 2001 &middot; Kotobabi, Accra</span>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
