<ul>
    <li>
        <a href="/">Home</a>
    </li>
    <li>
        <a href="/explore">Explore</a>
    </li>
    <li>
        <a href="{{ current_user()->profileRoute }}">Profile</a>
    </li>
    <li>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </li>
</ul>
