# StudyMate – Backend API (Milestone 3)
This backend is implemented using **pure PHP**, **FlightPHP**, **PDO**, and **MySQL**.  
It forms the REST API for the StudyMate web application and includes:

- Full CRUD for all entities  
- Service & DAO layers  
- Routing using FlightPHP  
- OpenAPI 3.0 documentation  
- Swagger UI interface  
- `.htaccess` URL rewriting support  
- JSON-based request/response model  

This README covers project structure, installation, running the API, and using the documentation.

---

## 📌 Technologies Used
- **PHP 8+**
- **FlightPHP (micro-framework)**
- **MySQL + PDO**
- **Composer**
- **Swagger UI**
- **OpenAPI 3.0.3**

---

# 📁 Project Structure
Backend/
└── api/
├── index.php
├── composer.json
├── .htaccess
├── routes/
│ ├── UsersRoutes.php
│ ├── CoursesRoutes.php
│ ├── ModulesRoutes.php
│ ├── NotesRoutes.php
│ └── RolesRoutes.php
├── services/
│ ├── BaseService.php
│ ├── UsersService.php
│ ├── CoursesService.php
│ ├── ModulesService.php
│ ├── NotesService.php
│ └── RolesService.php
├── dao/
│ ├── Database.php
│ ├── baseDAO.php
│ ├── UsersDAO.php
│ ├── CoursesDAO.php
│ ├── ModulesDAO.php
│ ├── NotesDAO.php
│ └── RolesDAO.php
├── public/
│ ├── swagger.php
│ └── api_documentation.json
└── vendor/


Final Notes:

The backend is now fully operational using:

Clean architecture

Reusable services

Valid OpenAPI documentation

Swagger UI debugging

REST conventions

Proper routing with FlightPHP
