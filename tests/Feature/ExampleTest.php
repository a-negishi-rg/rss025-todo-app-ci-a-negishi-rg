<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    // public function test_the_application_returns_a_successful_response(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /**
     * RSS025_TRAINING_PJ-60 登録処理作成
     */
    public function test_the_application_add_task(): void
    {
        // 準備: 登録するデータ
        $data = [
            'title' => 'テスト',
            'content' => 'テスト',
            'person_in_charge' => 'テスト',
        ];

        // 実行: APIエンドポイントへPOSTリクエスト
        $response = $this->postJson('/api/tasks', $data);

        // 検証:
        // 1. HTTPステータスコードが200 (OK) であること
        $response->assertStatus(200);
        // 2. レスポンスJSONに作成したタスク名が含まれていること
        $response->assertJsonFragment($data);
        // 3. データベースにデータが正しく保存されていること
        $this->assertDatabaseHas('tasks', $data);
    }

    /**
     * RSS025_TRAINING_PJ-60 登録処理作成 バリデーション
     */
    public function test_the_application_validation(): void
    {
        // 準備: 登録するデータ
        $data = [
            'title' => ' ',
            'content' => 'テスト',
            'person_in_charge' => 'テスト',
        ];

        // 実行: APIエンドポイントへPOSTリクエスト
        $response = $this->postJson('/api/tasks', $data);

        // 検証:
        // 1. HTTPステータスコードが200 (OK) であること
        $response->assertStatus(422);
        // 2. レスポンスJSONに 'title' フィールドのエラーが含まれていること
        $response->assertJsonValidationErrors(['title']);
    }
}
