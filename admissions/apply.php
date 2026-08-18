<?php
require __DIR__.'/../db/db.php';

$page_title = 'Apply for Admission | Gracedew International School';
$page_description = 'Complete Gracedew International School\'s online admission application.';
$school = gd_api_get('school');
$classes = gd_api_get('classes');

require __DIR__.'/../includes/header.php';
?>

<section class="section" x-data="admissionForm()">
    <div class="mx-auto max-w-3xl">

        <!-- Step progress -->
        <ol class="flex items-center justify-between text-xs sm:text-sm" x-show="!submitted">
            <template x-for="(label, i) in steps" :key="i">
                <li class="flex-1 text-center" :class="i > 0 ? 'border-t-2 pt-3 -ml-px' : 'pt-3'" :style="i > 0 ? 'border-color: ' + (i <= step ? '#98291e' : '#e5e5e5') : ''">
                    <span class="font-medium" :class="i === step ? 'text-brand-500' : (i < step ? 'text-ink-900' : 'text-ink-900/70')" x-text="label"></span>
                </li>
            </template>
        </ol>

        <!-- Error banner -->
        <div x-show="error" x-cloak class="mt-6 rounded-xl bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700" x-text="error"></div>

        <!--
          Deliberately NOT x-cloak'd on this <form> itself: cloaking the
          whole multi-hundred-pixel form until Alpine loads was confirmed
          (via a PerformanceObserver injected directly into the page) to be
          this form's dominant CLS culprit — the form rendered near-zero
          height, then "popped in" at full size once Alpine initialized.
          Step 0's div below is deliberately left uncloaked too, since it's
          visible by default in raw HTML pre-Alpine anyway — which already
          matches its correct initial state (step 0 IS what should show
          first), so there's nothing to hide. Steps 1-4 keep x-cloak since
          their correct initial state genuinely is hidden, and by the time a
          user could ever reveal them (clicking Continue), Alpine is
          necessarily already loaded — that click handler is Alpine's.
        -->
        <form x-show="!submitted" @submit.prevent="submitForm" class="mt-8 space-y-8" enctype="multipart/form-data">

            <!-- Step 1: Applicant -->
            <div x-show="step === 0" class="card p-6 sm:p-8 space-y-5">
                <h2 class="text-xl font-bold">Applicant Information</h2>
                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block">
                        <span class="text-sm font-medium">Surname *</span>
                        <input type="text" x-model="form.surname" required class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">First name *</span>
                        <input type="text" x-model="form.firstname" required class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Other names</span>
                        <input type="text" x-model="form.onames" class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Gender *</span>
                        <select x-model="form.gender" required class="mt-1 w-full rounded-lg border-black/10">
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Date of birth *</span>
                        <input type="date" x-model="form.dateofbirth" required class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Place of birth</span>
                        <input type="text" x-model="form.placeofbirth" class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Nationality</span>
                        <input type="text" x-model="form.nationality" class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Hometown</span>
                        <input type="text" x-model="form.hometown" class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Religion</span>
                        <input type="text" x-model="form.religion" class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Disability / support needs</span>
                        <input type="text" x-model="form.disability" placeholder="Leave blank if none" class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                </div>
                <label class="block">
                    <span class="text-sm font-medium">Medical information</span>
                    <textarea x-model="form.medicalinfo" rows="3" placeholder="Allergies, conditions, medication, etc." class="mt-1 w-full rounded-lg border-black/10"></textarea>
                </label>
            </div>

            <!-- Step 2: Guardian -->
            <div x-show="step === 1" x-cloak class="card p-6 sm:p-8 space-y-5">
                <h2 class="text-xl font-bold">Parent / Guardian Information</h2>
                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block">
                        <span class="text-sm font-medium">Full name *</span>
                        <input type="text" x-model="form.guardian_name" required class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Relationship to applicant *</span>
                        <input type="text" x-model="form.guardian_relationship" placeholder="e.g. Mother, Father, Guardian" required class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Phone number *</span>
                        <input type="tel" x-model="form.guardian_phone" required class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Email</span>
                        <input type="email" x-model="form.guardian_email" class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Occupation</span>
                        <input type="text" x-model="form.guardian_occupation" class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                    <label class="block sm:col-span-2">
                        <span class="text-sm font-medium">Home address</span>
                        <input type="text" x-model="form.guardian_address" class="mt-1 w-full rounded-lg border-black/10">
                    </label>
                </div>
            </div>

            <!-- Step 3: Programme -->
            <div x-show="step === 2" x-cloak class="card p-6 sm:p-8 space-y-5">
                <h2 class="text-xl font-bold">Programme / Class Selection</h2>
                <label class="block max-w-sm">
                    <span class="text-sm font-medium">Entry level *</span>
                    <select x-model="form.entrylevel" required class="mt-1 w-full rounded-lg border-black/10">
                        <option value="">Select a class</option>
                        <?php foreach ($classes as $c): ?>
                            <option value="<?= (int) $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (! $classes): ?>
                        <span class="mt-1 block text-xs text-red-600">Class list is temporarily unavailable — please try again shortly or contact us.</span>
                    <?php endif; ?>
                </label>
            </div>

            <!-- Step 4: Documents -->
            <div x-show="step === 3" x-cloak class="card p-6 sm:p-8 space-y-5">
                <h2 class="text-xl font-bold">Supporting Documents</h2>
                <p class="text-sm text-ink-900/70">Photos/scans accepted as JPG, PNG, or PDF, up to 5MB each. All optional here — you can also bring physical copies at assessment.</p>
                <div class="grid gap-5 sm:grid-cols-2">
                    <label class="block">
                        <span class="text-sm font-medium">Passport photograph</span>
                        <input type="file" name="pic" accept="image/*" @change="form.pic = $event.target.files[0]" class="mt-1 w-full text-sm">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Birth certificate</span>
                        <input type="file" name="document_birth_certificate" accept="image/*,.pdf" @change="form.document_birth_certificate = $event.target.files[0]" class="mt-1 w-full text-sm">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Previous school report</span>
                        <input type="file" name="document_previous_report" accept="image/*,.pdf" @change="form.document_previous_report = $event.target.files[0]" class="mt-1 w-full text-sm">
                    </label>
                    <label class="block">
                        <span class="text-sm font-medium">Other document</span>
                        <input type="file" name="document_other" accept="image/*,.pdf" @change="form.document_other = $event.target.files[0]" class="mt-1 w-full text-sm">
                    </label>
                </div>
            </div>

            <!-- Step 5: Review -->
            <div x-show="step === 4" x-cloak class="card p-6 sm:p-8 space-y-4">
                <h2 class="text-xl font-bold">Review Your Application</h2>
                <dl class="divide-y divide-black/5 text-sm">
                    <template x-for="row in reviewRows()" :key="row[0]">
                        <div class="flex justify-between gap-4 py-2">
                            <dt class="text-ink-900/70" x-text="row[0]"></dt>
                            <dd class="font-medium text-right" x-text="row[1] || '—'"></dd>
                        </div>
                    </template>
                </dl>
                <label class="flex items-start gap-2 pt-2 text-sm">
                    <input type="checkbox" x-model="form.confirm" required class="mt-1">
                    <span>I confirm the information provided is accurate to the best of my knowledge.</span>
                </label>
            </div>

            <!-- Nav buttons -->
            <div class="flex justify-between">
                <button type="button" @click="back" x-show="step > 0" x-cloak class="btn-outline-brand">Back</button>
                <span x-show="step === 0"></span>
                <button type="button" @click="next" x-show="step < steps.length - 1" class="btn-primary">Continue</button>
                <button type="submit" x-show="step === steps.length - 1" x-cloak :disabled="submitting" class="btn-primary">
                    <span x-show="!submitting">Submit Application</span>
                    <span x-show="submitting">Submitting…</span>
                </button>
            </div>
        </form>

        <!-- Confirmation -->
        <div x-show="submitted" x-cloak class="card p-8 text-center sm:p-12">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-green-100 text-green-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            </div>
            <h2 class="mt-6 text-2xl font-bold">Application Submitted!</h2>
            <p class="mt-2 text-ink-900/70">Thank you — our admissions team will review your application and be in touch.</p>
            <p class="mt-6 text-sm text-ink-900/70">Your reference number</p>
            <p class="text-2xl font-bold text-brand-500" x-text="reference"></p>
            <div class="mt-8 flex flex-wrap justify-center gap-4 print:hidden">
                <button type="button" @click="window.print()" class="btn-outline-brand">Print Confirmation</button>
                <a href="/index.php" class="btn-primary">Return Home</a>
            </div>
        </div>
    </div>
