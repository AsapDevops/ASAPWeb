@if (session('status') === 'saved')
    <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
@endif