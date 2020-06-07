<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/logo.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stylesContent.css">
    <title>Libros leidos</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-sm navbar-light sticky-top" style="background-color: #337EE8;">
          <div class="navbar-nav mr-auto">
              <a class="navbar-brand">
                  <img src="images/book.png" width="30" height="30" class="d-inline-block align-top" alt="Logo Book">
                  <?php
                      if(isset($_GET['user'])){
                          echo "Bienvenidx ".$_GET['user'];
                      }
                  ?>
              </a>
          </div>
            <?php
                    echo '<form class="form-inline my-2 my-lg-0" action="API/books/'.$_GET['email'].'/activate" method="POST">';
            ?>
                 <div class="form-row align-items-center">
                    <div class="col-auto">
                        <input id="autorText" name="autor" type="text" class="form-control" placeholder="Autor">
                    </div>
                    <div class="col-auto">
                        <input id="tituloText" name="title" type="text" class="form-control" placeholder="Titulo">
                    </div>
                    <div class="col-auto">
                        <select name="status" id="inputState" class="form-control">
                            <option value="read">Leido</option>
                            <option value="nread">No leido</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <select name="action" id="inputState" class="form-control">
                            <option value="add">Agregar</option>
                            <option value="mod">Modificar</option>
                            <option value="delete">Eliminar</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-dark">Aplicar</button>
                    </div>
                </div>
            </form>
        </nav>
        <p class="h2 text-center">Libros leidos</p>
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Autor</th>
                        <th scope="col">Titulo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data='http://angel/practicas/proyecto/API/books/'.$_GET['email'].'/start';
                    $dataJSON=file_get_contents($data);
                    $books=json_decode($dataJSON);

                    foreach ($books as $book ) {
                        if($book->status=='read'){
                            $sautor="'".$book->autor."'";
                            $stitle="'".$book->titulo."'";
                            echo '<tr onclick="setData('.$sautor.','.$stitle.')">';
                            echo '<td>'.$book->autor.'</td>';
                            echo '<td> '.$book->titulo.'</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <p class="h2 text-center">Libros no leidos</p>
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Autor</th>
                        <th scope="col">Titulo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data='http://angel/practicas/proyecto/API/books/'.$_GET['email'].'/start';
                    $dataJSON=file_get_contents($data);
                    $books=json_decode($dataJSON);

                    foreach ($books as $book ) {
                        if($book->status=='nread'){
                            $sautor="'".$book->autor."'";
                            $stitle="'".$book->titulo."'";
                            echo '<tr onclick="setData('.$sautor.','.$stitle.')">';
                            echo '<td>'.$book->autor.'</td>';
                            echo '<td>'.$book->titulo.'</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
                <script type="text/javascript">
                    function setData(autor,title){
                        document.getElementById("autorText").value=autor;
                        document.getElementById("tituloText").value=title;
                    }
                </script>
            </table>
        </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js"></script>
  </body>
</html>
