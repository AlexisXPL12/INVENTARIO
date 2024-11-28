<div class="container py-5">
    <h1 class="text-center fw-bold mb-3">Usuarios</h1>
    <h2 class="text-center text-muted mb-4">Nuevo Usuario</h2>

    <div class="form-rest mb-4 mt-4"></div>

    <form action="./php/usuario_guardar.php" method="POST" class="FormularioAjax" autocomplete="off">
        <!-- Fila 1: Nombres y Apellidos -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="usuario_nombre" class="form-label">Nombres</label>
                <input 
                    type="text" 
                    class="form-control shadow-sm" 
                    id="usuario_nombre" 
                    name="usuario_nombre" 
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" 
                    maxlength="40" 
                    required 
                >
            </div>
            <div class="col-md-6">
                <label for="usuario_apellido" class="form-label">Apellidos</label>
                <input 
                    type="text" 
                    class="form-control shadow-sm" 
                    id="usuario_apellido" 
                    name="usuario_apellido" 
                    pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" 
                    maxlength="40" 
                    required 
                >
            </div>
        </div>
        <!-- Fila 2: Usuario y Email -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="usuario_usuario" class="form-label">Usuario</label>
                <input 
                    type="text" 
                    class="form-control shadow-sm" 
                    id="usuario_usuario" 
                    name="usuario_usuario" 
                    pattern="[a-zA-Z0-9]{4,20}" 
                    maxlength="20" 
                    required 
                >
            </div>
            <div class="col-md-6">
                <label for="usuario_email" class="form-label">Email</label>
                <input 
                    type="email" 
                    class="form-control shadow-sm" 
                    id="usuario_email" 
                    name="usuario_email" 
                    maxlength="70" 
                >
            </div>
        </div>
        <!-- Fila 3: Contraseña y Repetir contraseña -->
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <label for="usuario_clave_1" class="form-label">Clave</label>
                <input 
                    type="password" 
                    class="form-control shadow-sm" 
                    id="usuario_clave_1" 
                    name="usuario_clave_1" 
                    pattern="[a-zA-Z0-9$@.-]{7,100}" 
                    maxlength="100" 
                    required 
                >
            </div>
            <div class="col-md-6">
                <label for="usuario_clave_2" class="form-label">Repetir Clave</label>
                <input 
                    type="password" 
                    class="form-control shadow-sm" 
                    id="usuario_clave_2" 
                    name="usuario_clave_2" 
                    pattern="[a-zA-Z0-9$@.-]{7,100}" 
                    maxlength="100" 
                    required 
                >
            </div>
        </div>
        <!-- Botón Guardar -->
        <div class="text-center">
            <button type="submit" class="btn btn-info text-white rounded-pill px-5 py-2 shadow-sm">
                Guardar
            </button>
        </div>
    </form>
</div>
