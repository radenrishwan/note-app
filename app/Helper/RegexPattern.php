<?php

namespace Seior\PHP\Uas\Helper;

class RegexPattern
{
    public static string $matchAllNumberText ='([a-zA-Z0-9.]*)';
    public static string $matchAllNumber ='([0-9]*)';
    public static string $matchAllText ='([a-zA-Z.]*)';
    public static string $matchAllTextOnlyLowerCase ='([a-zA-Z]*)';
    public static string $matchAllTextOnlyUpperCase ='([A-Z]*)';
    public static string $matchAllTextAndSymbol ='([.]*)';
}