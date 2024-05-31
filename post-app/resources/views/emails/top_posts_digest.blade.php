@component('mail::message')
    # Daily Top Posts

    Here are the top posts for today:

    @foreach ($topPosts as $post)
        - [{{ $post->title }}]({{ url('/posts', $post->id) }})
    @endforeach

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
