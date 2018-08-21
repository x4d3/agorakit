@extends('dialog')

@section('content')

<a href="{{ route('comments.reaction.store', [$comment, 'plus']) }}" up-target="#comment-{{$comment->id}}">+1!</a>
<a href="{{ route('comments.reaction.store', [$comment, 'moins']) }}" up-target="#comment-{{$comment->id}}">-1!</a>
<a href="{{ route('comments.reaction.store', [$comment, 'super']) }}" up-target="#comment-{{$comment->id}}">Super</a>
<a href="{{ route('comments.reaction.store', [$comment, 'bof']) }}" up-target="#comment-{{$comment->id}}">Bof</a>


@endsection
