<?php
// database/seeders/DatabaseSeeder.php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(QuestionSeeder::class);
    }
}


class QuestionSeeder extends Seeder
{
    public function run()
    {
        DB::table('themes')->insert([
            'id' => 1,
            'titre' => 'À la maison',
            'description' => 'Les problèmes :

            Les bâtiments représentent 20 % des émissions de gaz à effet de serre – et même 25 % si l’on prend en compte les émissions associées (production d’électricité et de chaleur pour les bâtiments).
            
            Mieux les isoler et réguler leur température permet de réduire fortement la consommation d’énergie et l’importance des factures associées. C’est également pour leurs occupants un gain de confort et de santé important, alors que la précarité énergétique, c’est-à-dire la difficulté voire l’incapacité à pouvoir chauffer correctement son logement à un coût acceptable, touche déjà près de 20 % des ménages en France.
            
            Alors que les technologies et les compétences permettant une rénovation performante du parc bâti français sont d’ors et déjà disponibles, de nombreuses barrières à l’efficacité énergétique demeurent. Des actions correctives doivent être prises pour les écarter. Enfin, pour lutter efficacement contre le phénomène de précarité énergétique, la France doit augmenter et pérenniser ses budgets alloués au programme Habiter Mieux, pour lui donner les moyens d’atteindre 130 000 rénovations de logements occupés par des ménages modestes chaque année, conformément aux objectifs affichés dans la loi relative à la transition énergétique.
            
            Les solutions : 
            
            Les avantages économiques de la rénovation énergétique sont régulièrement mis en avant. En effet, c’est une source majeure de création de valeur économique et d’emplois qualifiés non délocalisables. Elle permettra également aux consommateurs, dont le rôle est central, de ne pas subir la hausse tendancielle du coût de l’énergie en France par la réduction de leurs besoins et par la maîtrise de leur consommation.
            
            Pour enclencher un plan massif de rénovation, le cadre réglementaire encadrant ces travaux doit être révisé de manière à l’orienter vers des exigences ambitieuses de performance globale. Les aides financières à la rénovation énergétique devront également évoluer afin qu’elles soient plus simples, intégrées et compréhensibles, s’adressant à tous, même aux plus modestes.',
            'created_at' => '2023-12-08 06:14:33',
            'updated_at' => '2023-12-08 06:20:33',
        ]);

        DB::table('themes')->insert([
            'id' => 2,
            'titre' => 'Voyager',
            'description' => 'Les problèmes :

            Le secteur des transports représente la première source d’émissions de gaz à effet de serre au niveau national (27 % en 2014) en raison de sa forte dépendance aux énergies fossiles. Ces émissions sont reparties à la hausse en 2015, en contradiction avec les engagements nationaux de réduction des émissions de gaz à effet de serre.
            
            Plus de la moitié d’entre elles sont rejetées par les voitures ; 20 % sont directement liés aux véhicules lourds et 17 % aux véhicules utilitaires légers. Le reste est réparti entre l’avion et les deux-roues motorisés, et dans une moindre mesure le transport fluvial, ferroviaire et maritime. Globalement, le transport routier est responsable à lui seul de 93 % des émissions de gaz à effet de serre de ce secteur. Environ 90 % du transport de marchandises est effectué par voie routière et plus de 87 % des trajets sont effectués en voiture en France. Pour des raisons d’aménagement du territoire et des villes, les distances parcourues par les biens et les personnes se sont allongées, donnant lieu à une augmentation de la consommation de carburant.
            
            La transition énergétique du secteur des transports doit donc concerner à la fois le transport de marchandises et la mobilité des personnes, ce qui comprend les déplacements du quotidien et les voyages occasionnels.
            
            Les solutions :
            
            La transition énergétique dans le secteur des transports passe par trois chemins:
            
            D’abord, réorganiser l’espace pour limiter l’étalement urbain et les besoins en déplacements, dont découle le choix du mode de transport. Cela passe par un partage de l’espace public plus favorable aux modes de déplacement alternatifs à la voiture et l’articulation des politiques d’aménagement, d’urbanisme et de transports, pour rapprocher les logements des lieux de services, d’activités professionnelles et de loisirs. Il est aussi essentiel de privilégier les infrastructures de transports qui encouragent les modes de transports les moins polluants. Enfin, relocaliser la production et la consommation sont autant de moyens d’agir en amont sur les émissions.
            
            Deuxièmement, il est nécessaire de se passer au plus tôt des véhicules consommant des énergies fossiles et d’améliorer la performance énergétique des véhicules pour réduire la consommation de carburant. Cela passe par une efficacité renforcée des véhicules légers et lourds mais également l’optimisation des véhicules utilisés (baisse des vitesses, éco-conduite, taux d’occupation optimal des véhicules avec le covoiturage, mesures d’émissions fiables, etc.).
            
            Enfin, il faut faire évoluer les pratiques et les comportements vers les modes de transports les plus écologiques : les transports ferroviaire et par voie d’eau, pour les biens, et le train, les transports en commun, le vélo et même la marche à pied, qui ont tous un domaine de pertinence sous-exploité aujourd’hui.
            
            Concrètement, il s’agit de transporter et de se déplacer moins, mieux et autrement, avec à la clé des co-bénéfices en termes d’économies, de santé, de sécurité routière, de congestion et de redynamisation des villes.',
            'created_at' => '2023-12-08 06:14:33',
            'updated_at' => '2023-12-08 06:20:33',
        ]);

        DB::table('themes')->insert([
            'id' => 3,
            'titre' => 'Nourriture',
            'description' => 'Les problèmes :

            La production agricole représente 20 % des émissions territoriales françaises. Ce chiffre comprend les gaz à effet de serre liées à l’élevage, l’épandage d’engrais azotés, les serres et engins agricoles, etc. émises sur le sol français. Tandis que les émissions de gaz à effet de serre liées à l’alimentation des ménages français représentent 24 % de leur empreinte carbone (incluant, en plus des étapes de production agricole, la transformation alimentaire, le commerce des biens alimentaires, la fabrication des emballages et la gestion des déchets, le transport et la réfrigération).
            
            Le système agricole et alimentaire industriel est fortement importateur et utilisateur d’intrants (produits phytosanitaires, engrais azotés de synthèse, alimentation pour les animaux, etc.), ce qui accroît ses émissions de gaz à effet de serre. En revanche, les systèmes agricoles et alimentaires les plus écologiques (utilisant peu de produits chimiques, autonomes, bio, etc.) sont moins émetteurs de gaz à effet de serre. Ce sont aussi ces modèles qui sont les plus vertueux pour la santé de la population, la protection des sols, de l’eau, de l’air et de la biodiversité et la résilience des agriculteurs face aux aléas climatiques et économiques.
            
            Les solutions :
            
            Pour atteindre l’objectif de division par 2 des émissions du secteur de l’agriculture, une transition écologique de notre système agricole et alimentaire est nécessaire. Cette transition devra reposer sur deux piliers :
            
            Premièrement, une transition alimentaire, pour diminuer nos émissions de gaz à effet de serre et améliorer notre santé.
            
            Cette transition alimentaire devra à la fois comprendre une évolution du régime alimentaire (moins de viande et de produits laitiers, davantage de fruits et légumes, frais et secs, moins de sucre et produits gras et plus de variété), un plus grand recours à des aliments de qualité (bio, label rouge, appellation d’origine protégée, etc.) mais aussi davantage de produits locaux et de saison, moins d’emballages et de gaspillage alimentaire, etc. Elle pourra se faire grâce à une information des consommateurs indépendante et claire, des politiques ambitieuses pour la restauration collective, etc. De telles réorientations seront à même de soutenir les acteurs des filières de qualité.
            
            Deuxièmement, une transition agricole écologique. Cette transition se fera grâce à l’évolution des pratiques des agriculteurs (moins d’engrais azotés de synthèse, développement des légumineuses telles que les lentilles, les haricots ou encore la féverole, gestion des déjections animales, etc.) mais surtout à travers une évolution profonde de notre système agricole : recherche de l’autonomie pour l’alimentation animale, mixité des cultures dans les territoires, conversions en agriculture biologique, etc. Ces évolutions pourront se faire grâce à un bon accompagnement des agriculteurs et des aides ciblées à travers des programmes nationaux et surtout une nouvelle Politique agricole commune ambitieuse.',
            'created_at' => '2023-12-08 06:14:33',
            'updated_at' => '2023-12-08 06:20:33',
        ]);

        DB::table('themes')->insert([
            'id' => 4,
            'titre' => 'Le label Bas Carbone',
            'description' => 'Le label bas-carbone a été créé par le Ministère de la Transition Écologique en 2018. Son objectif est de certifier des pratiques agricoles ou forestières censées réduire les émissions de gaz à effet de serre de ces secteurs, ou séquestrer du carbone. Au-delà de la certification, différents acteurs (collectivités, entreprises, etc.) peuvent rétribuer ces pratiques (mise en oeuvre par des agriculteurs, des forestiers, etc.) et par conséquent se prévaloir de contribuer à la lutte contre le changement climatique. 
            Label bas carbone : alerte greenwashing !
            
            Cependant, pour le Réseau Action Climat, le label bas carbone présente de nombreux risques. En l’état, dans le secteur agricole, il risque d’être un nouvel outil de greenwashing et d’engendrer des impacts délétères sur le climat et la biodiversité. Il valorise notamment la capture du CO2, qui permet non pas de réduire les émissions du secteur mais plutôt de les compenser. Cela permet à l’agriculture industrielle de grande échelle de peu modifier son fonctionnement. Or, la séquestration de carbone dans les sols ne peut être équivalente à une réduction d’émission car le carbone n’est pas stocké de manière permanente : le sol peut relâcher le CO2 absorbé, et ce déstockage n’est pas toujours maîtrisable. De plus, le lien avec le financement privé risque de créer une dépendance peu saine pour soutenir la transition agricole.
            La transition agroécologique : la vraie solution !
            
            Pour le Réseau Action Climat, cette transition se fera par des moyens plus stables et de plus grande ampleur, comme  la réforme de la PAC (Politique Agricole Commune) au niveau européen, dont les mécanismes d’aide sont déjà en place. En parallèle, à l’échelle française, le gouvernement doit mettre en place des plans ambitieux de conversion du modèle agricole vers des pratiques plus durables en garantissant un revenu viable aux agriculteurs. Toutes ces mesures publiques devront être massivement orientées vers la transition agroécologique, en particulier la transition de l’élevage, l’agriculture biologique, et le soutien aux légumineuses, haies et prairies.',
            'created_at' => '2023-12-08 06:14:33',
            'updated_at' => '2023-12-08 06:20:33',
        ]);

        DB::table('themes')->insert([
            'id' => 5,
            'titre' => 'Les agro-cargurans',
            'description' => 'Un secteur à verdir de toute urgence :

            Le secteur des transports joue un rôle capital dans les émissions de gaz à effet de serre (premier secteur émetteur en France). Pour honorer leurs engagements climatiques, la France et l’Union Européenne visent notamment une transition vers des carburants moins émetteurs que l’essence et le diesel. C’est dans cet objectif que des politiques françaises et européennes de soutien aux biocarburants ont été mises en place depuis 2009. Cependant, ces agro-carburants (ici en particulier ceux de première génération) ressemblent plus à une illusion qu’une vraie solution pour le climat et le vivant. 
            
            Une méthode contre-productive :
            
            Les conséquences de la production des agro-carburants sont  graves et sont surtout peu efficaces pour réduire les émissions de gaz à effet de serre. Les agro-carburants étant basés sur des cultures alimentaires, ils nécessitent d’exploiter davantage de terres agricoles. Le mécanisme le plus souvent observé consiste à affecter une culture initialement destinée à la production alimentaire à la production d’agro-carburants et d’ensuite déplacer la production alimentaire initiale vers des terres non-agricoles, comme les forêts ou les prairies. Ces phénomènes de déforestation ou de dégradation d’écosystèmes constituent une source importante d’émissions de GES, et participent très fortement à la destruction de la biodiversité. De plus, les cultures des agro-carburants encouragent un système agricole intensif et de grande échelle, avec l’utilisation de produits phytosanitaires. Enfin, la concurrence qu’exercent les agro-carburants avec la production alimentaire accroît la pression sur les terres, y compris dans les pays du Sud, influence les prix des denrées alimentaires et augmente leur volatilité.
            Réduire les émissions : la seule solution !
            
            Le secteur des transports doit réduire ses émissions sans compter sur les agro-carburants, et la bonne nouvelle est que c’est tout à fait faisable. Il est impératif de commencer par réduire la part des transports polluants, en particulier l’automobile et l’avion, au profit des mobilités moins polluantes, comme le train ou le vélo. Cela conduirait à une réduction du parc automobile ainsi qu’une transition vers des voitures 100% électriques, qui devront être plus légères et bien encadrées (normes sur les minerais, recyclage, et conception des véhicules et des batteries) pour réduire leur impact environnemental.',
            'created_at' => '2023-12-08 06:14:33',
            'updated_at' => '2023-12-08 06:20:33',
        ]);

        DB::table('themes')->insert([
            'id' => 6,
            'titre' => 'Le nucléaire',
            'description' => '« Si c’est bas carbone, ça ne pose aucun problème »

            L’industrie nucléaire a beau représenter une technologie peu émettrice de gaz à effet de serre (équivalent de l’énergie éolienne), elle n’en reste pas sans dangers. En effet, le nucléaire est un grand consommateur d’eau, implique des risques sanitaires et sécuritaires importants, est très long à mettre en place et coûteux à maintenir. Ainsi, son coût dépasse ceux de toutes les autres technologies. Sans compter la question des déchets nucléaires, qui reste sans réponse durable à ce jour. De plus, le nucléaire connaît des délais de construction de 10 à 19 ans (d’après le GIEC) et de nombreux retards qui n’en font pas une énergie rapidement développable pour agir face à l’urgence climatique dès cette décennie.
            « Aucune alternative au nucléaire n’existe »
            
            Et bien si. Cette technologie, certes attrayante, ne peut être qualifiée de bonne solution pour les êtres humains, le vivant et le climat. D’autant plus que nous connaissons les alternatives au nucléaire, qui sont plus rapides à construire et moins coûteuses sur les moyen et long termes : les énergies renouvelables, l’efficacité énergétique et la sobriété. Ce triptyque (comme présenté dans le 6e GIEC en avril 2022) apporte les vraies solutions de la transition écologique dans le secteur de l’énergie. 
            
            Pour finir, il est important de noter que dans le cas français (pays le plus utilisateur de nucléaire pour sa production d’électricité au monde), il faudra assurer une transition juste pour les employé.e.s de l’industrie du nucléaire vers des secteurs plus durables de manière systématique et planifiée. Une transition écologique ne peut être durable si elle ne prend pas en compte les questions de l’emploi et de la justice sociale.',
            'created_at' => '2023-12-08 06:14:33',
            'updated_at' => '2023-12-08 06:20:33',
        ]);

        DB::table('themes')->insert([
            'id' => 7,
            'titre' => 'Captage et stockage du CO2',
            'description' => 'Un progrès technique révolutionnaire pour le climat ?

            La technologie de captage pour stockage ou utilisation du carbone – que l’on abrègera CCUS pour Carbon Capture Usage and Storage – a pour objectif d’éviter les émissions de CO2 dans l’air en les captant directement à la source, c’est à dire en sortie de cheminée d’usine.
            
            Une fois le CO2 capturé, il est soit acheminé vers une zone de stockage dans les sols, soit réinjecté dans un procédé industriel. L’objectif n’est donc pas la réduction des émissions mais leur captation pour éviter leur dispersion.
            
            Cette technologie permet de décarboner partiellement les procédés de production existants sans les transformer. On s’intéresse dans cette note uniquement à la question de la capture et du stockage du carbone (CCUS) pour l’industrie et non à sa valorisation pour d’autres usages qui soulève d’autres questions. La France a une position stratégique importante dans le développement du CCUS, du fait d’une connaissance historique des conditions de stockage avec le gaz, de la proximité pour développer des infrastructures de transport, ainsi qu’une recherche scientifique de pointe sur le sujet. Bien qu’aucune installation ne soit en activité sur le territoire, on compte déjà 7 projets financés.
            Capter et stocker le CO2 émis au lieu de réduire son émission : alerte fausse solution !
            
            Cette technologie paraît parfaite pour certains secteurs industriels fortement émetteurs, qui ne peuvent pas se passer à 100% des énergies fossiles et qui auront toujours un impact négatif sur le climat. Cepdendant, le CCS présente de nombreux défauts : tout d’abord il ne répond pas à l’enjeu de réduire les émissions, il permet aux industriels de contourner la question. L’élimination du carbone de l’atmosphère, par le biais de puits naturels ou d’options technologiques, doit être considérée comme un complément aux efforts de réduction des émissions, et non comme une alternative.
            
            De plus, cette technologie en est toujours à ces balbutiements et sa mise en œuvre au niveau français implique de nombreuses contraintes techniques et sécuritaires : 90 % du carbone capté serait stocké hors du territoire français, principalement en Mer du Nord, ce qui entraînerait des coûts et des risques au transport. Du fait de ce manque de capacité de stockage, la plupart des sites du secteur de la chimie de base en Auvergne-Rhône-Alpes, ainsi que ceux du secteur cimentier ne pourront pas s’appuyer sur cette technologie pour décarboner leurs activités.
            
            Aux capacités limitées sur le territoire français s’ajoutent la question de l’acceptabilité sociale d’un tel dispositif de transport et stockage dans les sols, avec les risques de pollution que cela représente.',
            'created_at' => '2023-12-08 06:14:33',
            'updated_at' => '2023-12-08 06:20:33',
        ]);

        $questions = [
            [
                'libelle' => 'Combien représentent les bâtiments en émissions de gaz à effet de serre en pourcentage?',
                'theme_id' => "1"
            ],
            [
                'libelle' => 'Le secteur des transports représente-il la seconde source d\'émissions de gaz à effet de serre au niveau national?',
                'theme_id' => "2"
            ],
            [
                'libelle' => 'Devrait-on manger moins de viande pour réduire les émissions à effet de serre?',
                'theme_id' => "3"
            ],
            [
                'libelle' => 'Est-ce que le label carbone est du greenwashing?',
                'theme_id' => "4"
            ],
            [
                'libelle' => 'Est-ce-que les agrocarburants ont comme conséquences la déforestation?',
                'theme_id' => "5"
            ],
            [
                'libelle' => 'Il n\'existe pas d\'alternative au nucléaire.',
                'theme_id' => "6"
            ],
            [
                'libelle' => 'Captage et stockage du CO2, un progrès technique révolutionnaire pour le climat?',
                'theme_id' => "7"
            ],
            [
                'libelle' => 'Est-ce-que isoler sa maison permet de réduire fortement sa consommation d\'énergie ?',
                'theme_id' => "1"
            ],
            [
                'libelle' => 'Plus de la moitié des émissions de gaz à effet de serre dans le secteur des transports sont émis par quel type de transport ?',
                'theme_id' => "2"
            ],
            [
                'libelle' => 'Combien de pourcents représente la production agricole dans les émissions à effet de serre territoriales françaises ?',
                'theme_id' => "3"
            ],
            [
                'libelle' => 'La transition agroécologique est la vraie solution, contrairement au label bas carbone.',
                'theme_id' => "4"
            ],
            [
                'libelle' => 'Est ce que l\'agro-carburant est une méthode contre-productive ?',
                'theme_id' => "5"
            ],
            [
                'libelle' => 'Le nucléaire, si c\'est bas carbone, ça ne pose aucun problème.',
                'theme_id' => "6"
            ],
            [
                'libelle' => 'Le captage et stockege du CO2 est une solution peu couteuse.',
                'theme_id' => "7"
            ],
        ];
        $i = 1;
        foreach ($questions as $question) {
            $questionId = DB::table('questions')->insertGetId($question);

            $this->seedReponses($i,$questionId);
            $i++;
        }
    }

