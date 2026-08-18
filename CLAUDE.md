# CLAUDE.md

This file provides guidance to Claude Code when working in this repository.

## Project Overview

This is the ground-up redesign of the **Gracedew International School** public website — a
premium, modern, responsive marketing + admissions site for a Ghanaian basic school (est. 2001,
Kotobabi-Accra). It replaces the site at `C:\xampp\htdocs\Projects\website\gracedew` (kept
read-only as a content/reference source — do not edit it) and is being built fresh here rather
than by restyling the old templates.

**Do not confuse this project with two similarly-named backend codebases** it integrates with:

| Path | What it is |
|---|---|
| `C:\xampp\htdocs\Projects\oguaschoolz` | **Integration target.** Legacy Laravel 8.75 school-management SaaS (Passport auth API + Encore Admin panel). Gracedew is tenant `uniqueid = 'admin'` (`schools.id = 9`) in its database. |
| `C:\xampp\htdocs\Projects\oguaschoolv2` | A newer Laravel 12 / Filament v4 rewrite of the same product, sharing the same physical database as oguaschoolz. It already has a full admissions workflow and CMS tables (news/events/testimonials) that oguaschoolz lacks. **Explicitly not the integration target for this project** — that's a deliberate decision, not an oversight. Do not point new code at it. |

## Current State

Only scaffolding exists here: empty `asset/images/`, `asset/video/`, `css/`, `js/` folders, and a
`db/db.php` with a placeholder MySQL connection (currently references a stale "Wonder World
International School" comment block — that comment is leftover noise, ignore it; the connection
itself, once corrected, is real: it points at the same `oguaschoolz` database and `uniqueid`
tenant key described below). No pages, design system, or components have been built yet.

## Backend Integration Architecture — Phase 3 (API) built and smoke-tested

The public API described below now exists in oguaschoolz and has been built, migrated locally,
and verified end-to-end (all 8 read endpoints return real data; admission submission was
verified to create a `Studentinfo` row that the existing `OnlineadmissionController` staff
review screen picks up correctly; test rows were cleaned up after verification). Remaining work
is entirely in *this* repo now: build the frontend against these endpoints.

**Why a new API, rather than reading the database directly**: oguaschoolz had no public-facing
API before this. Every existing `routes/api.php` controller requires Passport auth (`auth:api`);
`routes/web.php` is entirely the separate oguaschoolz.com SaaS marketing site. The *old* Gracedew
site worked around this by connecting directly to the MySQL database with raw, unparameterized
`mysqli` queries and root/no-password credentials — a security liability (SQL injection surface,
credentials with no access boundary) that must not be carried into this rebuild. This site talks
to oguaschoolz over HTTP instead and never holds a database credential.

**Two real bugs were found and fixed while wiring this up** — worth knowing about since they
indicate the live database has drifted from what migrations describe, beyond what the earlier
audit already flagged:
- `admissionenquiries.id` and `newsletters.id` were `int unsigned NOT NULL` with **no
  `AUTO_INCREMENT`** on the live table, despite their migrations specifying
  `$table->increments('id')`. Nothing had ever written to either table before (no existing
  route did), so it went unnoticed. Fixed via a corrective migration
  (`2026_08_18_000002_fix_autoincrement_on_website_contact_tables.php`) — this needs to be run
  in every other environment (staging/production) before the contact-form/newsletter endpoints
  will work there too.
- The **local dev database's `uniqueid='admin'` tenant currently holds unrelated test/seed
  data** — school name comes back as "BOSTON INTERNATIONAL ACADEMY" with nonsense
  location fields ("Antigua and Barbuda"), not Gracedew. The earlier-audited `database.sql`
  dump showed a real "Gracedew International School" row at this same `uniqueid`/`id=9`, so this
  is dev-environment drift since that dump, not a sign `uniqueid='admin'` is wrong — the school
  `id` (9) still matches. **Before pointing this website at any real environment, confirm which
  database actually holds live Gracedew data** — don't assume local dev reflects it.

