<?php

    echo "CLEANING STARTED <br>";

    $sessionPath = dirname(__FILE__).'/var/sessions/';
    $files = glob($sessionPath.'sess_*');
    $now = time();
    $maxAge = 86400; // 1 día en segundos

    $cnt_files = 0;
    $cnt_cleaned = 0;
    foreach ($files as $file) {
        if (is_file($file)) {
            $cnt_files++;
            if ($now - filemtime($file) >= $maxAge) {
                $cnt_cleaned++;
                unlink($file);
            }
        }
    }

    echo "CLEANING FINISHED <br>";
    echo "Files: ".$cnt_files." <br>";
    echo "Deleted: ".$cnt_cleaned." <br>";

?>