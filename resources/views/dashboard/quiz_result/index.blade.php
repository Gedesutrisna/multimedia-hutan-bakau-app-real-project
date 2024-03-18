@extends('dashboard.layouts.main')
@section('container')

    <!-- Main content -->


        <div class="content-main p-[32px] lg:ms-10 xl:ms-4 2xl:ms-0 bg-body {{ $quiz_results->count() < 4 ? 'h-[100vh]' : '' }}">
            <div class="sm:flex sm:justify-between block items-end">
                <div class="">
                    <h1 class="text-[#141414] font-Urbanist text-[28px] font-semibold">Hasil Kuis</h1>
                </div>
            </div>

            <div class="overflow-x-auto">
                <div id='recipients' class="p-8 mt-6 rounded shadow bg-white">
                    <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nilai</th>
                                <th>Nama Pengguna</th>
                                <th>Kuis</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quiz_results as $quiz_result)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $quiz_result->point }}/100</td>
                                <td>{{ $quiz_result->user->name }}</td>
                                <td>{{ $quiz_result->quiz->name }}</td>
                                <td class="text-center flex gap-1">
                                    <button class="py-[6px] px-[3px] bg-[#F1E2E6] rounded-[5px] w-[32px] h-[32px] flex justify-center items-center" onclick="my_modal_4{{ $quiz_result->id }}.showModal()">	
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
                                        <dialog id="my_modal_4{{ $quiz_result->id }}" class="modal">
                                        <div class="modal-box flex">
                                            <div class="flex justify-between">
                                                <div class="">
                                                    <p class="font-Urbanist font-semibold text-[28px] ">Hapus Hasil Kuis Pengguna {{ $quiz_result->user->name }}</p>
                                                    <p class="pt-4 font-Urbanist font-medium text-[15px] text-[#4D5369]">Konfirmasi Penghapusan Catatan Hasil Kuis: Apakah Anda yakin ingin menghapus catatan hasil kuis ini? Tindakan ini tidak dapat dibatalkan, dan rekaman hasil kuis akan dihapus secara permanen dari sistem.</p>
                                                    <form method="POST" action="/dashboard/quiz/results/{{ $quiz_result->id }}">
                                                        @csrf
                                                        @method('delete')    
                                                        <div class="flex items-center justify-between w-full mt-8 gap-2">
                                                            <button class="px-[20px] py-[16px] bg-[#428574] rounded-[6px] font-Urbanist font-medium text-[15px] text-white w-full">Hapus Hasil Kuis</button>
                                                            <button class="px-[20px] py-[16px] bg-[#ADAEB1] rounded-[6px] font-Urbanist font-medium text-[15px] text-white w-full">Cancel Hapus</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <form method="dialog">
                                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                                </form>
                                            </div>
                                            
                                        </div>
                                        </dialog>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>  
                </div> 
        </div>
        <script>
            $(document).ready(function() {
                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>

@endsection