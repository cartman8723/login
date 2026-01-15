function initCaptchaValidation(buttonId) {
    let captchaValidated = false;
    const button = document.getElementById(buttonId);

    if (!button) return;

    window.onCaptchaSuccess = function () {
        captchaValidated = true;
        button.disabled = false;
        button.classList.remove('bg-gray-400', 'cursor-not-allowed');
        button.classList.add('bg-primary', 'hover:bg-primary-dark');
    };

    window.onCaptchaExpired = function () {
        captchaValidated = false;
        button.disabled = true;
        button.classList.remove('bg-primary', 'hover:bg-primary-dark');
        button.classList.add('bg-gray-400', 'cursor-not-allowed');
    };
}

document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('loginButton')) {
        initCaptchaValidation('loginButton');
    } else if (document.getElementById('registerButton')) {
        initCaptchaValidation('registerButton');
    }
});
