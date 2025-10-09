<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        {{ $trigger ?? 'Menu' }}
    </button>
    <ul class="dropdown-menu">
        {{ $slot }}
    </ul>
</div>