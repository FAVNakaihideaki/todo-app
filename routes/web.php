<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

// トップページにToDo一覧を表示
Route::get('/', [TodoController::class, 'index']);

// ToDoを新規作成
Route::post('/', [TodoController::class, 'store']);

// ToDoの完了状態を更新
Route::put('/{id}', [TodoController::class, 'update']);

// ToDoを削除
Route::delete('/{id}', [TodoController::class, 'destroy']);

// 任意：ToDo一覧ページ用の簡易テストルート（デバッグ用に残すなら）
Route::get('/todos', function () {
    return 'ToDo一覧ページ';
});


