<x-app-layout>
            
    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">{{__('Dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{ __('Resource') }}</li>
                <li class="breadcrumb-item active">{{ __('Post') }}</li>
               
                
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('message'))
                    <div id="autoDismissAlert" class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Use setTimeout to hide the alert after 5 seconds
                            setTimeout(function() {
                                var alertElement = document.getElementById('autoDismissAlert');
                                if (alertElement) {
                                    // Use Bootstrap's alert 'close' method to hide it
                                    var alert = new bootstrap.Alert(alertElement);
                                    alert.close();
                                }
                            }, 5000); // 5000 milliseconds = 5 seconds
                        });
                    </script>
                @endif
                <div class="card p-5">
                    <div class="card-body">
                        <a href="{{ route('post.create') }}"  type="button" class="btn btn-primary float-end" ><i class="bi bi-file-earmark-plus-fill me-1  "></i> Add a New Options</a> 
                        <a href="{{ route('dashboard') }}" type="button " class="btn btn-primary" ><i class="bi bi-reply-fill me-1  "></i> Back</a>
                    <hr class="my-10">
                        <h4 class="card-title">All Posts</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Status</th>   
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($posts)
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post -> subject}}</td>
                                            <td>{{$post -> post}}</td>
                                            <td>{{ ($post -> status == 1 ? 'Published':'Unpublished') }}</td>
                                            <td>
                                                <a href="{{ route('post.show', $post) }}" class="btn btn-dark m-1" fdprocessedid="sh46d8"><i class="bi bi-folder-symlink"></i></a>
                                                <a href="{{ route('post.edit', $post) }}" type="button" class="btn btn-success m-1" fdprocessedid="sh46d8"><i class="bi bi-pencil-square"></i></a>
                                                <form id="delete-form-{{ $post->id }}" action="{{ route('post.destroy', $post->id) }}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-post-id="{{ $post->id }}"><i class="bi bi-trash-fill"></i></button>
                                                </form>
                                            <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this post? This action cannot be undone.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- JavaScript to Handle Modal and Form Submission -->
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        var confirmDeleteModal = document.getElementById('confirmDeleteModal');
                                                        var confirmDeleteButton = document.getElementById('confirmDeleteButton');
                                                        var formToSubmit;

                                                        confirmDeleteModal.addEventListener('show.bs.modal', function (event) {
                                                            var button = event.relatedTarget; // Button that triggered the modal
                                                            var postId = button.getAttribute('data-post-id'); // Extract info from data-* attributes
                                                            formToSubmit = document.getElementById('delete-form-' + postId); // Store the form to submit
                                                        });

                                                        confirmDeleteButton.addEventListener('click', function() {
                                                            formToSubmit.submit(); // Submit the stored form when the delete button is clicked
                                                        });
                                                    });
                                                </script>
                                            </td>                  
                                        </tr>
                                    @endforeach   
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
