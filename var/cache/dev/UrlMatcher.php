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
        '/admin' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, true, false, null]],
        '/admin/forum/archive' => [[['_route' => 'app_admin_pubarchive', '_controller' => 'App\\Controller\\AdminController::forumArchive'], null, null, null, false, false, null]],
        '/admin/forum/NonArchive' => [[['_route' => 'app_admin_pubnonarchive', '_controller' => 'App\\Controller\\AdminController::forumNonArchive'], null, null, null, false, false, null]],
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
        '/produit' => [[['_route' => 'app_produit_index', '_controller' => 'App\\Controller\\ProduitController::index'], null, ['GET' => 0], null, true, false, null]],
        '/produit/shop' => [[['_route' => 'app_produit_shop', '_controller' => 'App\\Controller\\ProduitController::shop'], null, ['GET' => 0], null, false, false, null]],
        '/produit/new' => [[['_route' => 'app_produit_new', '_controller' => 'App\\Controller\\ProduitController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/forum' => [[['_route' => 'app_publication_index', '_controller' => 'App\\Controller\\PublicationController::index'], null, ['GET' => 0, 'POST' => 1], null, true, false, null]],
        '/elfinder.main.js' => [[['_route' => 'ef_main_js', '_controller' => 'FM\\ElfinderBundle\\Controller\\ElFinderController::mainJS'], null, null, null, false, false, null]],
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
                .'|/a(?'
                    .'|dmin/forum/([^/]++)(*:193)'
                    .'|vis/([^/]++)(?'
                        .'|/(?'
                            .'|new(*:223)'
                            .'|([^/]++)/edit(*:244)'
                        .')'
                        .'|(*:253)'
                    .')'
                .')'
                .'|/commande/([^/]++)(?'
                    .'|/(?'
                        .'|edit(*:292)'
                        .'|livree(*:306)'
                    .')'
                    .'|(*:315)'
                .')'
                .'|/forum/([^/]++)(?'
                    .'|/(?'
                        .'|([^/]++)/modif(*:360)'
                        .'|activity(*:376)'
                        .'|modification(*:396)'
                        .'|upvote(*:410)'
                        .'|downvote(*:426)'
                    .')'
                    .'|(*:435)'
                    .'|(*:443)'
                .')'
                .'|/li(?'
                    .'|gnecommande/([^/]++)(?'
                        .'|(*:481)'
                        .'|/edit(*:494)'
                        .'|(*:502)'
                    .')'
                    .'|vraison/([^/]++)(?'
                        .'|(*:530)'
                        .'|/e(?'
                            .'|dit(*:546)'
                            .'|xcuse(*:559)'
                        .')'
                        .'|(*:568)'
                    .')'
                .')'
                .'|/p(?'
                    .'|anier/(?'
                        .'|add/([^/]++)(*:604)'
                        .'|edit/([^/]++)(*:625)'
                        .'|remove/([^/]++)(*:648)'
                        .'|delete/([^/]++)(*:671)'
                    .')'
                    .'|roduit/(?'
                        .'|([^/]++)(*:698)'
                        .'|de(?'
                            .'|tails/([^/]++)(*:725)'
                            .'|lete/([^/]++)(*:746)'
                        .')'
                        .'|edit/([^/]++)(*:768)'
                        .'|([^/]++)/note(*:789)'
                        .'|remise(*:803)'
                        .'|search(*:817)'
                        .'|([^/]++)//pdf(*:838)'
                    .')'
                .')'
                .'|/e(?'
                    .'|fconnect(?:/([^/]++)(?:/([^/]++))?)?(*:889)'
                    .'|lfinder(?:/([^/]++)(?:/([^/]++))?)?(*:932)'
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
        193 => [[['_route' => 'app_forum_archive', '_controller' => 'App\\Controller\\AdminController::archiver'], ['idpublication'], null, null, false, true, null]],
        223 => [[['_route' => 'app_avis_new', '_controller' => 'App\\Controller\\AvisController::new'], ['reference'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        244 => [[['_route' => 'app_avis_edit', '_controller' => 'App\\Controller\\AvisController::edit'], ['reference', 'idavis'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        253 => [
            [['_route' => 'app_avis_show', '_controller' => 'App\\Controller\\AvisController::show'], ['idavis'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_avis_delete', '_controller' => 'App\\Controller\\AvisController::delete'], ['idavis'], ['POST' => 0], null, false, true, null],
        ],
        292 => [[['_route' => 'app_commande_edit', '_controller' => 'App\\Controller\\CommandeController::edit'], ['idcommande'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        306 => [[['_route' => 'app_commande_livree', '_controller' => 'App\\Controller\\CommandeController::Livree'], ['idcommande'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        315 => [[['_route' => 'app_commande_delete', '_controller' => 'App\\Controller\\CommandeController::delete'], ['idcommande'], ['POST' => 0], null, false, true, null]],
        360 => [[['_route' => 'app_commentaire_edit', '_controller' => 'App\\Controller\\CommentaireController::edit'], ['idpublication', 'idcommentaire'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        376 => [[['_route' => 'app_publication_show', '_controller' => 'App\\Controller\\PublicationController::show'], ['idpublication'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        396 => [[['_route' => 'app_publication_edit', '_controller' => 'App\\Controller\\PublicationController::edit'], ['idpublication'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        410 => [[['_route' => 'app_vote_up', '_controller' => 'App\\Controller\\VoteController::upvote'], ['idpublication'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        426 => [[['_route' => 'app_vote_down', '_controller' => 'App\\Controller\\VoteController::downvote'], ['idpublication'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        435 => [[['_route' => 'app_commentaire_delete', '_controller' => 'App\\Controller\\CommentaireController::delete'], ['idcommentaire'], ['POST' => 0], null, false, true, null]],
        443 => [[['_route' => 'app_publication_delete', '_controller' => 'App\\Controller\\PublicationController::delete'], ['idpublication'], ['POST' => 0], null, false, true, null]],
        481 => [[['_route' => 'app_lignecommande_show', '_controller' => 'App\\Controller\\LignecommandeController::show'], ['idcommande'], ['GET' => 0], null, false, true, null]],
        494 => [[['_route' => 'app_lignecommande_edit', '_controller' => 'App\\Controller\\LignecommandeController::edit'], ['idligne'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        502 => [[['_route' => 'app_lignecommande_delete', '_controller' => 'App\\Controller\\LignecommandeController::delete'], ['idligne'], ['POST' => 0], null, false, true, null]],
        530 => [[['_route' => 'app_livraison_show', '_controller' => 'App\\Controller\\LivraisonController::show'], ['idcommande'], ['GET' => 0], null, false, true, null]],
        546 => [[['_route' => 'app_livraison_edit', '_controller' => 'App\\Controller\\LivraisonController::edit'], ['idcommande'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        559 => [[['_route' => 'app_livraison_excuse', '_controller' => 'App\\Controller\\LivraisonController::excuse'], ['idcommande'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        568 => [[['_route' => 'app_livraison_delete', '_controller' => 'App\\Controller\\LivraisonController::delete'], ['idcommande'], ['POST' => 0], null, false, true, null]],
        604 => [[['_route' => 'panier_add', '_controller' => 'App\\Controller\\PanierController::add'], ['id'], null, null, false, true, null]],
        625 => [[['_route' => 'panier_edit', '_controller' => 'App\\Controller\\PanierController::edit'], ['idcommande'], null, null, false, true, null]],
        648 => [[['_route' => 'panier_remove', '_controller' => 'App\\Controller\\PanierController::remove'], ['id'], null, null, false, true, null]],
        671 => [[['_route' => 'panier_delete', '_controller' => 'App\\Controller\\PanierController::delete'], ['id'], null, null, false, true, null]],
        698 => [[['_route' => 'app_produit_show', '_controller' => 'App\\Controller\\ProduitController::show'], ['reference'], ['GET' => 0], null, false, true, null]],
        725 => [[['_route' => 'app_produit_details', '_controller' => 'App\\Controller\\ProduitController::details'], ['reference'], ['GET' => 0], null, false, true, null]],
        746 => [[['_route' => 'app_produit_delete', '_controller' => 'App\\Controller\\ProduitController::delete'], ['reference'], ['POST' => 0], null, false, true, null]],
        768 => [[['_route' => 'app_produit_edit', '_controller' => 'App\\Controller\\ProduitController::edit'], ['reference'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        789 => [[['_route' => 'app_produit_note', '_controller' => 'App\\Controller\\ProduitController::excuse'], ['reference'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        803 => [[['_route' => 'app_produit_remise', '_controller' => 'App\\Controller\\ProduitController::RemiseAffecter'], [], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        817 => [[['_route' => 'app_produit_search', '_controller' => 'App\\Controller\\ProduitController::Recherche'], [], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        838 => [[['_route' => 'app_produit_pdf', '_controller' => 'App\\Controller\\ProduitController::PdfListeProduits'], ['reference'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        889 => [[['_route' => 'ef_connect', '_controller' => 'FM\\ElfinderBundle\\Controller\\ElFinderController::load', 'instance' => 'default', 'homeFolder' => ''], ['instance', 'homeFolder'], null, null, false, true, null]],
        932 => [
            [['_route' => 'elfinder', '_controller' => 'FM\\ElfinderBundle\\Controller\\ElFinderController::show', 'instance' => 'default', 'homeFolder' => ''], ['instance', 'homeFolder'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
