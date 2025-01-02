@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->


        <div class="content-main p-[32px] lg:ms-10 xl:ms-4 2xl:ms-0 bg-body  {{ $vlogs->count() < 2 ? 'h-[100vh]' : '' }} ">
            <div class="sm:flex sm:justify-between block items-end">   
                <div class="">
                    <h1 class="text-[#141414] font-Urbanist text-[28px] font-semibold">Data Video Blog</h1>
                </div>
                <div class="">
                    <a href="/dashboard/vlogs/create">
                        <button class="mt-[14px] sm:mt-0 py-[14px] px-[16px] bg-[#428574] rounded-[4px] gap-2 flex items-center text-white font-Urbanist text-[14px] font-medium"><img src="/asset/add-icon.svg" alt="" />Tambah Video Blog</button>
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <div id='recipients' class="p-8 mt-6 rounded shadow bg-white">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Teks</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vlogs as $vlog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $vlog->title }}</td>
                                <td>{!! Str::limit($vlog->body, 180) !!}</td>
                                <td>
                                    <div class="text-center flex gap-1">
                                        <a href="/dashboard/vlogs/{{ $vlog->slug }}">
                                            <button
                                                class="py-[6px] px-[3px] bg-[#E1E7F7] rounded-[5px] w-[32px] h-[32px] flex justify-center items-center"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <g clip-path="url(#clip0_1_380)">
                                                        <path
                                                            d="M0.00012207 7.78109C0.212778 6.95097 0.74056 6.29931 1.24137 5.6395C2.12628 4.47366 3.19322 3.50834 4.50068 2.82897C5.74762 2.18103 7.07434 1.89766 8.47762 1.98525C10.5821 2.11656 12.304 3.05512 13.7759 4.51181C14.5611 5.28887 15.2176 6.16656 15.7539 7.13109C15.8653 7.33144 15.9196 7.56362 16.0002 7.78112C16.0002 7.92697 16.0002 8.07278 16.0002 8.21862C15.825 8.97666 15.3427 9.56675 14.9143 10.1839C14.7144 10.472 14.3294 10.5169 14.054 10.3173C13.7779 10.1172 13.7148 9.75144 13.9048 9.45662C14.1584 9.06322 14.4122 8.66997 14.6641 8.27553C14.7713 8.10766 14.78 7.93334 14.6797 7.75862C13.9053 6.40959 12.939 5.23069 11.6378 4.35347C10.454 3.55537 9.14878 3.16141 7.71787 3.22531C6.30437 3.28844 5.05572 3.80041 3.94322 4.65969C2.85137 5.50303 2.00947 6.55978 1.32553 7.74953C1.23609 7.90512 1.2195 8.06566 1.30915 8.22512C2.15787 9.73437 3.23084 11.0487 4.76481 11.8967C7.13215 13.2055 9.46431 13.0716 11.728 11.601C11.8651 11.5118 12.0127 11.4158 12.1681 11.3827C12.4537 11.3219 12.7263 11.4948 12.8331 11.7585C12.9427 12.0291 12.8588 12.3243 12.6086 12.5059C11.896 13.023 11.1269 13.4367 10.2804 13.683C7.68209 14.4388 5.30915 13.9606 3.16578 12.3297C1.92472 11.3854 0.971841 10.1891 0.220122 8.83041C0.116528 8.64316 0.0719971 8.42331 0.00012207 8.21859C0.00012207 8.07275 0.00012207 7.92694 0.00012207 7.78109Z"
                                                            fill="#547DE2"
                                                        />
                                                        <path
                                                            d="M8.00598 4.3125C10.0359 4.31416 11.6897 5.97288 11.6871 8.00463C11.6845 10.0346 10.025 11.6891 7.99429 11.6862C5.96426 11.6833 4.31117 10.0247 4.31336 7.99294C4.31554 5.96275 5.97292 4.31084 8.00598 4.3125ZM5.5632 7.99266C5.56104 9.33472 6.65145 10.4327 7.99004 10.4363C9.33223 10.4399 10.4325 9.35031 10.4372 8.01275C10.442 6.66231 9.34992 5.56328 8.00233 5.56247C6.66023 5.56169 5.56536 6.65253 5.5632 7.99266Z"
                                                            fill="#547DE2"
                                                        />
                                                        <path
                                                            d="M8.00165 9.24874C7.4749 9.24928 6.99381 8.90846 6.81996 8.41162C6.64699 7.91725 6.8044 7.36031 7.20984 7.03118C7.32752 6.93565 7.45071 6.86684 7.60934 6.93034C7.77293 6.99584 7.8179 7.12924 7.83421 7.28974C7.8854 7.79331 8.20712 8.11553 8.70849 8.16512C8.86902 8.181 9.00259 8.22512 9.06846 8.38878C9.13227 8.54728 9.06418 8.67028 8.96859 8.78837C8.73612 9.07543 8.37409 9.24837 8.00165 9.24874Z"
                                                            fill="#547DE2"
                                                        />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1_380">
                                                            <rect width="16" height="16" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </button>
                                        </a>
                                        <a href="/dashboard/vlogs/{{ $vlog->slug }}/edit">
                                            <button
                                                class="py-[6px] px-[3px] bg-[#F5F0E9] rounded-[5px] w-[32px] h-[32px] flex justify-center items-center"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <g clip-path="url(#clip0_1_386)">
                                                        <path
                                                            d="M12.4834 3.14713e-05C13.6352 0.226594 14.3821 1.03406 15.1087 1.85653C15.346 2.12519 15.5511 2.43603 15.7098 2.75772C16.121 3.59122 15.9912 4.42919 15.337 5.09194C14.3495 6.09231 13.3409 7.07191 12.3364 8.05525C12.069 8.31694 11.7031 8.292 11.4224 8.01156C10.4278 7.01794 9.43413 6.02347 8.43998 5.0295C8.40026 4.98978 8.35885 4.95175 8.34248 4.93606C6.54379 6.71916 4.75176 8.49563 2.9592 10.2727C3.87382 11.1799 4.78254 12.0812 5.70051 12.9918C5.86595 12.8257 6.04801 12.6433 6.22948 12.4604C7.27085 11.411 8.31291 10.3622 9.35235 9.31084C9.49826 9.16325 9.6612 9.06547 9.87304 9.07675C10.1295 9.09041 10.3192 9.21669 10.4174 9.45244C10.5176 9.69272 10.482 9.92513 10.3011 10.1171C10.07 10.3625 9.82916 10.5988 9.59166 10.8381C8.46616 11.9722 7.3397 13.1053 6.21557 14.2407C6.08463 14.3729 5.9397 14.4642 5.7571 14.5156C4.13716 14.9711 2.5186 15.4316 0.900821 15.8948C0.646446 15.9677 0.415665 15.9507 0.221759 15.7613C0.0232278 15.5674 0.000257704 15.333 0.073539 15.0717C0.529476 13.4463 0.978134 11.8188 1.43832 10.1946C1.47735 10.0569 1.56013 9.91534 1.66104 9.81381C4.67438 6.78203 7.69366 3.75612 10.7087 0.726C11.0773 0.3555 11.5039 0.104094 12.0164 0C12.172 3.125e-05 12.3277 3.14713e-05 12.4834 3.14713e-05ZM13.5844 5.107C13.8741 4.81222 14.1676 4.51941 14.4544 4.22022C14.7279 3.93497 14.7645 3.61209 14.5826 3.26344C14.5444 3.19006 14.5067 3.11538 14.4594 3.04784C14.0238 2.42619 13.4969 1.89509 12.8696 1.46678C12.7681 1.39753 12.6516 1.34772 12.5374 1.30041C12.2803 1.19394 12.0267 1.2215 11.8226 1.4045C11.48 1.71153 11.157 2.04025 10.8312 2.35453C11.7521 3.27519 12.6573 4.18009 13.5844 5.107ZM9.22457 4.00441C10.1269 4.90709 11.0267 5.80713 11.933 6.71375C12.163 6.47237 12.4046 6.21888 12.6247 5.98794C11.7317 5.09313 10.8293 4.18897 9.93991 3.29775C9.70545 3.52938 9.45916 3.77266 9.22457 4.00441ZM2.35979 11.5041C2.20926 12.044 2.0531 12.5966 1.90495 13.1512C1.89413 13.1917 1.92954 13.2591 1.96363 13.2945C2.19016 13.5298 2.42501 13.7572 2.65082 13.9932C2.71863 14.0641 2.77838 14.0712 2.86895 14.0441C3.26063 13.9267 3.65492 13.818 4.04817 13.706C4.18498 13.667 4.3216 13.6273 4.46045 13.5874C3.75448 12.8873 3.0606 12.1991 2.35979 11.5041Z"
                                                            fill="#F6C46A"
                                                        />
                                                        <path
                                                            d="M11.5335 15.9099C10.2891 15.9098 9.04477 15.9112 7.80042 15.9091C7.38105 15.9084 7.10067 15.5938 7.15505 15.195C7.19364 14.9118 7.42917 14.6936 7.72527 14.6682C7.76649 14.6647 7.80817 14.6663 7.84964 14.6663C10.3124 14.6663 12.7752 14.6669 15.2379 14.665C15.4448 14.6649 15.6313 14.7096 15.772 14.8673C15.9462 15.0623 15.9918 15.289 15.8874 15.5314C15.7836 15.7726 15.592 15.9046 15.3287 15.9074C14.7999 15.9131 14.2711 15.9098 13.7422 15.9099C13.006 15.9101 12.2697 15.9099 11.5335 15.9099Z"
                                                            fill="#F6C46A"
                                                        />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1_386">
                                                            <rect width="16" height="16" fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </button>
                                        </a>
                                            
                                        <button class="py-[6px] px-[3px] bg-[#F1E2E6] rounded-[5px] w-[32px] h-[32px] flex justify-center items-center" onclick="my_modal_4{{ $vlog->id }}.showModal()">	
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M9.28242 0C9.52796 0.0933731 9.79337 0.153622 10.0152 0.286536C10.6125 0.644362 10.9151 1.1916 10.9388 1.88896C10.9438 2.03946 10.9395 2.19029 10.9395 2.36458C11.0097 2.36458 11.0702 2.36458 11.1307 2.36458C11.9172 2.36466 12.7036 2.36124 13.49 2.36628C13.9257 2.36908 14.2125 2.71069 14.1292 3.11577C14.0864 3.32377 13.9658 3.48047 13.7687 3.55484C13.658 3.59668 13.6375 3.65522 13.6376 3.76071C13.6402 5.92184 13.6399 8.08292 13.6386 10.244C13.6385 10.3476 13.6385 10.4549 13.6132 10.5539C13.5402 10.8393 13.2656 11.0217 12.9611 11.0012C12.681 10.9824 12.4432 10.7622 12.4026 10.4781C12.3909 10.3961 12.39 10.3121 12.39 10.229C12.3894 8.09908 12.3895 5.96925 12.3895 3.83938C12.3895 3.77251 12.3895 3.70563 12.3895 3.62672C9.46333 3.62672 6.55018 3.62672 3.62054 3.62672C3.61787 3.6823 3.61295 3.73738 3.61295 3.79251C3.61258 6.99511 3.61208 10.1977 3.613 13.4003C3.61325 14.2366 4.13128 14.7496 4.9708 14.7497C7.01238 14.7498 9.05397 14.7506 11.0955 14.7492C11.7317 14.7488 12.2322 14.3552 12.3618 13.7555C12.3836 13.6544 12.383 13.5486 12.3961 13.4455C12.4396 13.1028 12.7208 12.8595 13.0478 12.8802C13.3948 12.9021 13.6405 13.1774 13.6375 13.5409C13.6283 14.6329 12.8749 15.6118 11.8158 15.905C11.6813 15.9422 11.5438 15.9684 11.4077 15.9998C9.13659 15.9998 6.86555 15.9998 4.59447 15.9998C4.56518 15.9905 4.53648 15.9772 4.50644 15.9726C3.84228 15.8726 3.30258 15.5568 2.88863 15.0303C2.51348 14.5531 2.35981 14.0053 2.36056 13.4009C2.36469 10.2032 2.36194 7.00548 2.3644 3.80776C2.36448 3.67913 2.3529 3.5918 2.20615 3.53905C2.02582 3.47426 1.91824 3.32014 1.8752 3.13144C1.78157 2.72128 2.06999 2.36924 2.51177 2.36633C3.29825 2.36116 4.08473 2.3647 4.87126 2.36462C4.9318 2.36462 4.99234 2.36462 5.04671 2.36462C5.05538 2.33099 5.06017 2.32091 5.06026 2.31083C5.0613 2.18062 5.06001 2.05042 5.06246 1.92025C5.07601 1.20239 5.3855 0.644279 6.00053 0.278953C6.21857 0.149456 6.47877 0.0909568 6.71972 4.19608e-05C7.57391 2.94995e-07 8.42815 0 9.28242 0ZM6.31498 2.35379C7.44792 2.35379 8.56352 2.35379 9.68583 2.35379C9.68583 2.172 9.69883 1.99967 9.68299 1.83C9.6537 1.51597 9.38213 1.25743 9.06426 1.25368C8.35681 1.24531 7.64916 1.24556 6.94172 1.25343C6.61706 1.25702 6.34219 1.52222 6.31727 1.84125C6.30436 2.00633 6.31498 2.17325 6.31498 2.35379Z"
                                                    fill="#D55051"
                                                />
                                                <path
                                                    d="M7.37616 9.17051C7.37616 8.30099 7.37482 7.43146 7.37691 6.56194C7.37762 6.27815 7.53778 6.05441 7.79377 5.96299C8.03539 5.87674 8.32014 5.93845 8.46913 6.14849C8.55147 6.26457 8.61867 6.42165 8.61947 6.56069C8.62942 8.30486 8.62709 10.0492 8.62513 11.7934C8.62472 12.1619 8.35322 12.4365 8.00156 12.4369C7.65049 12.4373 7.37799 12.1618 7.37691 11.7947C7.37441 10.92 7.37612 10.0452 7.37616 9.17051Z"
                                                    fill="#D55051"
                                                />
                                                <path
                                                    d="M11.0143 9.18057C11.0143 10.0396 11.0157 10.8986 11.0136 11.7576C11.0128 12.1034 10.8466 12.3327 10.5487 12.4141C10.1986 12.5097 9.83732 12.2799 9.77878 11.9224C9.76874 11.8611 9.7649 11.7981 9.76486 11.7359C9.76415 10.0335 9.76491 8.33109 9.76349 6.62871C9.76332 6.42209 9.80745 6.23455 9.96715 6.09247C10.1649 5.91656 10.395 5.87756 10.6356 5.97881C10.8782 6.08085 11.0085 6.27672 11.0114 6.54109C11.017 7.04599 11.014 7.55103 11.0143 8.05601C11.0145 8.43088 11.0144 8.80571 11.0143 9.18057Z"
                                                    fill="#D55051"
                                                />
                                                <path
                                                    d="M4.98784 9.17061C4.98801 8.30642 4.98392 7.44219 4.98959 6.578C4.99272 6.10234 5.42729 5.79922 5.8467 5.97272C6.05928 6.06068 6.1884 6.22222 6.22457 6.45175C6.23423 6.51313 6.23723 6.57608 6.23723 6.63833C6.2379 8.33551 6.23827 10.0327 6.23736 11.7298C6.23715 12.1025 6.06607 12.3419 5.75149 12.4196C5.40262 12.5059 5.03934 12.2604 4.99826 11.9031C4.98347 11.7745 4.98821 11.6433 4.98809 11.5133C4.9873 10.7324 4.98767 9.95152 4.98784 9.17061Z"
                                                    fill="#D55051"
                                                />
                                            </svg>
                                        </button>
                                            <dialog id="my_modal_4{{ $vlog->id }}" class="modal">
                                            <div class="modal-box flex">
                                                <div class="flex justify-between">
                                                    <div class="">
                                                        <p class="font-Urbanist font-semibold text-[28px] ">Hapus Video Blog {{ $vlog->title }}</p>
                                                        <p class="pt-4 font-Urbanist font-medium text-[15px] text-[#4D5369]">Konfirmasi Penghapusan Catatan Video Blog: Apakah Anda yakin ingin menghapus catatan video blog ini? Tindakan ini tidak dapat dibatalkan, dan rekaman video blog akan dihapus secara permanen dari sistem.</p>
                                                        <form method="POST" action="/dashboard/vlogs/{{ $vlog->slug }}">
                                                            @csrf
                                                            @method('delete')    
                                                            <div class="flex items-center justify-between w-full mt-8 gap-2">
                                                                <button class="px-[20px] py-[16px] bg-[#428574] rounded-[6px] font-Urbanist font-medium text-[15px] text-white w-full">Hapus Video Blog</button>
                                                                <button class="px-[20px] py-[16px] bg-[#ADAEB1] rounded-[6px] font-Urbanist font-medium text-[15px] text-white w-full">Batal Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <form method="dialog">
                                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                            </dialog>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div> 
            </div>
            {{-- <div class="mt-3">
                {{ $vlogs->links() }}
            </div> --}}
            
        </div>
        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                        responsive: true,

                    })
                    .columns.adjust()
                    .responsive.recalc();
                    
            });
        </script>

@endsection