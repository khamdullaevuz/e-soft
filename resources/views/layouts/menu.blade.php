<!-- need to remove -->
<li class="nav-item">
    <a href="{{ url('/admin') }}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Bosh sahifa</p>
    </a>

</li>

<li class="nav-item">
    <a href="{{ route('posts.index') }}" class="nav-link">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>Postlar</p>
    </a>

</li>

<li class="nav-item">

    <a href="{{ route('categories.index') }}" class="nav-link ">
        <i class="nav-icon fas fa-swatchbook"></i>
        <p>Bo'limlar</p>
    </a>
</li>