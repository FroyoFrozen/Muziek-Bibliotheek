@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'error-messages text-sm text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="error-message">
                <span class="error-text">{{ $message }}</span>
                <button type="button" class="error-close-btn" onclick="closeErrorMessage(this)">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </li>
        @endforeach
    </ul>
@endif

<style>
    .error-messages {
        list-style: none;
        padding: 0;
    }

    .error-message {
        position: relative;
        padding: 10px 15px;
        border-left: 4px solid #e53e3e;
        background-color: #fee2e2;
        margin-bottom: 10px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .error-text {
        margin-right: 10px;
    }

    .error-close-btn {
        border: none;
        background: transparent;
        color: #e53e3e;
        cursor: pointer;
    }

    .error-close-btn:focus,
    .error-close-btn:hover {
        outline: none;
    }

    .error-close-btn svg {
        fill: none;
        stroke: currentColor;
        stroke-width: 2px;
    }
</style>

<script>
    function closeErrorMessage(btn) {
        var errorMessage = btn.closest('.error-message');
        errorMessage.style.display = 'none';
    }
</script>
