<?php
    session_start();
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

    <title>JOB CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Lista de usuarios
                            <a href="pablo-create.php" class="btn btn-primary float-end">Adicionar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th> Nome</th>
                                    <th>Email</th>
                                    <th>Cpf</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM usuarios";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $pablo)
                                        {
                                            ?>
                                            <tr>
                                                
                                                <td><?= $pablo['nome']; ?></td>
                                                <td><?= $pablo['email']; ?></td>
                                                <td><?= $pablo['cpf']; ?></td>
                                                
                                                <td>
                                                    <a href="pablo-view.php?id=<?= $pablo['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                                                    <a href="pablo-edit.php?id=<?= $pablo['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_pablo" value="<?=$pablo['id'];?>" class="btn btn-danger btn-sm">Apagar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Não encontrado </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

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