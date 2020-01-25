<?php
/* created by Denis V.G. 06-10-08
 * class for validate any things */
namespace Kernel;
class Validate {

        public static function ConfirmCode($confirm_num = null, $confirm_code = null) {
                if ($confirm_num == null) $confirm_num = $_POST["protectnum"];
                if ($confirm_code == null) $confirm_code = $_POST["protectcode"];

                $s = md5($confirm_num);
                $j = 0; $tmp = "";
                while (isset($s[$j])) {
                        if (is_numeric($s[$j])) $tmp.= $s[$j];
                        $j++;
                }
                $s = substr($tmp, 3, 6);
                return ($s==$confirm_code);
        }

        public static function GetConfirmCode($confirm_num) {
                $s = md5($confirm_num);
                $j = 0; $tmp = "";
                while (isset($s[$j])) {
                        if (is_numeric($s[$j])) $tmp.= $s[$j];
                        $j++;
                }
                $s = substr($tmp, 3, 6);
                return $s;
        }

        public static function ProtectCode() {
                $num = rand(1000000, 9999999);
                $output.= "<input type='hidden' name='protectnum' value='".$num."' />";
                $output.= "<img src='/anima/captcha.php?num=".$num."' width='120px' height='50px' alt='protect code' border='0' />";
                $output.= "<input type='text' name='protectcode' class='protectcode' />";
                return $output;
        }

        public static function CheckEmail($mail_address) {
                $pattern = "/^[\w-]+(\.[\w-]+)*@";
                $pattern .= "([0-9a-z][0-9a-z-]*[0-9a-z]\.)+([a-z]{2,4})$/i";
                if (preg_match($pattern, $mail_address)) return true;
                return false;
        }

        public static function CheckEnglish($login) {
                $n = strlen($login);
                for ($j=0; $j < $n; $j++) {
                        $letter = $login[$j];
                        if (!($letter == "." or $letter == "-" or $letter == "_" or ($letter >= "0" and $letter <= "9") or ($letter >= "a" and $letter <= "z") or ($letter >= "A" and $letter <= "Z"))) return false;
                }
                return true;
        }

}
