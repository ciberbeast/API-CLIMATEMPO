<?php 

include 'autoload.php';
$dbTempoDAO = new dbTempoDAO();

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
function loadDoc() {


    var xhttp = new XMLHttpRequest();


    xhttp.open("GET", "processo.php", true);
    xhttp.send();

    document.getElementById("element").innerHTML = "<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>Loading...";

    setTimeout(function(){     
        document.getElementById("element").innerHTML = "Registro realizado com sucesso";
        $.ajax({
            url:"template.php",
        }).done(function(resposta){
            $('#data').html(resposta);
        })
    }, 300000);
       
}
</script>
<body>
    <div id="element">
        <button class="btn btn-primary" type="button" onclick="loadDoc()" >Carregar</button>
    </div>

    <div id="date">
        <table class="table">
            <thead>
                <tr>
                    <th colspan="6"><a href="xls.php">Salvar em Excel</a></th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>CITY</th>
                    <th>MAX</th>
                    <th>MIN</th>
                    <th>PRECIPITATION</th>
                    <th>DATE</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach( $dbTempoDAO->select() as $value){ ?>
                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['city']; ?></td>
                    <td><?php echo $value['max']; ?></td>
                    <td><?php echo $value['min']; ?></td>
                    <td><?php echo $value['precipitation']; ?></td>
                    <td><?php echo $value['date']; ?></td>
                </tr>
            </tbody>
            <?php    } ?>

        </table>


    </div>
</body>
</html>
