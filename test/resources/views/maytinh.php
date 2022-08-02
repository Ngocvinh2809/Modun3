<?php

class maytinh {
    public function sum($a,$b){
        if (!is_numeric($a)){
            $a = 0;
        }
        if (!is_numeric($a)){
            $b = 0;
        }
        $c= $a + $b;
        return $c;
    }
}