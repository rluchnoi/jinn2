import React from 'react'
import { createRoot } from 'react-dom/client'
import { createInertiaApp } from "@inertiajs/react";
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { register } from 'swiper/element/bundle';

import 'swiper/css/bundle';

register();

createInertiaApp({
    // Below you can see that we are going to get all React components from resources/js/Pages folder
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`,import.meta.glob('./Pages/**/*.jsx')),
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />)
    },
})
