

    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-a');
        const sections = document.querySelectorAll('.section');

        // Function to show the selected section and hide others
        function showSection(targetId) {
            sections.forEach(section => {
                if (section.id === targetId) {
                    section.classList.add('active');
                } else {
                    section.classList.remove('active');
                }
            });

            navLinks.forEach(link => {
                if (link.getAttribute('data-target') === targetId) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

        // Set up click event handlers for the navigation links
        navLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const targetId = link.getAttribute('data-target');
                showSection(targetId);
                // Optionally, remember the last active section in localStorage
                localStorage.setItem('activeSection', targetId);
            });
        });

        // Show the section that was last active, if any
        const lastActiveSection = localStorage.getItem('activeSection');
        if (lastActiveSection) {
            showSection(lastActiveSection);
        } else {
            // Optionally, show the first section by default
            if (sections.length > 0) {
                showSection(sections[0].id);
            }
        }
    });

