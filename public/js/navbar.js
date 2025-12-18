
    const searchBtn = document.getElementById('searchBtn');
    const searchInput = document.getElementById('searchInput');

    searchBtn.addEventListener('click', (e) => {
        e.preventDefault();
        if (searchInput.classList.contains('w-64')) {
            searchInput.classList.remove('w-64','pl-4','pr-10');
            searchInput.classList.add('w-0','px-0');
            searchInput.value = '';
        } else {
            searchInput.classList.remove('w-0','px-0');
            searchInput.classList.add('w-64','pl-4','pr-10');
            searchInput.focus();
        }
    });

    document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target) && !searchBtn.contains(e.target)) {
            searchInput.classList.remove('w-64','pl-4','pr-10');
            searchInput.classList.add('w-0','px-0');
            searchInput.value = '';
        }
    });

    const searchBtnMobile = document.getElementById('searchBtnMobile');
    const searchInputMobile = document.getElementById('searchInputMobile');

    searchBtnMobile.addEventListener('click', (e) => {
        e.preventDefault();
        searchInputMobile.classList.toggle('opacity-100');
        searchInputMobile.classList.toggle('pointer-events-auto');
        searchInputMobile.focus();
    });

    document.addEventListener('click', (e) => {
        if (!searchInputMobile.contains(e.target) && !searchBtnMobile.contains(e.target)) {
            searchInputMobile.classList.remove('opacity-100','pointer-events-auto');
        }
    });

    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', (e) => {
        e.preventDefault();
        mobileMenu.classList.toggle('hidden');
    });
