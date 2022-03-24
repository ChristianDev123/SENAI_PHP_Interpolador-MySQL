<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/Interpolador_MySQL/CSS/styleInterpolador.css">
    <title>Interpolador MySQL</title>
</head>
<body>
    <header>
        <div class="container-fluid">
            <div class="container logoProject">
                Interpolador MySQL
            </div>
        </div>
    </header>
    <main>
        <section id='selector_server'>
            <div class="container">
                <div class="row selector-btns">
                    <div class="col-md-6 col-sm-6 col-lg-6 btn_selector-left active_btn">
                        <a href="index.php" class='active'>
                            XAMPP
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 btn_selector-right">
                        <a href="index2.php">
                            Outro
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section id='form_connection'>
            <div class="container box-form">
                <form action="index.php" method="POST">
                    <div>
                        <label for="user_database">Banco de dados</label>
                        <input type="text" name="database" id="user_database" autocomplete="off">
                    </div>
                    <div>
                        <label for="user_url">URL Sheety</label>
                        <input type="text" name="url" id="user_url" autocomplete="off">
                    </div>
                    <div>
                        <label for="user_variables">Colunas Sheety - <span>camelCase</span> (separado por ";")</label>
                        <input type="text" name="variables" id="user_variables" autocomplete="off">
                    </div>
                    <div>
                        <label for="user_table">Tabela do Banco de Dados</label>
                        <input type="text" name="table" id="user_table" autocomplete="off">
                    </div>
                    <div>
                        <label for="user_columns">Colunas do Banco de dados (separado por ";")</label>
                        <input type="text" name="columns" id="user_columns" autocomplete="off">
                    </div>
                    <input type="hidden" name="obj_dataConnection" id='path_data'>
                    <div class='submit-box'>
                        <input type="button" value="Registrar" id='btnRegister' onclick='handlerData()'>
                        <input type="submit" value="Enviar" id='btnSubmit' disabled onclick=''>
                    </div>
                    <div class="error logicPHP">
                        <?php
                            require_once('Gerenciador_BD.php');
                            // Recebe os Dados;
                            $datasJS = isset($_POST["obj_dataConnection"])?$_POST["obj_dataConnection"]:false;
                            try{
                                if($datasJS != false){
                                    $tratamentJson = (array) json_decode($datasJS);
                                    $nameDatabase = $tratamentJson['databaseName'];
                                    $variableList = $tratamentJson['variableList'];
                                    $arrayDatas = $tratamentJson['datasDatabase'];
                                    $columnList = $tratamentJson['columns'];
                                    $tableDB = $tratamentJson['table'];

                                    $respConnection = Connection($nameDatabase);
                                    if($respConnection[0]){
                                        if(Register($arrayDatas,$variableList,$columnList,$tableDB,$respConnection[1])){
                                             echo "Registro realizado com sucesso";
                                        }else{
                                             echo "Falha ao efetuar o registro";
                                        }
                                    };
                                }
                            }catch(Exception $error){
                                echo $error;
                            }
                        ?>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer>

    </footer>
    <script src="JS/scriptJS.js"></script>
</body>
</html>