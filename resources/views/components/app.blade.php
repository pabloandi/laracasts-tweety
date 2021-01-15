<x-layout>
    <section class="px-8">
        <main class="mx-auto">
            <div class="lg:flex lg:justify-between">
                @auth
                    <div class="sidebar" >
                        @include('_sidebar-links')
                    </div>
                @endauth

                <div class="timeline ">
                    {{ $slot }}
                </div>

                @auth
                    <div class="friends ">
                        @include('_friends-list')
                    </div>
                @endauth
            </div>
        </main>
    </section>
</x-layout>
