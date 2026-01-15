/*
 * Loader
 */

document.addEventListener('DOMContentLoaded', function () {
    // Selecciona todos los formularios de la página
    const forms = document.querySelectorAll('form');

    // Asigna el evento submit a cada formulario
    forms.forEach(form => {
        form.addEventListener('submit', function () {
            if (form.hasAttribute('data-skip-loading')) {
                return;
            }
            // Remueve la clase 'hidden' para mostrar el indicador de carga
            document.getElementById('loadingIndicator').classList.remove('hidden');
        });
    });
});


/*
 *  Alerts hover
 */
window.addEventListener('DOMContentLoaded', () => {
    let swalTimer;
    let swalContainer = document.querySelector('.swal2-container');

    if (swalContainer) {
        swalContainer.addEventListener('mouseenter', () => {
            if (Swal.isVisible()) {
                Swal.stopTimer(); // Pausar la cuenta regresiva
            }
        });

        swalContainer.addEventListener('mouseleave', () => {
            if (Swal.isVisible()) {
                Swal.resumeTimer(); // Reanudar la cuenta regresiva
            }
        });
    }
});

/*
 *  Change password input
 */

document.addEventListener('DOMContentLoaded', function () {
    const toggles = document.querySelectorAll('.toggle-password');

    toggles.forEach(toggle => {
        const wrapper = toggle.closest('.relative');
        const input = wrapper.querySelector('input[type="password"], input[type="text"]');
        const iconShow = toggle.querySelector('.icon-show');
        const iconHide = toggle.querySelector('.icon-hide');

        toggle.addEventListener('click', () => {
            const isPassword = input.type === 'password';
            input.type = isPassword ? 'text' : 'password';

            iconShow.style.display = isPassword ? 'none' : 'inline';
            iconHide.style.display = isPassword ? 'inline' : 'none';
        });
    });
});

/*
 *  Validate password value
 */

document.addEventListener('DOMContentLoaded', function () {
    const newPasswordInput = document.getElementById('newPassword');
    const confirmInput = document.getElementById('confirmNewPassword');
    const errorText = document.getElementById('passwordError');
    const submitButton = document.getElementById('submitUpdatePassword');

    confirmInput.addEventListener('blur', () => {
        const newPassword = newPasswordInput.value;
        const confirmPassword = confirmInput.value;

        if (newPassword && confirmPassword && newPassword !== confirmPassword) {
            submitButton.disabled = true;
            submitButton.classList.remove('hover:bg-primary-dark');
            errorText.classList.remove('hidden');
            newPasswordInput.classList.remove('border-green-500', 'focus:border-green-500', 'focus:ring-green-500');
            confirmInput.classList.remove('border-green-500', 'focus:border-green-500', 'focus:ring-green-500');

            newPasswordInput.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
            confirmInput.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
        } else {
            submitButton.disabled = false;
            submitButton.classList.add('hover:bg-primary-dark');
            errorText.classList.add('hidden');
            newPasswordInput.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
            confirmInput.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');

            newPasswordInput.classList.add('border-green-500', 'focus:border-green-500', 'focus:ring-green-500');
            confirmInput.classList.add('border-green-500', 'focus:border-green-500', 'focus:ring-green-500');
        }
    });
});

