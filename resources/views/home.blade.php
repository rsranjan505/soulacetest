@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <div style="float: right">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                    </div>
                </div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                {{-- list of posts --}}

                <div class="row">
                    <div class="col-md-8">
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('createpost')}}">
                            @csrf

                            <div class="input-group input-group-sm mb-0">
                                <input type="file" name="image">
                              <input class="form-control form-control-sm" name="comment" placeholder="Type a comment">
                              <div class="input-group-append" style="float:right;">
                                <button type="submit"  class="btn btn-danger">Post</button>
                              </div>
                            </div>
                        </form>
                        <hr>
                        @foreach ($posts as $post)
                            <div class="timeline-item" style="margin: 10px;">
                                <span class="time"><i class="far fa-clock"></i> {{ $post->created_at->format('h:m a')}}</span>

                                <h3 class="timeline-header"><a href="#">{{ $post->user->name}}</a></h3>

                                <div class="timeline-body">
                                    @if ($post->image)
                                        <img src="{{ $post->image->url}}" width="100px">
                                    @endif
                                        <img src="">
                                    {{ $post->comment}}
                                </div>
                                {{-- <div class="timeline-footer">
                                <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </div> --}}
                            </div>
                            <hr>
                        @endforeach



                    </div>
                    <div class="col-md-4" style="width:100%;">
                        <table class="table table-striped projects" >
                            @foreach ($users as $user)
                                <tr>
                                    <td> {{ $user->name}} </td>
                                    <td>
                                        <form class="form-horizontal" method="POST" action="{{ route('addfollower')}}">
                                            @csrf
                                            <input type="hidden" name="following_id" value="{{ $user->id}}"/>
                                            <input type="hidden" name="follower_id" value="{{ auth()->user()->id }}"/>
                                            @if ($user->following != [])
                                                <button type="button" disabled class="btn btn-success">Followed</button>
                                            @else
                                                <button type="submit" class="btn btn-primary">Follow</button>
                                            @endif

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
