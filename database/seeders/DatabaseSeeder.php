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
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
        ]);
        Category::create([
            'name' => 'Mangrove',
            'slug' => 'mangrove',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
        ]);
        Category::create([
            'name' => 'Forest',
            'slug' => 'forest',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
        ]);


        Blog::create([
            'title' => 'Keindahan Hutan Bakau: Ekosistem yang Unik',
            'slug' => 'keindahan-hutan-bakau-ekosistem-unik',
            'body' => 'Hutan bakau adalah salah satu ekosistem yang unik di dunia, dengan kemampuannya untuk tumbuh di wilayah pantai yang tergenang air asin. Hutan bakau tidak hanya menjadi rumah bagi berbagai jenis flora dan fauna, tetapi juga memberikan manfaat penting bagi lingkungan dan manusia.',
            'assets' => '/example.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Peran Penting Hutan Bakau dalam Pelestarian Lingkungan',
            'slug' => 'peran-hutan-bakau-pelestarian-lingkungan',
            'body' => 'Hutan bakau memiliki peran penting dalam pelestarian lingkungan. Akarnya yang kuat mampu menahan erosi pantai, melindungi daratan dari dampak badai dan tsunami. Selain itu, hutan bakau juga berperan sebagai tempat penyangga keanekaragaman hayati laut dan darat.',
            'assets' => '/blog-2.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Manfaat Ekonomi dari Hutan Bakau',
            'slug' => 'manfaat-ekonomi-hutan-bakau',
            'body' => 'Selain manfaat lingkungan, hutan bakau juga memiliki manfaat ekonomi yang signifikan. Masyarakat lokal dapat mengambil manfaat dari hasil hutan bakau seperti kayu bakau, tanaman obat tradisional, dan sumber daya ikan yang melimpah di sekitar hutan bakau.',
            'assets' => '/blog-3.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Ancaman Terhadap Kelestarian Hutan Bakau',
            'slug' => 'ancaman-kelestarian-hutan-bakau',
            'body' => 'Meskipun memiliki manfaat yang besar, hutan bakau dihadapkan pada berbagai ancaman. Perambahan lahan untuk pembangunan infrastruktur, penangkapan ikan yang tidak berkelanjutan, dan polusi air menjadi beberapa ancaman utama yang mengancam kelestarian hutan bakau.',
            'assets' => '/blog-4.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Upaya Pelestarian Hutan Bakau',
            'slug' => 'upaya-pelestarian-hutan-bakau',
            'body' => 'Untuk mempertahankan kelestarian hutan bakau, berbagai upaya pelestarian telah dilakukan. Hal ini meliputi pengembangan kawasan konservasi, pengawasan terhadap aktivitas manusia di sekitar hutan bakau, serta kampanye edukasi untuk meningkatkan kesadaran masyarakat akan pentingnya pelestarian ekosistem ini.',
            'assets' => '/blog-5.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Ekowisata: Menciptakan Kesadaran Lingkungan Lewat Hutan Bakau',
            'slug' => 'ekowisata-kesadaran-lingkungan-hutan-bakau',
            'body' => 'Pengembangan ekowisata di sekitar hutan bakau telah menjadi salah satu cara efektif untuk menciptakan kesadaran lingkungan. Melalui kegiatan ekowisata, wisatawan dapat mengalami langsung keindahan dan keanekaragaman hutan bakau, sementara juga mendukung upaya pelestariannya.',
            'assets' => '/blog-6.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Kerjasama Internasional dalam Pelestarian Hutan Bakau',
            'slug' => 'kerjasama-internasional-pelestarian-hutan-bakau',
            'body' => 'Pelestarian hutan bakau juga memerlukan kerjasama internasional. Berbagai negara dan lembaga internasional telah bekerja sama dalam program-program pelestarian hutan bakau, mengakui pentingnya kerjasama lintas batas untuk menjaga kelestarian ekosistem yang penting ini.',
            'assets' => '/blog-7.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        
        Blog::create([
            'title' => 'Menyelamatkan Harimau Sumatera: Strategi Kolaboratif',
            'slug' => 'menyelamatkan-harimau-sumatera-strategi-kolaboratif',
            'body' => 'Harimau Sumatera, yang merupakan asli hutan hujan Indonesia, menghadapi kepunahan akibat hilangnya habitat dan perburuan liar. Kerjasama internasional sangat penting untuk kelangsungan hidup mereka. Upaya bersama dalam restorasi habitat, tindakan anti-perburuan, dan keterlibatan masyarakat dapat menjamin masa depan bagi kucing besar yang megah ini.',
            'assets' => '/blog-8.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        Blog::create([
            'title' => 'Konservasi Hutan Boreal: Upaya Lintas Batas',
            'slug' => 'konservasi-hutan-boreal-lintas-batas',
            'body' => 'Hutan boreal, yang membentang di wilayah utara Amerika Utara, Eropa, dan Asia, menyimpan keanekaragaman hayati unik dan cadangan karbon yang besar. Kerjasama internasional sangat penting untuk mengatasi tantangan seperti penebangan, pertambangan, dan perubahan iklim. Dengan bekerja sama, kita dapat memastikan kelangsungan ekosistem kritis ini.',
            'assets' => '/blog-9.svg',
            'category_id' => 1,
            'admin_id' => 1,
        ]);
        // Blog::create([
        //     'title' => 'Hutan Amazon: Tanggung Jawab Global',
        //     'slug' => 'hutan-amazon-tanggung-jawab-global',
        //     'body' => 'Hutan Amazon, sering disebut sebagai paru-paru bumi, menghadapi ancaman luar biasa akibat deforestasi, perubahan iklim, dan penebangan liar. Kerjasama internasional sangat penting untuk melindungi hotspot keanekaragaman hayati ini. Negara-negara harus bekerja sama untuk mengatasi kerugian hutan, mendorong praktik berkelanjutan, dan menjaga harta alam berharga ini.',
        //     'assets' => '/blog-10.png',
        //     'category_id' => 1,
        //     'admin_id' => 1,
        // ]);
        // Blog::create([
        //     'title' => 'Upaya Kolaboratif untuk Pelestarian Hutan Mangrove',
        //     'slug' => 'upaya-kolaboratif-pelestarian-mangrove',
        //     'body' => 'Hutan mangrove memainkan peran penting dalam ekosistem pantai, memberikan habitat bagi berbagai spesies, dan berfungsi sebagai pelindung alami terhadap badai dan erosi. Kerjasama internasional sangat diperlukan untuk menjaga kelestarian hutan ini. Berbagai negara dan organisasi internasional telah bergabung dalam program-program yang bertujuan melindungi ekosistem kritis ini.',
        //     'assets' => '/blog-11.png',
        //     'category_id' => 1,
        //     'admin_id' => 1,
        // ]);

        Quiz::create([
            'name' => 'Kuis Ekosistem Hutan Bakau',
            'slug' => 'kuis-ekosistem-hutan-bakau',
            'description' => 'Tes pengetahuan tentang ekosistem hutan bakau, termasuk spesies tumbuhan dan hewan yang mendiami lingkungan tersebut, peran hutan bakau dalam menjaga kelestarian pantai, dan ancaman terhadap keberlangsungan hutan bakau.',
            'image' => '/quiz-1.svg',
            'duration' => 15,
        ]);

        Quiz::create([
            'name' => 'Kuis Konservasi Mangrove',
            'slug' => 'kuis-konservasi-mangrove',
            'description' => 'Uji pengetahuan tentang upaya konservasi hutan mangrove, termasuk metode restorasi hutan bakau, peran masyarakat dalam melindungi ekosistem mangrove, dan manfaat ekonomi dari pelestarian hutan mangrove.',
            'image' => '/quiz-1.svg',
            'duration' => 20,
        ]);

        Quiz::create([
            'name' => 'Kuis Flora dan Fauna Mangrove',
            'slug' => 'kuis-flora-dan-fauna-mangrove',
            'description' => 'Uji pengetahuan tentang flora dan fauna yang hidup di ekosistem mangrove, termasuk adaptasi spesies terhadap lingkungan berlumpur, interaksi antar spesies dalam hutan bakau, dan pentingnya keberagaman hayati di mangrove.',
            'image' => '/quiz-1.svg',
            'duration' => 18,
        ]);

        QuizQuestion::create([
            'question' => 'question 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => null,
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 5 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 6 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 7 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 8 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 9 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 10 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 11 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 12 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 13 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 14 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 15 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 1,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 5 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 6 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 7 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 8 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 9 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 10 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 11 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 12 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 13 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 14 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 15 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 2,
            'correct' => "A",
        ]);
        
        QuizQuestion::create([
            'question' => 'question 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 5 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 6 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 7 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 8 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 9 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 10 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 11 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 12 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 13 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 14 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);
        QuizQuestion::create([
            'question' => 'question 15 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'image' => '/profile-img.svg',
            'quiz_id' => 3,
            'correct' => "A",
        ]);

        QuizAnswer::create([
            'answer_text' => null,
            'answer_image' => '/profile-img.svg',
            'quiz_question_id' => 1,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 1,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 1,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 1,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 2,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 2,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 2,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 2,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1  sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 3,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2  sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 3,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3  sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 3,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4  sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 3,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 4,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 4,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 4,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 4,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 5,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 5,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 5,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 5,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 6,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 6,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 6,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 6,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 7,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 7,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 7,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 7,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 8,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 8,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 8,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 8,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 9,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 9,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 9,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 9,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 10,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 10,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 10,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 10,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 11,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 11,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 11,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 11,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 12,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 12,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 12,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 12,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 13,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 13,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 13,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 13,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 14,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 14,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 14,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 14,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 15,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 15,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 15,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 15,
            'option' => "D",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 16,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 16,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 16,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 16,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 17,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 17,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 17,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 17,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 18,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 18,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 18,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 18,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 19,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 19,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 19,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 19,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 20,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 20,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 20,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 20,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 21,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 21,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 21,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 21,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 22,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 22,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 22,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 22,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 23,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 23,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 23,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 23,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 24,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 24,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 24,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 24,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 25,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 25,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 25,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 25,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 26,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 26,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 26,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 26,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 27,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 27,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 27,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 27,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 28,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 28,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 28,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 28,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 29,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 29,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 29,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 29,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 30,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 30,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 30,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 30,
            'option' => "D",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 31,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 31,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 31,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 31,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 32,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 32,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 32,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 32,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 33,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 33,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 33,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 33,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 34,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 34,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 34,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 34,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 35,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 35,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 35,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 35,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 36,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 36,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 36,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 36,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 37,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 37,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 37,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 37,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 38,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 38,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 38,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 38,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 39,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 39,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 39,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 39,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 40,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 40,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 40,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 40,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 41,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 41,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 41,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 41,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 42,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 42,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 42,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 42,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 43,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 43,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 43,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 43,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 44,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 44,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 44,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 44,
            'option' => "D",
        ]);

        QuizAnswer::create([
            'answer_text' => 'answer 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 45,
            'option' => "A",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 2 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 45,
            'option' => "B",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 3 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 45,
            'option' => "C",
        ]);
        QuizAnswer::create([
            'answer_text' => 'answer 4 Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus eaque sapiente reprehenderit sed aspernatur debitis libero voluptatibus soluta omnis sit officiis provident ex unde perferendis a esse, beatae quaerat blanditiis?',
            'answer_image' => null,
            'quiz_question_id' => 45,
            'option' => "D",
        ]);


        QuizResult::create([
            'point' => 94,
            'quiz_id' => 1,
            'user_id' => 1,
        ]);


    }
}
