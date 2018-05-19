<?php

$network = [
    '90' => [
        '5' => 'Globe',
        '6' => 'Globe',
        '7' => 'Smart',
        '8' => 'Smart',
        '9' => 'Smart',
    ], '91' => [
        '2' => 'Smart',
        '5' => 'Globe',
        '6' => 'Globe',
        '7' => 'Globe',
        '8' => 'Smart',
        '9' => 'Smart',
        '0' => 'Smart',
    ], '92' => [
        '1' => 'Smart',
        '2' => 'Sun Cellular',
        '3' => 'Sun Cellular',
        '5' => 'Sun Cellular',
        '6' => 'Globe',
        '7' => 'Globe',
        '8' => 'Smart',
        '9' => 'Smart',
        '0' => 'Smart',
    ],  '93' => [
        '2' => 'Sun Cellular',
        '3' => 'Sun Cellular',
        '5' => 'Globe',
        '6' => 'Globe',
        '7' => 'ABS/G',
        '8' => 'Smart',
        '9' => 'Smart',
        '0' => 'Smart',
    ], '94' => [
        '2' => 'Sun Cellular',
        '3' => 'Sun Cellular',
        '5' => 'Globe',
        '6' => 'Smart',
        '7' => 'Smart',
        '8' => 'Smart',
        '9' => 'Smart',
    ], '95' => [
        '5' => 'Globe',
        '6' => 'Globe',
        '0' => 'Smart',
    ], '96' => [
        '5' => 'Globe',
        '6' => 'Globe',
    ], '97' => [
        '3' => 'Express Telecom',
        '4' => 'Express Telecom',
        '5' => 'Globe',
        '7' => 'Globe',
        '8' => 'Next Mobile',
        '9' => 'Next Mobile',
    ],  '98' => [
        '9' => 'Smart',
    ],  '99' => [
        '5' => 'Globe',
        '6' => 'CP/G',
        '7' => 'Globe',
        '8' => 'Smart',
        '9' => 'Smart',
    ],  
];

function getNetwork($sNumber) {
    // Use the global variables here in this function
    global $network;

    // Removes trailing zero
    $sNumber = '' . (int)$sNumber;

    // Ensure that we only have 3 numerical string
    if (strlen($sNumber) !== 3) {
        return 'Invalid network';
    }

    // Get the first two number
    $idx1 = substr($sNumber, 0, 2);

    // Then the last number
    $idx2 = substr($sNumber, 2);

    // Retrieves the network (ABS/G, something like that)
    $sNetwork = @$network[$idx1][$idx2];

    return (substr($sNetwork) === 0) ? 'Unknown network' : $sNetwork;
}

$sNetwork = htmlspecialchars(@$_GET['network'], ENT_QUOTES);

?>
<!DOCTYPE html>
<html>
<head>
    <title>What network is it?</title>
</head>
<body>
<form>
    <label>Enter 4 digit number: <input type="text" name="network" value="<?php echo $sNetwork ?>"></label>
    <button type="submit">Check</button>
    <div>
        <?php if (isset($_GET['network'])) { ?>
            Network is: <?php echo getNetwork($_GET['network']); ?>
        <?php } ?>
    </div>
</form>
<footer>Developed with love by: <a href="https://ghabxph.info">Gabriel Lucernas Pascual</a></footer>
</body>
</html>