<?php 
    require '../src/boostrap.php';
    require '../src/Calandar/Events.php';
    $pdo = get_PDO();
    $events = new Calandar\Events($pdo);
    if(!isset($_GET['id'])) {
        header('location: ./404.php');
    }

    try {
        $event = $events->find($_GET['id']);
    } catch (\Exception $e){
        e404();
    }
    require '../views/header.php';
?>

<h1><?= h($event->getName());?></h1>

<ul>
    <li>Date : <?= $event->getStart()->format('d/m/Y'); ?> </li>
    <li>Heure de démarage : <?= $event->getStart()->format('H:i'); ?> </li>
    <li>Heure de fin : <?= $event->getEnd->format('H:i'); ?> </li>
    <li>
        <br>
        Description : <?= $event->getDescription(); ?> 
    </li>
</ul>

<?php require '../views/footer.php'; ?>