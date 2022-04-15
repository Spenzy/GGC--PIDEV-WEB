<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/avis' => [[['_route' => 'app_avis_index', '_controller' => 'App\\Controller\\AvisController::index'], null, ['GET' => 0], null, true, false, null]],
        '/commande' => [[['_route' => 'app_commande_index', '_controller' => 'App\\Controller\\CommandeController::index'], null, ['GET' => 0], null, true, false, null]],
        '/commande/new' => [[['_route' => 'app_commande_new', '_controller' => 'App\\Controller\\CommandeController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/commande/show' => [[['_route' => 'app_commande_show', '_controller' => 'App\\Controller\\CommandeController::show'], null, ['GET' => 0], null, false, false, null]],
        '/' => [[['_route' => 'app_home_page', '_controller' => 'App\\Controller\\HomePageController::index'], null, null, null, false, false, null]],
        '/lignecommande' => [[['_route' => 'app_lignecommande_index', '_controller' => 'App\\Controller\\LignecommandeController::index'], null, ['GET' => 0], null, true, false, null]],
        '/livraison' => [[['_route' => 'app_livraison_index', '_controller' => 'App\\Controller\\LivraisonController::index'], null, ['GET' => 0], null, true, false, null]],
        '/livraison/new' => [[['_route' => 'app_livraison_new', '_controller' => 'App\\Controller\\LivraisonController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/panier' => [[['_route' => 'panier_index', '_controller' => 'App\\Controller\\PanierController::index'], null, null, null, true, false, null]],
        '/panier/delete' => [[['_route' => 'panier_delete_all', '_controller' => 'App\\Controller\\PanierController::deleteAll'], null, null, null, false, false, null]],
        '/produit' => [[['_route' => 'app_produit_index', '_controller' => 'App\\Controller\\ProduitController::index'], null, ['GET' => 0], null, false, false, null]],
        '/produit/shop' => [[['_route' => 'app_produit_shop', '_controller' => 'App\\Controller\\ProduitController::shop'], null, ['GET' => 0], null, false, false, null]],
        '/produit/new' => [[['_route' => 'app_produit_new', '_controller' => 'App\\Controller\\ProduitController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/avis/([^/]++)(?'
                    .'|/(?'
                        .'|new(*:193)'
                        .'|([^/]++)/edit(*:214)'
                    .')'
                    .'|(*:223)'
                .')'
                .'|/commande/([^/]++)(?'
                    .'|/(?'
                        .'|edit(*:261)'
                        .'|livree(*:275)'
                    .')'
                    .'|(*:284)'
                .')'
                .'|/li(?'
                    .'|gnecommande/([^/]++)(?'
                        .'|(*:322)'
                        .'|/edit(*:335)'
                        .'|(*:343)'
                    .')'
                    .'|vraison/([^/]++)(?'
                        .'|(*:371)'
                        .'|/e(?'
                            .'|dit(*:387)'
                            .'|xcuse(*:400)'
                        .')'
                        .'|(*:409)'
                    .')'
                .')'
                .'|/p(?'
                    .'|anier/(?'
                        .'|add/([^/]++)(*:445)'
                        .'|edit/([^/]++)(*:466)'
                        .'|remove/([^/]++)(*:489)'
                        .'|delete/([^/]++)(*:512)'
                    .')'
                    .'|roduit/(?'
                        .'|([^/]++)(*:539)'
                        .'|de(?'
                            .'|tails/([^/]++)(*:566)'
                            .'|lete/([^/]++)(*:587)'
                        .')'
                        .'|edit/([^/]++)(*:609)'
                    .')'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        193 => [[['_route' => 'app_avis_new', '_controller' => 'App\\Controller\\AvisController::new'], ['reference'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        214 => [[['_route' => 'app_avis_edit', '_controller' => 'App\\Controller\\AvisController::edit'], ['reference', 'idavis'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        223 => [
            [['_route' => 'app_avis_show', '_controller' => 'App\\Controller\\AvisController::show'], ['idavis'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_avis_delete', '_controller' => 'App\\Controller\\AvisController::delete'], ['idavis'], ['POST' => 0], null, false, true, null],
        ],
        261 => [[['_route' => 'app_commande_edit', '_controller' => 'App\\Controller\\CommandeController::edit'], ['idcommande'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        275 => [[['_route' => 'app_commande_livree', '_controller' => 'App\\Controller\\CommandeController::Livree'], ['idcommande'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        284 => [[['_route' => 'app_commande_delete', '_controller' => 'App\\Controller\\CommandeController::delete'], ['idcommande'], ['POST' => 0], null, false, true, null]],
        322 => [[['_route' => 'app_lignecommande_show', '_controller' => 'App\\Controller\\LignecommandeController::show'], ['idcommande'], ['GET' => 0], null, false, true, null]],
        335 => [[['_route' => 'app_lignecommande_edit', '_controller' => 'App\\Controller\\LignecommandeController::edit'], ['idligne'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        343 => [[['_route' => 'app_lignecommande_delete', '_controller' => 'App\\Controller\\LignecommandeController::delete'], ['idligne'], ['POST' => 0], null, false, true, null]],
        371 => [[['_route' => 'app_livraison_show', '_controller' => 'App\\Controller\\LivraisonController::show'], ['idcommande'], ['GET' => 0], null, false, true, null]],
        387 => [[['_route' => 'app_livraison_edit', '_controller' => 'App\\Controller\\LivraisonController::edit'], ['idcommande'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        400 => [[['_route' => 'app_livraison_excuse', '_controller' => 'App\\Controller\\LivraisonController::excuse'], ['idcommande'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        409 => [[['_route' => 'app_livraison_delete', '_controller' => 'App\\Controller\\LivraisonController::delete'], ['idcommande'], ['POST' => 0], null, false, true, null]],
        445 => [[['_route' => 'panier_add', '_controller' => 'App\\Controller\\PanierController::add'], ['id'], null, null, false, true, null]],
        466 => [[['_route' => 'panier_edit', '_controller' => 'App\\Controller\\PanierController::edit'], ['idcommande'], null, null, false, true, null]],
        489 => [[['_route' => 'panier_remove', '_controller' => 'App\\Controller\\PanierController::remove'], ['id'], null, null, false, true, null]],
        512 => [[['_route' => 'panier_delete', '_controller' => 'App\\Controller\\PanierController::delete'], ['id'], null, null, false, true, null]],
        539 => [[['_route' => 'app_produit_show', '_controller' => 'App\\Controller\\ProduitController::show'], ['reference'], ['GET' => 0], null, false, true, null]],
        566 => [[['_route' => 'app_produit_details', '_controller' => 'App\\Controller\\ProduitController::details'], ['reference'], ['GET' => 0], null, false, true, null]],
        587 => [[['_route' => 'app_produit_delete', '_controller' => 'App\\Controller\\ProduitController::delete'], ['reference'], ['POST' => 0], null, false, true, null]],
        609 => [
            [['_route' => 'app_produit_edit', '_controller' => 'App\\Controller\\ProduitController::edit'], ['reference'], ['GET' => 0, 'POST' => 1], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
