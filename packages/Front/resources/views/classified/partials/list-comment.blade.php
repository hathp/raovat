<div id="comments">
    <ol>
        @foreach($comments as $comment)
        <li>
            <div class="avatar"><a href="#"><img src="{{ $comment->user->getAvatarImage()  }}" alt="{{ $comment->user_name }}" style="    width: 68px;"></a></div>
            <div class="comment_right clearfix">
                <div class="comment_info">Đăng bởi <a href="#">{{ $comment->user_name }}</a><span>|</span> {{ $comment->created_at->format('d-m-Y') }} <span>|</span><a class="reply-review" id="{{ $comment->id }}"  href="#contactForm"> Trả lời </a><span>|</span><a class="edit-review" id="{{ $comment->id }}"  href="#contactForm"> Sửa </a></div>
                <p class="html_{{ $comment->id }}">{!!  $comment->message  !!}</p>
            </div>
            <ul>
                @foreach($comment->child as $item)
                <li>
                    <div class="avatar"><a href="#"><img src="{{ $comment->user->getAvatarImage()  }}" alt="{{ $comment->user_name }}" style="    width: 68px;"></a></div>
                    <div class="comment_right clearfix">
                        <div class="comment_info">Đăng bởi <a href="#">{{ $item->user_name }}</a><span>|</span> {{ $item->created_at->format('d-m-Y') }} <span>|</span><a class="reply-review" id="{{ $comment->id }}"  href="#contactForm"> Trả lời </a><span>|</span><a class="edit-review" id="{{ $comment->id }}"  href="#contactForm"> Trả lời </a></div>
                        <p class="html_{{ $comment->id }}">
                            {!!  $item->message !!}
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ol>
</div><!-- End Comments -->