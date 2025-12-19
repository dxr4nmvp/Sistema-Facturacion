# 🧾 Sistema de Facturación

Sistema de facturación desarrollado en **PHP + MySQL**, enfocado en la gestión administrativa básica.  
Este proyecto está pensado como base escalable para agregar módulos como productos, facturas, proveedores y control de roles.

Actualmente el sistema se encuentra en la **versión v1.1**, con el módulo de **usuarios completamente funcional**.

---

## 🚀 Características principales

### 👤 Gestión de Usuarios (v1.1)
- Crear usuarios
- Listar usuarios activos
- Editar información de usuarios
- Eliminar usuarios con confirmación
- Protección de usuarios críticos (no eliminables)
- Interfaz mejorada (UX/UI)
- Eliminación lógica mediante estado (`estatus`)

---

## 🧩 Tecnologías utilizadas

- **PHP** (programación backend)
- **MySQL** (base de datos)
- **HTML5**
- **CSS3**
- **Font Awesome** (iconos)
- **XAMPP** (entorno de desarrollo)

---

## 🗂️ Estructura del proyecto

Sistema-Facturacion/
│
├── css/
│ └── style.css
│
├── img/
│
├── sistema/
│ ├── lista_usuarios.php
│ ├── editar_usuario.php
│ ├── eliminar_confirmar_usuario.php
│ └── ...
│
├── conexion.php
├── index.php
├── hashear_admin.php
│
├── facturacion_V1.0.sql
├── facturacion_V1.1.sql
│
└── README.md

---

## 🧠 Versionado del sistema

### ✅ v1.1 – Gestión completa de usuarios (actual)
Incluye todo lo fundamental del módulo de usuarios:
- CRUD completo (Crear, Mostrar, Editar, Eliminar)
- Confirmación visual antes de eliminar
- Usuarios protegidos
- Mejoras visuales y estructura limpia

---

### 🔜 v1.2 – Búsqueda y paginación (en desarrollo)
- Buscador de usuarios
- Paginador
- Paginación aplicada a búsquedas

---

### 🔒 v2.0 – Roles y permisos (futuro)
- Gestión de roles
- Permisos por acción
- Control de acceso según rol

---

## ⚙️ Instalación y uso

1. Clona el repositorio:
   ```bash
   git clone https://github.com/dxr4nmvp/Sistema-Facturacion.git
2. Copia el proyecto dentro de:
    C:\xampp\htdocs\
3. Importa el archivo SQL correspondiente (facturacion_V1.1.sql) en MySQL.
4. Configura la conexión en:
    conexion.php
5. Inicia Apache desde XAMPP
6. Accede desde el navegador

---

## 🧪 Estado del proyecto
 
-   🟢 Activo en desarrollo
    El proyecto sigue creciendo por módulos, aplicando buenas prácticas y control de versiones.

## ✍️ Autor
-   Desarrollado por dxr4nmvp
    Estudiante de informática y desarrollo web
    📍 República Dominicana

## 📌 Nota final
-   Este proyecto es educativo y escalable.
    La estructura y el versionado están pensados para simular un sistema real en crecimiento.