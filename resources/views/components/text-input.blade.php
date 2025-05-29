@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-black-300 dark:border-black-700 dark:bg-black-900 dark:text-black-300 focus:border-black-500 dark:focus:border-black-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}>
