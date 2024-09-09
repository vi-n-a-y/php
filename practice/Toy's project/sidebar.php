<style>
    nav {

position:fixed;
        background: #333;
        color: #fff;
        padding: 10px;
        font-size: 20px;
        /* top:0; */
        left:0; 
        height:100vh;
    }


    .section-ul {
        display: flex;
        flex-direction: column;
    }

    nav ul {
        list-style: none;
        padding: 0;
    }

    nav ul li {
        display: inline;
        margin-right: 10px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
        display: block;
        padding: 10px;
    }

    .nav-a.active {
        font-weight: bold;
        /* text-decoration: underline; */
        background-color: white;
        color: black;
    }

    .section {
        display: none;
        padding: 20px;
    }

    .section.active {
        display: block;
    }
</style>





<!-- Sidebar -->
<nav>
    <ul class="section-ul">
        <li><a href="#" class="nav-a" data-target="section1">Products</a></li>
        <li><a href="#" class="nav-a" data-target="section2">Customers</a></li>
        <li><a href="#" class="nav-a" data-target="section3">Brands</a></li>
        <li><a href="#" class="nav-a" data-target="section5">Category</a></li>
        <li><a href="#" class="nav-a" data-target="section8">Sub-Category</a></li>
        <li><a href="#" class="nav-a" data-target="section6">Age Group</a></li>
        <li><a href="#" class="nav-a" data-target="section7">About Us</a></li>
    </ul>
</nav>

<!-- Sections -->





<!-- <script>
                // script.js
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
                        });
                    });

                    // Optionally, show the first section by default
                    if (sections.length > 0) {
                        showSection(sections[0].id);
                    }
                });
            </script> -->



<script>
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
</script>