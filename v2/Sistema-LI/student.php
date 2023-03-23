<!DOCTYPE html>
<html>
  <head>
    <title>Perfil Estudiante</title>
    <style>
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
      }

      header {
        background-color: #022B3B;
        color: #fff;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .logo {
        height: 70px;
      }
      
      .logo img {
        height: 100%;
      }

      h1 {
        margin: 0;
        font-size: 28px;
        font-weight: normal;
      }

      nav {
        background-color: #f2f2f2;
        padding: 10px;
      }

      ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-between;
      }

      li {
        margin-right: 10px;
      }

      a {
        color: #333;
        text-decoration: none;
        padding: 10px;
        display: block;
        border: 1px solid #333;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s ease;
      }

      a:hover {
        background-color: #333;
        color: #fff;
      }

      section {
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
      }

      .card {
        background-color: #f2f2f2;
        border-radius: 5px;
        padding: 20px;
        margin: 10px;
        flex-basis: calc(33.33% - 20px);
      }

      .card h2 {
        margin: 0;
        font-size: 18px;
      }

      .card p {
        margin: 10px 0;
      }



.menu-container {
 position: relative;
}

.menu {
  list-style: none;
  margin: 0;
  padding: 0;
  float: right;
  
}

.menu li {
  float: left;
  position: relative;
  border: 1px solid white;

}

.menu a {   
  display: block;
  padding: 10px 30px;
  text-decoration: #fff;
  color: #fff;
}

.menu li:hover > a {
  background-color: #aaa;
}

.submenu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background-color: #022B3B;
  border: 1px solid #022B3B;
  border-bottom: 1px solid white;
  padding: 10px;
}

.menu li:hover > .submenu {
  display: block;
}
 
    footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #022B3B;
    color:#fff;
    padding: 10px;
    width: 100%;
    position: absolute;
    bottom: 0;
    left: 0;
    }
    .left-img {
    margin-right: 20px;
    width: 85px;
    }

    .right-img {
    margin-left: 20px;
    width: 85px;
    }



    </style>
  </head>
  <body>
    <header>

    <!-- este div es para agregar el logo de prowess a la izquierda -->

    <div class="logo">
        <img src="/images/icon2.png" alt="Logo">
      </div>
      <div class="profile">


     <!-- desde aqui creamos menu desplegable a la derecha -->

     <ul class="menu">
  <li>
    <a href="#">Módulo</a>
    <ul class="submenu">
      <li><a href="#">Submenú 1</a></li>
      <li><a href="#">Submenú 2</a></li>
      <li><a href="#">Submenú 3</a></li>
    </ul>
  </li>
  <li>
    <a href="#">Ayuda</a>
    <ul class="submenu">
      <li><a href="#">Submenú 1</a></li>
      <li><a href="#">Submenú 2</a></li>
      <li><a href="#">Submenú 3</a></li>
    </ul>
  </li>
  <li>
    <a href="#">Estudiante</a>
    <ul class="submenu">
      <li><a href="#">Submenú 1</a></li>
      <li><a href="#">Submenú 2</a></li>
      <li><a href="#">Submenú 3</a></li>
    </ul>
  </li>
</ul>


    </header>
    <nav>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Perfil</a></li>
        <li><a href="#">Notificaciones</a></li>
        <li><a href="#">Configuración</a></li>
        <li><a href="./user/">Cerrar Sesión</a></li>
      </ul>
    </nav>
    <section>
      <div class="card">
        <h2>Información Personal</h2>
        <p>Nombre: Juan Pérez</p>
        <p>Edad: 22 años</p>
        <p>Correo Electrónico: juan.perez@gmail.com</p>
      </div>
      <div class="card">
        <h2>Calificaciones</h2>
        <p>Matemáticas: 90%</p>
        <p>Historia: 80%</p>
        <p>Ciencias: 85%</p>
      </div>
      <div class="card">
        <h2>Asistencia</h2>
        <p>Asistencias: 90%</p>
        <p>Faltas: 10%</p>
      </div>
    </section>




   <!-- pie de pagina satánico -->
   
   <footer>
    <img src="/images/espe_logo.png" alt="Logo ESPE" class="left-img">
    <p>Derechos reservados ©  2023 <href="https://www.prowessec.com">Universidad de las Fuerzas Armadas ESPE</p>
    <img src="/images/acnur_logo.png" alt="Logo ACNUR" class="right-img">
    </footer>

  </body>
</html>