    private function seedReponses($i, $questionId)
    {
        $reponses = [];
        switch($i){
            case 1:
                $reponses = [
                    [
                        'reponse' => '5%',
                        'estVrai' => 0,
                        'question_id' => $questionId,
                    ],
                    [
                        'reponse' => '10%',
                        'estVrai' => 0,
                        'question_id' => $questionId,
                    ],
                    [
                        'reponse' => '50%',
                        'estVrai' => 0,
                        'question_id' => $questionId,
                    ],
                    [
                        'reponse' => '20%',
                        'estVrai' => 1,
                        'question_id' => $questionId,
                    ],
                ];
                break;
            case 2:
                $reponses = [
                    [
                        'reponse' => 'Oui',
                        'estVrai' => 0,
                        'question_id' => $questionId,
                    ],
                    [
                        'reponse' => 'Non',
                        'estVrai' => 1,
                        'question_id' => $questionId,
                    ],
                ];
                break;
            case 3:
                $reponses = [
                    [
                        'reponse' => 'Oui',
                        'estVrai' => 1,
                        'question_id' => $questionId,
                    ],
                    [
                        'reponse' => 'Non',
                        'estVrai' => 0,
                        'question_id' => $questionId,
                    ],
                ];
                break;
            case 4:
                $reponses = [
                    [
                        'reponse' => 'Oui',
                        'estVrai' => 1,
                        'question_id' => $questionId,
                    ],
                    [
                        'reponse' => 'Non',
                        'estVrai' => 0,
                        'question_id' => $questionId,
                    ],
                ];
                break;
            case 5: 
                $reponses = [
                    [
                        'reponse' => 'Oui',
                        'estVrai' => 1,
                        'question_id' => $questionId,
                    ],
                    [
                        'reponse' => 'Non',
                        'estVrai' => 0,
                        'question_id' => $questionId,
                    ]
                ];
                break;
            case 6:
                $reponses = [
                    [
                        'reponse' => 'Oui',
                        'estVrai' => 0,
                        'question_id' => $questionId,
                    ],
                    [
                        'reponse' => 'Non',
                        'estVrai' => 1,
                        'question_id' => $questionId,
                    ]
                ];
                break;
            case 7:
                $reponses = [
                    [
                        'reponse' => 'Oui',
                        'estVrai' => 0,
                        'question_id' => $questionId,
                    ],
                    [
                        'reponse' => 'Non',
                        'estVrai' => 1,
                        'question_id' => $questionId,
                    ]
                ];
                break;
                case 8:
                    $reponses = [
                        [
                            'reponse' => 'Oui',
                            'estVrai' => 1,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => 'Non',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ]
                    ];
                break;
                case 9:
                    $reponses = [
                        [
                            'reponse' => 'La voiture',
                            'estVrai' => 1,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => 'L\'avion',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => 'La moto',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => 'Le bateau',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ]
                    ];
                break;
                case 10:
                    $reponses = [
                        [
                            'reponse' => '40%',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => '30%',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => '20%',
                            'estVrai' => 1,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => '10%',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ]
                    ];
                break;
                case 11:
                    $reponses = [
                        [
                            'reponse' => 'Oui',
                            'estVrai' => 1,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => 'Non',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ]
                    ];
                break;
                case 12:
                    $reponses = [
                        [
                            'reponse' => 'Oui',
                            'estVrai' => 1,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => 'Non',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ]
                    ];
                break;
                case 13:
                    $reponses = [
                        [
                            'reponse' => 'Oui',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => 'Non',
                            'estVrai' => 1,
                            'question_id' => $questionId,
                        ]
                    ];
                break;
                case 14:
                    $reponses = [
                        [
                            'reponse' => 'Oui',
                            'estVrai' => 0,
                            'question_id' => $questionId,
                        ],
                        [
                            'reponse' => 'Non',
                            'estVrai' => 1,
                            'question_id' => $questionId,
                        ]
                    ];
                break;
                        
        }

        DB::table('reponses')->insert($reponses);
    }
}
