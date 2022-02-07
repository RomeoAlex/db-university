<?php 
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/Department.php';

$sql = $connection->prepare('SELCT * FROM departments WHERE id = ? ');

$sql-> bind_param('d' , $id);

$id = $_GET['id'];

$sql->execute();

$result = $sql->get_result();

echo var_dump($result);

if( $row = $result->num_rows > 0){
    // echo $row ;
        $departments = [];
        while( $row = $result->fetch_assoc() ){
            $department = new Department();
            $department->id = $row['id'];
            $department->name = $row['name'];
            $department->aderess = $row['adress'];
            $department->website = $row['website'];
            $department->phone = $row['phone'];
            $departments[] = $department;
        }
        // echo var_dump($departments);
} elseif ( $result && $result->num_rows==0 ){
    echo 'Risultati non presenti in questa pagina';
} else {
    echo 'Errore di query';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <ul>
            <?php foreach ($departments as $department) { ?>
               <li>
                   <?php echo $department->id; ?>
                   
               </li>
               <li>
               <?php echo $department->adress; ?>
               </li>
            <?php } ?>
            
        </ul>
    </div>
</body>
</html>
