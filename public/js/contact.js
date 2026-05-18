document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contact-form');
    if (!form) {
        return;
    }

    const alertBox = document.getElementById('contact-form-alert');
    const submitBtn = document.getElementById('contact-submit-btn');
    const btnText = submitBtn?.querySelector('.btn-text');
    const btnLoading = submitBtn?.querySelector('.btn-loading');
    const fields = ['name', 'email', 'phone', 'message'];
    const successMessage = 'Thank you! Your message has been sent successfully. We will get back to you soon.';

    const clearErrors = () => {
        fields.forEach((field) => {
            const input = form.querySelector(`[name="${field}"]`);
            const errorEl = form.querySelector(`[data-error-for="${field}"]`);

            input?.classList.remove('contact-input-error');
            if (errorEl) {
                errorEl.textContent = '';
                errorEl.classList.add('hidden');
            }
        });

        if (alertBox) {
            alertBox.textContent = '';
            alertBox.className = 'hidden mb-6 p-4 text-sm border-l-4';
        }
    };

    const showAlert = (message, type) => {
        if (!alertBox) {
            return;
        }

        alertBox.textContent = message;
        alertBox.classList.remove('hidden');
        alertBox.classList.add(
            type === 'success'
                ? 'bg-green-50 border-green-500 text-green-800'
                : 'bg-red-50 border-red-500 text-red-800',
        );
    };

    const showFieldErrors = (errors) => {
        if (!errors || typeof errors !== 'object') {
            return;
        }

        Object.entries(errors).forEach(([field, messages]) => {
            const input = form.querySelector(`[name="${field}"]`);
            const errorEl = form.querySelector(`[data-error-for="${field}"]`);
            const message = Array.isArray(messages) ? messages[0] : messages;

            input?.classList.add('contact-input-error');
            if (errorEl && message) {
                errorEl.textContent = message;
                errorEl.classList.remove('hidden');
            }
        });
    };

    const setLoading = (loading) => {
        if (!submitBtn) {
            return;
        }

        submitBtn.disabled = loading;
        btnText?.classList.toggle('hidden', loading);
        btnLoading?.classList.toggle('hidden', !loading);
    };

    const parseResponse = async (response) => {
        const text = await response.text();

        if (!text) {
            return {};
        }

        try {
            return JSON.parse(text);
        } catch {
            return {};
        }
    };

    const handleSubmit = async (event) => {
        event.preventDefault();
        event.stopPropagation();

        if (submitBtn?.disabled) {
            return;
        }

        clearErrors();
        setLoading(true);

        const formData = new FormData(form);
        const token = form.querySelector('input[name="_token"]')?.value;

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    ...(token ? { 'X-CSRF-TOKEN': token } : {}),
                },
                body: formData,
                credentials: 'same-origin',
            });

            const data = await parseResponse(response);

            if (response.ok && data.success) {
                showAlert(data.message || successMessage, 'success');
                form.reset();
                return;
            }

            if (response.status === 422 && data.errors) {
                showFieldErrors(data.errors);
                showAlert(data.message || 'Please fix the errors below.', 'error');
                return;
            }

            if (response.ok) {
                showAlert(successMessage, 'success');
                form.reset();
                return;
            }

            showAlert(data.message || 'Something went wrong. Please try again.', 'error');
        } catch (error) {
            if (error?.name === 'AbortError') {
                return;
            }

            console.error('Contact form error:', error);
            showAlert('Unable to send your message. Please check your connection and try again.', 'error');
        } finally {
            setLoading(false);
        }
    };

    form.addEventListener('submit', handleSubmit);
    form.setAttribute('novalidate', 'novalidate');
});
