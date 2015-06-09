#!/usr/bin/php
<?php

function setDPI()
{
    print shell_exec('xinput list');
    $mouseId = intval(readline("Please enter the mouse ID:"));
    $askQuestion = function(){
        return strtolower(readline("Do you want to decrease the mouse sensitivity (y/n)? "));
    };

    $input = '';

    while(!in_array($input, array('y', 'n')) )
    {
        $input = $askQuestion();
    }

    if ($input == 'y')
    {
        $factor = readline("Please enter the deceleration factor (higher = slower, 1 = no change.)" . PHP_EOL);
        $cmd = 'xinput set-prop ' . $mouseId . ' "Device Accel Constant Deceleration" ' . $factor;
        shell_exec($cmd);
    }
}

function setAcceleration()
{
    $askQuestion = function() {
        return strtolower(readline("Do you want mouse acceleration? (y/n)? "));
    };

    $input = '';

    while (!in_array($input, array('y', 'n')) )
    {
        $input = $askQuestion();
    }

    if ($input == 'y')
    {
        # Now for setting the acceleration
        $acceleration = readline("enter the acceleration integer or fraction: ");
        $threshold = readline("enter the threshold integer: ");
    }
    else
    {
        $acceleration = 1;
        $threshold = 20; # doesnt matter if acceleration is 1 anyway.
    }

    $command = 'xset m ' . $acceleration . ' ' . $threshold;
    shell_exec($command);
}

setDPI();
setAcceleration();










