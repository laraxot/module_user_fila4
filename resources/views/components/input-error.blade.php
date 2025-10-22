<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
<?php

declare(strict_types=1);

?>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
<<<<<<< HEAD
@endif
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
@endif
=======
@endif 
>>>>>>> a12f125f4a (.)
=======
@endif
>>>>>>> b93ef594b4 (.)
=======
@endif 
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
