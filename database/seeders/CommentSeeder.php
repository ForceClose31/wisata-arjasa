<?php

namespace Database\Seeders;

use App\Models\Akun;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $articles = Article::all();
        $users = Akun::all();

        foreach ($articles as $article) {
            // Create 3-8 comments per article
            $commentsCount = rand(3, 8);

            for ($i = 0; $i < $commentsCount; $i++) {
                Comment::create([
                    'content' => $this->generateComment(),
                    'article_id' => $article->id,
                    'akun_id' => $users->random()->id,
                    'created_at' => now()->subDays(rand(0, 30))
                ]);
            }
        }
    }

    private function generateComment()
    {
        $comments = [
            "Artikel yang sangat informatif! Saya jadi tertarik untuk mengunjungi tempat ini.",
            "Terima kasih untuk panduannya, sangat membantu untuk perencanaan perjalanan saya.",
            "Saya sudah pernah ke sini dan pengalamannya persis seperti yang dijelaskan di artikel.",
            "Ada rekomendasi waktu terbaik untuk berkunjung?",
            "Foto-fotonya sangat bagus, membuat saya ingin segera kesana!",
            "Apakah cocok untuk dikunjungi bersama keluarga dengan anak kecil?",
            "Harganya masih berlaku untuk tahun ini?",
            "Ada tips khusus yang tidak disebutkan di artikel?",
            "Pengalaman pribadi saya kurang lebih sama dengan yang ditulis di sini.",
            "Bagaimana dengan akses transportasinya? Apakah mudah dijangkau?"
        ];

        return $comments[array_rand($comments)];
    }
}
