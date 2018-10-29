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
        $location = load();
        
        //Move pacman and Save location
        $location = move($location);

        //Make output text
        $output = 'MOVE '.$location['x'].','.$location['y'].','.$fText[$location['f']];
        break;
    case 'left':
        error_log('COMMAND : left');

        //Store Location to FILE
        // save($location);
        //Make output text
        $output = 'LEFT';
        break;
    case 'right':
        error_log('COMMAND : right');

        //Store Location to FILE
        // save($location);
        //Make output text
        $output = 'RIGHT';
        break;
    case 'report':
        error_log('COMMAND : report');

        //Store Location to FILE
        // save($location);
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
 * MOVE PACMAN
 * @return array $location[x, y, f]
 */
function move($location){
    //Move location following the direction
    switch($location['f']){
        case 0:
            $location['y'] -= 1;
            break;
        case 1:
            $location['x'] += 1;
            break;
        case 2:
            $location['y'] += 1;
            break;
        case 3:
            $location['x'] -= 1;
            break;
    }

    //Store Location to FILE
    save($location);
    
    return $location;
}

/**
 * SAVE FILE
 * @param array $location
 */
function save($location){
    file_put_contents('json/location.json', json_encode($location));
}
/**
 * LOAD FILE
 * @return array $location[x, y, f]
 */
function load(){
    $location = file_get_contents('json/location.json');
    return json_decode($location, true);
}
?>