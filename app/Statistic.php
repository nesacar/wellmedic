<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Statistic extends Model
{
    protected $fillable = [];

    public static function getLastYearNewsletter($newsletter_id, $start_date, $end_date){
        return Click::select(DB::raw('EXTRACT(MONTH FROM created_at) AS month'), DB::raw('COUNT(*) AS number'))
            ->whereBetween('created_at', [$start_date, $end_date])->where('newsletter_id', $newsletter_id)
            ->groupBy(DB::raw('month'))->orderBy('created_at')
            ->get();
    }

    public static function getMoreYearNewsletter($newsletter_id, $start_date, $end_date){
        return Click::select(DB::raw('EXTRACT(YEAR FROM created_at) AS year'), DB::raw('COUNT(*) AS number'))
            ->whereBetween('created_at', [$start_date, $end_date])->where('newsletter_id', $newsletter_id)
            ->groupBy(DB::raw('year'))->orderBy('created_at')
            ->get();
    }

    public static function prepareMoreYearNewsletter($stat, $start_date, $end_date){
        $array = array();
        if(count($stat) > 0){
            if($start_date->year < $end_date->year){
                for($i=$start_date->year;$i<=$end_date->year;$i++){
                    $break = true;
                    foreach($stat as $s){
                        if($s->year == $i){ $array[$i] = $s->number; $break = false; }
                    }
                    if($break){
                        $array[$i] = 0;
                    }
                }
            }else{
                return redirect()->back()->with('error', 'Pogrešan opseg datuma');
            }
        }
        return $array;
    }

    public static function prepareLastYearNewsletter($stat, $month){
        $array = self::getMonths($month);
        if(count($stat) > 0){
            foreach($stat as $s){
                if($s->month == 1){ $array['January'] = $s->number; }
                if($s->month == 2){ $array['February'] = $s->number; }
                if($s->month == 3){ $array['March'] = $s->number; }
                if($s->month == 4){ $array['April'] = $s->number; }
                if($s->month == 5){ $array['May'] = $s->number; }
                if($s->month == 6){ $array['June'] = $s->number; }
                if($s->month == 7){ $array['July'] = $s->number; }
                if($s->month == 8){ $array['August'] = $s->number; }
                if($s->month == 9){ $array['September'] = $s->number; }
                if($s->month == 10){ $array['October'] = $s->number; }
                if($s->month == 11){ $array['November'] = $s->number; }
                if($s->month == 12){ $array['December'] = $s->number; }
            }
        }

        $labels = $data = [];
        foreach ($array as $key => $value){
            $labels[] = $key;
            $data[] = $value;
        }

        return ['labels' => $labels, 'data' => $data];
    }

    public static function prepareSearchYearNewsletter($stat, $start_date, $end_date){
        $array = array();
        if(count($stat) > 0){
            if($start_date->month < $end_date->month){
                for($i=$start_date->month; $i<=$end_date->month; $i++){
                    $break = true;
                    foreach($stat as $s){
                        if($s->month == $i){ $array[$i] = $s->number;  $break = false;}
                    }
                    if($break){
                        $array[$i] = 0;
                    }
                }
            }else{
                for($i=$start_date->month; $i<=12; $i++){
                    $break = true;
                    foreach($stat as $s){
                        if($s->month == $i){ $array[$i] = $s->number; $break = false; }
                    }
                    if($break){
                        $array[$i] = 0;
                    }
                }
                for($i=1; $i<=$end_date->month; $i++){
                    $break = true;
                    foreach($stat as $s){
                        if($s->month == $i){ $array[$i] = $s->number; $break = false; }
                    }
                    if($break){
                        $array[$i] = 0;
                    }
                }
            }
        }
        return $array;
    }

    public static function getLastMonthNewsletter($newsletter_id, $start_date, $end_date){
        return Click::select(DB::raw('EXTRACT(DAY FROM created_at) AS day'), DB::raw('COUNT(*) AS number'))
            ->whereBetween('created_at', [$start_date, $end_date])->where('newsletter_id', $newsletter_id)
            ->groupBy(DB::raw('day'))->orderBy('created_at')
            ->get();
    }

    public static function prepareLastMonthNewsletter($stat, $month, $day){
        $days = self::getDays($month);
        $array = array();
        for($i=$day+1;$i<=$days;$i++){
            if($i==$days){
                $array[$i.'d'] = 0;
                $i=1;
                for($i=1;$i<$day;$i++){
                    $array[$i.'d'] = 0;
                }
                break;
            }else{
                $array[$i.'d'] = 0;
            }
        }

        if(count($stat) > 0){
            foreach($stat as $s){
                for($i=1;$i<=$days;$i++){
                    if($s->day == $i){ $array[$i.'d'] = $s->number; }
                }
            }
        }

        $labels = $data = [];
        foreach ($array as $key => $value){
            $labels[] = $key;
            $data[] = $value;
        }

        return ['labels' => $labels, 'data' => $data];
    }

    public static function prepareSearchMonthNewsletter($stat, $trigger, $start_date, $end_date, $month){
        $days = self::getDays($month);
        $array = array();
        if($start_date->day < $end_date->day){
            for($i=$start_date->day;$i<=$end_date->day;$i++){
                $array[$i.'d'] = 0;
            }
        }else{
            for($i=$start_date->day;$i<=$days;$i++){
                $array[$i.'d'] = 0;
            }
            for($i=1;$i<=$end_date->day;$i++){
                $array[$i.'d'] = 0;
            }
        }

        if(count($stat) > 0){
            foreach($stat as $s){
                for($i=1;$i<=$days;$i++){
                    if($s->day == $i){ $array[$i.'d'] = $s->number; }
                }
            }
        }
        return $array;
    }

    public static function getDays($month){
        $days = 30;
        if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12){
            $days = 31;
        }elseif($month == 2){
            $days = 28;
        }
        return $days;
    }

    public static function getLastDayNewsletter($newsletter_id, $start_date, $end_date){
        return Click::select(DB::raw('EXTRACT(HOUR FROM created_at) AS hour'), DB::raw('COUNT(*) AS number'))
            ->whereBetween('created_at', [$start_date, $end_date])->where('newsletter_id', $newsletter_id)
            ->groupBy(DB::raw('hour'))->orderBy('created_at')
            ->get();
    }

    public static function prepareLastDayNewsletter($stat, $hour){
        $array = array();
        for($i=$hour+1;$i<24;$i++){
            $array[$i.'h'] = 0;
        }
        for($i=0;$i<=$hour;$i++){
            $array[$i.'h'] = 0;
        }

        if(count($stat) > 0){
            foreach($stat as $s){
                for($i=0;$i<24;$i++){
                    if($s->hour == $i){ $array[$i.'h'] = $s->number; }
                }
            }
        }

        $labels = $data = [];
        foreach ($array as $key => $value){
            $labels[] = $key;
            $data[] = $value;
        }

        return ['labels' => $labels, 'data' => $data];
    }

    public static function prepareSearchDayNewsletter($stat, $trigger, $start_date, $end_date){
        $array = array();
        if($trigger == 'h'){
            if($start_date->hour < $end_date->hour){
                for($i=$start_date->hour;$i<=$end_date->hour;$i++){
                    $array[$i.'h'] = 0;
                }
            }else{
                for($i=$start_date->hour;$i<24;$i++){
                    $array[$i.'h'] = 0;
                }
                for($i=0;$i<=$end_date->hour;$i++){
                    $array[$i.'h'] = 0;
                }
            }
        }

        if(count($stat) > 0){
            foreach($stat as $s){
                for($i=0;$i<24;$i++){
                    if($s->hour == $i){ $array[$i.'h'] = $s->number; }
                }
            }
        }
        return $array;
    }

    public static function getMonths($date){

        switch ($date) {
            case 1:
                $array = array('February' => 0, 'March' => 0, 'April' => 0, 'May' => 0, 'June' => 0, 'July' => 0, 'August' => 0, 'September' => 0, 'October' => 0, 'November' => 0, 'December' => 0, 'January' => 0);
                break;
            case 2:
                $array = array('March' => 0, 'April' => 0, 'May' => 0, 'June' => 0, 'July' => 0, 'August' => 0, 'September' => 0, 'October' => 0, 'November' => 0, 'December' => 0, 'January' => 0, 'February' => 0);
                break;
            case 3:
                $array = array('April' => 0, 'May' => 0, 'June' => 0, 'July' => 0, 'August' => 0, 'September' => 0, 'October' => 0, 'November' => 0, 'December' => 0, 'January' => 0, 'February' => 0, 'March' => 0);
                break;
            case 4:
                $array = array('May' => 0, 'June' => 0, 'July' => 0, 'August' => 0, 'September' => 0, 'October' => 0, 'November' => 0, 'December' => 0, 'January' => 0, 'February' => 0, 'March' => 0, 'April' => 0);
                break;
            case 5:
                $array = array('June' => 0, 'July' => 0, 'August' => 0, 'September' => 0, 'October' => 0, 'November' => 0, 'December' => 0, 'January' => 0, 'February' => 0, 'March' => 0, 'April' => 0, 'May' => 0);
                break;
            case 6:
                $array = array('July' => 0, 'August' => 0, 'September' => 0, 'October' => 0, 'November' => 0, 'December' => 0, 'January' => 0, 'February' => 0, 'March' => 0, 'April' => 0, 'May' => 0, 'June' => 0);
                break;
            case 7:
                $array = array('August' => 0, 'September' => 0, 'October' => 0, 'November' => 0, 'December' => 0, 'January' => 0, 'February' => 0, 'March' => 0, 'April' => 0, 'May' => 0, 'June' => 0, 'July' => 0);
                break;
            case 8:
                $array = array('September' => 0, 'October' => 0, 'November' => 0, 'December' => 0, 'January' => 0, 'February' => 0, 'March' => 0, 'April' => 0, 'May' => 0, 'June' => 0, 'July' => 0, 'August' => 0);
                break;
            case 9:
                $array = array('October' => 0, 'November' => 0, 'December' => 0, 'January' => 0, 'February' => 0, 'March' => 0, 'April' => 0, 'May' => 0, 'June' => 0, 'July' => 0, 'August' => 0, 'September' => 0);
                break;
            case 10:
                $array = array('November' => 0, 'December' => 0, 'January' => 0, 'February' => 0, 'March' => 0, 'April' => 0, 'May' => 0, 'June' => 0, 'July' => 0, 'August' => 0, 'September' => 0, 'October' => 0);
                break;
            case 11:
                $array = array('December' => 0, 'January' => 0, 'February' => 0, 'March' => 0, 'April' => 0, 'May' => 0, 'June' => 0, 'July' => 0, 'August' => 0, 'September' => 0, 'October' => 0, 'November' => 0);
                break;
            default:
                $array = array('January' => 0, 'February' => 0, 'March' => 0, 'April' => 0, 'May' => 0, 'June' => 0, 'July' => 0, 'August' => 0, 'September' => 0, 'October' => 0, 'November' => 0, 'December' => 0);
        }
        return $array;
    }
}
