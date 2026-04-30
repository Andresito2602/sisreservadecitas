# 🏥 SIS Medical — Sistema de Reserva de Citas Médicas

Sistema web desarrollado con **Laravel 10** para la gestión integral de una clínica médica. Permite administrar pacientes, doctores, consultorios, horarios, reservas de citas, historial clínico y pagos, con control de acceso basado en roles.

---

## 📋 Módulos del sistema

### 👤 Usuarios
Gestión de cuentas de acceso al sistema. El administrador puede crear, editar y eliminar usuarios, asignándoles roles según su función dentro de la clínica.

### 👩‍💼 Secretarias
Registro del personal administrativo vinculado a una cuenta de usuario. Las secretarias tienen acceso a la gestión de pacientes, consultorios, doctores, horarios y pagos.

### 🧑‍⚕️ Doctores
Registro de médicos con sus datos profesionales (especialidad, licencia médica). Cada doctor está vinculado a una cuenta de usuario con rol `doctor`, lo que le permite acceder al historial clínico de sus pacientes.

### 🏢 Consultorios
Administración de los espacios físicos de atención, incluyendo nombre, ubicación, capacidad, especialidad y estado de disponibilidad.

### 🗓️ Horarios
Configuración de la disponibilidad de cada doctor por día y rango horario en un consultorio específico. El sistema valida automáticamente que no existan solapamientos de horario.

### 📅 Reservas de Citas
Los usuarios registrados pueden reservar citas médicas seleccionando consultorio, doctor, fecha y hora. El sistema valida la disponibilidad del doctor y previene reservas duplicadas. Incluye calendario visual con FullCalendar y generación de reportes en PDF.

### 📁 Historial Clínico
Los doctores y administradores pueden registrar el historial médico de cada paciente por visita, incluyendo diagnóstico y resultado. Permite buscar el historial completo de un paciente por carnet de identidad e imprimir un PDF con todos sus diagnósticos.

### 💳 Pagos
Registro de pagos asociados a pacientes y doctores. Genera un comprobante de pago en PDF con código QR, presentado en formato doble (original y copia) en una sola hoja.

### ⚙️ Configuraciones
Datos institucionales de la clínica (nombre, dirección, teléfono, correo y logo) utilizados en el encabezado de todos los documentos PDF generados por el sistema.

---

## 🛠️ Tecnologías utilizadas

| Tecnología | Versión |
|---|---|
| PHP | 8.3 |
| Laravel | 10 |
| MySQL | 5.7+ |
| Node.js | LTS |
| AdminLTE | 3 |
| Spatie Laravel Permission | 6 |
| barryvdh/laravel-dompdf | 3 |
| endroid/qr-code | 5 |
| FullCalendar | 6 |
| DataTables | 1.13 |

---

## ⚙️ Instalación paso a paso

### 1. Requisitos previos

Instala los siguientes programas antes de continuar:

- **Node.js** — Descarga la última versión LTS desde [nodejs.org](https://nodejs.org)
- **WampServer 64-bit** — Descarga desde [wampserver.com](https://www.wampserver.com). Instala también las librerías **Visual C++ Redistributable** que el instalador requiere (el propio instalador las indica si faltan)
- **Composer** — Descarga desde [getcomposer.org](https://getcomposer.org/download). Durante la instalación, selecciona la versión de PHP **8.3** ubicada en `C:\wamp64\bin\php\php8.3.x\php.exe`

---

### 2. Crear el proyecto base de Laravel

Abre **Node.js Command Prompt** y ejecuta:

```bash
composer create-project "laravel/laravel:^10.0" sisreservadecitas
```

Esto crea la estructura base de Laravel en la carpeta `sisreservadecitas`.

---

### 3. Instalar el sistema

1. Descarga este repositorio como ZIP y extráelo. Obtendrás una carpeta llamada `sisreservadecitas`.
2. Copia esa carpeta y pégala en:
   ```
   C:\wamp64\www\
   ```
   Reemplaza los archivos existentes si se te solicita.

---

### 4. Configurar la base de datos

1. Inicia **WampServer** (el ícono de la bandeja debe estar en verde).
2. Abre tu navegador y ve a:
   ```
   http://localhost/phpmyadmin
   ```
3. Ingresa con usuario `root` y contraseña vacía (configuración por defecto de WAMP).
4. Crea una nueva base de datos con el nombre:
   ```
   sisreservadecitasmedicas
   ```
5. Selecciona la base de datos recién creada, ve a la pestaña **Importar** y sube el archivo `sisreservadecitasmedicas.sql` incluido en este repositorio.
6. Haz clic en **Continuar** para importar.

---

### 5. Configurar el archivo de entorno

En la carpeta `C:\wamp64\www\sisreservadecitas`, abre el archivo `.env` y verifica que los datos de conexión sean correctos:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sisreservadecitasmedicas
DB_USERNAME=root
DB_PASSWORD=
```

---

### 6. Instalar dependencias PHP

Abre **Node.js Command Prompt**, navega a la carpeta del proyecto y ejecuta:

```bash
cd C:\wamp64\www\sisreservadecitas
composer install
```

---

### 7. Acceder al sistema

Abre tu navegador y ve a:

```
http://localhost/sisreservadecitas/public/
```

---

## 🔐 Credenciales de acceso

| Rol | Correo | Contraseña |
|---|---|---|
| Administrador | admin@admin.com | 12345678 |

> El administrador puede crear usuarios con roles de secretaria, doctor y usuario desde el panel de administración.

---

## 👥 Roles del sistema

| Rol | Acceso |
|---|---|
| `admin` | Acceso completo a todos los módulos |
| `secretaria` | Pacientes, consultorios, doctores, horarios y pagos |
| `doctor` | Historial clínico de sus pacientes |
| `usuario` | Reserva de citas médicas |

---

## 📄 Licencia

Este proyecto es de uso educativo y académico.
