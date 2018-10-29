<?php

$post_command = isset($_POST['command'])?$_POST['command']:null;
error_log('$_POST[command] : '.$_POST['command']);
$output = '';
$success = true;

switch($post_command){
    case 'place':
        error_log('COMMAND : place');
        $output = 'PLACE 0,0,NORTH';
        break;
    case 'move':
        error_log('COMMAND : move');
        $output = 'MOVE';
        break;
    case 'left':
        error_log('COMMAND : left');
        $output = 'LEFT';
        break;
    case 'right':
        error_log('COMMAND : right');
        $output = 'RIGHT';
        break;
    case 'report':
        error_log('COMMAND : report');
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
?>