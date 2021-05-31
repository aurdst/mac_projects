<?php

namespace Calandar;

class Month {

    public $days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];

    private $months = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'];

    public $month;
    public $year;

    /** 
     * Month constructor
     *@param int $month = All month in 1 to 12
     *@param int years = The Year
     *@throws \Exception
     * */ 

    public function __construct(?int $month = null, ?int $year = null){
        if ($month === null || $month  < 1 || $month > 12) { 
            $month = intval(date('m'));
        }

        if ($year === null) { 
            $year= intval(date('Y'));
        }

        $this -> month = $month; 
        $this -> year = $year;
    }


    /**
     * Return first day of the month
     * @return \DateTime
     */
    
    public function getStartingDay():\DateTime{
        return new \DateTime( "{$this->year}-{$this->month}-01");
    }


    /**
     * @return string = Return the month in letters
     */

    public function toString(): string{
        return $this->months[$this->month - 1] . ' ' . $this->year;
    }
    /**
     * return number of weeks in the month
     * @return int
     */
    public function getWeeks() : int{
        $start = $this->getStartingDay();
        $end = (clone $start)->modify('+1 month - 1day');
        $weeks = intval($end->format('W')) - intval($start->format('W'));
        if ($weeks < 0) {
            $weeks = intval($end->format('W'));
        }
        return $weeks;
    }

    /**
     * Is in the current month ?
     * @param \DateTime $date
     * @return bool
     */
    public function withinMonth (\DateTime $date) : bool{
        return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
    }

    /**
     * For view the next month
     * @return Month 
     */
    public function nextMonth(): Month{
        $month = $this->month + 1;
        $year = $this->year;
        if ($month > 12) {
            $month = 1;
            $year += 1;
        }
        return new Month($month, $year);
    }

    /**
     * For view the previous month
     * @return Month 
     */
    public function prevMonth(): Month{
        $month = $this->month - 1;
        $year = $this->year;
        if ($month < 1) {
            $month = 12;
            $year -= 1;
        }
        return new Month($month, $year);
    }

}