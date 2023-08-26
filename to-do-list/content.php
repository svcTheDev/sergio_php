<?php

session_start();

require_once('db_connection.php');

require_once('all_views/task_managment.php'); 
  

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/to_do_classes.css">
</head>
<body>

    <?php
    if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    }
if (isset($_SESSION['username'])) {
    ?>
            <h1 class="text-center pt-3"> Ahora tienes acceso a la págin</h1>
            <h1 class="text-center mt-3">
            <?php
              echo $_SESSION['username'] . '👌';
    ?>
            </h1>

        <section class="container todolist">
            <h1 class="text-center m-3">To-do-list</h1>
                <?php 
                
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    
                  } 

                  
                ?>
                <!--  echo htmlspecialchars($_SERVER['PHP_SELF']); -->
                <form class='login-form' action="content.php" method="POST" class="text-center">
                    <input type="text" name="task" id="task" placeholder="Escribe tu tarea" class="p-2">
                    <input type="date" name="date" id="date" placeholder="Selecciona una fecha" class="p-2">
                    <input type="submit" name="save_submit" value="GUARDAR" class="tl--save p-2">
                    <!-- <input type="submit" name="view_submit" value="VER TAREAS" class="p-2"> -->
                </form>

        <div class="table-wrapper m-3">
            <table class="table table-hover table-bordered m-4">
              <thead>
                <tr>
                  <th>Tarea</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Terminar proyecto</td>
                  <td>
                    21/08/2023
                </td>
                  <td>Completado</td>
                  <td>
                    <button class="btn btn-danger" ng-click="delete($index)">
                      Delete
                    </button>
                    <button class="btn btn-success" ng-click="finished($index)">
                      Finished
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
                  </div>
                  <?php 
                    if (isset($_SESSION['message2'])) {
                      echo $_SESSION['message2'];
                      unset($_SESSION['message']);
                    }
                  ?>
        </section>

        <p class="text-white text-center mt-3">
           ¿Ya te vas?
            <a href="all_views/destroy.php" class="lf--forgot">
            Salir de la página</a>
        </p>


    <?php
} else {
    echo "<script>
                    alert('No has iniciado sessión')
                    window.location.href = 'all_views/login.php';
                 </script>";
}
?>
        <!-- <script src="/js/functions.js"></script> -->
</body>
</html>
