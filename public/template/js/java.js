document.addEventListener("DOMContentLoaded", function(event) {
    // Show/Hide Navbar
    const showNavbar = (toggleId, navId, bodyId, headerId) => {
        const toggle = document.getElementById(toggleId),
              nav = document.getElementById(navId),
              bodypd = document.getElementById(bodyId),
              headerpd = document.getElementById(headerId);

        if (toggle && nav && bodypd && headerpd) {
            toggle.addEventListener('click', () => {
                nav.classList.toggle('show');
                toggle.classList.toggle('bx-x');
                bodypd.classList.toggle('body-pd');
                headerpd.classList.toggle('body-pd');
            });
        }
    };

    // Initialize navbar
    showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');

    // Link highlight activation
    const linkColor = document.querySelectorAll('.nav_link');
    function colorLink() {
        if (linkColor) {
            linkColor.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        }
    }
    linkColor.forEach(l => l.addEventListener('click', colorLink));

    const linkColor2 = document.querySelectorAll('.nav-link');
    function colorLink() {
        if (linkColor2) {
            linkColor2.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        }
    }
    linkColor2.forEach(l => l.addEventListener('click', colorLink));

    // Dropdown functionality
    function toggleDropdown(event) {
        event.preventDefault(); // Prevent default anchor behavior

        // Close all open dropdowns
        const dropdowns = document.querySelectorAll('.dropdown.open');
        dropdowns.forEach(dropdown => {
            if (dropdown !== event.currentTarget.closest('.dropdown')) {
                dropdown.classList.remove('open');
            }
        });

        // Toggle the clicked dropdown
        const currentDropdown = event.currentTarget.closest('.dropdown');
        currentDropdown.classList.toggle('open');
    }

    // Add event listener to each dropdown toggle
    const dropdownToggles = document.querySelectorAll('.nav_link');
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', toggleDropdown);
    });

    // Close dropdowns when clicking outside
    window.addEventListener('click', function(event) {
        // Check if click is outside of dropdowns
        if (!event.target.closest('.dropdown')) {
            const dropdowns = document.querySelectorAll('.dropdown.open');
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('open');
            });
        }
    });

    // Stop propagation when clicking inside dropdown
    const dropdownLinks = document.querySelectorAll('.dropdown_menu');
    dropdownLinks.forEach(menu => {
        menu.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent dropdown from closing when clicking inside
        });
    });

    document.querySelectorAll('[id^="hapus-"]').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default link action
            
            const href = this.getAttribute('href');
            
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href; // Proceed with deletion
                }
            });
        });
    });

    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent immediate navigation

        const logoutUrl = this.getAttribute('href');

        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Anda akan keluar dari sesi ini.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = logoutUrl; // Proceed with logout
            }
        });
    });
});
