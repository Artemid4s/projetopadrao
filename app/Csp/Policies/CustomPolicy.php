<?php

namespace App\Csp\Policies;

use Spatie\Csp\Policies\Policy;
use Spatie\Csp\Directive;

class CustomPolicy extends Policy
{
    public function configure()
    {
        $this->addDirective(Directive::DEFAULT, 'self')
             ->addDirective(Directive::SCRIPT, 'self')
             ->addDirective(Directive::STYLE, 'self')
             ->addDirective(Directive::IMG, 'self')
             ->addDirective(Directive::FONT, 'self')
             ->addDirective(Directive::CONNECT, 'self')
             ->addDirective(Directive::FRAME_ANCESTORS, 'none')
             ->addDirective(Directive::FORM_ACTION, 'self')
             ->addDirective(Directive::BASE, 'self');
    }
}
