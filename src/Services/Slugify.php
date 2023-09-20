<?php

namespace App\Services;

use Symfony\Component\String\Slugger\AsciiSlugger;

class Slugify
{
    public function generateSlug(string $texte){
        $slugger = new AsciiSlugger();
        $slug = $slugger->slug($texte);

        return $slug;
    }
}