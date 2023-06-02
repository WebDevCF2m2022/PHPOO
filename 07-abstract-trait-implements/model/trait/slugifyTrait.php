<?php

namespace model\trait;

// pour utiliser un trait, on utilise le mot-clé "use" DANS
// la classe qui va utiliser le trait
trait slugifyTrait
{
    // méthode qui va slugifier une chaîne de caractères
    // exemple: "Je suis une chaîne de caractères" devient "je-suis-une-chaine-de-caracteres"
    public function slugify(string $s):string{
        // Strip html tags
        $text=strip_tags($s);
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Transliterate
        setlocale(LC_ALL, 'en_US.utf8');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // Trim
        $text = trim($text, '-');
        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // Lowercase
        $text = strtolower($text);
        // Check if it is empty
        if (empty($text)) { return 'n-a'; }
        // Return result
        return $text;
    }

}