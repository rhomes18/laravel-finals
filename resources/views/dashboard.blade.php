<x-app-layout>
    <section class="section dashboard">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">                
                        <div class="mx-auto" style="width: 800px;" >
                            <div class="row mt-4">
                                <!-- Sales Card -->
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Number of Post:</h5>

                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-pencil-square"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $totalPosts }}</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Sales Card -->

                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Unpublished Post:</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-eye-slash"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $unpublishedPosts }}</h6>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div><!-- End Sales Card -->

                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Published Post:</h5>

                                            <div class="d-flex align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-eye"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6>{{ $publishedPosts }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Sales Card -->
                            </div>
                        </div><!-- End Left side columns -->
                    </div>
                </div>
            </div>
        </div>
                    
    </section>
    <section class="section dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">                
                        <div class="mx-auto" style="width: 500px;" >
                            <div class="row mt-4">
                            <div class="card top-selling overflow-auto">  
                            @isset($posts)
                                @foreach($posts as $post)         
                                    <div class="card-body pb-0">
                                        <h5 class="card-title">{{ $post->subject }}</h5>
                                        {{ $post->post }}                                   
                                    </div>
                                @endforeach
                            @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </section>

</x-app-layout>
