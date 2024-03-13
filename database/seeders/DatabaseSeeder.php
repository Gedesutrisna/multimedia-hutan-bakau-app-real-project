<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Question\Question;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123'),
            'image' => '/profile-img.svg',
        ]);

        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'image' => '/profile-img.svg',
        ]);
        
        Category::create([
            'name' => 'Tree',
            'slug' => 'tree',
            'description' => 'Tree',
        ]);
        Category::create([
            'name' => 'Mangrove',
            'slug' => 'mangrove',
            'description' => 'Mangrove',
        ]);

        Blog::create([
            'title' => 'Keindahan Hutan Bakau: Ekosistem yang Unik',
            'slug' => 'keindahan-hutan-bakau-ekosistem-unik',
            'body' => 'Hutan bakau adalah salah satu ekosistem yang unik di dunia, dengan kemampuannya untuk tumbuh di wilayah pantai yang tergenang air asin. Hutan bakau tidak hanya menjadi rumah bagi berbagai jenis flora dan fauna, tetapi juga memberikan manfaat penting bagi lingkungan dan manusia.',
            'assets' => '/profile-img.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Peran Penting Hutan Bakau dalam Pelestarian Lingkungan',
            'slug' => 'peran-hutan-bakau-pelestarian-lingkungan',
            'body' => 'Hutan bakau memiliki peran penting dalam pelestarian lingkungan. Akarnya yang kuat mampu menahan erosi pantai, melindungi daratan dari dampak badai dan tsunami. Selain itu, hutan bakau juga berperan sebagai tempat penyangga keanekaragaman hayati laut dan darat.',
            'assets' => '/profile-img.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Manfaat Ekonomi dari Hutan Bakau',
            'slug' => 'manfaat-ekonomi-hutan-bakau',
            'body' => 'Selain manfaat lingkungan, hutan bakau juga memiliki manfaat ekonomi yang signifikan. Masyarakat lokal dapat mengambil manfaat dari hasil hutan bakau seperti kayu bakau, tanaman obat tradisional, dan sumber daya ikan yang melimpah di sekitar hutan bakau.',
            'assets' => '/profile-img.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Ancaman Terhadap Kelestarian Hutan Bakau',
            'slug' => 'ancaman-kelestarian-hutan-bakau',
            'body' => 'Meskipun memiliki manfaat yang besar, hutan bakau dihadapkan pada berbagai ancaman. Perambahan lahan untuk pembangunan infrastruktur, penangkapan ikan yang tidak berkelanjutan, dan polusi air menjadi beberapa ancaman utama yang mengancam kelestarian hutan bakau.',
            'assets' => '/profile-img.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Upaya Pelestarian Hutan Bakau',
            'slug' => 'upaya-pelestarian-hutan-bakau',
            'body' => 'Untuk mempertahankan kelestarian hutan bakau, berbagai upaya pelestarian telah dilakukan. Hal ini meliputi pengembangan kawasan konservasi, pengawasan terhadap aktivitas manusia di sekitar hutan bakau, serta kampanye edukasi untuk meningkatkan kesadaran masyarakat akan pentingnya pelestarian ekosistem ini.',
            'assets' => '/profile-img.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Ekowisata: Menciptakan Kesadaran Lingkungan Lewat Hutan Bakau',
            'slug' => 'ekowisata-kesadaran-lingkungan-hutan-bakau',
            'body' => 'Pengembangan ekowisata di sekitar hutan bakau telah menjadi salah satu cara efektif untuk menciptakan kesadaran lingkungan. Melalui kegiatan ekowisata, wisatawan dapat mengalami langsung keindahan dan keanekaragaman hutan bakau, sementara juga mendukung upaya pelestariannya.',
            'assets' => '/profile-img.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Kerjasama Internasional dalam Pelestarian Hutan Bakau',
            'slug' => 'kerjasama-internasional-pelestarian-hutan-bakau',
            'body' => 'Pelestarian hutan bakau juga memerlukan kerjasama internasional. Berbagai negara dan lembaga internasional telah bekerja sama dalam program-program pelestarian hutan bakau, mengakui pentingnya kerjasama lintas batas untuk menjaga kelestarian ekosistem yang penting ini.',
            'assets' => '/profile-img.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        

        Quiz::create([
            'name' => 'Quiz Bakau Trees ',
            'slug' => 'quiz-bakau-trees',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'duration' => 20,
        ]);
        Quiz::create([
            'name' => 'Quiz Mangrove Trees ',
            'slug' => 'quiz-mangrove-trees',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'duration' => 15,
        ]);

        QuizQuestion::create([
            'question' => 'question 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
        ]);
        QuizQuestion::create([
            'question' => 'question 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'point' => 6.6666666666666,
            'quiz_question_id' => 1,
            'is_correct' => "true",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'point' => 0,
            'quiz_question_id' => 1,
            'is_correct' => "false",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'point' => 0,
            'quiz_question_id' => 1,
            'is_correct' => "false",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'point' => 0,
            'quiz_question_id' => 1,
            'is_correct' => "false",
        ]);

        QuizResult::create([
            'point' => 100,
            'quiz_id' => 1,
            'user_id' => 1,
        ]);
        QuizResult::create([
            'point' => 94,
            'quiz_id' => 2,
            'user_id' => 1,
        ]);


    }
}
