/**
 * Script to initialize Simple-Datatables when the 'tables.html' content is loaded.
 */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Ensure the Simple-Datatables library is loaded globally
    if (typeof simpleDatatables === 'undefined') {
        // If not loaded, we load it dynamically.
        // This is a robust way to ensure the library is present before initialization.
        const datatablesScript = document.createElement('script');
        datatablesScript.src = "https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js";
        
        // Wait for the library to load before initializing the table
        datatablesScript.onload = () => {
            initializeDatatable();
        };
        document.body.appendChild(datatablesScript);
    } else {
        // Library is already loaded, proceed with initialization
        initializeDatatable();
    }
});

function initializeDatatable() {
    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        // Check if the Datatable has already been initialized on this element
        if (!datatablesSimple.classList.contains('dataTable-initialized')) {
            try {
                new simpleDatatables.DataTable(datatablesSimple);
                datatablesSimple.classList.add('dataTable-initialized'); // Mark as initialized
                console.log("Simple-Datatable initialized successfully.");
            } catch (error) {
                console.error("Error initializing Simple-Datatable:", error);
            }
        }
    }
}