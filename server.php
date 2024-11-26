<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

@ob_end_clean();

// first event
echo "event: start\n";
echo "data:\n\n";
flush();

/*
$go = 5;
while ($go) {
    $go--;
    // Send a message
    echo sprintf(
      "id: %s\ndata: It's %s o'clock on my server. \n\n", 
      5 - $go,
      date('H:i:s', time()),
    );
    flush();
    sleep(1);
}
*/


$txt = "The zebra jumps quickly over a fence, vexed by a lazy ox. Eden tries to alter soft stone near it. Tall giants often need to rest, and open roads invite no pause. Some long lines appear there. In bright cold night, stars drift, and people watch them. A few near doors step out. Much light finds land slowly, while men feel deep quiet. Words run in ways, forward yet true. Look ahead, and things form still, yet dreams stay hidden. Down the path, close skies come, forming hard arcs. High above, quiet kites drift, fast on pure wind, yanking joints.";

$words = explode(" ", $txt);
foreach ($words as $word) {
    echo "data: $word \n\n";
    usleep(rand(90000, 200000)); // Random delay
    flush();
}

// an event to tell the client there's no mo'
echo "id: end\n";
echo "event: done\n";
echo "data:\n\n";


