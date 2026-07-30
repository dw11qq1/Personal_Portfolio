<?php

// =============================================================
// 功能测试（Feature Test）
// 作用：模拟「浏览器访问首页」这一最核心的用户行为，
//       验证页面能正常返回、并且数据库里的数据被正确渲染出来。
// 运行环境：phpunit.xml 已把测试库配置为 SQLite 内存库（:memory:），
//           所以本测试不依赖你本机的 MySQL 是否启动。
// =============================================================

use App\Models\Profile;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;

// 告诉 Pest：本文件里的每个测试开始前，都先迁移一张干净的测试库。
// RefreshDatabase 会跑 database/migrations 下所有迁移文件，
// 因为是 SQLite 内存库，跑完即销毁，互不干扰、可重复执行。
uses(RefreshDatabase::class);

/*
 * 测试 1：访问首页 GET / 能成功，并显示了项目数据
 * 这是整个作品集最重要的"冒烟测试"——只要它能过，
 * 就说明 路由 → 控制器取数 → Blade 渲染 这条链是通的。
 */
test('homepage loads successfully and shows project data', function () {
    // ---- 准备（Arrange）：往测试库里造数据 ----
    // 控制器 index() 里会取 Profile::first() 并读取 name/title/subtitle，
    // 所以必须先有一条个人信息，否则访问首页会报错。
    Profile::create([
        'name'              => '陈默',
        'title'             => '后端开发工程师',
        'subtitle'          => '构建高性能 Web 应用',
        'years_experience'  => 3,
        'projects_count'    => 2,
        'clients_count'     => 10,
        'awards_count'      => 500,
    ]);

    // 再造一个项目，用于后面断言"页面里能看到它"。
    Project::create([
        'name'        => '协作任务板',
        'description' => '公益互助平台',
        'tags'        => ['Java', 'SpringBoot', 'MySQL'], // 数组会自动 JSON 化存入 json 列
        'sort_order'  => 1,
    ]);

    // ---- 动作（Act）：模拟浏览器发起 GET / 请求 ----
    $response = $this->get('/');

    // ---- 断言（Assert）：结果符合预期 ----
    $response->assertStatus(200);     // HTTP 状态码 200 = 成功
    $response->assertSee('协作任务板'); // 页面 HTML 里包含项目名
    $response->assertSee('陈默');       // 页面 HTML 里包含个人信息名
});

/*
 * 测试 2：项目标签从数据库取出后是"数组"，而不是"JSON 字符串"
 * 这一条专门验证 $casts['tags' => 'array'] 的类型转换是否生效。
 */
test('project tags are stored and retrieved as an array', function () {
    // 准备：创建一个带 3 个标签的项目
    Project::create([
        'name'        => '测试项目',
        'description' => '用于验证标签',
        'tags'        => ['PHP', 'Laravel', 'MySQL'],
        'sort_order'  => 1,
    ]);

    // 动作：从库里取回这条记录
    $project = Project::first();

    // 断言：tags 是数组、有 3 个元素、且包含 'Laravel'
    expect($project->tags)->toBeArray();
    expect($project->tags)->toHaveCount(3);
    expect($project->tags)->toContain('Laravel');
});
