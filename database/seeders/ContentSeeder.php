<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

/**
 * 站点内容 Seeder：项目案例。
 * 使用 updateOrCreate，可重复执行，不会产生重复数据。
 */
class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'name' => 'Personal_Portfolio',
                'sort_order' => 1,
                'tags' => ['Laravel', 'Filament', 'MySQL', 'Pest'],
                'description' => '本站本身。Laravel 13 单页作品集 + Filament v5 后台 + 自建博客系统：数据库驱动的内容管理、JSON 标签字段与防御性访问器、Pest 测试覆盖、宝塔面板部署上线。从设计、开发到服务器运维的完整闭环。',
                'repo_url' => 'https://github.com/dw11qq1/Personal_Portfolio',
            ],
            [
                'name' => '自建博客系统',
                'sort_order' => 2,
                'tags' => ['Laravel', 'RichEditor', 'SEO'],
                'description' => '不依赖 WordPress，用 Laravel 自建的博客模块：富文本编辑、slug 路由、草稿/发布状态机、封面图管理。为了搞懂"博客背后的每一层"而写，也是本站技术笔记的载体。',
                'repo_url' => null,
                'live_url' => null,
            ],
            [
                'name' => '电商商城系统',
                'sort_order' => 3,
                'tags' => ['Java', 'Spring Boot', 'MySQL', '前后端分离'],
                'description' => '从零设计开发的全栈电商系统：实现商品浏览与搜索、购物车、订单状态流转、支付对接、后台管理五大核心模块，前后端分离架构，使用 Java + Spring Boot 开发。',
                'repo_url' => null,
                'live_url' => null,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['name' => $project['name']],
                $project
            );
        }
    }
}
