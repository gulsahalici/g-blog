<x-layout>
    <x-slot name="content">
        <article>
            <h1>
                {{ $post->title; }}
            </h1>
            <p>
                By <a href="#">{{$post->author->name}}</a> in <a href="/categories/{{ $post->category->slug }}">
            </p>
            {{ $post->category->name }}
        </a>
            <p>
                {!! $post->body; !!} 
            </p>
        </article>
        <a href="/">Go back</a>
    </x-slot>
</x-layout>