# 🧾 Sistema de Facturación (PHP & MySQL)

Este proyecto es un **sistema básico de facturación** desarrollado con **PHP**, **MySQL** y una interfaz simple para administración de usuarios.  
Está diseñado como base para un panel administrativo en el que los administradores y supervisores pueden gestionar usuarios, mientras que otros roles (como vendedores) solo inician sesión.

---

## 🚀 Funcionalidades actuales

### 🔑 Autenticación
✔ Inicio de sesión seguro con sesiones

### 👤 Gestión de usuarios
✔ Registro de usuarios desde el panel administrativo  
✔ Listado de usuarios  
✔ Edición de usuarios  
✔ Contraseñas hasheadas con `password_hash()`  
✔ Prevención de duplicados en usuario/correo

### 🔒 Seguridad básica
✔ Protección de rutas mediante sesión  
✔ Validaciones en formularios

---

##  Tecnologías utilizadas

- PHP 8+
- MySQL
- HTML5
- CSS3
- JavaScript (básico)
- XAMPP (entorno local)

## Base de datos

Base de datos: facturacion

Tabla principal: usuario

Campos:

idusuario

nombre

correo

usuario

clave

rol

Las contraseñas se almacenan hasheadas.


## Usuario inicial (ejemplo)

Crear manualmente desde la base de datos o desde el sistema una vez funcional.

##  ⚠️ Nota importante

Este proyecto aún está en desarrollo.
Faltan módulos como:

Clientes

Productos

Proveedores

Facturación

Control avanzado de roles

Estos serán agregados en futuras versiones.
