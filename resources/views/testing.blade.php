<?php
    $rows = [
        [
            [
                'title' => 'Aprovados',
                'items' => [
                    ['id' => 1, 'title' => 'Usuário 1', 'content' => 'Conteúdo 1'],
                    ['id' => 2, 'title' => 'Usuário 2', 'content' => 'Conteúdo 2'],
                ],
                'draggable' => [
                    'put' => true,
                    'pull' => true,
                ]
            ],
            [
                'title' => 'Reprovados',
                'items' => [
                    ['id' => 3, 'title' => 'Usuário 3', 'content' => 'Conteúdo 3'],
                    ['id' => 4, 'title' => 'Usuário 4', 'content' => 'Conteúdo 4'],
                ],
                'draggable' => [
                    'put' => true,
                    'pull' => true,
                ]
            ],
            [
                'title' => 'Sob Análise',
                'items' => [
                    ['id' => 5, 'title' => 'Usuário 5', 'content' => 'Conteúdo 5'],
                    ['id' => 6, 'title' => 'Usuário 6', 'content' => 'Conteúdo 6'],
                ],
                'draggable' => [
                    'put' => false,
                    'pull' => false,
                ]
            ],
            [
                'title' => 'Finalizados',
                'items' => [
                    ['id' => 7, 'title' => 'Usuário 7', 'content' => 'Conteúdo 7'],
                    ['id' => 8, 'title' => 'Usuário 8', 'content' => 'Conteúdo 8'],
                ],
                'draggable' => [
                    'put' => true,
                    'pull' => false,
                ]
            ],
        ],
        [
            [
                'title' => 'Frutas',
                'items' => [
                    ['id' => 1, 'title' => 'Fruta 1', 'content' => 'Conteúdo 1'],
                    ['id' => 2, 'title' => 'Fruta 2', 'content' => 'Conteúdo 2'],
                ],
                'draggable' => [
                    'put' => false,
                    'pull' => true,
                ]
            ],
            [
                'title' => 'Legumes',
                'items' => [
                    ['id' => 3, 'title' => 'Legume 3', 'content' => 'Conteúdo 3'],
                    ['id' => 4, 'title' => 'Legume 4', 'content' => 'Conteúdo 4'],
                ],
                'draggable' => [
                    'put' => true,
                    'pull' => true,
                ]
            ],
            [
                'title' => 'Verduras',
                'items' => [
                    ['id' => 5, 'title' => 'Verdura 5', 'content' => 'Conteúdo 5'],
                    ['id' => 6, 'title' => 'Verdura 6', 'content' => 'Conteúdo 6'],
                ],
                'draggable' => [
                    'put' => false,
                    'pull' => true,
                ]
            ]
        ]
    ];
?>

@extends('layouts.app')

@section('content')
    <h1>Os cards deverão ser jogados aqui</h1>
    @foreach($rows as $rowKey => $row)
        <div class="flex">
            @foreach ($row as $columnKey => $column)
                @php
                    $put = $column['draggable']['put'];
                    $pull = $column['draggable']['pull'];
                @endphp
                <x-draggable.column.root
                    title="{{ $column['title'] }}"
                >
                    @foreach ($column['items'] as $card)
                        <x-draggable.root
                            :items="$column['items']"
                            groupName="group-{{ $rowKey }}"

                            canPut="{{ $put }}"
                            canPull="{{ $pull }}"
                        >
                            <x-draggable.card.root
                                key="{{ $card['id'] }}"
                                title="{{ $card['title'] }}"
                                content="{{ $card['content'] }}"
                            />
                        </x-draggable.root>
                    @endforeach
                </x-draggable.column.root>
            @endforeach
        </div>
    @endforeach
@endsection
