<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageSection;

class PageSectionsSeeder extends Seeder
{
    public function run()
    {
        $sections = [
            'about' => '<h1 class="display-5 text-uppercase mb-4">Nous sommes <span class="text-primary">les Leaders</span> dans l\'Industrie de la Construction</h1><p>Chez GAÏNDE-HOLDING, nous nous engageons à offrir des services de construction de haute qualité.</p>',
            'services' => '<h1 class="display-5 text-uppercase mb-4">Nous Fournissons <span class="text-primary">Les Meilleurs</span> Services de Construction</h1>',
            'projects' => '<h1 class="display-5 text-uppercase mb-4">Quelques-uns de nos <span class="text-primary">Projets de Rêve</span> Populaires</h1>',
            'team' => '<h1 class="display-5 text-uppercase mb-4">Nous sommes des <span class="text-primary">Ouvriers Professionnels et Experts</span></h1>',
            'quote' => '<div class="mb-4"><h1 class="display-5 text-uppercase mb-4">Demander un <span class="text-primary">Rappel</span></h1></div><p class="mb-5">Vous avez un projet en tête ? Laissez-nous vous contacter pour discuter de vos besoins.</p><a class="btn btn-primary py-3 px-5" href="#contact">Obtenir un devis</a>',
            'contact' => '<h2>Contactez-nous</h2><p>Envoyez-nous un message via le formulaire ou par email: info@gaindeholding.com</p>'
        ];

        foreach ($sections as $key => $html) {
            PageSection::updateOrCreate(['key' => $key], ['title' => ucfirst($key), 'content' => $html]);
        }
    }
}
