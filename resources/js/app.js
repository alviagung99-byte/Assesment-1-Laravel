import './bootstrap';

const confidenceInput = document.querySelector('#confidence_score');
const confidenceGuidance = document.querySelector('#confidence-guidance');

confidenceInput?.addEventListener('input', () => {
    if (!confidenceGuidance) return;

    const score = Number(confidenceInput.value);
    let guidance = 'Status dan rekomendasi ditentukan otomatis dari confidence score.';

    if (confidenceInput.value !== '') {
        if (score < 50) {
            guidance = 'Tidak Pasti — perlu verifikasi manual oleh petugas.';
        } else if (score <= 80) {
            guidance = 'Indikasi Hama — lakukan pemantauan intensif.';
        } else {
            guidance = 'Hama Terkonfirmasi — segera lakukan pengendalian hama.';
        }
    }

    confidenceGuidance.lastChild.textContent = ` ${guidance}`;
});
