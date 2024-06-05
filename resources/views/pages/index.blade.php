<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicons -->
        <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    </head>
    
    <body class="font-sans antialiased">
        @include('layouts.header')
        @include('layouts.navigation')
        <div class="pagetitle">
            <h1>{{ __('Post Page') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
                    <li class="breadcrumb-item active">{{ __('Resource') }}</li>
                    <li class="breadcrumb-item active">{{ __('Post Page') }}</li>
                </ol>
            </nav>
        </div>
        <main>
        <div class="container my-5">
                <div class="pagetitle">
                        <h1>{{ __('Post Page') }}</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Dashboard')}}</a></li>
                                <li class="breadcrumb-item active">{{ __('Resource') }}</li>
                                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">{{__('Post Page')}}</a></li>
                            </ol>
                        </nav>
                    </div>
                    @isset($posts)
                        @foreach($posts as $post)   
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title ">{{ $post->subject }}</h5>
                                    <p><small><b>Author: </b>{{ $post->user->name }}</small></p>
                                    <div class="card p-5">
                                        <p>{{ $post->post }}</p>
                                    </div>
                                    <section class="section">
                                        @if(auth()->check())
                                            <form method="POST" action="{{ route('comments.store') }}">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <div class="form-floating mb-3">
                                                    <textarea class="form-control" name="comment" id="comment" placeholder="Post" style="height: 100px" required></textarea>
                                                    <label for="floatingTextarea">Comment:</label>
                                                </div>
                                                <div class="w-100 mt-1">
                                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                                </div>
                                            </form>
                                        @endif
                                    </section>
                                    <section class="section">
                                        <ul>
                                            <div class="w-100 mt-1">
                                                <h4 class="card-title">All Comments</h4>
                                                <hr class="my-10 mt-10">
                                            </div>
                                            @foreach($post->comments as $comment)
                                                @if($comment->status)
                                                    <li>
                                                        <em class="card-title">{{ $comment->user->name }}</em> - {{ $comment->comment }}  
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </section>
                                </div>
                            </div>
                        @endforeach
                    @endisset
            </div>
            
        </main>

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
        <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js" integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>