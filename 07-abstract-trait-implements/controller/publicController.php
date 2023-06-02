<?php

use model\mapping\TheuserMapping;

$theuserMapping = new TheuserMapping([]);
// test du __toString() de la classe TheuserMapping
echo $theuserMapping;

// test du trait slugifyTrait
echo $theuserMapping->slugify("   Je suis, <br> 
   une chaîne de caractères !ç§'");
