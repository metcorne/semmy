<?php namespace App\Services\StecaGrid;

/**
 * Mock the file_get_contents() function to return real-world measurements output.
 *
 * return string
 */
function file_get_contents($path)
{
    return "document.write(\"<table class='invisible'><tr class='invisible'><th class='invisible'><h3>Inverter</h3></th><th class='invisible'><h3></h3></th></tr><tr class='invisible'><td class='invisible' valign='top' align='center'><table><tr><th>Name</th><th>Value</th><th>Unit</th></tr><tr><td>P DC</td><td align='right'>  91.53</td><td>W</td></tr><tr><td>U DC</td><td align='right'> 306.76</td><td>V</td></tr><tr><td>I DC</td><td align='right'>   0.30</td><td>A</td></tr><tr><td>U AC</td><td align='right'> 222.27</td><td>V</td></tr><tr><td>I AC</td><td align='right'>   0.44</td><td>A</td></tr><tr><td>F AC</td><td align='right'>  49.99</td><td>Hz</td></tr><tr><td>P AC</td><td align='right'>  84.62</td><td>W</td></tr></table></td><td class='invisible' valign='top' align='center'></table></td></tr></table>\");";
}
    
?>
