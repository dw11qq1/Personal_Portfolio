# Design — Personal_Portfolio

A locked design system for this app. Every page redesign reads this file before
emitting code. Do not regenerate per page — extend or amend this file when the
system needs to grow.

> Hallmark · genre: studio-minimal · macrostructure family: Split Studio ·
> theme: custom (冷白纸 + 深松绿) · designed-as-app

## Genre
studio-minimal（设计工作室气质：克制的彩色、几何无衬线、证据化排版）

## Macrostructure family
- 主页（marketing）：**Split Studio** — 首屏左右二分（自述文字半 + 技术栈清单半），
  项目区整屏左右交替（文字半 + 证据半：封面图或技术栈徽章格），联系区二分（深色话术半 + 链接清单半）。
- 博客列表（content）：索引条目式列表 + 细线分割（同系统 token，允许内容页用索引形态）。
- 文章页（content）：单栏长文 + prose 排版（同系统 token，typography only）。

## Theme（用户已确认的 Split Studio 预览配色）
- `--bg` #fbfbf8（冷白纸）· dark #1a1c1a
- `--panel` #efefe9 · dark #222522
- `--line` #ddddd2 · dark #33362f
- `--ink` #1a1c1a · dark #f2f3ef
- `--ink-2` #44473f · dark #c3c6bd
- `--ink-3` #7c7f75 · dark #8b8e83
- `--accent` #2f6b4f（深松绿）· dark #6fbf94
- `--accent-ink` #f4f6f2（accent 上的文字色）

## Typography
- Display: Sora, weight 700（标题、stat 值）
- Body: Noto Sans SC, weight 400/500
- Mono: JetBrains Mono（kicker、日期、标签、注释）
- Display tracking: -0.01em；hero h1 = clamp(2.2rem, 5vw, 3.6rem)

## Spacing
- 半区内边距 clamp(1.5rem, 4vw, 3.5rem)；页宽不限（全幅二分），文字列 max-width 48ch。

## Motion
- 仅 160ms ease 颜色/边框过渡；无入场动画；`prefers-reduced-motion` 全关。

## Microinteractions stance
- silent success；chip 按钮 hover 填充为 accent；链接 hover 变 accent。

## CTA voice
- Primary/唯一 CTA：描边 chip（1.5px 边框、999px 圆角、0.55rem×1.4rem 内边距），
  hover 填充 accent。每屏最多一个 chip。

## 证据半区（proof half）规则
- 有封面图 → 图片填满半区。
- 无图 → 技术栈徽章格（1px 细线网格，每格 = Sora 700 accent 词条 + mono 小注释）。
- 禁止编造数据；禁止孤零描边大数字（用户已否决）。

## What pages MUST share
- wordmark、accent 及其位置（≤5% 视口）、display/body 字体、chip CTA 语音、mono kicker 语言。

## What pages MAY differ on
- 宏观结构（主页 Split Studio / 博客索引 / 文章长文）；内容页不用二分与 chip。
