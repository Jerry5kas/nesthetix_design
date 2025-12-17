<?php

namespace App\View\Composers;

use App\Services\ThemeService;
use Illuminate\View\View;

class ThemeComposer
{
    public function __construct(
        protected ThemeService $themeService
    ) {}

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $theme = $this->themeService->getThemeData();
        
        $view->with([
            'theme' => $theme,
            'themeStyles' => $this->themeService->getCssVariables(),
            'googleFontsUrl' => $this->themeService->getGoogleFontsUrl(),
        ]);
    }
}

