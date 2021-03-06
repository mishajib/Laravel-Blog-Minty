@extends('layouts.frontend.app')


@section('site-title')
    {{ $query }}
@endsection


@push('css')
    <link href="{{ asset('assets/frontend/category/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/category/responsive.css') }}" rel="stylesheet">

    <style>
        .favourite-post {
            color: blue;
        }
    </style>

@endpush

@section('main-content')
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>{{ $posts->count() }} Results for {{ $query }}</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">

                @if($posts->count()>0)

                    @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-auto">
                            <div class="single-post post-style-1">

                                <div class="blog-image"><img src="{{ asset('storage/post/'.$post->image) }}" alt="{{ $post->title }}"></div>

                                <a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img src="{{ asset('storage/profile/'.$post->user->image) }}" alt="Profile Image"></a>

                                <div class="blog-info">

                                    <h4 class="title"><a href="{{ route('post.details', $post->slug) }}"><b>{{ $post->title }}</b></a></h4>

                                    <ul class="post-footer">
                                        <li>
                                            @guest
                                                <a onclick="toastr.info('To add favourite. You need to login first.', 'Info', {
                                                    closeButton: true,
                                                    progressBar: true,
                                                })" href="javascript:void(0);"><i class="ion-heart"></i>{{ $post->favourite_to_users->count() }}</a>
                                            @else
                                                <a onclick="document.getElementById('favourite-form-{{ $post->id }}').submit();" href="javascript:void(0);" class="{{ !Auth::user()->favourite_posts->where('pivot.post_id',$post->id)->count() == 0 ? 'favourite-post' : '' }}">
                                                    <i class="ion-heart"></i>{{ $post->favourite_to_users->count() }}
                                                </a>
                                                <form id="favourite-form-{{ $post->id }}" action="{{ route('post.favourite',$post->id) }}" method="POST" style="display: none;">
                                                    @csrf

                                                </form>
                                            @endguest
                                        </li>
                                        <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                        <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                                    </ul>

                                </div><!-- blog-info -->
                            </div><!-- single-post -->
                        </div><!-- card -->
                    </div><!-- col-lg-4 col-md-6 -->
                @endforeach

                @else
                    <div class="col-lg-12 col-md-12">
                        <div class="card h-auto">
                            <div class="single-post post-style-1">

                                <div class="blog-info">
                                    <h4 class="title">
                                        <strong>Sorry, No post found :(</strong>
                                    </h4>
                                </div>

                            </div>
                        </div>
                    </div>

                @endif


            </div><!-- row -->

            {{--{{ $posts->links() }}--}}

        </div><!-- container -->
    </section><!-- section -->


@endsection


@push('js')


@endpush
