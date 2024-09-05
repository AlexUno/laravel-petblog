@extends('layouts.main')
@section('head-title', $post->title)

@section('content')
    <section class="page-title bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block text-center">
                        <span class="text-white">Наш блог</span>
                        <h1 class="text-capitalize mb-4 text-lg">
                            {{ $post->title }}
                        </h1>
                        {{ Breadcrumbs::view('partials.site.breadcrumbs', 'posts.show', $post) }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section blog-wrap bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div class="single-blog-item">
                                @if ($post->main_image)
                                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="" class="img-fluid rounded">
                                @endif

                                <div class="blog-item-content bg-white p-5">
                                    <div class="blog-item-meta bg-gray py-1 px-2 mb-3">
                                        <span class="text-muted text-capitalize mr-3">
                                            <i class="ti-pencil-alt mr-2"></i>
                                            {{ $post->category->title }}
                                        </span>
                                        <span class="text-muted text-capitalize mr-3">
                                            <i class="ti-comment mr-2"></i>5 Comments
                                        </span>
                                        <span class="text-black text-capitalize mr-3">
                                            <i class="ti-time mr-1"></i>
                                            {{ $post->dateAsCarbon->day }} {{ $post->dateAsCarbon->translatedFormat('F') }}
                                        </span>
                                    </div>

                                    {!! $post->content !!}

                                    <div class="tag-option mt-5 d-flex align-items-end justify-content-between">
                                        @if(count($post->tags) > 0)
                                            <ul class="float-left list-inline m-0">
                                                <li>Теги:</li>
                                                @foreach($post->tags as $tag)
                                                    <li class="list-inline-item">
                                                        <a href="#" rel="tag">
                                                            {{ $tag->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        @php
                                            $isLiked = $post->userHasLiked(); // true, false или null
                                        @endphp
                                        <div class="likes-group py-1">
                                            @if(is_null($isLiked))
                                                <button data-post-id="{{ $post->id }}" data-type="btn-like" style="border: 0; outline: none; background: transparent;">
                                                    <i class="far fa-thumbs-up"></i>
                                                </button>
                                            @elseif($isLiked)
                                                <button data-post-id="{{ $post->id }}" data-type="btn-like" style="border: 0; outline: none; background: transparent;">
                                                    <i class="fas fa-thumbs-up"></i>
                                                </button>
                                            @else
                                                <button data-post-id="{{ $post->id }}" data-type="btn-like" style="border: 0; outline: none; background: transparent;">
                                                    <i class="far fa-thumbs-up"></i>
                                                </button>
                                            @endif

                                            <span data-type="like-count-{{ $post->id }}">
                                                {{ $post->likesCount }}
                                            </span>


                                            @if(is_null($isLiked))
                                                <button data-post-id="{{ $post->id }}" data-type="btn-dislike" style="border: 0; outline: none; background: transparent;">
                                                    <i class="far fa-thumbs-down"></i>
                                                </button>
                                            @elseif($isLiked)
                                                <button data-post-id="{{ $post->id }}" data-type="btn-dislike" style="border: 0; outline: none; background: transparent;">
                                                    <i class="far fa-thumbs-down"></i>
                                                </button>
                                            @else
                                                <button data-post-id="{{ $post->id }}" data-type="btn-dislike" style="border: 0; outline: none; background: transparent;">
                                                    <i class="fas fa-thumbs-down"></i>
                                                </button>
                                            @endif
                                            <span data-type="dislike-count-{{ $post->id }}">
                                                {{ $post->dislikesCount }}
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 mb-5">
                            <div class="posts-nav bg-white p-5 d-lg-flex d-md-flex justify-content-between ">
                                @if($prevPost)
                                    <a class="post-prev align-items-center" href="{{ route('posts.show', $prevPost->id) }}">
                                        <div class="posts-prev-item mb-4 mb-lg-0">
                                            <span class="nav-posts-desc text-color">- Предыдущий пост</span>
                                            <h6 class="nav-posts-title mt-1">
                                                {{ $prevPost->title }}
                                            </h6>
                                        </div>
                                    </a>
                                    <div class="border"></div>
                                @endif
                                @if($nextPost)
                                        <a class="posts-next" href="{{ route('posts.show', $nextPost->id) }}">
                                            <div class="posts-next-item pt-4 pt-lg-0">
                                                <span class="nav-posts-desc text-lg-right text-md-right text-color d-block">- Следующий пост</span>
                                                <h6 class="nav-posts-title mt-1">
                                                    {{ $nextPost->title }}
                                                </h6>
                                            </div>
                                        </a>
                                @endif
                            </div>
                        </div>

{{--                        <div class="col-lg-12 mb-5">--}}
{{--                            <div class="comment-area card border-0 p-5">--}}
{{--                                <h4 class="mb-4">2 Comments</h4>--}}
{{--                                <ul class="comment-tree list-unstyled">--}}
{{--                                    <li class="mb-5">--}}
{{--                                        <div class="comment-area-box">--}}
{{--                                            <img alt="" src="images/blog/test1.jpg" class="img-fluid float-left mr-3 mt-2">--}}

{{--                                            <h5 class="mb-1">Philip W</h5>--}}
{{--                                            <span>United Kingdom</span>--}}

{{--                                            <div class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">--}}
{{--                                                <a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply |</a>--}}
{{--                                                <span class="date-comm">Posted October 7, 2018 </span>--}}
{{--                                            </div>--}}

{{--                                            <div class="comment-content mt-3">--}}
{{--                                                <p>Some consultants are employed indirectly by the client via a consultancy staffing company, a company that provides consultants on an agency basis. </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}

{{--                                    <li>--}}
{{--                                        <div class="comment-area-box">--}}
{{--                                            <img alt="" src="images/blog/test2.jpg" class="mt-2 img-fluid float-left mr-3">--}}

{{--                                            <h5 class="mb-1">Philip W</h5>--}}
{{--                                            <span>United Kingdom</span>--}}

{{--                                            <div class="comment-meta mt-4 mt-lg-0 mt-md-0 float-lg-right float-md-right">--}}
{{--                                                <a href="#"><i class="icofont-reply mr-2 text-muted"></i>Reply |</a>--}}
{{--                                                <span class="date-comm">Posted October 7, 2018</span>--}}
{{--                                            </div>--}}

{{--                                            <div class="comment-content mt-3">--}}
{{--                                                <p>Some consultants are employed indirectly by the client via a consultancy staffing company, a company that provides consultants on an agency basis. </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-12">--}}
{{--                            <form class="contact-form bg-white rounded p-5" id="comment-form">--}}
{{--                                <h4 class="mb-4">Write a comment</h4>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input class="form-control" type="text" name="name" id="name" placeholder="Name:">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input class="form-control" type="text" name="mail" id="mail" placeholder="Email:">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                                <textarea class="form-control mb-3" name="comment" id="comment" cols="30" rows="5" placeholder="Comment"></textarea>--}}

{{--                                <input class="btn btn-main btn-round-full" type="submit" name="submit-contact" id="submit_contact" value="Submit Message">--}}
{{--                            </form>--}}
{{--                        </div>--}}
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget search card p-4 mb-3 border-0">
                            <input type="text" class="form-control" placeholder="Поиск">
                            <a href="#" class="btn btn-mian btn-small d-block mt-2">Поиск</a>
                        </div>

                        @if(count($latestPosts) > 0)
                            <div class="sidebar-widget latest-post card border-0 p-4 mb-3">
                                <h5>Последние посты</h5>

                                @foreach($latestPosts as $lPost)
                                    <div class="media border-bottom py-3">
                                        <a href="{{ route('posts.show', $post->id) }}">
                                            <img class="mr-4"
                                                 width="87"
                                                 height="72"
                                                 src="{{ $lPost->preview_image ? asset('storage/' . $lPost->preview_image) : asset('assets/admin/img/avatar.png') }}" alt=""/>
                                        </a>
                                        <div class="media-body">
                                            <h6 class="my-2"><a href="#">{{ $lPost->title }}</a></h6>
                                            <span class="text-sm text-muted">{{ $lPost->dateAsCarbon->day }} {{ $lPost->dateAsCarbon->translatedFormat('F') }} {{ $lPost->dateAsCarbon->year }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        @if(count($tags) > 0)
                            <div class="sidebar-widget bg-white rounded tags p-4 mb-3">
                                <h5 class="mb-4">Теги</h5>

                                @foreach($tags as $tag)
                                    <a href="">{{ $tag->title }}</a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
