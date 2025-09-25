<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        Article::truncate();

        $articles = [
            [
                'title'   => 'A Developer\'s Guide to Core Web Vitals',
                'slug'    => 'guide-to-core-web-vitals',
                'excerpt' => 'LCP, FID, CLS... Let\'s break down what these metrics mean and how to write code that directly improves them.',
                'body'    => 'The full body of the article would go here.',
                'image'   => 'https://images.unsplash.com/photo-1457369804613-52c61a468e7d?q=80&w=1200'
            ],
            [
                'title'   => 'Why Your React Site is Slow (And How to Fix It)',
                'slug'    => 'why-your-react-site-is-slow',
                'excerpt' => 'Exploring common performance bottlenecks in React applications, from large bundle sizes to inefficient rendering.',
                'body'    => 'The full body of the article would go here.',
                'image'   => 'https://images.unsplash.com/photo-1599507593499-a3f7d7d97667?q=80&w=1200'
            ],
            [
                'title'   => 'Beyond Keywords: Writing for Humans and Google',
                'slug'    => 'writing-for-humans-and-google',
                'excerpt' => 'My approach, blending journalistic principles with SEO, to create content that ranks high and resonates deeply with readers.',
                'body'    => 'The full body of the article would go here.',
                'image'   => 'https://images.unsplash.com/photo-1515879218367-8466d910aaa4?q=80&w=1200'
            ],
        ];

        foreach ($articles as $article) {
            Article::create($article);
        }
    }
}