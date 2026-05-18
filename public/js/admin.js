document.addEventListener('DOMContentLoaded', () => {
    const offerToggle = document.getElementById('has_offer');
    if (offerToggle) {
        const syncOfferFields = () => {
            const hasOffer = offerToggle.checked;
            document.querySelectorAll('.offer-fields').forEach((el) => {
                el.classList.toggle('hidden', !hasOffer);
            });
            document.querySelectorAll('.price-field').forEach((el) => {
                el.classList.toggle('hidden', hasOffer);
            });
        };
        offerToggle.addEventListener('change', syncOfferFields);
        syncOfferFields();
    }

    const selectAll = document.getElementById('select-all-products');
    if (selectAll) {
        selectAll.addEventListener('change', () => {
            document.querySelectorAll('.product-checkbox').forEach((cb) => {
                cb.checked = selectAll.checked;
            });
        });
    }

    document.querySelectorAll('[data-confirm]').forEach((el) => {
        el.addEventListener('click', (event) => {
            const message = el.getAttribute('data-confirm') || 'Are you sure?';
            if (!window.confirm(message)) {
                event.preventDefault();
            }
        });
    });
});
