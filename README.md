# SIS Medical — Sistema de Gestión de Reservas de Citas Médicas

Sistema web desarrollado con **Laravel** para la gestión integral de una clínica médica. Permite administrar pacientes, doctores, consultorios, horarios, reservas de citas, historial clínico y pagos, con control de acceso por roles.

---

## Tecnologías

- **Backend:** PHP 8.x / Laravel 10
- **Frontend:** AdminLTE + Bootstrap 4 + Inter Font (Google Fonts)
- **Base de datos:** MySQL
- **Autenticación:** Laravel Auth + Spatie Permission (roles y permisos)
- **PDF:** DomPDF
- **Calendario:** FullCalendar 6
- **Tablas:** DataTables

---

## Módulos

| Módulo | Descripción |
|---|---|
| Autenticación | Login, logout y control de acceso por roles |
| Usuarios | Gestión de usuarios del sistema |
| Secretarias | Registro y administración de secretarias |
| Pacientes | Registro completo con datos médicos y de contacto |
| Consultorios | Gestión de consultorios por especialidad |
| Doctores | Registro de doctores con usuario asociado |
| Horarios | Asignación de horarios por doctor y consultorio |
| Reservas | Calendario de citas con FullCalendar |
| Historial Clínico | Registro médico por paciente con exportación PDF |
| Pagos | Gestión de pagos con generación de recibos PDF |
| Configuraciones | Nombre, logo y datos del sistema |

---

## Roles

- **Admin** — Acceso total al sistema
- **Secretaria** — Gestión de pacientes y reservas
- **Doctor** — Visualización de sus citas
- **Paciente** — Reserva de citas médicas

---

## Instalación

```bash
# Clonar el repositorio
git clone https://github.com/Andresito2602/sisreservadecitas.git
cd sisreservadecitas

# Instalar dependencias
composer install
npm install

# Configurar entorno
cp .env.example .env
php artisan key:generate

# Configurar base de datos en .env y ejecutar migraciones
php artisan migrate --seed

# Enlace de almacenamiento para logos
php artisan storage:link

# Iniciar servidor
php artisan serve
```

---

## Capturas

El sistema cuenta con una interfaz moderna con sidebar oscuro, tipografía Inter, cards de estadísticas con borde de color y dashboard con saludo personalizado por usuario y rol.

---

## Autor

**Andres Villamil**  
Estudiante de Análisis y Desarrollo de Software — SENA
