
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