</section>

<script>
function admissionForm() {
    return {
        step: 0,
        steps: ['Applicant', 'Guardian', 'Programme', 'Documents', 'Review'],
        submitting: false,
        submitted: false,
        error: null,
        reference: null,
        form: {
            surname: '', firstname: '', onames: '', gender: '', dateofbirth: '',
            placeofbirth: '', nationality: '', hometown: '', religion: '', disability: '',
            medicalinfo: '', entrylevel: '',
            guardian_name: '', guardian_relationship: '', guardian_phone: '',
            guardian_email: '', guardian_occupation: '', guardian_address: '',
            pic: null, document_birth_certificate: null, document_previous_report: null, document_other: null,
            confirm: false,
        },
        next() {
            this.error = null;
            if (!this.validateStep()) return;
            this.step = Math.min(this.step + 1, this.steps.length - 1);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        back() {
            this.step = Math.max(this.step - 1, 0);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        },
        validateStep() {
            const f = this.form;
            if (this.step === 0 && (!f.surname || !f.firstname || !f.gender || !f.dateofbirth)) {
                this.error = 'Please fill in all required applicant fields.';
                return false;
            }
            if (this.step === 1 && (!f.guardian_name || !f.guardian_relationship || !f.guardian_phone)) {
                this.error = 'Please fill in all required guardian fields.';
                return false;
            }
            if (this.step === 2 && !f.entrylevel) {
                this.error = 'Please select an entry level.';
                return false;
            }
            return true;
        },
        reviewRows() {
            const f = this.form;
            const classLabel = document.querySelector(`select[x-model="form.entrylevel"] option[value="${f.entrylevel}"]`);
            return [
                ['Name', [f.surname, f.firstname, f.onames].filter(Boolean).join(' ')],
                ['Gender', f.gender],
                ['Date of birth', f.dateofbirth],
                ['Guardian', f.guardian_name],
                ['Relationship', f.guardian_relationship],
                ['Guardian phone', f.guardian_phone],
                ['Entry level', classLabel ? classLabel.textContent : f.entrylevel],
            ];
        },
        async submitForm() {
            if (!this.validateStep() || !this.form.confirm) {
                this.error = 'Please confirm the information is accurate before submitting.';
                return;
            }
            this.submitting = true;
            this.error = null;

            const fd = new FormData();
            const f = this.form;
            ['surname','firstname','onames','gender','dateofbirth','placeofbirth','nationality',
             'hometown','religion','disability','medicalinfo','entrylevel',
             'guardian_name','guardian_relationship','guardian_phone','guardian_email',
             'guardian_occupation','guardian_address'].forEach(k => fd.append(k, f[k] ?? ''));
            ['pic','document_birth_certificate','document_previous_report','document_other'].forEach(k => {
                if (f[k]) fd.append(k, f[k]);
            });

            try {
                const res = await fetch('/admissions/submit.php', { method: 'POST', body: fd });
                const json = await res.json();
                if (json.ok) {
                    this.reference = json.reference;
                    this.submitted = true;
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } else {
                    this.error = json.message || 'Something went wrong. Please try again.';
                }
            } catch (e) {
                this.error = 'Network error — please check your connection and try again.';
            } finally {
                this.submitting = false;
            }
        },
    };
}
</script>

<?php require __DIR__.'/../includes/footer.php'; ?>
