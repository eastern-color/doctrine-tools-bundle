<?php

namespace EasternColor\DoctrineToolsBundle\Doctrine\Criteria;

use Carbon\Carbon;
use DateTime;
use Doctrine\Common\Collections\Criteria;

/**
 * Common criteria helper for doctrine query builder.
 */
class Date
{
    public static function isWrappedToday($entityPropertyFrom, $entityPropertyTo)
    {
        // transform the passed DateTime $date to a Carbon instance
        $c = Carbon::now()->hour(0)->minute(0)->second(0);

        return Criteria::create()
            ->where(
                Criteria::expr()->andX(
                    Criteria::expr()->lte($entityPropertyFrom, $c),
                    Criteria::expr()->gte($entityPropertyTo, $c)
                )
            );
    }

    /**
     * [isWithinDaysFromToday description].
     *
     * @param [type] $entityProperty [description]
     * @param [type] $daysMin        [description]
     * @param [type] $daysMax        [description]
     *
     * @return Criteria [description]
     */
    public static function isWithinDaysFromToday($entityProperty, $daysMin, $daysMax)
    {
        // transform the passed DateTime $date to a Carbon instance
        $c = Carbon::now()->hour(0)->minute(0)->second(0);
        $subDateFrom = $c->copy()->addDays($daysMin)->addDay();
        $subDateTo = $c->copy()->addDays($daysMax)->addDay();

        // return a criteria comparing:
        return Criteria::create()
            ->where(
                Criteria::expr()->andX(
                    Criteria::expr()->gte($entityProperty, $subDateFrom),
                    Criteria::expr()->lt($entityProperty, $subDateTo)
                )
            );
    }

    /**
     * [isSameMonthAs description].
     *
     * @param string   $entityProperty [description]
     * @param DateTime $date           [description]
     *
     * @return Criteria [description]
     */
    public static function isSameMonthAs($entityProperty, DateTime $date)
    {
        // transform the passed DateTime $date to a Carbon instance
        $c = Carbon::instance($date);

        // prepare the start and end
        // *** remember to ->copy() before doing ANY changes
        $firstOfMonth = $c->copy()->firstOfMonth();
        $firstOfNextMonth = $c->copy()->addMonth()->firstOfMonth();

        // return a criteria comparing:
        // >= start of this month
        //   AND
        // < start of next month
        // therefore YYYY-mm-dd 23:59:59.999 can also be included
        return Criteria::create()
            ->where(
                Criteria::expr()->andX(
                    Criteria::expr()->gte($entityProperty, $firstOfMonth),
                    Criteria::expr()->lt($entityProperty, $firstOfNextMonth)
                )
            );
    }

    /**
     * [isSameYearAs description].
     *
     * @param string   $entityProperty [description]
     * @param DateTime $date           [description]
     *
     * @return Criteria [description]
     */
    public static function isSameYearAs($entityProperty, DateTime $date)
    {
        $c = Carbon::instance($date);
        $firstOfYear = $c->copy()->firstOfYear();
        $firstOfNextYear = $c->copy()->addYear()->firstOfYear();

        return Criteria::create()
            ->where(
                Criteria::expr()->andX(
                    Criteria::expr()->gte($entityProperty, $firstOfYear),
                    Criteria::expr()->lt($entityProperty, $firstOfNextYear)
                )
            );
    }
}
