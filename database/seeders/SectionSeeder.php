<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'key' => Section::KEY_HOME,
                'title_ar' => 'الرئيسية',
                'description_ar' => 'نظرة عامة على أكاديمية كرامة وما تحتاج إلى معرفته للبدء.',
                'icon' => 'home',
                'sort_order' => 1,
            ],
            [
                'key' => Section::KEY_GETTING_STARTED,
                'title_ar' => 'ابدأ الآن',
                'description_ar' => 'خطواتك الأولى كموسم/موسمة في كرامة، من التسجيل إلى أول مهمة توسيم.',
                'icon' => 'rocket',
                'sort_order' => 2,
            ],
            [
                'key' => Section::KEY_FAQ,
                'title_ar' => 'الأسئلة الشائعة',
                'description_ar' => 'إجابات سريعة على الأسئلة الأكثر تكرارًا من فريق التوسيم.',
                'icon' => 'question',
                'sort_order' => 3,
            ],
            [
                'key' => Section::KEY_ESSENTIALS,
                'title_ar' => 'الأساسيات',
                'description_ar' => 'من نحن، وما الذي يميز كرامة، وفلسفتنا في الجودة قبل الكمية.',
                'icon' => 'book',
                'sort_order' => 4,
            ],
            [
                'key' => Section::KEY_QUALITY,
                'title_ar' => 'الجودة والأداء',
                'description_ar' => 'كيف نقيس الدقة، ودرجات Kappa، والاتفاق بين الموسِمين (IAA).',
                'icon' => 'shield',
                'sort_order' => 5,
            ],
            [
                'key' => Section::KEY_LEARN_TASKS,
                'title_ar' => 'تعلم المهام',
                'description_ar' => 'مسارات تعلم تفصيلية لكل نوع من مهام التوسيم التي نقدمها.',
                'icon' => 'academic-cap',
                'sort_order' => 6,
            ],
            [
                'key' => Section::KEY_PROJECT_GUIDES,
                'title_ar' => 'أدلة المشاريع',
                'description_ar' => 'دليل تفصيلي لكل مشروع: النظرة العامة، معايير المراجعة، ومعايير التقييم.',
                'icon' => 'clipboard',
                'sort_order' => 7,
            ],
            [
                'key' => Section::KEY_RESOURCES,
                'title_ar' => 'الموارد',
                'description_ar' => 'روابط ومواد مساعدة تدعمك أثناء العمل على المهام.',
                'icon' => 'folder',
                'sort_order' => 8,
            ],
            [
                'key' => Section::KEY_UPDATES,
                'title_ar' => 'التحديثات',
                'description_ar' => 'آخر التغييرات على الأدلة، وإرشادات الجودة، والمهام الجديدة.',
                'icon' => 'megaphone',
                'sort_order' => 9,
            ],
        ];

        foreach ($sections as $section) {
            Section::updateOrCreate(['key' => $section['key']], $section);
        }
    }
}
