<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
          crossorigin="anonymous">

    <title>pablo View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Ver usuario
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $pablo_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM usuarios WHERE id='$pablo_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $pablo = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label> Nome</label>
                                        <p class="form-control">
                                            <?=$pablo['nome'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> Email</label>
                                        <p class="form-control">
                                            <?=$pablo['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label> cpf</label>
                                        <p class="form-control">
                                            <?=$pablo['cpf'];?>
                                        </p>
                                    </div>
                                    

                                <?php
                            }
                            else
                            {
                                echo "<h4>Não encontrado</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
            crossorigin="anonymous"></script>
</body>
</html>