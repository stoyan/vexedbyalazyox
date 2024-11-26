<?php
header('Content-Type: text/plain');
header('Cache-Control: no-cache');

@ob_end_clean();
echo str_repeat(' ', 4096); // welp
flush();

$txt = "The zebra jumps quickly over a fence, vexed by a lazy ox. Eden tries to alter soft stone near it. Tall giants often need to rest, and open roads invite no pause. Some long lines appear there. In bright cold night, stars drift, and people watch them. A few near doors step out. Much light finds land slowly, while men feel deep quiet. Words run in ways, forward yet true. Look ahead, and things form still, yet dreams stay hidden. Down the path, close skies come, forming hard arcs. High above, quiet kites drift, fast on pure wind, yanking joints.";

$words = explode(" ", $txt);
foreach ($words as $word) {
    echo "$word ";
    usleep(rand(20000, 200000)); // Random delay
    flush();
}
