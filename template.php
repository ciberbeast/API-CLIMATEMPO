<?php
    include 'autoload.php';
    $dbTempoDAO = new dbTempoDAO();

?>

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








