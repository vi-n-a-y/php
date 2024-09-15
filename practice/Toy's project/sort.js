
document.addEventListener('DOMContentLoaded', () => {
    const table = document.querySelector('table');
    const headers = table.querySelectorAll('th[data-sort]');
    let isAsc = true;

    headers.forEach(header => {
        header.addEventListener('click', () => {
            const sortBy = header.getAttribute('data-sort');
            sortTable(sortBy, isAsc);
            isAsc = !isAsc; // Toggle sorting order
        });
    });

    function sortTable(sortBy, isAsc) {
        const rows = Array.from(table.querySelectorAll('tbody tr'));
        const headerIndex = Array.from(headers).findIndex(header => header.getAttribute('data-sort') === sortBy);

        rows.sort((a, b) => {
            const cellA = a.children[headerIndex].textContent.trim();
            const cellB = b.children[headerIndex].textContent.trim();

            const aValue = isNaN(cellA) ? cellA : parseFloat(cellA);
            const bValue = isNaN(cellB) ? cellB : parseFloat(cellB);

            if (aValue < bValue) return isAsc ? -1 : 1;
            if (aValue > bValue) return isAsc ? 1 : -1;
            return 0;
        });

        const tbody = table.querySelector('tbody');
        rows.forEach(row => tbody.appendChild(row)); // Reattach rows in sorted order
    }
});
// pagination
document.addEventListener('DOMContentLoaded', function() {
    const rowsPerPage = 5; // Records per page
    const tbody = document.getElementById('productBody');
    const paginationControls = document.getElementById('paginationControls');
    const rows = Array.from(tbody.querySelectorAll('tr'));
    const totalRows = rows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);

    // Create pagination controls
    const createPaginationControls = () => {
        paginationControls.innerHTML = '';

        // Create Previous button
        const prevButton = document.createElement('button');
        prevButton.textContent = 'Previous';
        prevButton.className = 'pagination-btn previous';
        // prevButton.disabled = true; // Default to disabled
        prevButton.addEventListener('click', () => {
            const currentPage = parseInt(paginationControls.getAttribute('data-current-page'), 10);
            if (currentPage > 1) {
                showPage(currentPage - 1);
            }
        });
        paginationControls.appendChild(prevButton);

        // Create page buttons
        for (let i = 1; i <= totalPages; i++) {
            const button = document.createElement('button');
            button.textContent = i;
            button.className = 'pagination-btn';
            button.addEventListener('click', () => {
                showPage(i);
            });
            paginationControls.appendChild(button);
        }

        // Create Next button
        const nextButton = document.createElement('button');
        nextButton.textContent = 'Next';
        nextButton.className = 'pagination-btn next';
        nextButton.disabled = totalPages <= 1; // Default to disabled if only one page
        nextButton.addEventListener('click', () => {
            const currentPage = parseInt(paginationControls.getAttribute('data-current-page'), 10);
            if (currentPage < totalPages) {
                showPage(currentPage + 1);
            }
        });
        paginationControls.appendChild(nextButton);
        
        // Set current page
        paginationControls.setAttribute('data-current-page', 1);
    };

    // Show specific page
    const showPage = (pageNumber) => {
        const start = (pageNumber - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        rows.forEach((row, index) => {
            row.style.display = (index >= start && index < end) ? '' : 'none';
        });

        // Update current page and button states
        paginationControls.setAttribute('data-current-page', pageNumber);
        updateButtonStates(pageNumber);
    };

    // Update button states based on the current page
    const updateButtonStates = (currentPage) => {
        const buttons = paginationControls.querySelectorAll('button.pagination-btn');
        const prevButton = buttons[0]; // Assuming the first button is Previous
        const nextButton = buttons[buttons.length - 1]; // Assuming the last button is Next

        // Update Previous and Next button states
        prevButton.disabled = currentPage === 1;
        nextButton.disabled = currentPage === totalPages;

        // Update active page button state
        buttons.forEach((button) => {
            if (button !== prevButton && button !== nextButton) {
                button.classList.toggle('active', parseInt(button.textContent, 10) === currentPage);
            }
        });
    };

    createPaginationControls();
    showPage(1); // Show the first page by default
});
