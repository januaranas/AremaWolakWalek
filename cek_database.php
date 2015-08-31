<?php
        $file = fopen("data/database.txt", "r");
        while (!feof($file)) {
            @$kamus .= fgets($file);
        }
			preg_match_all('#"([^"]+)"\s*=\s*"([^"]+)";#', $kamus, $match);
			$rubah = array_combine($match[1], $match[2]);
			$filter = array_search(strtolower($kata_satu),$rubah);		
    ?>