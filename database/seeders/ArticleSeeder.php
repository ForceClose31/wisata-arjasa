<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $articles = [
            [
                'title' => 'Menjelajahi Keindahan Pantai Ngurbloat',
                'category' => 'Wisata',
                'content' => $this->generateContent('Pantai Ngurbloat'),
                'thumbnail' => 'articles/ngurbloat.jpg'
            ],
            [
                'title' => 'Festival Budaya Arjasa 2023',
                'category' => 'Event',
                'content' => $this->generateContent('Festival Budaya'),
                'thumbnail' => 'articles/festival.jpg'
            ],
            [
                'title' => '5 Makanan Khas Arjasa yang Wajib Dicoba',
                'category' => 'Kuliner',
                'content' => $this->generateContent('Makanan Khas'),
                'thumbnail' => 'articles/kuliner.jpg'
            ],
            [
                'title' => 'Panduan Lengkap Berwisata ke Arjasa',
                'category' => 'Tips',
                'content' => $this->generateContent('Panduan Wisata'),
                'thumbnail' => 'articles/panduan.jpg'
            ],
            [
                'title' => 'Mengenal Sejarah Kerajaan Arjasa',
                'category' => 'Sejarah',
                'content' => $this->generateContent('Sejarah Kerajaan'),
                'thumbnail' => 'articles/sejarah.jpg'
            ],
            [
                'title' => 'Cottage Terbaik di Kawasan Arjasa',
                'category' => 'Akomodasi',
                'content' => $this->generateContent('Cottage'),
                'thumbnail' => 'articles/cottage.jpg'
            ],
        ];

        $tags = Tag::all();

        foreach ($articles as $articleData) {
            $article = Article::create([
                'title' => $articleData['title'],
                'slug' => Str::slug($articleData['title']),
                'content' => $articleData['content'],
                'category' => $articleData['category'],
                'thumbnail' => $articleData['thumbnail'],
                'views_count' => rand(100, 1000)
            ]);

            // Attach random tags (2-4 tags per article)
            $article->tags()->attach(
                $tags->random(rand(2, 4))->pluck('id')->toArray()
            );
        }
    }

    private function generateContent($topic)
    {
        return '<h2>Pengalaman Menakjubkan di ' . $topic . '</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
                <p>Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p>
                <h3>Fasilitas Unggulan</h3>
                <p>Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus:</p>
                <ul>
                    <li>Fasilitas pertama yang menarik</li>
                    <li>Keunikan kedua yang tidak ditemukan di tempat lain</li>
                    <li>Pelayanan ketiga yang memuaskan</li>
                </ul>
                <p>Pellentesque auctor neque nec urna. Proin sapien ipsum, porta a, auctor quis, euismod ut, mi. Aenean viverra rhoncus pede.</p>
                <h3>Tips Berkunjung</h3>
                <p>Morbi mattis ullamcorper velit. Phasellus gravida semper nisi. Nullam vel sem.</p>';
    }
}
