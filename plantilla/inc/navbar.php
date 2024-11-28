<nav class="navbar navbar-expand-lg" style="background-color: #0f67f6; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="index.php?vista=home">
            <img src="./img/logo_tecno.png" alt="Logo" width="65" height="28">
        </a>
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation" style="color: #0f67f6;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto">
                <!-- Usuarios -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="usuariosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="opacity: 0.9;">
                        Usuarios
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="usuariosDropdown" style="background-color: #F3E5F5;">
                        <li><a class="dropdown-item" href="index.php?vista=user_new">Nuevo</a></li>
                        <li><a class="dropdown-item" href="index.php?vista=user_list">Lista</a></li>
                        <li><a class="dropdown-item" href="index.php?vista=user_search">Buscar</a></li>
                    </ul>
                </li>

                <!-- Categorías -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="categoriasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="categoriasDropdown" style="background-color: #F3E5F5;">
                        <li><a class="dropdown-item" href="index.php?vista=category_new">Nueva</a></li>
                        <li><a class="dropdown-item" href="index.php?vista=category_list">Lista</a></li>
                        <li><a class="dropdown-item" href="index.php?vista=category_search">Buscar</a></li>
                    </ul>
                </li>

                <!-- Productos -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="productosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Productos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="productosDropdown" style="background-color: #F3E5F5;">
                        <li><a class="dropdown-item" href="index.php?vista=product_new">Nuevo</a></li>
                        <li><a class="dropdown-item" href="index.php?vista=product_list">Lista</a></li>
                        <li><a class="dropdown-item" href="index.php?vista=product_category">Por categoría</a></li>
                        <li><a class="dropdown-item" href="index.php?vista=product_search">Buscar</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="index.php?vista=user_update&user_id_up=<?php echo $_SESSION['id']; ?>" class="btn btn-outline-light me-2" style="color: #6A1B9A;">
                        Mi cuenta
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?vista=logout" class="btn" style="background-color: #F3E5F5; color: #6A1B9A;">
                        Salir
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

