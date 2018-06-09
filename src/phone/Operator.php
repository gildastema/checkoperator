<?php

namespace Phone;

class Operator 
{
    const ORANGE = 1;

    const MTN = 2;

    const NEXTTEL = 3;

    const YOOMEE = 4;
    const CAMTEL = 5;

    const UNKOWN_OPERATOR = -1;

    
    public function getOperator($phone){

        $indicatif = substr($phone,0,3);
        if($indicatif != "237"){
            return self::UNKOWN_OPERATOR;
        }
        if (strlen($phone) != 12){
            return self::UNKOWN_OPERATOR;
        }else{

            $phoneNumber = substr($phone, 3, 9);

            $one = substr($phoneNumber, 0, 1);
            if($one == "2"){
                if($this->isYoomee(substr($phone,3,12))){
                    return self::YOOMEE;
                }else{
                    return self::CAMTEL;
                }
            }
            $first_two = substr($phoneNumber, 0,2);
            if($first_two == "69"){
                return self::ORANGE;
            }elseif ($first_two == "67"){
                return self::MTN;
            }elseif ($first_two == "66"){
                return self::NEXTTEL;
            }else{
                $first_three = substr($phoneNumber, 0,3);
                if($first_three == "650" || $first_three == "651" || $first_three == "652" || $first_three == "653" || $first_three == "654"){
                    return self::MTN;
                }elseif ($first_three == "655" || $first_three == "656" || $first_three == "657" || $first_three == "658" || $first_three == "659"){
                    return self::ORANGE;
                }elseif ($first_three == "680" || $first_three == "681" || $first_three =="682" || $first_three=="683" || $first_three=="684"){
                    return self::MTN;
                }elseif ($first_three == '685'){
                    return self::NEXTTEL;
                }else{
                    return self::UNKOWN_OPERATOR;
                }
            }

    }
    }
}