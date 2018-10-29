<?php
$post_command = isset($_POST['command'])?$_POST['command']:null;

$location = '';
switch($post_command){
    case 'place':
        //Place pacman on random loaction
        $x = mt_rand(0,4);
        $y = mt_rand(0,4);
        $f = mt_rand(0,3);
        $location = ['x'=>$x, 'y'=>$y, 'f'=>$f];

        //Store Location to FILE
        save($location);
        break;
    case 'move':
        //Move pacman and Save location
        $location = move();
        break;
    case 'left':
        //Turn pacman and Save location
        $location = turn('left');
        break;
    case 'right':
        //Turn pacman and Save location
        $location = turn('right');
        break;
    case 'report':
        //Load location
        $location = load();
        break;
    default;
        break;
}

if(is_array($location)){
    echo json_encode(['success' => true, 'command' => $post_command, 'location' => $location]);
}else{
    echo json_encode(['success' => false, 'message' => 'Pacman cannot move toward.']);
}
exit();

/**
 * MOVE PACMAN
 * @return array $location[x, y, f]
 */
function move(){
    $location = load();

    //Move location following the direction
    switch($location['f']){
        case 0:
            if($location['y'] < 4){
                $location['y'] += 1;
            }else{
                $location = null;
            }
            break;
        case 1:
            if($location['x'] < 4){
                $location['x'] += 1;
            }else{
                $location = null;
            }
            break;
        case 2:
            if($location['y'] > 0){
                $location['y'] -= 1;
            }else{
                $location = null;
            }
            break;
        case 3:
            if($location['x'] > 0){
                $location['x'] -= 1;
            }else{
                $location = null;
            }
            break;
    }

    //Store Location to FILE
    if($location != null){
        save($location);
    }
    
    return $location;
}

/**
 * TURN PACMAN
 * @param string $input : 'left' or 'right'
 * @return array $location[x, y, f]
 */
function turn($input){
    $location = load();

    //Move location following the direction
    switch($input){
        case 'left':
            if($location['f'] > 0){
                $location['f'] -= 1;
            }else{
                $location['f'] = 3;
            }
            break;
        case 'right':
            if($location['f'] < 3){
                $location['f'] += 1;
            }else{
                $location['f'] = 0;
            }
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