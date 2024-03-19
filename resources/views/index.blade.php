@extends('layouts.main')
@section('container')


    
        <section class="mt-[32px]">
            <div class="container mx-auto xl:grid xl:grid-cols-12">
                <div class="col-span-6 xl:space-y-[24px] 2xl:space-y-[32px] space-y-[32px] w-full h-full">
                    <h1 class="text-[40px] sm:text-[62px] font-Urbanist font-bold 2xl:w-[511px] xl:leading-[65px] 2xl:leading-[75px] leading-snug lg:tracking-wider"><span class="text-[#1A3C40]">Menjelajahi</span> Dan <span class="text-[#1A3C40]">Merawat</span> Bakau Upaya Menjaga <span class="text-[#1A3C40]">Hutan Bakau</span></h1>
                    <p class="font-Urbanist text-base sm:text-base font-medium tracking-wide 2xl:w-[577px] sm:text-justify text-black leading-[24px]">Melalui program 'Menjelajahi dan Merawat Bakau', Kami berkomitmen untuk menjaga keberlangsungan ekosistem hutan bakau. Dengan upaya konservasi ini, kami bertujuan untuk melindungi keanekaragaman hayati serta memastikan keberlangsungan hidup bakau sebagai bagian integral dari ekosistem yang berharga.</p>
                    <div class="flex items-center gap-[6px]">
                        <a href="/"><button class="bg-white font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[20px] sm:px-[40px] rounded-[6px]">Pelajari Selengkapnya</button></a> 
                        <a href="/quizzes"><button class="bg-white font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[20px] sm:px-[40px] rounded-[6px]">Coba Quiz</button></a> 
                    </div>
                </div>
    
    
    
                <div class="col-span-6 xl:ms-[59px]">
                    <img class="hidden w-full h-full xl:flex" src="/assets/right-img-hero.svg" alt="">
                </div>
            </div>
        </section>
    
        <section class="mt-[80px]">
            <div class="container mx-auto">
                <div class="lg:flex md:flex-col lg:flex-row items-center justify-between lg:gap-[28px] xl:gap-0">
                    <p class="font-Urbanist font-bold text-[32px] sm:text-[38px] xl:text-[52px] leading-normal xl:leading-[65px] mb-4 lg:mb-0">Blog Terbaru <br> Mengenai <span class="text-[#1A3C40]">Mangrove</span></p>
                    <p class="text-[16px] font-Urbanist font-medium text-black flex items-center text-justify lg:w-[457px]">Menyelami Kekayaan Mangrove melalui Informasi Terkini, Tren, dan Panduan Praktis  di Blog Kami, Mengajak Anda untuk Memperdalam Pemahaman tentang Keunikan Ekosistem Laut dan Menggalakkan Upaya Konservasi.</p>
                </div>
    
                <div class="grid lg:grid-cols-3 grid-cols-1 sm:grid-cols-2 mt-[48px] gap-[44px] w-full h-full">
                    @foreach ($blogs as $blog)
                    <a href="/blogs">
                        <div class="">
                            <div class="relative">
                                <img class="w-full h-full " src="{{ asset('/images'.$blog->assets) }}" alt="">
                                <div class="absolute px-[28px] py-[5.5px] bg-[#D9E9E4] bottom-0 right-0 font-Urbanist text-[12px] font-semibold">Blog</div>
                            </div>
                            
                            <div class="mt-3">
                                <p class="2xl:text-[27px] xl:text-[24px] font-Urbanist font-bold">{{ $blog->title }}</p>
                                <p class="font-Urbanist mt-3 text-[14px] font-medium leading-[18px] text-[#101828]">{!! Str::limit($blog->body, 90) !!}</p>
                                <p class="font-semibold font-Urbanist text-[14px] text-[#101828] mt-3">{{ $blog->created_at->format('d M Y') }}</p>
                            </div> 
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            
            <div class="flex justify-center mt-[48px]">
                <a href="/blogs">
                    <button class="px-12 py-4 text-base font-bold font-Urbanist text-[#1A3C40] rounded-[6px] bg-white">Lihat Selengkapnya</button>
                </a>
            </div> 
        </section>
        
        <section class="mt-[80px]">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 xl:grid-cols-12 items-center">
                    <div class="col-span-6">
                        <button class="py-[18.5px] px-[38.5px] font-Urbanist font-semibold text-[#1A3C40] bg-[#D9E9E4] rounded-[999px]">Jelajahi Fitur-Fitur Terbaik Kami</button>
                        <h1 class="font-semibold font-Urbanist text-[48px] sm:text-[62px] lg:text-[52px] xl:text-[62px] leading-[65px] mt-[32px]">Menemukan <span class="text-[#1A3C40]">Keistimewaan Kami</span> Bersama Anda</h1>
                        <h5 class="mt-[32px] font-Urbanist text-[18px] font-medium xl:w-[439px] leading-[22px] tracking-wide text-justify">Temukan Keistimewaan Ekosistem Mangrove Melalui Fitur Terbaik Kami: Petualangan Virtual Menjelajahi Keanekaragaman Alam dan Program Konservasi yang Memukau.</h5>
                        <div class="flex items-center gap-[24px] mt-[32px]">
                            <a href="/blogs"><button class="bg-white font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[24px] sm:px-[48px] rounded-[6px]">Pilihan Blog</button></a> 
                            <a href="/quizzes"><button class="bg-white font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[24px] sm:px-[48px] rounded-[6px]">Coba Quiz</button></a> 
                        </div>
                    </div> 
                    <div class="hidden xl:flex"></div>
                    <div class="col-span-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-[16px]">
                            <div class="p-[24px] w-full h-full bg-[#428574] rounded-[4px]">
                                <div class="">
                                    <img src="/assets/Membangkitkan-1.svg" alt="">
                                </div>
                                <p class="font-Urbanist font-medium text-[24px] mb-[0px] mt-[18px] text-white">Membangkitkan</p>
                                <p class="font-normal font-Urbanist text-[14px] text-white">Mengembangkan Kembali Habitat Bakau Asri</p>
                            </div>
    
                            <div class="p-[24px] w-full h-full bg-[#428574] rounded-[4px]">
                                <div class="">
                                    <img src="/assets/Membangkitkan-1.svg" alt="">
                                </div>
                                <p class="font-Urbanist font-medium text-[24px] mb-[0px] mt-[18px] text-white">Restorasi</p>
                                <p class="font-normal font-Urbanist text-[14px] text-white">Memulihkan Kembali Hutan Bakau Terancam</p>
                            </div>
    
                            <div class="p-[24px] w-full h-full bg-[#428574] rounded-[4px]">
                                <div class="">
                                    <img src="/assets/Membangkitkan-1.svg" alt="">
                                </div>
                                <p class="font-Urbanist font-medium text-[24px] mb-[0px] mt-[18px] text-white">Penjaga</p>
                                <p class="font-normal font-Urbanist text-[14px] text-white">Memelihara Pelindung Alam Pesisir Alami</p>
                            </div>
    
                            <div class="p-[24px] w-full h-full bg-[#428574] rounded-[4px]">
                                <div class="">
                                    <img src="/assets/Membangkitkan-1.svg" alt="">
                                </div>
                                <p class="font-Urbanist font-medium text-[24px] mb-[0px] mt-[18px] text-white">Konservasi</p>
                                <p class="font-normal font-Urbanist text-[14px] text-white">Melestarikan Warisan Hijau untuk Masa Depan</p>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="mt-[80px]">
            <div class="container mx-auto">
                <div class="lg:flex md:flex-col lg:flex-row items-center justify-between lg:gap-[28px] xl:gap-0">
                    <p class="font-Urbanist font-bold text-[32px] sm:text-[38px] xl:text-[52px] leading-normal xl:leading-[65px] mb-4 lg:mb-0">Quiz Terbaru <br> Mengenai <span class="text-[#1A3C40]">Mangrove</span></p>
                    <p class="text-[16px] font-Urbanist font-medium text-black flex items-center text-justify lg:w-[457px]">Ayo uji pengetahuanmu tentang ekosistem mangrove dengan mengikuti quiz  yang tersedia di web kami!  untuk mendalami informasi terkini, tren, dan panduan praktis dalam menjaga keunikan ekosistem Mangrove.</p>
                </div>
                <div class="grid lg:grid-cols-3 grid-cols-1 sm:grid-cols-2 mt-[48px] gap-[44px] w-full h-full">
    
                    @foreach ($quizzes as $quiz)
                    <a href="/quizzes/{{ $quiz->slug }}">
                        <div class="">
                            <div class="relative">
                                <img class="w-full h-full" src="{{ asset('/images'.$quiz->image) }}" alt="">
                                <div class="absolute px-[28px] py-[5.5px] bg-[#D9E9E4] bottom-0 right-0 font-Urbanist text-[12px] font-semibold">Quiz</div>
                            </div>
                            
                            <div class="mt-3">
                                <p class="2xl:text-[27px] xl:text-[24px] font-Urbanist font-bold">{{ $quiz->name }}</p>
                                <p class="font-Urbanist mt-3 text-[14px] font-medium leading-[18px] text-[#101828]">{!! Str::limit($quiz->description, 90) !!}</p>
                                <p class="font-semibold font-Urbanist text-[14px] text-[#101828] mt-3">{{ $quiz->created_at->format('d M Y') }}</p>
                            </div> 
                        </div>
                    </a>
                    @endforeach
    
                </div>
            </div>
            
            <div class="flex justify-center mt-[48px]">
                <a href="/quizzes">
                    <button class="px-12 py-4 text-base font-bold font-Urbanist text-[#1A3C40] rounded-[6px] bg-white">Lihat Selengkapnya</button>
                </a>
            </div> 
        </section>
        
        <section class="hidden xl:block mt-[80px]">
            <div class="container mx-auto">
                <div class="py-[62px] px-[160px] bg-[#428574]">
                    <p class="font-bold font-Urbanist text-[52px] 2xl:tracking-wider text-center leading-[62px] text-white">Bergabunglah Dengan Kami <br> Dalam Melindungi Hutan Bakau</p>
                    <p class="text-[18px] font-medium font-Urbanist tracking-wider text-center text-white mt-[40px]">Ayo, jadilah bagian dari upaya kami dalam melindungi hutan bakau yang krusial ini. Bersama-sama, kita dapat menjaga keberlanjutan alam  kepada generasi mendatang. Mari beraksi sekarang demi masa depan bumi yang lebih hijau dan berkelanjutan.</p>
                    <div class="flex justify-center mt-[42px] items-center gap-[24px]">
                        <a href="/blogs"><button class="bg-white font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[24px] sm:px-[48px] rounded-[6px]">Pilihan Blog</button></a> 
                        <a href="/quizzes"><button class="bg-white font-Urbanist text-base font-semibold text-[#1A3C40] py-4 px-[24px] sm:px-[48px] rounded-[6px]">Coba Quiz</button></a> 
                    </div>
                </div> 
            </div>
        </section>
    
        <section class="mt-[80px]">
            <div class="container mx-auto">
                <div class="flex flex-col justify-between xl:flex-row">
                    <p class="font-Urbanist font-bold text-[28px] sm:text-[38px] xl:text-[52px] leading-normal xl:leading-[65px] mb-4 xl:mb-0 text-[#1A3C40]">Taman Mangrove:  <br> <span class="text-[#000]">Alam yang Menakjubkan</span></p>
                    <p class="text-[16px] font-Urbanist font-medium text-black flex items-center text-justify xl:w-[457px]">Terpesona dengan Kecantikan Hutan Bakau dalam Koleksi Spesial Kami, Sertai Kami dalam Kegiatan Penanaman Bersama untuk Mempertahankan Kehidupannya.</p>
                </div>
                
                <div class="grid lg:grid-cols-3 grid-cols-1 justify-between items-center mt-[48px] gap-4">
                <img class="w-full" src="/assets/img-galeri-1.svg" alt="">
                <img class="w-full" src="/assets/img-galeri-2.svg" alt="">
                <img class="w-full" src="/assets/img-galeri-3.svg" alt="">
                </div>
                
                <div class="grid lg:grid-cols-3 grid-cols-1 justify-between items-center mt-[12px] gap-4">
                <img class="w-full" src="/assets/img-galeri-4.svg" alt="">
                <img class="w-full" src="/assets/img-galeri-5.svg" alt="">
                <img class="w-full" src="/assets/img-galeri-6.svg" alt="">
                </div>
            </div>
        </section>
    
        <section class="mt-[80px]">
            <div class="container mx-auto">
                <div class="flex sm:flex-col xl:flex-row justify-between lg:gap-[28px] xl:gap-0">
                    <p class="font-Urbanist font-bold text-[32px] sm:text-[38px] xl:text-[52px] leading-normal xl:leading-[65px] mb-4 lg:mb-0 text-[#000000]">Relawan, Saksi Perubahan, <br> Penyala Harapan.</p>
                    <p class="text-[16px] font-Urbanist font-medium text-[#000000] flex items-center text-justify xl:w-[457px]">Dengan setiap langkahnya, relawan menjadi saksi perubahan, menyulut api harapan di tengah kegelapan, dan menerangi jalan menuju masa depan yang lebih baik bagi mereka yang membutuhkan.</p>
                </div>
            
    
                <div class="flex flex-col lg:flex-row justify-between mt-[48px] gap-[26px]">
                    
                    <div class="w-full p-[18px] bg-[#428574] rounded-[3px]">
                        <div class="flex gap-[16px]">
                            <img src="/assets/logo-testimoni-1.svg" alt="">
                            <div class="">
                                <p class="font-bold font-Urbanist text-[20px] text-white">Alice Monei</p>
                                <p class="text-base font-normal text-white font-Urbanist">Relawan</p>
                            </div>
                        </div>
                        <p class="mt-4 text-base text-white font-Urbanist leading-[160%] ">Keindahan hutan bakau  menggetarkan hati saya. Alam yang begitu rapuh ini mengajarkan kita  pentingnya menjaga keseimbangan ekosistem.</p>
                    </div>
                    
                    <div class="lg:hidden xl:block w-full p-[18px] bg-[#428574] rounded-[3px]">
                        <div class="flex gap-[16px]">
                            <img src="/assets/logo-testimoni-2.svg" alt="">
                            <div class="">
                                <p class="font-bold font-Urbanist text-[20px] text-white">John Davis</p>
    
                                
                                <p class="text-base font-normal text-white font-Urbanist">Relawan</p>
                            </div>
                        </div>
                        <p class="mt-4 text-base text-white font-Urbanist leading-[160%] ">Sebagai sukarelawan, menjaga hutan bakau memberi kepuasan besar. Memberikan kembali kepada alam yang memberi kita begitu banyak.</p>
                    </div>
    
                    <div class="w-full p-[18px] bg-[#428574] rounded-[3px]">
                        <div class="flex gap-[16px]">
                            <img src="/assets/logo-testimoni-3.svg" alt="">
                            <div class="">
                                <p class="font-bold font-Urbanist text-[20px] text-white">Maudy Ayunda</p>
                                <p class="text-base font-normal text-white font-Urbanist">Relawan</p>
                            </div>
                        </div>
                        <p class="mt-4 text-base text-white font-Urbanist leading-[160%] ">Sebagai sukarelawan, menjaga hutan bakau memberi kepuasan besar. Memberikan kembali kepada alam yang memberi kita begitu banyak.</p>
                    </div>
                    
                </div>
            </div>
        </section>
@endsection