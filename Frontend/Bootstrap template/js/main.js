document.addEventListener("DOMContentLoaded", () => {
    const mainContent = document.getElementById("main-content");
  
    // HTML sadržaj za svaku "stranicu"
    const views = {
      dashboard: `
        <div class="container-fluid px-4">
          <h1 class="mt-4">Dashboard</h1>
          <p>Welcome to your dashboard page!</p>
        </div>
      `,
      charts: `
        <div class="container-fluid px-4">
          <h1 class="mt-4">Charts</h1>
          <p>This is where chart components will appear.</p>
        </div>
      `,
      tables: `
        <div class="container-fluid px-4">
          <h1 class="mt-4">Tables</h1>
          <p>This is the tables page content.</p>
        </div>
      `
    };

    function loadView(view) {
      mainContent.innerHTML = views[view] || `<p class="p-4 text-danger">Page not found</p>`;
    }
  

    document.querySelectorAll(".nav-link[data-view]").forEach(link => {
      link.addEventListener("click", e => {
        e.preventDefault();
        const view = link.getAttribute("data-view").replace(".html", "");
        loadView(view);
      });
    });
  

    loadView("dashboard");
  });
  
