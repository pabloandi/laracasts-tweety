<div class="tweetbox">
    <form method="POST" action="/tweets">
        @csrf

        <textarea
            name="body"
            id="body"
            placeholder="What's up, doc?"
            required
            autofocus
        ></textarea>

        <hr class="my-4">

        <footer class="flex justify-between">
            <img
                src="{{ auth()->user()->avatar }}"
                alt="Avatar"
                class="rounded-full mr-2"
                width="40"
                height="40"
            >

            <button type="submit" class="tweet-button is-active">Tweet a ro!</button>
        </footer>

    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>

    @enderror
</div>
