<?php


class SK_Date extends DateTime {

    /**
     * Display the date
     * @param string $i18n Two different format : EN and FR
     * @param null $timeZone
     */
    public function __construct($date='',$i18n="en",$timeZone=null)
    {
        if($date!='')
        {
            $this->date = strtotime($date);
        }
        else
        {
            $this->date = new DateTime('now');
        }
    }

    public function diff($now = 'NOW')
    {
        if(!($now instanceof DateTime)){
            $now = new DateTime($now);
        }
        return parent::diff($now);
    }

    public function DiffYears($now = 'NOW')
    {
        return $this->diif($now)->format('%y');
    }
    public function display()
    {
        return $this->date;
        //return $this->format('d-m-Y H:i');
    }
}