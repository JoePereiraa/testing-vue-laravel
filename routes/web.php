<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function (){
    return view('testing');
});


Route::get('/api/messages', function(Request $request) {
    $page = $request->get('page', 1); // Página atual
    $perPage = $request->get('per_page', 5); // Mensagens por página

    $messages = [
        ['id' => 1, 'content' => 'Primeira mensagem'],
        ['id' => 2, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 3, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 4, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 5, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 6, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 9, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 10, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 11, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 12, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 13, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 14, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 15, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 16, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 17, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 18, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 19, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 20, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 21, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 22, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 23, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 24, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 25, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 26, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 27, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 28, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 29, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 30, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 31, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 32, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 33, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 34, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 35, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 36, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 37, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 38, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 39, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 40, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 41, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 42, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 43, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 44, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 45, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 46, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 47, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 48, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 49, 'content' => 'Ultima Mensagem'],
    ];

    // Ordenar as mensagens pela chave 'id' (ou qualquer critério necessário)
    $messages = array_reverse($messages);

    // Paginar as mensagens manualmente
    $total = count($messages);
    $startingPoint = ($page - 1) * $perPage;
    $pagedMessages = array_slice($messages, $startingPoint, $perPage);

    return response()->json([
        'data' => $pagedMessages,
        'current_page' => $page,
        'last_page' => ceil($total / $perPage),
        'total' => $total,
    ]);
});

Route::get('/messagens', function () {
    $messages = [
        ['id' => 1, 'content' => 'Primeira mensagem'],
        ['id' => 2, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 2, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 3, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 4, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 5, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 6, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 7, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 8, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 3, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 4, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 5, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 6, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 7, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 8, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 2, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 2, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 3, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 4, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 5, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 6, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 7, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 8, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 3, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 4, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 5, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 6, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 7, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 8, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 2, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 2, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 3, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 4, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 5, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 6, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 7, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 8, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 3, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 4, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 5, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 6, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 7, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 8, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 2, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 2, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 3, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 4, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 5, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 6, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 7, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 8, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 3, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 4, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 5, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 6, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 7, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 8, 'content' => 'lorem ipsum dolor sit amet, consectetur adipiscing'],
        ['id' => 9, 'content' => 'Ultima Mensagem'],
    ];

    $messages = collect($messages);

    return view('messages', compact('messages'));
});