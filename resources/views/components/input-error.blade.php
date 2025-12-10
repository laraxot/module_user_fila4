<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 6d20fbe (.)
<?php

declare(strict_types=1);

?>
<<<<<<< HEAD
=======
>>>>>>> fbc8f8e (.)
=======
>>>>>>> 6d20fbe (.)
@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
<<<<<<< HEAD
<<<<<<< HEAD
@endif
=======
@endif 
>>>>>>> fbc8f8e (.)
=======
@endif
>>>>>>> 6d20fbe (.)
