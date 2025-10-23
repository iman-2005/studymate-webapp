document.addEventListener("DOMContentLoaded", () => {
  console.log(" main.js loaded successfully");

  const mainContent = document.getElementById("mainContent");
  const navLinks = document.querySelectorAll(".nav-link");

  // Map view files to required external JS initialization files
  const pageScripts = {
      "Views/charts.html": "https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js", // External lib
      "Views/tables.html": "js/tables-scripts.js" // Local initialization script
      // Add other mappings here if needed
  };

  function loadPage(page) {
      console.log("Loading page:", page);
      fetch(page)
          .then(response => {
              if (!response.ok) throw new Error("Page not found: " + page);
              return response.text();
          })
          .then(data => {
              // Clear all dynamic scripts from previous page loads before setting new content
              document.querySelectorAll('script[data-dynamic-script]').forEach(s => s.remove());
              
              mainContent.innerHTML = data;

              // CRUCIAL STEP 1: Re-run inline scripts (if any remain)
              const scripts = mainContent.querySelectorAll("script");
              scripts.forEach(script => {
                  const newScript = document.createElement("script");
                  if (script.type) newScript.type = script.type;

                  if (script.src) {
                      newScript.src = script.src;
                  } else {
                      newScript.textContent = script.textContent;
                  }
                  
                  newScript.setAttribute('data-dynamic-script', 'true');
                  document.body.appendChild(newScript).remove();
              });

              // CRUCIAL STEP 2: Load external/local initialization script if required
              const requiredScriptSrc = pageScripts[page];
              if (requiredScriptSrc) {
                  let scriptExists = document.querySelector(`script[src="${requiredScriptSrc}"]`);
                  
                  if (!scriptExists) {
                      const newScript = document.createElement("script");
                      newScript.src = requiredScriptSrc;
                      newScript.setAttribute('data-dynamic-script', 'true');
                      document.body.appendChild(newScript);
                  } else {
                      // If script is already loaded (e.g., Chart.js for both charts/dashboard),
                      // we force re-execution of its onload logic to run the initialization.
                      // For tables.html, this ensures the DOMContentLoaded in tables-scripts.js is re-triggered.
                      const event = new Event('DOMContentLoaded');
                      window.dispatchEvent(event); 
                  }
              }
          })
          .catch(error => {
              console.error(error);
              mainContent.innerHTML = `<div class="alert alert-danger text-center mt-4">Error: ${error.message}</div>`;
          });
  }

  // Load default page
  loadPage("Views/dashboard.html");

  // Sidebar link clicks (including the new Sign In link in the navbar)
  navLinks.forEach(link => {
      link.addEventListener("click", e => {
          e.preventDefault();
          const page = e.target.closest("a").getAttribute("href");
          
          if (!page.includes("login.html")) {
              navLinks.forEach(l => l.classList.remove("active"));
              e.target.closest("a").classList.add("active");
          }
          
          loadPage(page);
      });
  });
});










