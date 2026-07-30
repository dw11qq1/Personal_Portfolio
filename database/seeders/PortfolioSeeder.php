<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // 1. 个人信息（只有一条）
        Profile::create([
            'name' => '陈默',
            'title' => '后端开发工程师 · PHP',
            'subtitle' => '构建高性能、可扩展的 Web 应用',
            'years_experience' => 3,
            'projects_count' => 2,
            'clients_count' => 10,
            'awards_count' => 500,
        ]);

        // 2. 技能（10 条，按顺序）
        $skills = [
            ['name' => 'Java / SpringBoot',  'percent' => 80, 'sort_order' => 1],
            ['name' => 'PHP / Laravel',      'percent' => 75, 'sort_order' => 2],
            ['name' => 'MySQL',              'percent' => 90, 'sort_order' => 3],
            ['name' => 'Redis',              'percent' => 75, 'sort_order' => 4],
            ['name' => 'RESTful API',        'percent' => 80, 'sort_order' => 5],
            ['name' => 'HTML / CSS / JS',    'percent' => 75, 'sort_order' => 6],
            ['name' => 'Vue.js',             'percent' => 70, 'sort_order' => 7],
            ['name' => 'Docker / Linux',     'percent' => 65, 'sort_order' => 8],
            ['name' => 'Git / GitHub',       'percent' => 70, 'sort_order' => 9],
            ['name' => '设计模式',            'percent' => 60, 'sort_order' => 10],
        ];
        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // 3. 项目（2 个）
        $projects = [
            [
                'name' => '协作任务板',
                'description' => '基于 Laravel 的实时协作任务管理工具，支持看板视图、成员权限与消息推送。前端用 Vue 实现交互，Redis 缓存看板状态，保障高并发下的流畅体验。',
                'tags' => ['PHP', 'Laravel', 'Vue', 'MySQL', 'Redis'],
                'sort_order' => 1,
            ],
            [
                'name' => '轻量电商中台',
                'description' => '使用 SpringBoot 搭建的电商后端中台，涵盖商品、订单、库存与支付模块。通过 Redis 缓存热点商品数据，Docker 容器化部署，支撑中小商户的高并发交易。',
                'tags' => ['Java', 'SpringBoot', 'MySQL', 'Redis', 'Docker'],
                'sort_order' => 2,
            ],
        ];
        foreach ($projects as $project) {
            Project::create($project);
        }

        // 4. 经历（2 段）
        $experiences = [
            [
                'date_range' => '2025.02 — 2025.04',
                'title' => '后端开发',
                'company' => '协作任务板 · 项目开发',
                'description' => '负责基于 Laravel 的后端 API 开发，实现看板、成员权限与实时消息推送。使用 Redis 提升看板读写性能，优化数据库查询，保障多人协作流畅。',
                'sort_order' => 1,
            ],
            [
                'date_range' => '2024.01 — 2025.06',
                'title' => '后端开发',
                'company' => '轻量电商中台 · 项目开发',
                'description' => '负责电商核心模块开发，包括商品管理、订单处理与支付流程。实现商品搜索与缓存优化，使用 Docker 容器化部署，支撑高并发交易场景。',
                'sort_order' => 2,
            ],
        ];
        foreach ($experiences as $exp) {
            Experience::create($exp);
        }
    }
}
