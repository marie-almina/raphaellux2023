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
