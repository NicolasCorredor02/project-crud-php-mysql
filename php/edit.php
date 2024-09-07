<?php
    include("./db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM person WHERE id = '$id'";
        $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) == 1) {
            //Como solo es un estudiante, no se hace un bucle, ya que solo debe trater un regitro
            $row = mysqli_fetch_array($result);
            $name = $row['name'];
            $dni = $row['dni'];
            $email = $row['email'];
        }
    }


    if (isset($_POST['update-student'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];


        $query = "UPDATE person set name = '$name', email = '$email' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);


        $_SESSION['message'] = "Student update succesfully";
        $_SESSION['message_type'] = "warning";

        header("Location: ../index.php" );
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- link bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <!-- link icons Bootstrap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <!-- link css -->
    <link rel="stylesheet" href="css/style.css" />
    <title>CRUD - MYSQL - PHP</title>
  </head>

  <body>
    <header>
      <nav class="navbar navbar-dark bg-dark">
        <ul class="container">
          <li>
            <a href="../index.php" class="navbar-brand">Students Register</a>
          </li>
        </ul>
      </nav>
    </header>
    <main>
      <section class="container p-4">
        <div class="row">
          <div class="col-5">
            <div class="card">
              <div class="card-title">
                <h1 class="fs-5">Update Student</h1>
              </div>
              <div class="card-body">
                <form
                  action="./edit.php?id=<?php echo $_GET['id'] ?>"
                  method="post"
                  class="d-flex flex-column gap-4"
                >
                  <div>
                    <label for="name" class="form-label">Name</label>
                    <input
                      type="text"
                      name="name"
                      id="name"
                      class="form-control"
                      value="<?php echo $name ?>"
                    />
                  </div>
                  <div>
                    <label for="dni" class="form-label">DNI</label>
                    <input
                      type="number"
                      min="1"
                      name="dni"
                      id="dni"
                      class="form-control"
                      value="<?php echo $dni ?>"
                      disabled
                    />
                  </div>
                  <div>
                    <label for="email" class="form-label">Email</label>
                    <input
                      type="email"
                      name="email"
                      id="email"
                      class="form-control"
                      value="<?php echo $email ?>"
                      placeholder="update@email.com"
                    />
                  </div>
                  <input
                    type="submit"
                    class="btn btn-success btn-block"
                    name="update-student"
                    value="Update student"
                  />
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer></footer>
    <!-- script to bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
