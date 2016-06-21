<?php

/**
 * Created by PhpStorm.
 * User: odirus
 * Date: 2016/6/21
 * Time: 14:37
 * reference: http://edbiji.com/doccenter/showdoc/4/nav/2888.html
 */
class Conversion
{
    function dec_to($dict, $num) {
        $to = strlen($dict);

        if ($to == 10) {
            return $num;
        }
        $ret = '';
        do {
            $ret = $dict[bcmod($num, $to)] . $ret;
            $num = bcdiv($num, $to);
        } while ($num > 0);
        return $ret;
    }

    function dec_from($dict, $num) {
        $from = strlen($dict);

        if ($from == 10) {
            return $num;
        }
        $num = strval($num);
        $len = strlen($num);
        $dec = 0;
        for($i = 0; $i < $len; $i++) {
            $pos = strpos($dict, $num[$i]);
            if ($pos >= $from) {
                continue;
            }
            $dec = bcadd(bcmul(bcpow($from, $len - $i - 1), $pos), $dec);
        }
        return $dec;
    }
}