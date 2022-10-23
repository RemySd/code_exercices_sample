<?php 

function DNA_strand($dna) {

    $newDna = '';

    if (empty($dna)) {
        return '';
    }

    foreach (str_split($dna) as $char) {
        switch ($char) {
            case 'T':
                $newDna = $newDna . 'A';
                break;
            case 'A':
                $newDna = $newDna . 'T';
                break;
            case 'C':
                $newDna = $newDna . 'G';
                break;
            case 'G':
                $newDna = $newDna . 'C';
                break;
        }
    }

    // return strtr($dna, 'ATGC', 'TACG');

    return $newDna;
}

echo DNA_strand("GCAA");