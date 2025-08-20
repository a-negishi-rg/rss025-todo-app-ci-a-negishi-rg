<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoAppTest extends TestCase
{
    // テスト実行ごとにデータベースをリフレッシュ
    use RefreshDatabase;

    /**
     * RSS025_TRAINING_PJ-58 一覧画面表示のテスト
     *
     * @test
     */
    public function get_task_list(): void
    {
        // 準備: テスト用のタスクを3件作成
        Task::factory()->count(3)->create();

        // 実行: APIエンドポイントへGETリクエスト
        $response = $this->getJson('/api/tasks');

        // 検証:
        // 1. HTTPステータスコードが200 (OK) であること
        $response->assertStatus(200);
        // 2. レスポンスのJSONに3件のデータが含まれていること
        $response->assertJsonCount(3);
        // 3. JSONの構造が期待通りであること（最初の要素でチェック）
        $response->assertJsonStructure([
            '*' => [
                'title',
                'content',
                'person_in_charge',
                'created_at',
                'updated_at',
            ],
        ]);
    }
}
