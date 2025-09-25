<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::truncate();

        $projects = [
            [
                'title'       => 'E-Commerce LCP Optimization',
                'tags'        => 'React • Core Web Vitals',
                'description' => 'Optimized a React-based project for Core Web Vitals, reducing Largest Contentful Paint by 70%.',
                'image'       => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200'
            ],
            [
                'title'       => 'Dynamic Schema for Rich Snippets',
                'tags'        => 'Schema Markup • JavaScript',
                'description' => 'Engineared a custom JavaScript solution to dynamically inject JSON-LD schema for e-commerce products.',
                'image'       => 'https://images.unsplash.com/photo-1542831371-29b0f74f9713?q=80&w=1200'
            ],
            [
                'title'       => 'SaaS Organic Traffic Growth',
                'tags'        => 'Content Strategy • SEO',
                'description' => 'Architected a data-driven content strategy for a SaaS model, increasing organic traffic by 48% in a single quarter.',
                'image'       => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?q=80&w=1200'
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}