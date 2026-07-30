<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();                                          // 主键 id，自增
            $table->string('name');                                // 姓名（示例占位）
            $table->string('title');                               // 职位：「UI/UX 设计师 & 创意开发者」
            $table->string('subtitle');                            // 副标题
            $table->integer('years_experience')->default(0);       // 年经验：5
            $table->integer('projects_count')->default(0);         // 完成项目：80
            $table->integer('clients_count')->default(0);          // 合作客户：30
            $table->integer('awards_count')->default(0);           // 设计奖项：15
            $table->timestamps();                                  // created_at + updated_at，自动维护
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
