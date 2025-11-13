<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>StudyMate API Documentation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swagger-ui-dist/swagger-ui.css">
</head>

<body>
<div id="swagger-ui"></div>

<script src="https://cdn.jsdelivr.net/npm/swagger-ui-dist/swagger-ui-bundle.js"></script>

<script>
window.onload = () => {
    SwaggerUIBundle({
        url: "api_documentation.json",
        dom_id: "#swagger-ui"
    });
};
</script>

</body>
</html>




