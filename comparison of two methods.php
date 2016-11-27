<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <?php set_time_limit(null); ?>
<div id="php_code">
<?php
    function quickSort(&$arr, $low, $high) {
        $i = $low;
        $j = $high;
        $middle = $arr[ ( $low + $high ) / 2 ];
        do {
            while($arr[$i] < $middle) ++$i;
            while($arr[$j] > $middle) --$j;
            if($i <= $j){
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
                $i++; $j--;
            }
        }
        while($i < $j);

        if($low < $j){
            quickSort($arr, $low, $j);
        }
        if($i < $high){
            quickSort($arr, $i, $high);
        }
    }

    function quickSortWithParam(&$arr, $low, $high, $param) {
        if (($high - $low) < $param) {
            insertionSort($arr, count($arr));
        } else {
            $i = $low;
            $j = $high;
            $middle = $arr[ ( $low + $high ) / 2 ];
            do {
                while($arr[$i] < $middle) ++$i;
                while($arr[$j] > $middle) --$j;
                if($i <= $j){
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                    $i++; $j--;
                }
            }
            while($i < $j);

            if($low < $j){
                quickSortWithParam($arr, $low, $j, $param);
            }
            if($i < $high){
                quickSortWithParam($arr, $i, $high, $param);
            }
        }

    }

    function insertionSort(&$arr, $count)
    {
        for($i = 1; $i < $count; $i++)
        {
            $rightValue = $arr[$i];
            $leftValue = $i - 1;

            while($leftValue >= 0 && $arr[$leftValue] > $rightValue)
            {
                $arr[$leftValue+1] = $arr[$leftValue];
                $leftValue--;
            }

            $arr[++$leftValue] = $rightValue;
        }

        return $arr;
    }

//    $test = range(0,10000);
//    shuffle($test);

    for ($i = 0; $i <= 10000; $i++) {
        $test[$i] = rand();
    }

    $start = microtime(true);
    quickSort($test, 0, count($test) - 1);
    $time = microtime(true) - $start;
    printf('The script executed %.25F сек. withput parameter <br>', $time);
    unset($start);
    unset($time);

    for ($i = 3; $i <= 10; $i++) {
        $start = microtime(true);
        quickSortWithParam($test, 0, count($test) - 1, $i);
        $time = microtime(true) - $start;
        printf('The script executed %.25F сек. with parameter %s <br>', $time, $i);
        unset($start);
        unset($time);
    }

    ?>
</div>
<div id="refresh" onclick="refresh()">Оновити</div>
<script>
    function refresh(){
        window.location.reload();
    }
</script>


<style>
    #php_code, #js_code{
        border: 1px solid #A5A5A5;
        border-radius: 10px 10px 10px 10px;
        float: left;
        margin: 5px;
        padding: 10px;
        width: 44%;
    }
    #refresh{
        border: 1px solid #A5A5A5;
        border-radius: 10px 10px 10px 10px;
        clear: both;
        cursor: pointer;
        margin: 0 auto;
        padding: 5px;
        width: 70px;
    }
</style>
</body>
</html>