<?php

namespace App\Filament\Widgets;

use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SiteStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $latestUpdate = collect([
            Project::query()->max('updated_at'),
            Skill::query()->max('updated_at'),
            Experience::query()->max('updated_at'),
        ])->filter()->max();

        return [
            Stat::make('项目', Project::count())
                ->description('前台精选作品数量'),
            Stat::make('技能', Skill::count())
                ->description('能力清单条目'),
            Stat::make('经历', Experience::count())
                ->description('时间线节点'),
            Stat::make('最近更新', $latestUpdate ? \Carbon\Carbon::parse($latestUpdate)->diffForHumans() : '—')
                ->description('最后一次内容修改'),
        ];
    }
}
