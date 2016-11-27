<?php

function ShellSort(&$a)
{
	$sort_length = count($a) - 1;
	$step = ceil(($sort_length + 1) / 2);

	do {
	   	$i = ceil($step);
	   	do {
	    	$j = $i - $step;
	     	$c = 1;
	     	do {
	       		if ($a[$j] <= $a[$j + $step]) {
		  			$c=0;
	       		} else {
		      		$tmp = $a[$j];
		            $a[$j] = $a[$j + $step];
		            $a[$j + $step] = $tmp;
		   		}
				$j=$j-1;
	     	}
	     	while ($j >= 0 && ($c == 1));
	      		$i = $i + 1;
	   	}
	    while ($i <= $sort_length);
	    $step = $step / 2;
	}
	while ($step > 0);
}
?>
<table style="border: 3px #000 solid;">
	<tr>
		<td style="border: 1px #000 solid;">
			<?php $arr = range(0, 1000); ?>
			<?php shuffle($arr); ?>
			<pre>
			<?php print_r($arr); ?>
			</pre>
		</td>
	<?php ShellSort($arr); ?>
		<td style="border: 1px #000 solid;">
			<pre>
			<?php print_r($arr); ?>
			</pre>
		</td>
	</tr>
</table>