# Instalación Wordpress. Creación plantilla personalizada. Integración en WP del Formulario de Contacto de la sesión 1.
### Prácticas Codenode · Sesión 2

---

## 📋 Descripción del Proyecto

Este proyecto documenta la instalación de WordPress en un entorno local con XAMPP y la integración del formulario de contacto creado en la sesión 1 de estas prácticas. Para ello, a partir de un tema hijo basado en Twenty Twenty, se ha creado una plantilla reutilizable llamada **Codenode** que permita extender funcionalidades en futuras sesiones sin modificar el tema original.

---

## 🛠️ Entorno y Tecnologías Utilizadas

### Software Base
- **XAMPP 8.2.12** en Windows
- **Apache** corriendo en el puerto **8080**
- **MySQL (MariaDB 10.4.32)** en el puerto **3306**
- **WordPress** (última versión estable)

### Stack de Desarrollo
- **PHP** → Plantilla personalizada y validación del servidor
- **CSS** → Estilos adaptados para WordPress
- **JavaScript** → Validación en el cliente
- **Twenty Twenty** → Tema padre del tema hijo Codenode

---

## ⚙️ Parte 1: Instalación de WordPress en Local

### Problema con los puertos y con panel de control de XAMPP

El puerto 80 estaba ocupado por otro proceso, por lo que Apache no arrancaba desde el panel de XAMPP. MySQL tampoco arranca desde el panel de control.

**Solución:** Configurar Apache en el puerto 8080 y arrancar ambos manualmente desde CMD.

### Cómo arrancar el entorno

Abrir **dos ventanas de CMD como Administrador** y ejecutar:

**Ventana 1 - Apache:**
```cmd
C:\xampp\apache\bin\httpd.exe
```

**Ventana 2 - MySQL:**
```cmd
C:\xampp\mysql\bin\mysqld.exe --console
```

> ⚠️ **Importante:** No cerrar ninguna de las dos ventanas mientras se trabaja con el proyecto.

### Verificar que el entorno funciona

- **XAMPP Dashboard:** http://localhost:8080
- **phpMyAdmin:** http://localhost:8080/phpmyadmin

### 1. Crear la base de datos en phpMyAdmin

1. Acceder a http://localhost:8080/phpmyadmin
2. Credenciales: usuario y contraseña
3. Clic en **Nueva**
4. Nombre de la base de datos: `wordpress_db`
5. Cotejamiento: `utf8mb4_general_ci`
6. Clic en **Crear**

### 2. Descargar e instalar WordPress

1. Descargar WordPress desde https://wordpress.org/download
2. Extraer el archivo ZIP en `C:\xampp\htdocs\wordpress\`
3. Acceder a http://localhost:8080/wordpress

### 3. Configurar WordPress

En el asistente de instalación introducir los siguientes datos:

| Campo | Valor |
|-------|-------|
| Nombre de la base de datos | `wordpress_db` |
| Nombre de usuario | `root` |
| Contraseña | *(vacía)* |
| Servidor de la base de datos | `localhost` |
| Prefijo de tabla | `wp_` |

### 4. Datos del sitio

| Campo | Valor |
|-------|-------|
| Título del sitio | `Sesion2 - Instalación Wordpress` |
| Usuario admin | *(definido por el usuario)* |
| Visibilidad en buscadores | Desactivada (no indexar) |

### 5. Configurar Permalinks

1. Panel de administración → **Ajustes** → **Enlaces permanentes**
2. Seleccionar **Nombre de la entrada**
3. Guardar cambios

---

## 🎨 Parte 2: Integración del Formulario de Contacto

### Estructura de archivos del tema hijo **Codenode**

```
wp-content/themes/codenode/
├── style.css          → Cabecera del tema hijo e importación del tema padre
├── functions.php      → Carga de estilos y scripts
├── page-contact.php   → Plantilla personalizada del formulario de contacto
├── contact-form.css   → Estilos del formulario Sesion1 adaptados a WordPress
└── contact-form.js    → Validación del formulario Sesion1 en el cliente
```

### Proceso de integración

#### 1. Creación del tema hijo **Codenode**

Para poder crear plantillas personalizadas sin modificar el tema original, se ha creado un tema hijo de **Twenty Twenty** llamado **Codenode**. Esto garantiza que los cambios se mantengan aunque el tema padre se actualice.

El tema hijo requiere dos archivos mínimos:

**`style.css`** → Cabecera que declara el tema y referencia al padre


#### 2. Creación de la plantilla Contacto

Con el tema hijo activo, se crea el archivo `page-contact.php` que define la plantilla personalizada. Esta plantilla integra:

- El formulario HTML semántico de la Sesión 1
- La validación PHP en el servidor
- La carga condicional del CSS y JS solo en la página de contacto

**Cabecera de la plantilla:**
```php
<?php
/*
Template Name: Contact
*/
?>
```

#### 3. Adaptación del CSS y JS

Los archivos `styles.css` y `script.js` de la Sesión 1 se han renombrado y adaptado:

- **`contact-form.css`** → Todos los selectores se han acotado a `.contact-section` para no interferir con el layout de WordPress
- **`contact-form.js`** → Sin cambios, funciona igual que en la Sesión 1


#### 4. Creación de la página en WordPress

Desde el panel de administración se crea la página Contact:

1. **Páginas** → **Añadir nueva**
2. **Título:** Contacto
3. **Slug:** `contact`
4. **Plantilla:** Seleccionar "Contacto" (la plantilla personalizada)
5. **Publicar**

---

## 🔗 URLs de acceso

| Recurso | URL |
|---------|-----|
| **Frontend** | http://localhost:8080/wordpress |
| **Panel admin** | http://localhost:8080/wordpress/wp-admin |
| **phpMyAdmin** | http://localhost:8080/phpmyadmin |
| **Página de contacto** | http://localhost:8080/wordpress/contact/ |

---

## 📝 Parte 3: Opcional

Tareas adicionales para completar el proyecto:

- [ ] Crear 2 entradas de blog con título, párrafos e imagen
- [ ] Configurar el menú de navegación con las páginas del sitio
- [ ] Añadir widgets personalizados en la barra lateral
- [ ] Personalizar el footer del tema 
- [ ] Crear un favicon para personalizar la web


---

## 🎯 Características del Formulario

### Validación Cliente (JavaScript)
- Validación en tiempo real de campos
- Mensajes de error personalizados
- Prevención de envío con datos inválidos

### Validación Servidor (PHP)
- Sanitización de datos
- Validación de formato de email
- Protección contra inyecciones
- Mensajes de feedback al usuario

### Accesibilidad
- Formulario semántico con etiquetas apropiadas
- Atributos ARIA para lectores de pantalla
- Navegación por teclado funcional

---

## 📚 Recursos y Referencias

- [Documentación oficial de WordPress](https://wordpress.org/documentation/)
- [Twenty Twenty Theme](https://wordpress.org/themes/twentytwenty/)
- [XAMPP Documentation](https://www.apachefriends.org/docs/)
- [PHP Manual](https://www.php.net/manual/es/)

---

## 👨‍💻 Desarrollo

Desarrollado durante las prácticas de DAW en **Codenode**

### Autor
*Alba Martín*

### Versión
1.0 - Sesión 2

---

## 📄 Licencia

Este proyecto es de uso educativo y forma parte de las prácticas del curso.
