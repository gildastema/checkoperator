<?php

namespace Phone;

class Operator
{
    /**
     * La fonction permettant d obtenir un operateur connaissant son numero
     * au format E.164
     * @param $phone
     * @return int
     */
    public function getOperator($phone){

        $indicatif = substr($phone,0,3);

        if($indicatif === Constant::RCA && strlen($phone) === 11){
            if(substr($phone, 0, 5) === "23675"){
                return Constant::TELECEL;
            }else{
                return Constant::UNKOWN_OPERATOR;
            }
        }elseif ($indicatif === Constant::CAMEROON && strlen($phone) === 12){
            $phoneNumber = substr($phone, 3, 9);

            $one = substr($phoneNumber, 0, 1);
            if($one == "2"){
                if($this->isYoomee(substr($phone,3,12))){
                    return Constant::YOOMEE;
                }else{
                    return Constant::CAMTEL;
                }
            }
            $first_two = substr($phoneNumber, 0,2);
            if($first_two == "69"){
                return Constant::ORANGE;
            }elseif ($first_two == "67"){
                return Constant::MTN;
            }elseif ($first_two == "66"){
                return Constant::NEXTTEL;
            }else{
                $first_three = substr($phoneNumber, 0,3);
                if($first_three == "650" || $first_three == "651" || $first_three == "652" || $first_three == "653" || $first_three == "654"){
                    return Constant::MTN;
                }elseif ($first_three == "655" || $first_three == "656" || $first_three == "657" || $first_three == "658" || $first_three == "659"){
                    return Constant::ORANGE;
                }elseif ($first_three == "680" || $first_three == "681" || $first_three =="682" || $first_three=="683" || $first_three=="684"){
                    return Constant::MTN;
                }elseif ($first_three == '685'){
                    return Constant::NEXTTEL;
                }else{
                    return Constant::UNKOWN_OPERATOR;
                }
            }
        }else{
            return Constant::UNKOWN_OPERATOR;
        }

    }

    private  function isYoomee($phone)
    {
        $tab1 = range(242901000, 242999999);
        if (in_array($phone, $tab1)){
            return true;
        }elseif ($phone == "243760083"){
            return true;
        }
        else{
            return false;
        }
    }
}