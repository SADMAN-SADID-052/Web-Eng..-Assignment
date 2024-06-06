<?php
function isPrime($number) 
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) 
    {
        if ($number % $i == 0)
         {
            return false;
        }
    }
    return true;
}

function findPrimes($arr) 
{
    $primes = array();
    foreach ($arr as $number) 
    {
        if (isPrime($number)) 
        {
            $primes[] = $number;
        }
    }
    return $primes;
}

$numbers = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14, 15);
$primeNumbers = findPrimes($numbers);

echo"All Prime Number of this range :\n";
foreach ($primeNumbers as $prime)
 {
    echo "$prime\n";
}
?>
