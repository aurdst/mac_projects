<?php

namespace Calandar;

class Events {

    private $pdo;

    public function __construct(\PDO $pdo){
        $this->pdo = $pdo;
    }

    /**
     * retrieves the events that start inter 2 dates
     * @param \DateTime $start
     * @param \DateTime $end
     * @return array
     */
    public function getEventsBetween(\DateTime $start, \DateTime $end) : array{
        $sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')} ' AND '{$end->format('Y-m-d 23:59:59')}' ";
        $statement = $this->pdo->query($sql);
        $results = $statement->fetchAll();
        return $results;
    }

    /**
     * retrieves the events 
     */
    public function getEventsBetweenByDay(\DateTime $start, \DateTime $end) : array{
        $events = $this->getEventsBetween($start, $end);
        $days = [];
        foreach($events as $event){
            $date = explode(' ', $event['start'])[0];
            if (!isset($days[$date])){
                $days[$date] = [$event];
            }
            else{
                $days[$date][] = $event;
            }
        }
        return $days;
    }
    /**
     * Retrieve one event
     * @param int $id
     * @return array
     * @throws \Exception
     */
    public function find(int $id): \Calandar\Event{
        require 'Event.php';
        $statement = $this->pdo->query("SELECT * FROM events WHERE id = $id LIMIT 1");
        $statement->setFetchMode(\PDO::FETCH_CLASS, \Calandar\Event::class);
        $result = $statement->fetch();
        if($result === false){
            throw new \Exception('The DataBase don\'t find result');
        }
        return $result;
    }
}