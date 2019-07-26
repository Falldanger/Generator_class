<?php
	function gener($start,$to,$step){
    for ($i = $start; $i < $to; $i++) {

            $cmd = yield $i;
            if ($cmd == -1) return 'Stop';
            if ($cmd == 10) $step = 1;
            $i = $i+$step-1;
        }
        return $to - $start;
	}
	$t = gener(1,16,2);

	while ($t->valid()) {
        echo $t->current().'; ';
        if ($t->current() >= 14) $t->send(-1);
        else if($t->current()==11) $t->send(10);
        else $t->next();
    }
    echo $t->getReturn();
    echo $t->current();
    
?>