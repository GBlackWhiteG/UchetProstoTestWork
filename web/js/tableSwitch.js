document.addEventListener('DOMContentLoaded', function () {
    const dealButton = document.getElementById('dealButton');
    const contactButton = document.getElementById('contactButton');

    const deals = document.getElementById('deals');
    const contacts = document.getElementById('contacts');

    const dealsContent = document.getElementById('dealsContent');
    const contactsContent = document.getElementById('contactsContent');

    const activeClass = 'active-topic';
    const activeSubClass = 'active-subtopics'
    const activeContentClass = 'active-content';

    deals.querySelector('span').classList.add(activeClass);
    dealsContent.querySelector('div').classList.add(activeContentClass);

    const clearClasses = (elements, className) => {
        elements.forEach((ell) => {
            ell.classList.remove(className);
        })
    }

    dealButton.addEventListener('click',  function () {
        deals.classList.add(activeSubClass);
        contacts.classList.remove(activeSubClass);
        this.classList.add(activeClass);
        contactButton.classList.remove(activeClass);

        clearClasses(deals.querySelectorAll('span'), activeClass);
        deals.querySelector('span').classList.add(activeClass);

        dealsContent.classList.remove('d-none');
        contactsContent.classList.add('d-none');

        clearClasses(dealsContent.querySelectorAll('div'), activeContentClass);
        dealsContent.querySelector('div').classList.add(activeContentClass);
    });

    contactButton.addEventListener('click',  function () {
        contacts.classList.add(activeSubClass);
        deals.classList.remove(activeSubClass);
        this.classList.add(activeClass);
        dealButton.classList.remove(activeClass);

        clearClasses(contacts.querySelectorAll('span'), activeClass);
        contacts.querySelector('span').classList.add(activeClass);

        contactsContent.classList.remove('d-none');
        dealsContent.classList.add('d-none');

        clearClasses(contactsContent.querySelectorAll('div'), activeContentClass);
        contactsContent.querySelector('div').classList.add(activeContentClass);
    });

    deals.querySelectorAll('span').forEach((btn) => {
        btn.addEventListener('click', function () {
            const id = btn.dataset.deal;
            const activeBtn = document.getElementById(`deal${id}`);
            const contentItem = document.getElementById(`dealData${id}`);

            clearClasses(deals.querySelectorAll('span'), activeClass);
            activeBtn.classList.add(activeClass);

            clearClasses(dealsContent.querySelectorAll('div'), activeContentClass);
            contentItem.classList.add(activeContentClass);
        });
    })

    contacts.querySelectorAll('span').forEach((btn) => {
        btn.addEventListener('click', function () {
            const id = btn.dataset.contact;
            const activeBtn = document.getElementById(`contact${id}`);
            const contentItem = document.getElementById(`contactData${id}`);

            clearClasses(contacts.querySelectorAll('span'), activeClass);
            activeBtn.classList.add(activeClass);

            clearClasses(contactsContent.querySelectorAll('div'), activeContentClass);
            contentItem.classList.add(activeContentClass);
        });
    })
});