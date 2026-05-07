<?php

namespace Database\Seeders;

use App\Models\Congreso;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CongresoSeeder extends Seeder
{
    public function run(): void
    {
        $congresos = [
            // Congreso próximo a vencer (esta semana) - URGENTE
            [
                'titulo' => 'XII Congreso Internacional de Innovación Educativa',
                'slug' => 'congreso-innovacion-educativa-2026',
                'resumen' => 'Espacio de encuentro para docentes e investigadores interesados en las nuevas metodologías de enseñanza-aprendizaje.',
                'descripcion' => 'El XII Congreso Internacional de Innovación Educativa reúne a expertos de México y Latinoamérica para compartir experiencias sobre transformación digital en la educación superior, pedagogías activas y evaluación por competencias.',
                'fecha_inicio' => now()->addDays(2),
                'fecha_fin' => now()->addDays(5), // Vence en 5 días
                'sede' => 'Auditorio Principal, FES Acatlán',
                'activo' => true,
                'cupo' => 200,
                'enlace_inscripcion' => '#inscripcion',
                'enlace_programa' => '#programa',
            ],
            // Congreso próximo a vencer (próxima semana)
            [
                'titulo' => 'V Congreso de Derechos Humanos y Justicia Social',
                'slug' => 'congreso-derechos-humanos-2026',
                'resumen' => 'Análisis de la situación actual de los derechos humanos en México y propuestas de mejora desde la academia.',
                'descripcion' => 'El V Congreso de Derechos Humanos aborda temas como justicia penal, derechos de grupos vulnerables, migración y refugio, así como los desafíos de la justicia ambiental en el contexto mexicano actual.',
                'fecha_inicio' => now()->addDays(8),
                'fecha_fin' => now()->addDays(12), // Vence en 12 días
                'sede' => 'Sala de Juntas, Edificio B',
                'activo' => true,
                'cupo' => 150,
                'enlace_inscripcion' => '#inscripcion',
                'enlace_programa' => '#programa',
            ],
            // Congreso próximo a vencer (este mes)
            [
                'titulo' => 'III Simposio de Investigación Multidisciplinaria',
                'slug' => 'simposio-investigacion-multidisciplinaria-2026',
                'resumen' => 'Presentación de avances de investigación de los 7 departamentos de la UIMA.',
                'descripcion' => 'El III Simposio reúne investigadores de todas las áreas de conocimiento de la UIMA para presentar avances de proyectos, establecer colaboraciones interdisciplinarias y fortalecer la vinculación con sectores externos.',
                'fecha_inicio' => now()->addDays(15),
                'fecha_fin' => now()->addDays(18), // Vence en 18 días
                'sede' => 'Aula Magna, Edificio A',
                'activo' => true,
                'cupo' => 300,
                'enlace_inscripcion' => '#inscripcion',
                'enlace_programa' => '#programa',
            ],
            // Congreso próximo a vencer (dentro de 3 semanas)
            [
                'titulo' => 'IV Encuentro de Humanidades Digitales',
                'slug' => 'encuentro-humanidades-digitales-2026',
                'resumen' => 'Exploración de herramientas digitales aplicadas a la investigación en humanidades y ciencias sociales.',
                'descripcion' => 'El IV Encuentro de Humanidades Digitales ofrece talleres prácticos sobre análisis de textos con Python, visualización de datos históricos, creación de exhibiciones virtuales y gestión de archivos digitales.',
                'fecha_inicio' => now()->addDays(20),
                'fecha_fin' => now()->addDays(23), // Vence en 23 días
                'sede' => 'Laboratorio de Cómputo, Edificio C',
                'activo' => true,
                'cupo' => 80,
                'enlace_inscripcion' => '#inscripcion',
                'enlace_programa' => '#programa',
            ],
            // Congreso activo pero lejano (no debe aparecer en próximos a vencer de 30 días)
            [
                'titulo' => 'Congreso Internacional de Sustentabilidad 2026',
                'slug' => 'congreso-sustentabilidad-2026',
                'resumen' => 'Perspectivas globales sobre desarrollo sustentable y cambio climático.',
                'descripcion' => 'Congreso internacional que reúne a expertos en medio ambiente, políticas públicas y desarrollo económico para discutir estrategias de mitigación y adaptación al cambio climático.',
                'fecha_inicio' => now()->addMonths(2),
                'fecha_fin' => now()->addMonths(2)->addDays(3), // Vence en +60 días
                'sede' => 'Centro de Convenciones, CDMX',
                'activo' => true,
                'cupo' => 500,
                'enlace_inscripcion' => '#inscripcion',
                'enlace_programa' => '#programa',
            ],
            // Congreso inactivo (no debe aparecer)
            [
                'titulo' => 'Congreso Pasado de Tecnología 2025',
                'slug' => 'congreso-tecnologia-2025',
                'resumen' => 'Edición anterior del congreso de tecnología.',
                'descripcion' => 'Este congreso ya fue realizado y está inactivo en el sistema.',
                'fecha_inicio' => now()->subMonths(2),
                'fecha_fin' => now()->subMonths(2)->addDays(2),
                'sede' => 'Auditorio Principal',
                'activo' => false,
                'cupo' => 100,
            ],
        ];

        foreach ($congresos as $congreso) {
            Congreso::updateOrCreate(
                ['slug' => $congreso['slug']],
                $congreso
            );
        }
    }
}
