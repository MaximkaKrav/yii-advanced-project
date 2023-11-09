
<table class="table">

    <tr><td>{$rows['id']}</td><td>{$rows['serial_number']}</td><td>{$rows['store_id']}</td><td>{$rows['created_at']}</td><td>{$rows['updated_at']}</td></tr>
<?php
    foreach($rows as $row){
        echo "<tr><<td>{$row['id']}</td><td>{$row['serial_number']}</td><td>{$row['store_id']}</td><<td>{$row['created_at']}</td><td>{$row['updated_at']}</td></tr>";
    }

?>
</table>
