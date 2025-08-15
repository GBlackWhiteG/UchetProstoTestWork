document.addEventListener('DOMContentLoaded', function () {
    const dealModalBtn = document.getElementById('dealModalBtn');
    const contactModalBtn = document.getElementById('contactModalBtn');

    const dealUpdateBtn = document.querySelectorAll('.deal-update-btn');
    const contactUpdateBtn = document.querySelectorAll('.contact-update-btn');

    const modals = document.querySelectorAll('.user-modal');

    const contactUpdateModal = document.getElementById('contactUpdateModal');
    const dealUpdateModal = document.getElementById('dealUpdateModal');

    const modalsCloseBtns = document.querySelectorAll('.modal-close-btn-wrapper');

    contactModalBtn.addEventListener('click', function () {
        modals[0].classList.remove('d-none');
    });

    dealModalBtn.addEventListener('click', function () {
        modals[1].classList.remove('d-none');
    });

    dealUpdateBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            dealUpdateModal.classList.remove('d-none');
            dealUpdateModal.querySelector('.updateModalDealId').value = btn.dataset.update;
        });
    });

    contactUpdateBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            contactUpdateModal.classList.remove('d-none');
            contactUpdateModal.querySelector('.updateModalContactId').value = btn.dataset.update;
        });
    });

    modalsCloseBtns.forEach((btn, index) => {
        btn.addEventListener('click', () => {
            modals[index].classList.add('d-none');
        })
    });
});