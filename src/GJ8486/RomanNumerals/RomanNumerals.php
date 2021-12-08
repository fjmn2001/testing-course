<?php

namespace Medine\GJ8486\RomanNumerals;

class RomanNumerals
{
    public function __invoke(int $numb): string
    {
        $result = '';
        $digitos = str_split(strrev((string)($numb)));

        for ($i = 0; $i < count($digitos); $i++){
            if ($i == 0) $result = $this->convertUnit((int)$digitos[$i]).$result;
            if ($i == 1) $result = $this->convertTens((int)$digitos[$i]).$result;
            if ($i == 2) $result = $this->convertHundreds((int)$digitos[$i]).$result;
            if ($i > 2) $result = $this->convertThousandUnit((int)$digitos[$i]).$result;
        }

        return $result;
    }

    protected function convertUnit(int $numb)
    {
        $result ='';

        if ($numb && $numb < 4) for ($i = 0; $i < $numb; $i++){ $result.= 'I'; }
        if ($numb && $numb == 4)  $result = 'IV';
        if ($numb && $numb >= 5) $result = 'V';
        if ($numb && $numb > 5) for ($i = 5; $i < $numb; $i++){ $result.='I'; }
        if ($numb && $numb == 9) $result = 'IX';

        return $result;
    }

    protected function convertTens(int $numb)
    {
        $result ='';

        if ($numb && $numb < 4) for ($i = 0; $i < $numb; $i++){ $result.= 'X'; }
        if ($numb && $numb == 4)  $result = 'XL';
        if ($numb && $numb >= 5) $result = 'L';
        if ($numb && $numb > 5) for ($i = 5; $i < $numb; $i++){ $result.='X'; }
        if ($numb && $numb == 9) $result = 'XC';

        return $result;
    }

    protected function convertHundreds(int $numb)
    {
        $result ='';

        if ($numb && $numb < 4) for ($i = 0; $i < $numb; $i++){ $result.= 'C'; }
        if ($numb && $numb == 4)  $result = 'CD';
        if ($numb && $numb >= 5) $result = 'D';
        if ($numb && $numb > 5) for ($i = 5; $i < $numb; $i++){ $result.='C'; }
        if ($numb && $numb == 9) $result = 'CM';

        return $result;
    }

    protected function convertThousandUnit(int $numb)
    {
        $result ='';
        for ($i = 0; $i < $numb; $i++){ $result.= 'M'; }
        return $result;
    }
}