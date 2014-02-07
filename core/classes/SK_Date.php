<?php


class SK_Date {



    protected $date = '';
    protected $defaultFormat = "h:i:s";

    protected $firstDayOfWeek = 1;//Here how we work in civilised metric country
    protected $actualI18n;

    /* I18N */
    protected $defaultI18n = "En";

    protected $supportedI18n = array("Fr","En","Ru");

    protected $days_En = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
    protected $days_Fr = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
    protected $days_Ru = array("Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота");

    protected $months_En = array("January","February","March","April","May","June","July","August","September","October","November","December");
    protected $months_Fr = array("Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Décembre");
    protected $months_Ru = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');


    /**
     * Display the date
     * @param string $date
     * @param string $i18n Two different format : EN and FR
     * @param null $timeZone
     */
    public function __construct($_date='',$_i18n="En",$_timeZone=null)
    {
        //$this->actualI18n = in_array($_i18n,$this->supportedI18n, true) ? $this->actualI18n : $this->defaultI18n;
        //var_dump(in_array($_i18n,$this->supportedI18n,true) ? $this->actualI18n : $this->defaultI18n);

       /* if($date!='')
        {

            //$this->date = strtotime($date);
        }
        else
        {
            $this->date = $this->SK_Date('NOW');
        }*/
    }

    public function getActualTimestamp()
    {
        return time();
    }

    public function SK_Date($date)
    {
        /*if($date=="NOW"||$date=="Now"||$date=="now")
        {
            $this::date = $this::getActualTimestamp();
        }
        else
        {
            $this::date = $this::getActualTimestamp();
        }*/
    }
    /*public function diff($now = 'NOW')
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
    public function toString()
    {
        return $this->format('d-m-Y H:i');
    }*/
}