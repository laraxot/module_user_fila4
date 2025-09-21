<?php

declare(strict_types=1);

namespace Modules\User\View\Components\Mail;

<<<<<<< HEAD
use Illuminate\Contracts\View\View;
use Closure;
=======
<<<<<<< HEAD
use Illuminate\Contracts\View\View;
use Closure;
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Illuminate\View\Component;
use Modules\Xot\Datas\MetatagData;

class Message extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        // public string $message
    ) {}

    /**
     * Get the view / contents that represent the component.
     *
<<<<<<< HEAD
     * @return View|Closure|string
=======
<<<<<<< HEAD
     * @return View|Closure|string
=======
     * @return \Illuminate\Contracts\View\View|\Closure|string
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
     */
    public function render()
    {
        $metatag = MetatagData::make();
        $view = 'user::components.mail.html.message';
        $view_params = [
            'logo' => asset($metatag->getLogoHeader()),
        ];

        return view($view, $view_params);
    }
}
