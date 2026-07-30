<?php

// =============================================================
// 单元测试（Unit Test）
// 作用：单独测 Project 模型的 getTagsAttribute 访问器逻辑。
// 特点：不连接数据库，纯 PHP 运行，速度极快，
//       专门验证"防御性代码"——无论数据库里存的是什么，
//       取出来的 tags 都不会让页面 @foreach 报错。
//
// ⚠️ 关键点：为什么用 setRawAttributes 而不是 $project->tags = '...' ？
//    Project 模型声明了 $casts['tags'=>'array']。
//    如果写 $project->tags = '["PHP"]'（赋值），Laravel 的「赋值修改器」
//    会在赋值时就把字符串解码成数组，访问器根本收不到原始字符串。
//    而真实场景里，tags 原始值来自数据库（一个 JSON 字符串），
//    所以用 setRawAttributes() 直接塞"原始字符串"才能真实测到访问器。
// =============================================================

use App\Models\Project;

/*
 * 场景 1：数据库里存的是 JSON 字符串（最常见情况）
 * 验证访问器能把字符串正确解码成数组。
 */
test('tags accessor converts raw json string to array', function () {
    $project = new Project();

    // 模拟"从数据库读出的原始值"——绕过赋值修改器，直接写入原始属性
    $project->setRawAttributes(['tags' => '["PHP", "Laravel"]']);

    // 读取时经过 getTagsAttribute，应自动变回数组
    expect($project->tags)->toBe(['PHP', 'Laravel']);
});

/*
 * 场景 2：字段为空（null）
 * 验证不会返回 null 导致 Blade 里 @foreach 报错，而是安全的空数组。
 */
test('tags accessor returns empty array when raw value is null', function () {
    $project = new Project();
    $project->setRawAttributes(['tags' => null]);

    expect($project->tags)->toBe([]);
});

/*
 * 场景 3：数据库里是一段损坏/非法的 JSON
 * 验证 json_decode 失败后也能优雅降级为空数组，而不是抛出异常。
 */
test('tags accessor handles malformed json gracefully', function () {
    $project = new Project();
    $project->setRawAttributes(['tags' => 'not-valid-json']);

    expect($project->tags)->toBe([]);
});
