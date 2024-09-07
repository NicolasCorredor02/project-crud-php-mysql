<?php include("./php/db.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- link bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <!-- link icons Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- link css -->
  <link rel="stylesheet" href="css/style.css" />
  <title>CRUD - MYSQL - PHP</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-dark bg-dark">
      <ul class="container">
        <li>
          <a href="./index.php" class="navbar-brand">Students Register</a>
        </li>
      </ul>
    </nav>
  </header>
  <main>
    <section class="container">
      <div class="row">
        <div class="col-5">
          <!-- Validacion con PHP para ver si existe los datos 'message' en la variable SESSION -->
          <?php if(isset($_SESSION['message'])){ ?>
          <!-- Si existe el valor message dentro de la variable SESSION se
          muestra una alerta -->
          <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php session_unset();}?>

          <div class="card">
            <div class="card-title">
              <h1 class="fs-5">Student registration form</h1>
            </div>
            <div class="card-body">
              <form action="./php/register.php" method="post" class="d-flex flex-column gap-4">
                <div>
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" id="name" class="form-control" />
                </div>
                <div>
                  <label for="dni" class="form-label">DNI</label>
                  <input type="number" min="1" name="dni" id="dni" class="form-control" />
                </div>
                <div>
                  <label class="form-label">Genre</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="rbtn-genre" id="rbtn-genre" value="M" checked />
                    <label class="form-check-label" for="rbtn-1"> Man </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="rbtn-genre" id="rbtn-genre" value="W" />
                    <label class="form-check-label" for="rbtn-1">
                      Woman
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="rbtn-genre" id="rbtn-genre" value="N" />
                    <label class="form-check-label" for="rbtn-1">
                      I prefer not to say
                    </label>
                  </div>
                </div>
                <div>
                  <label for="birth-date" class="form-label">Birth date</label>
                  <input type="date" name="birth-date" id="birth-date" />
                </div>
                <div>
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="example@email.com" />
                </div>
                <input type="submit" class="btn btn-success btn-block" name="register-student" value="Submit" />
              </form>
            </div>
          </div>
        </div>
        <div class="col-7">
            <table class="table table-bordered"> 
              <thead>
                <tr>
                  <th>Student</th>
                  <th>DNI</th>
                  <th>Genre</th>
                  <th>Birth Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <!-- consulta de registros de la tabla para la muestra -->
               <?php
                $query = "SELECT * FROM person";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                  die("Consulta fallida: " . mysqli_error($conn));
                }

                  while($row = mysqli_fetch_array($result)){ ?>
                    <tr>
                      <td><?php echo $row['name'] ?></td>
                      <td><?php echo $row['dni'] ?></td>
                      <td><?php echo $row['genre'] ?></td>
                      <td><?php echo $row['birth_date'] ?></td>
                      <td> 
                        <a href="./php/edit.php?id=<?php echo $row['id'] ?>"><i class="bi bi-pencil-fill btn btn-secondary"></i></a>
                        <a href="./php/delete.php?id=<?php echo $row['id']?>"><i class="bi bi-trash3-fill btn btn-danger"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
              </tbody>
            </table>

        </div>
      </div>
    </section>
  </main>
  <footer></footer>
  <!-- script to bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>