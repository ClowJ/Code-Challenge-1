<?php

$post_command = isset($_POST['command'])?$_POST['command']:null;
error_log('$_POST[command] : '.$_POST['command']);

$location = [];
// $x = 0;
// $y = 0;
$fText = ['NORTH', 'EAST', 'SOUTH', 'WEST'];

$output = '';
$success = true;

switch($post_command){
    case 'place':
        error_log('COMMAND : place');
        
        $x = mt_rand(0,4);
        $y = mt_rand(0,4);
        $f = mt_rand(0,3);
        $location = ['x'=>$x, 'y'=>$y, 'f'=>$f];

        //Store Location to FILE
        save($location);
        //Make output text
        $output = 'PLACE '.$location['x'].','.$location['y'].','.$fText[$location['f']];
        break;
    case 'move':
        error_log('COMMAND : move');

        //Store Location to FILE
        save($location);
        //Make output text
        $output = 'MOVE';
        break;
    case 'left':
        error_log('COMMAND : left');

        //Store Location to FILE
        save($location);
        //Make output text
        $output = 'LEFT';
        break;
    case 'right':
        error_log('COMMAND : right');

        //Store Location to FILE
        save($location);
        //Make output text
        $output = 'RIGHT';
        break;
    case 'report':
        error_log('COMMAND : report');

        //Store Location to FILE
        save($location);
        //Make output text
        $output = 'REPORT<br/>Output: 0,0,WEST';
        break;
    default;
        break;
}
error_log('OUTPUT : '.$output);

if($output != ''){
    error_log('SUCCESS : TRUE');
    echo json_encode(['success' => true, 'output' => $output]);
    exit();
}

/**
 * SAVE FILE
 */
function save($location){
    file_put_contents('json/location.json', json_encode($location));
}
?>