New files added in oguaschoolz (all additive — nothing existing was removed or renamed):
- `app/Http/Controllers/V1/Website/{WebsiteContentController,WebsiteAdmissionController,WebsiteContactController}.php`
- `app/Http/Middleware/VerifyWebsiteToken.php` (+ registered in `Kernel.php`'s `$routeMiddleware`)
- `app/Models/WebsiteAdmissionDocument.php`
- `database/migrations/2026_08_18_000001_create_website_admission_documents_table.php`
- `database/migrations/2026_08_18_000002_fix_autoincrement_on_website_contact_tables.php`
- `config/services.php` gained a `website.token` entry (`WEBSITE_API_TOKEN` env var — set in
  local `.env` already; **must also be set in staging/production**, and given to this website's
  server-side config as the `X-Website-Token` header value)
- Routes appended to the end of `routes/api.php` under `api/v1/public/*`

**As built.** Base path: `{OGUASCHOOLZ_URL}/api/v1/public`, all endpoints take `uniqueid` (query
param on GETs, form field on POSTs) — hardcode `admin` for Gracedew in this site's server-side
config only (e.g. `db/config.php`), never in frontend JS.

| Method | Path | Auth | Notes |
|---|---|---|---|
| GET | `/school` | none | branding/contact info from `schools` |
| GET | `/banners` | none | `websitebanners`, `status=1` only |
| GET | `/gallery` | none | `imageuploads`; optional `?category=` filters the live-only `cat` column (values are opaque strings like `'0'`/`'2'` on the old site — surface a friendly label mapping in this repo, not in the API) |
| GET | `/videos` | none | `videouploads` — `url` is either a storage path or (for YouTube-type rows) a direct playable URL in `videourl` |
| GET | `/news` | none | `news`, `status=1`; optional `?type=News\|Event` |
| GET | `/testimonials` | none | `testimonies`, `status=1` — not `Testimonial` (unrelated SaaS-marketing model) |
| GET | `/classes` | none | `studentclasses` — populate the admission form's entry-level select from this, don't hardcode class names |
| GET | `/stats` | none | live counts (students/graduated/staff/teaching_staff/subjects) |
| POST | `/admissions` | `X-Website-Token` | see below |
| POST | `/enquiries` | `X-Website-Token` | contact form → `admissionenquiries` |
| POST | `/newsletter` | `X-Website-Token` | → `newsletters`, de-duped by email |

All image/file fields in JSON responses are already resolved to full URLs
(`Storage::disk('admin')->url(...)`) — this site should render them directly, no path-joining
needed.

**Admission submission** mirrors the *existing, half-built* design intent in oguaschoolz rather
than inventing a new one: `Admin\OnlineadmissionController`'s review screen already lists
`Studentinfo::where('status', 0)->where('source', 'Website')`, and its "Approve Admission"
row-action already generates `student_id` and creates the linked `User` account on approval.
`WebsiteAdmissionController::store()` (`app/Http/Controllers/V1/Website/`) writes only the
*pending* row (`status=0`, `source='Website'`, no `student_id`/`user_id` yet) plus a `Guardians`
row and any `WebsiteAdmissionDocument` rows — staff approval does the rest. **No new admin UI
was needed.** Required fields: surname, firstname, gender, dateofbirth, entrylevel (validated
against that school's real `Studentclass` ids via `/classes`), guardian name/relationship/phone.
Optional: onames, placeofbirth, nationality, hometown, religion, disability, medicalinfo, a
`pic` image upload (max 5MB), and up to 10 `documents[]` entries (each `{type, file}`, type ∈
`birth_certificate|previous_report|passport_photo|other`, stored in the new
`website_admission_documents` table — deliberately a separate table, not new columns on
`studentinfos`). Response is `{data: {reference, submitted_at}}` where `reference` is synthesized
as `APP-{school_id}-{studentinfo_id}` (e.g. `APP-9-0550`) — there's no dedicated reference column
on `studentinfos`, so don't expect one; this is what the printable/PDF confirmation should show.
PDF generation for that confirmation should reuse oguaschoolz's existing
`Terminalreportservice.php` machinery rather than adding a new PDF dependency — not yet wired
up, left for the frontend/PDF phase.

**Auth**: read endpoints are intentionally unauthenticated (public marketing content, same as
what any school's own site would show). Writes require header `X-Website-Token: <token>`,
checked by `App\Http\Middleware\VerifyWebsiteToken` against `config('services.website.token')`
(`WEBSITE_API_TOKEN` env var in oguaschoolz). This is a new auth pattern for oguaschoolz, not a
deviation from an existing one — Passport and the `Apikeys` table both serve different purposes
and don't fit here. All ten routes are also `throttle:60,1`.

## Design System / Branding

Source of truth is the old site's actually-applied styling, **not** its vestigial Bootstrap
template defaults:

- Brand color: `#98291e` (brick/maroon — this is what's live on buttons/links/icons today; a
  `--primary: #cd8d12` gold variable also exists in the old CSS but is essentially unused
  template cruft, don't treat it as canonical)
- Fonts: Heebo (400/500/600) + Inter (600) for body/UI, Lobster Two (700) for
  headings/script accents — all via Google Fonts, no self-hosted font files
- Logo: **`asset/images/logo.png`** (334×327 PNG, transparent background) — the real, current
  Gracedew badge/seal logo, supplied directly by the school and confirmed authoritative (not the
  old site's `img/toplogo.png`/`logo.png`, which are superseded). Its maroon linework matches the
  `#98291e` brand color almost exactly, confirming that color choice. It's also the real source
  for the school's motto text, **"Play, Learn 'n' Develop"** (used as the header's fallback
  moto when the API doesn't provide one) and confirms founding year 2001. Referenced directly
  (hardcoded path, not fetched from the API) in `includes/header.php` (nav + favicon + JSON-LD)
  and `includes/footer.php` — deliberately not sourced from `$school['logo']`, since that would
  currently pull the wrong tenant's logo from local dev's test data. Revisit once oguaschoolz's
  `schools.logo` is correctly populated for the real Gracedew tenant, if admin-manageability of
  the logo becomes a priority. No SVG version exists yet — the PNG is fine at current display
  sizes, but produce an SVG if the logo needs to scale larger (e.g. a print/PDF header) without
  softening.
- No existing icon set beyond Font Awesome/Bootstrap Icons — fine to keep using an icon font or
  swap for a modern SVG icon set (e.g. Lucide) during rebuild

**Content conflicts to resolve with the school before launch** (do not silently pick one):
- Two different addresses appear across old pages (Kotobabi-Accra GA-043-4401 vs. an orphaned
  East-Legon page) — the Kotobabi address + the `contact-us.php` Google Maps pin are the more
  credible current one, but confirm with the school.
- Two different "core values" lists exist (`about-us.php` vs `mission.php`) — reconcile before
  publishing either.
- `index.php`'s hero/principal-message copy and a referenced `wonder-world.mp4` video are
  leftover "Wonder World International School" template content — do not reuse; the video file
  doesn't even exist on disk.
- No staff/faculty photos and very few real facility photos exist in current assets — flag as a
  content gap for the school to supply, don't fill with stock photography per the brief.

## Reusable Real Content (verified accurate as of the audit)

- Mission, vision, and founder-history copy on `about-us.php`/`mission.php` of the old site is
  genuine Gracedew content — reuse it, don't regenerate placeholder copy.
- Contact: `gracedew.int.school@gmail.com`, WhatsApp `+233 50 807 7258`, Facebook
  `facebook.com/GracedewSch` — real and reusable. Some other listed phone numbers have
  mismatched `tel:` hrefs in the old markup; verify before reusing.

## Conventions For This Codebase

- Tech stack: plain PHP (matching the existing scaffold and the school's shared-hosting
  deployment reality) with a Tailwind-based design system and light vanilla JS/Alpine for
  interactivity — no SPA framework, no build-heavy bundler requirement, keeps deployment on
  ordinary shared hosting simple. Revisit only if the school's hosting changes.
- `db/db.php` **is** the HTTP API client (not a raw MySQL connection) — see "Backend Integration
  Architecture" above for the endpoint reference. It never holds a database credential.
- All admission-form file uploads must be validated server-side (type, size) on the oguaschoolz
  endpoint regardless of any client-side checks here — never trust the browser alone.

## Phase 4 progress — frontend

**Built and verified in a real browser (Alpine.js loaded via CDN — the only JS dependency):**
- `includes/header.php` / `includes/footer.php` — shared nav (desktop + working mobile hamburger
  menu) and footer, pull school branding/contact via `gd_api_get('school')`
- `index.php` — homepage: banner carousel, welcome/mission copy (real content, not placeholder),
  "why choose us" cards, live stats, news preview, testimonials, admission CTA — all populated
  from the API, not hardcoded
- `admissions/index.php` — admission requirements/process info page
- `admissions/apply.php` + `admissions/submit.php` — the 5-step online application (Applicant →
  Guardian → Programme → Documents → Review), Alpine-driven client state, submits via `fetch` as
  `multipart/form-data` to `submit.php`, which calls `gd_api_post('admissions', ...)`. Verified
  end-to-end through an actual browser session: filled every step, the entry-level dropdown
  pulled real classes from `/classes`, submission returned a reference number, and the resulting
  `Studentinfo`/`Guardians` rows were confirmed correct in oguaschoolz then deleted (test data).
  Confirmation screen has a working "Print Confirmation" button (browser print, `print:hidden`
  Tailwind variant hides the action buttons from the printed output).
- `src/input.css` → `css/app.css` — Tailwind v4 design system (brand color/type tokens, `.btn*`/
  `.card`/`.section`/`.eyebrow` component classes), compiled via `npm run build:css`
  (`@tailwindcss/cli`). **Node is a build-time-only dependency** — rerun `npm run build:css`
  after editing `src/input.css` or adding new files with new Tailwind classes; the hosting server
  itself only ever serves the static compiled `css/app.css`, no Node runtime needed there.

**All main pages are now built**: `index.php`, `about.php`, `academics.php`, `gallery.php`
(photo grid + lightbox + category filter + video showcase), `news.php` (News/Event filter +
expand), `contact.php` (working enquiry form + Google Maps embed), `admissions/index.php` +
`admissions/apply.php`. Write endpoints (`admissions/submit.php`, `enquiry-submit.php`,
`newsletter-submit.php`, the latter wired into the footer's subscribe form) all call through to
oguaschoolz and were verified end-to-end via real browser sessions, including a full 5-step
admission submission, a contact-form send, and a newsletter signup — each confirmed correct in
oguaschoolz's database, then deleted as test data.

**Local dev setup**: the developer's machine runs oguaschoolz locally at `oguaschool.com:7000`
(hosts-file entry + a persistent dev server on that port — **not** `php artisan serve` on an
arbitrary port). Copy `db/config.local.example.php` to `db/config.local.php`, uncomment
`GD_API_BASE` to `http://oguaschool.com:7000/api/v1/public`, and set a real `WEBSITE_API_TOKEN`
matching oguaschoolz's `.env`. **Don't change `db/db.php`'s production default away from the
no-port URL** — local dev needs the port, production doesn't; that split is intentional and
belongs in `config.local.php`, not in the committed default.

**Known local-only cosmetic issue**: images (banners, gallery, logo, etc.) will appear broken
when browsing this site locally. The API's image URLs are generated by oguaschoolz's own
`Storage::disk('admin')->url()`, which uses oguaschoolz's `APP_URL` — and that `.env` value is
`http://oguaschool.com` with no port, even in local dev, so the URLs it returns don't include
the `:7000` needed to actually resolve locally. This is an oguaschoolz-side local-environment
quirk, out of scope for this project to fix, and won't occur in production (where there's no
port at all, matching `APP_URL` exactly). Don't mistake it for a bug in this codebase's image
rendering.

## Phase 6 progress — SEO / QA polish

- `includes/header.php` now emits per-page canonical URL, Open Graph + Twitter Card tags (pages
  can set `$page_image` before including it — falls back to the school's `backdrop`), and a
  site-wide JSON-LD `School` structured-data block (name, founding date, address, logo, socials).
- `robots.txt`, `sitemap.xml` — static sitemap listing the real pages;
  **`www.gracedew.edu.gh` in both is a placeholder domain, not confirmed** — replace before
  launch once the school's actual production domain is decided.
- `404.php` + `.htaccess` (`ErrorDocument 404`, blocks direct web access to `db/` entirely, gzip
  + far-future caching headers for static assets, directory listing disabled).
- **`.htaccess` behavior is unverified** — PHP's built-in dev server (`php -S`, used for all
  testing so far) ignores `.htaccess` completely, and Apache/XAMPP wasn't running locally to test
  against. The 404 page itself was confirmed to render correctly and return HTTP 404 when hit
  directly; the `ErrorDocument`/rewrite/caching directives need verification under real Apache
  before launch.

**Still open** (not addressed this pass): the content conflicts and gaps flagged earlier
(address, core-values list, missing staff/facility photos, real production domain), individual
news/blog article pages (current `news.php` is a single filterable listing, not per-article
URLs — fine for now given the volume of content, revisit if the school wants shareable article
links), and a full accessibility/performance audit (Lighthouse et al.) hasn't been run.

## Do Not

- Do not modify `oguaschoolz`'s existing Passport-protected routes/controllers or its Encore
  Admin panel — only add new, clearly-separated public endpoints.
- Do not build anything against `oguaschoolv2` — confirmed out of scope for this project despite
  having more mature admissions/CMS tables.
- Do not reintroduce direct database access from this website.
- Do not treat `App\Models\Testimonial` (SaaS marketing testimonials, no tenant scoping) as the
  source for school testimonials — that's `App\Models\Testimonies`.
- Do not trust `database/migrations/*.php` in oguaschoolz as the complete schema — the live
  database has drifted ahead of them (confirmed via `database.sql` dump); verify real columns
  against the dump or admin controllers before writing queries against a table.
