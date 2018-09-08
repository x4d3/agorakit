<a name="comment_{{$comment->id}}"></a>

<div class="w-100  comment @if ($comment->isread) read  @endif">
    <div class="d-flex justify-content-between">

        <div class="d-flex">
            <div class="avatar mr-2">
                <img src="{{route('users.cover', [$comment->user, 'small'])}}" class="rounded-circle"/>
            </div>

            <div class="user mt-1">
                <a href="{{ route('users.show', [$comment->user]) }}">{{$comment->user->name}}</a>
            </div>

            <div class="summary mt-1">
                {{strip_tags(summary($comment->body))}}
            </div>
        </div>

        <div class="d-flex justify-content-right">
            <div class="created_at">{{$comment->created_at->diffForHumans()}}</div>

            <div class="tools">
                @can('update', $comment)
                    <div class="ml-4 dropdown actions">
                        <button class="btn btn-secondary-outline dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cog" aria-hidden="true"></i>

                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            @can('update', $comment)
                                <a class="dropdown-item" href="{{ action('CommentController@edit', [$group, $discussion, $comment]) }}"><i class="fa fa-pencil"></i>
                                    {{trans('messages.edit')}}
                                </a>
                            @endcan

                            @can('delete', $comment)
                                <a class="dropdown-item" up-modal=".dialog" href="{{ action('CommentController@destroyConfirm', [$group, $discussion, $comment]) }}"><i class="fa fa-trash"></i>
                                    {{trans('messages.delete')}}
                                </a>
                            @endcan

                            @if ($comment->revisionHistory->count() > 0)
                                <a class="dropdown-item" href="{{action('CommentController@history', [$group, $discussion, $comment])}}"><i class="fa fa-history"></i> {{trans('messages.show_history')}}</a>
                            @endif
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </div>

    <div class="body ml-5 mt-2">
        {!! highlightMentions(filter($comment->body)) !!}
    </div>
</div>
