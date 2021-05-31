  <?php 
        require '../src/Calandar/Month.php';
        require '../src/boostrap.php';
        require '../src/Calandar/Events.php';
        $pdo = get_PDO();
        $events = new Calandar\Events($pdo);
        $month = new Calandar\Month($_GET['month'] ?? null, $_GET['year'] ?? null); 
        $startday = $month->getStartingDay();
        $weeks = $month->getWeeks();
        $startday = $startday->format('N') === '1' ? $startday : $month->getStartingDay() -> modify('last monday');
        $end = (clone $startday)->modify("+" . (6 + 7 * $weeks - 1) . "days");
        $events = $events->getEventsBetweenByDay($startday, $end);
        require '../views/header.php';
    ?>
    
    <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1>
            <?= $month->toString(); ?>
        </h1>   
        <div>
            <a href="index.php?month=<?= $month->prevMonth()->month;?>&year=<?= $month->prevMonth()->year;?>"class='btn btn-primary'> &lt;</a>
            <a href="index.php?month=<?= $month->nextMonth()->month;?>&year=<?= $month->nextMonth()->year;?>"class='btn btn-primary'> &gt;</a>
        </div> 
    </div>

    <table class="calandar_table calandar_table_weeks <?= $weeks; ?>weeks">
        <?php 
            for ($i = 0; $i < $month->getWeeks(); $i++):
        ?>
        <tr>
            <?php 
            foreach($month->days as $k => $day):
                $date = (clone $startday)->modify("+" . ($k + $i * 7) . "days");
                $eventsForDay = $events[$date->format('Y-m-d')] ?? [];
                ?>
            <td class= "<?= $month->withinMonth($date) ? '' : 'calandarOtherMonth'; ?> ">
                <?php if ($i === 0): ?>
                    <div class="calandarWeekDay"><?= $day; ?></div>
                <?php endif; ?>
                <div class="calandarDay"><?= $date -> format('d'); ?></div>
                <?php foreach($eventsForDay as $event): ?>
                <div class="calandar__events">
                    <?= (new DateTime($event['start']))->format('H:i') ?> - <a href="event.php?id=<?= $event['id']; 
                    ?>" class="event_style"><?= h($event['name']); ?> </a>
                </div>
                <?php endforeach; ?>
            </td>
            <?php endforeach; ?>
        </tr>
        <?php endfor; ?>
    </table> 

    <?php require '../views/footer.php'; ?>