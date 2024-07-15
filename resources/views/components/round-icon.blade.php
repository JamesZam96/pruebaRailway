@props(['icon', 'text'])

<div class="d-flex align-items-center round-icon-container">
    <div class="icon-wrapper rounded-circle overflow-hidden flex-shrink-0">
        <img src="{{ $icon }}" alt="{{ $text }}" class="w-100 h-100 object-fit-cover">
    </div>
    <span class="ms-3 large-text">{{ $text }}</span>
</div>

<style>
    .round-icon-container {
        margin-left: 15px;
    }

    .icon-wrapper {
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .large-text {
        font-size: 1.25rem;
        font-weight: bold;
    }
</style>