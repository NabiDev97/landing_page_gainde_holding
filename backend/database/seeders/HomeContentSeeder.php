<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Project;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Support\Str;

class HomeContentSeeder extends Seeder
{
    public function run()
    {
        // Services (using static texts/images)
        $services = [
            ['title' => 'Construction de bâtiments', 'description' => 'Nous excellons dans la construction de bâtiments résidentiels et commerciaux, en utilisant des techniques modernes pour assurer durabilité et qualité supérieure.', 'image' => 'service-1.jpg'],
            ['title' => 'Rénovation de maisons', 'description' => 'Redonnez vie à votre maison avec nos services de rénovation complets, adaptés à vos besoins pour un espace moderne et fonctionnel.', 'image' => 'service-2.jpg'],
            ['title' => 'Conception architecturale', 'description' => 'Nos architectes créent des designs innovants et personnalisés, alliant esthétique et fonctionnalité pour des projets uniques.', 'image' => 'service-3.jpg'],
            ['title' => 'Design d\'intérieur', 'description' => 'Transformez vos espaces intérieurs avec nos experts en design, pour un environnement élégant et confortable.', 'image' => 'service-4.jpg'],
            ['title' => 'Réparation et support', 'description' => 'Nous offrons des services de réparation rapides et fiables pour maintenir vos propriétés en parfait état.', 'image' => 'service-5.jpg'],
            ['title' => 'Peinture', 'description' => 'Donnez une nouvelle vie à vos murs avec nos services de peinture professionnels, utilisant des produits de qualité pour des finitions durables.', 'image' => 'service-6.jpg'],
        ];

        foreach ($services as $s) {
            $slug = Str::slug($s['title']);
            // adapt to existing column names (some installs use `name`/`icon`)
            $payload = ['slug' => $slug, 'description' => $s['description']];
            if (\Schema::hasColumn('services', 'title')) {
                $payload['title'] = $s['title'];
            } else {
                $payload['name'] = $s['title'];
            }
            if (\Schema::hasColumn('services', 'image')) {
                $payload['image'] = $s['image'];
            } else {
                $payload['icon'] = $s['image'];
            }
            Service::updateOrCreate(['slug' => $slug], $payload);
        }

        // Projects (use portfolio images)
        $projects = [
            ['title' => 'Projet Alpha', 'description' => 'Construction d\'un immeuble résidentiel moderne.', 'image' => 'portfolio-1.jpg'],
            ['title' => 'Projet Béta', 'description' => 'Rénovation complète d\'une maison familiale.', 'image' => 'portfolio-2.jpg'],
            ['title' => 'Projet Gamma', 'description' => 'Aménagement d\'espaces commerciaux.', 'image' => 'portfolio-3.jpg'],
            ['title' => 'Projet Delta', 'description' => 'Extension et modernisation.', 'image' => 'portfolio-4.jpg'],
            ['title' => 'Projet Epsilon', 'description' => 'Rénovation intérieure haut de gamme.', 'image' => 'portfolio-5.jpg'],
            ['title' => 'Projet Zeta', 'description' => 'Réhabilitation d\'un bâtiment historique.', 'image' => 'portfolio-6.jpg'],
        ];

        foreach ($projects as $p) {
            Project::updateOrCreate(['slug' => Str::slug($p['title'])], array_merge($p, ['slug' => Str::slug($p['title'])]));
        }

        // Team members
        $members = [
            ['name' => 'Adam Phillips', 'title' => 'PDG et Fondateur', 'bio' => 'Leader passionné avec une décennie d\'expérience.', 'image' => 'team-1.jpg'],
            ['name' => 'Sara Collins', 'title' => 'Architecte en chef', 'bio' => 'Architecte spécialisée en design durable.', 'image' => 'team-2.jpg'],
            ['name' => 'John Doe', 'title' => 'Chef de chantier', 'bio' => 'Coordination des équipes et sécurité.', 'image' => 'team-3.jpg'],
            ['name' => 'Jane Smith', 'title' => 'Ingénieure', 'bio' => 'Expertise technique et supervision.', 'image' => 'team-4.jpg'],
        ];

        foreach ($members as $m) {
            $payload = ['name' => $m['name'], 'bio' => $m['bio'] ?? null];
            if (\Schema::hasColumn('team_members', 'title')) {
                $payload['title'] = $m['title'] ?? null;
            } elseif (\Schema::hasColumn('team_members', 'role')) {
                $payload['role'] = $m['title'] ?? null;
            }
            if (\Schema::hasColumn('team_members', 'image')) {
                $payload['image'] = $m['image'] ?? null;
            } elseif (\Schema::hasColumn('team_members', 'photo')) {
                $payload['photo'] = $m['image'] ?? null;
            }
            TeamMember::updateOrCreate(['name' => $m['name']], $payload);
        }

        // Testimonials
        $testimonials = [
            ['name' => 'Client A', 'role' => 'CEO, Company A', 'content' => 'Equipe professionnelle et résultats exceptionnels.', 'image' => 'testimonial-1.jpg'],
            ['name' => 'Client B', 'role' => 'Manager, Company B', 'content' => 'Travail livré dans les temps et conforme aux attentes.', 'image' => 'testimonial-2.jpg'],
        ];

        foreach ($testimonials as $t) {
            $payload = ['name' => $t['name']];
            if (\Schema::hasColumn('testimonials', 'content')) {
                $payload['content'] = $t['content'];
            } elseif (\Schema::hasColumn('testimonials', 'message')) {
                $payload['message'] = $t['content'];
            }
            if (\Schema::hasColumn('testimonials', 'role')) {
                $payload['role'] = $t['role'] ?? null;
            }
            if (\Schema::hasColumn('testimonials', 'image')) {
                $payload['image'] = $t['image'] ?? null;
            } elseif (\Schema::hasColumn('testimonials', 'photo')) {
                $payload['photo'] = $t['image'] ?? null;
            }
            Testimonial::updateOrCreate(['name' => $t['name']], $payload);
        }
    }
}
