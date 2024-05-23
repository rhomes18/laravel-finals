<x-app-layout>
            
    <div class="pagetitle">
        <h1>{{ __('Post Page') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">{{__('Dashboard')}}</a></li>
                <li class="breadcrumb-item active">{{ __('Resource') }}</li>
                <li class="breadcrumb-item active">{{ __('Post Page') }}</li>
                
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
                        <a href="{{ route('dashboard') }}" type="button" class="btn btn-primary"><i class="bi bi-reply-fill me-1"></i> Back</a>
                        
                        <hr class="my-10">
                        <h2 class="card-title">All Comments</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Comment</th>
                                    <th scope="col">From</th>
                                    <th scope="col">Status</th>
                                    <th style="text-align:center;" scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->comment }}</td>
                                        <td>{{ optional(optional($comment->post)->user)->name ?? 'user' }}</td>
                                        <td>{{ $comment->status ? 'Approved' : 'Pending' }}</td>
                                        <td style="text-align:center;">
                                            @if(auth()->id() !== optional($comment->post)->user_id)
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#approveModal{{ $comment->id }}">Approve</button>
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#disapproveModal{{ $comment->id }}">Disapprove</button>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $comment->id }}">Delete</button>
                                            @endif
                                        </td>
                                    </tr>

                                    <!-- Approve Modal -->
                                    <div class="modal fade" id="approveModal{{ $comment->id }}" tabindex="-1" aria-labelledby="approveModalLabel{{ $comment->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="approveModalLabel{{ $comment->id }}">Confirm Approval</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to approve this comment?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="{{ route('comments.approve', $comment) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-success">Yes</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Disapprove Modal -->
                                    <div class="modal fade" id="disapproveModal{{ $comment->id }}" tabindex="-1" aria-labelledby="disapproveModalLabel{{ $comment->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="disapproveModalLabel{{ $comment->id }}">Confirm Disapproval</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to disapprove this comment?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="{{ route('comments.disapprove', $comment) }}">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-warning">Yes</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{ $comment->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $comment->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $comment->id }}">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this comment?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="post" action="{{ route('comments.destroy', $comment) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Yes</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
