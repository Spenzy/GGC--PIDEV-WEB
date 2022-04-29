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
        '/admin' => [[['_route' => 'app_admin', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/loginnnn' => [[['_route' => 'loginnnn', '_controller' => 'App\\Controller\\AdminController::indexLogin'], null, null, null, false, false, null]],
        '/loginm' => [[['_route' => 'app_loginm', '_controller' => 'App\\Controller\\AdminController::login'], null, ['POST' => 0, 'GET' => 1], null, false, false, null]],
        '/forum/archive' => [[['_route' => 'app_admin_pubarchive', '_controller' => 'App\\Controller\\AdminController::forumArchive'], null, null, null, false, false, null]],
        '/forum/NonArchive' => [[['_route' => 'app_admin_pubnonarchive', '_controller' => 'App\\Controller\\AdminController::forumNonArchive'], null, null, null, false, false, null]],
        '/avis' => [[['_route' => 'app_avis_index', '_controller' => 'App\\Controller\\AvisController::index'], null, ['GET' => 0], null, true, false, null]],
        '/messagebot' => [[['_route' => 'message', '_controller' => 'App\\Controller\\BootController::messageAction'], null, null, null, false, false, null]],
        '/messaagebot' => [[['_route' => 'homepage', '_controller' => 'App\\Controller\\BootController::indexAction'], null, null, null, false, false, null]],
        '/chatframebot' => [[['_route' => 'chatframe', '_controller' => 'App\\Controller\\BootController::chatframeAction'], null, null, null, false, false, null]],
        '/client' => [[['_route' => 'app_client_index', '_controller' => 'App\\Controller\\ClientController::index'], null, ['GET' => 0], null, true, false, null]],
        '/client/new2' => [[['_route' => 'app_client_new2', '_controller' => 'App\\Controller\\ClientController::new2'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/commande' => [[['_route' => 'app_commande_index', '_controller' => 'App\\Controller\\CommandeController::index'], null, ['GET' => 0], null, true, false, null]],
        '/commande/new' => [[['_route' => 'app_commande_new', '_controller' => 'App\\Controller\\CommandeController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/commande/show' => [[['_route' => 'app_commande_show', '_controller' => 'App\\Controller\\CommandeController::show'], null, ['GET' => 0], null, false, false, null]],
        '/' => [[['_route' => 'app_home_page', '_controller' => 'App\\Controller\\HomePageController::index'], null, null, null, false, false, null]],
        '/livraison' => [[['_route' => 'app_livraison_index', '_controller' => 'App\\Controller\\LivraisonController::index'], null, ['GET' => 0], null, true, false, null]],
        '/livraison/new' => [[['_route' => 'app_livraison_new', '_controller' => 'App\\Controller\\LivraisonController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/moderateur' => [[['_route' => 'app_moderateur_index', '_controller' => 'App\\Controller\\ModerateurController::index'], null, ['GET' => 0], null, true, false, null]],
        '/moderateur/new' => [[['_route' => 'app_moderateur_new', '_controller' => 'App\\Controller\\ModerateurController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/panier' => [[['_route' => 'panier_index', '_controller' => 'App\\Controller\\PanierController::index'], null, null, null, true, false, null]],
        '/panier/delete' => [[['_route' => 'panier_delete_all', '_controller' => 'App\\Controller\\PanierController::deleteAll'], null, null, null, false, false, null]],
        '/personne' => [[['_route' => 'app_personne_index', '_controller' => 'App\\Controller\\PersonneController::index'], null, ['GET' => 0], null, true, false, null]],
        '/personne/new' => [[['_route' => 'app_personne_new', '_controller' => 'App\\Controller\\PersonneController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/produit' => [[['_route' => 'app_produit_index', '_controller' => 'App\\Controller\\ProduitController::index'], null, ['GET' => 0], null, true, false, null]],
        '/produit/shop' => [[['_route' => 'app_produit_shop', '_controller' => 'App\\Controller\\ProduitController::shop'], null, ['GET' => 0], null, false, false, null]],
        '/produit/new' => [[['_route' => 'app_produit_new', '_controller' => 'App\\Controller\\ProduitController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/forum' => [[['_route' => 'app_publication_index', '_controller' => 'App\\Controller\\PublicationController::index'], null, ['GET' => 0, 'POST' => 1], null, true, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
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
                .'|/forum/([^/]++)(?'
                    .'|(*:187)'
                    .'|/(?'
                        .'|([^/]++)/modif(*:213)'
                        .'|activity(*:229)'
                        .'|modification(*:249)'
                        .'|upvote(*:263)'
                        .'|downvote(*:279)'
                    .')'
                    .'|(*:288)'
                    .'|(*:296)'
                .')'
                .'|/avis/([^/]++)(?'
                    .'|/(?'
                        .'|new(*:329)'
                        .'|([^/]++)/edit(*:350)'
                    .')'
                    .'|(*:359)'
                .')'
                .'|/c(?'
                    .'|lient/([^/]++)(?'
                        .'|(*:390)'
                        .'|/edit(*:403)'
                        .'|(*:411)'
                    .')'
                    .'|ommande/([^/]++)(?'
                        .'|/(?'
                            .'|edit(*:447)'
                            .'|livree(*:461)'
                        .')'
                        .'|(*:470)'
                    .')'
                .')'
                .'|/li(?'
                    .'|gnecommande/([^/]++)(*:506)'
                    .'|vraison/([^/]++)(?'
                        .'|(*:533)'
                        .'|/e(?'
                            .'|dit(*:549)'
                            .'|xcuse(*:562)'
                        .')'
                        .'|(*:571)'
                    .')'
                .')'
                .'|/moderateur/([^/]++)(?'
                    .'|(*:604)'
                    .'|/edit(*:617)'
                    .'|(*:625)'
                .')'
                .'|/p(?'
                    .'|anier/(?'
                        .'|add/([^/]++)(*:660)'
                        .'|edit/([^/]++)(*:681)'
                        .'|remove/([^/]++)(*:704)'
                        .'|delete/([^/]++)(*:727)'
                    .')'
                    .'|ersonne/([^/]++)(?'
                        .'|(*:755)'
                        .'|/edit(*:768)'
                        .'|(*:776)'
                    .')'
                    .'|roduit/(?'
                        .'|([^/]++)(*:803)'
                        .'|de(?'
                            .'|tails/([^/]++)(*:830)'
                            .'|lete/([^/]++)(*:851)'
                        .')'
                        .'|edit/([^/]++)(*:873)'
                        .'|([^/]++)/note(*:894)'
                        .'|remise(*:908)'
                        .'|search(*:922)'
                        .'|([^/]++)//pdf(*:943)'
                    .')'
                .')'
                .'|/e(?'
                    .'|fconnect(?:/([^/]++)(?:/([^/]++))?)?(*:994)'
                    .'|lfinder(?:/([^/]++)(?:/([^/]++))?)?(*:1037)'
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
        187 => [[['_route' => 'app_forum_archive', '_controller' => 'App\\Controller\\AdminController::archiver'], ['idpublication'], null, null, false, true, null]],
        213 => [[['_route' => 'app_commentaire_edit', '_controller' => 'App\\Controller\\CommentaireController::edit'], ['idpublication', 'idcommentaire'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        229 => [[['_route' => 'app_publication_show', '_controller' => 'App\\Controller\\PublicationController::show'], ['idpublication'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        249 => [[['_route' => 'app_publication_edit', '_controller' => 'App\\Controller\\PublicationController::edit'], ['idpublication'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        263 => [[['_route' => 'app_vote_up', '_controller' => 'App\\Controller\\VoteController::upvote'], ['idpublication'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        279 => [[['_route' => 'app_vote_down', '_controller' => 'App\\Controller\\VoteController::downvote'], ['idpublication'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        288 => [[['_route' => 'app_commentaire_delete', '_controller' => 'App\\Controller\\CommentaireController::delete'], ['idcommentaire'], ['POST' => 0], null, false, true, null]],
        296 => [[['_route' => 'app_publication_delete', '_controller' => 'App\\Controller\\PublicationController::delete'], ['idpublication'], ['POST' => 0], null, false, true, null]],
        329 => [[['_route' => 'app_avis_new', '_controller' => 'App\\Controller\\AvisController::new'], ['reference'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        350 => [[['_route' => 'app_avis_edit', '_controller' => 'App\\Controller\\AvisController::edit'], ['reference', 'idavis'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        359 => [
            [['_route' => 'app_avis_show', '_controller' => 'App\\Controller\\AvisController::show'], ['idavis'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_avis_delete', '_controller' => 'App\\Controller\\AvisController::delete'], ['idavis'], ['POST' => 0], null, false, true, null],
        ],
        390 => [[['_route' => 'app_client_show', '_controller' => 'App\\Controller\\ClientController::show'], ['idclient'], ['GET' => 0], null, false, true, null]],
        403 => [[['_route' => 'app_client_edit', '_controller' => 'App\\Controller\\ClientController::edit'], ['idclient'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        411 => [[['_route' => 'app_client_delete', '_controller' => 'App\\Controller\\ClientController::delete'], ['idclient'], ['POST' => 0], null, false, true, null]],
        447 => [[['_route' => 'app_commande_edit', '_controller' => 'App\\Controller\\CommandeController::edit'], ['idcommande'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        461 => [[['_route' => 'app_commande_livree', '_controller' => 'App\\Controller\\CommandeController::Livree'], ['idcommande'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        470 => [[['_route' => 'app_commande_delete', '_controller' => 'App\\Controller\\CommandeController::delete'], ['idcommande'], ['POST' => 0], null, false, true, null]],
        506 => [[['_route' => 'app_lignecommande_show', '_controller' => 'App\\Controller\\LignecommandeController::show'], ['idcommande'], ['GET' => 0], null, false, true, null]],
        533 => [[['_route' => 'app_livraison_show', '_controller' => 'App\\Controller\\LivraisonController::show'], ['idcommande'], ['GET' => 0], null, false, true, null]],
        549 => [[['_route' => 'app_livraison_edit', '_controller' => 'App\\Controller\\LivraisonController::edit'], ['idcommande'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        562 => [[['_route' => 'app_livraison_excuse', '_controller' => 'App\\Controller\\LivraisonController::excuse'], ['idcommande'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        571 => [[['_route' => 'app_livraison_delete', '_controller' => 'App\\Controller\\LivraisonController::delete'], ['idcommande'], ['POST' => 0], null, false, true, null]],
        604 => [[['_route' => 'app_moderateur_show', '_controller' => 'App\\Controller\\ModerateurController::show'], ['idModerateur'], ['GET' => 0], null, false, true, null]],
        617 => [[['_route' => 'app_moderateur_edit', '_controller' => 'App\\Controller\\ModerateurController::edit'], ['idModerateur'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        625 => [[['_route' => 'app_moderateur_delete', '_controller' => 'App\\Controller\\ModerateurController::delete'], ['idModerateur'], ['POST' => 0], null, false, true, null]],
        660 => [[['_route' => 'panier_add', '_controller' => 'App\\Controller\\PanierController::add'], ['id'], null, null, false, true, null]],
        681 => [[['_route' => 'panier_edit', '_controller' => 'App\\Controller\\PanierController::edit'], ['idcommande'], null, null, false, true, null]],
        704 => [[['_route' => 'panier_remove', '_controller' => 'App\\Controller\\PanierController::remove'], ['id'], null, null, false, true, null]],
        727 => [[['_route' => 'panier_delete', '_controller' => 'App\\Controller\\PanierController::delete'], ['id'], null, null, false, true, null]],
        755 => [[['_route' => 'app_personne_show', '_controller' => 'App\\Controller\\PersonneController::show'], ['idPersonne'], ['GET' => 0], null, false, true, null]],
        768 => [[['_route' => 'app_personne_edit', '_controller' => 'App\\Controller\\PersonneController::edit'], ['idPersonne'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        776 => [[['_route' => 'app_personne_delete', '_controller' => 'App\\Controller\\PersonneController::delete'], ['idPersonne'], ['POST' => 0], null, false, true, null]],
        803 => [[['_route' => 'app_produit_show', '_controller' => 'App\\Controller\\ProduitController::show'], ['reference'], ['GET' => 0], null, false, true, null]],
        830 => [[['_route' => 'app_produit_details', '_controller' => 'App\\Controller\\ProduitController::details'], ['reference'], ['GET' => 0], null, false, true, null]],
        851 => [[['_route' => 'app_produit_delete', '_controller' => 'App\\Controller\\ProduitController::delete'], ['reference'], ['POST' => 0], null, false, true, null]],
        873 => [[['_route' => 'app_produit_edit', '_controller' => 'App\\Controller\\ProduitController::edit'], ['reference'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        894 => [[['_route' => 'app_produit_note', '_controller' => 'App\\Controller\\ProduitController::affecterNote'], ['reference'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        908 => [[['_route' => 'app_produit_remise', '_controller' => 'App\\Controller\\ProduitController::RemiseAffecter'], [], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        922 => [[['_route' => 'app_produit_search', '_controller' => 'App\\Controller\\ProduitController::Recherche'], [], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        943 => [[['_route' => 'app_produit_pdf', '_controller' => 'App\\Controller\\ProduitController::PdfListeProduits'], ['reference'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        994 => [[['_route' => 'ef_connect', '_controller' => 'FM\\ElfinderBundle\\Controller\\ElFinderController::load', 'instance' => 'default', 'homeFolder' => ''], ['instance', 'homeFolder'], null, null, false, true, null]],
        1037 => [
            [['_route' => 'elfinder', '_controller' => 'FM\\ElfinderBundle\\Controller\\ElFinderController::show', 'instance' => 'default', 'homeFolder' => ''], ['instance', 'homeFolder'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
