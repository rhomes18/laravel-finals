<x-app-layout>
    <section class="section dashboard">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
        <style>
            .info-card {
                background-color: #f8f9fa;
                border: none;
                border-radius: 1rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: transform 0.2s;
            }
            .info-card:hover {
                transform: translateY(-10px);
            }
            .card-icon {
                width: 50px;
                height: 50px;
                background-color: #007bff;
                color: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
            }
            .card-title {
                color: #343a40;
                font-weight: bold;
            }
            h6 {
                font-size: 1.25rem;
                font-weight: bold;
                margin: 0;
            }
            
        </style>
    </head>
    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mx-auto" style="width: 800px;">
                            <div class="row mt-4">
                                <!-- Number of Post Card -->
                                <div class="col-xxl-4 col-md-6 mb-4">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Number of Post:</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon">
                                                    <i class="bi bi-pencil-square"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6 id="totalPosts">{{ $totalPosts }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Number of Post Card -->

                                <!-- Unpublished Post Card -->
                                <div class="col-xxl-4 col-md-6 mb-4">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Unpublished Post:</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon">
                                                    <i class="bi bi-eye-slash"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6 id="unpublishedPosts">{{ $unpublishedPosts }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Unpublished Post Card -->

                                <!-- Published Post Card -->
                                <div class="col-xxl-4 col-md-6 mb-4">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Published Post:</h5>
                                            <div class="d-flex align-items-center">
                                                <div class="card-icon">
                                                    <i class="bi bi-eye"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6 id="publishedPosts">{{ $publishedPosts }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Published Post Card -->
                            </div>
                        </div><!-- End Left side columns -->
                    </div>
                </div>
            </div>
        </div>
    </body>
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
