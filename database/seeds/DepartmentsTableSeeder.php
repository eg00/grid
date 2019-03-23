<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            'Отдел маркетинга',
            'Отдел закупок',
            'Коммерческий отдел',
            'Отдел розничной сети',
            'Отдел дизайна и строительства',
            'Финансовый отдел',
            'Отдел персонала',
            'Корпоративный юридический отдел',
            'Отдел контроллинга',
            'Отдел логистики',
            'Отдел оптимизации бизнес-процессов',
            'Отдел информационных технологий',
        ];
        foreach ($departments as $department){
            \App\Department::create([
                'title' => $department
            ]);
        }
    }
}
