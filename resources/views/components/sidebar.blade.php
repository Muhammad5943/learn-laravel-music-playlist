<div class="list-group mb-5">
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">Dashboard</a>
</div>

<div class="mb-4">
    <small class="text-secondary d-block mb-2 text-uppercase">Band</small>
    <div class="list-group">
        <a href="{{ route('bands.create') }}" class="list-group-item list-group-item-action">Create</a>
        <a href="{{ route('bands.table') }}" class="list-group-item list-group-item-action">Table</a>
    </div>
</div>

<div class="mb-4">
    <small class="text-secondary d-block mb-2 text-uppercase">Album</small>
    <div class="list-group">
        <a href="{{ route('albums.create') }}" class="list-group-item list-group-item-action">Create</a>
        <a href="{{ route('albums.table') }}" class="list-group-item list-group-item-action">Table</a>
    </div>
</div>

<div class="mb-4">
    <small class="text-secondary d-block mb-2 text-uppercase">Genre</small>
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">Create</a>
        <a href="#" class="list-group-item list-group-item-action">Table</a>
    </div>
</div>

<div class="mb-4">
    <div class="list-group">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action" style="background-color: red">
            <div style="color: white; text-align: center">Home</div>
        </a>
    </div>
</div>
