<?php

namespace Database\Seeders;

use App\Models\Seminario;
use App\Models\Departamento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SeminarioSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener departamentos por siglas
        $deptos = Departamento::all()->keyBy('siglas');
        
        $seminarios = [
            // === SEMINARIOS PRÓXIMOS A VENCER (para probar el carrusel) ===
            
            // Vence en 3 días - URGENTE 🔴
            [
                'titulo' => 'Taller Intensivo: Derechos Humanos en la Era Digital',
                'slug' => 'taller-derechos-humanos-digital',
                'descripcion' => 'Análisis de los desafíos actuales de los derechos humanos en el contexto de la transformación digital y la inteligencia artificial.',
                'ponente' => 'Dr. Christian Miguel Acosta García',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addDay(),
                'fecha_fin' => now()->addDays(3),
                'lugar' => 'Aula Magna, Edificio A',
                'estado' => 'publicado',
                'imagen_banner' => 'recursos/Seminariosdefault.png',
                'departamento_id' => $deptos['IPAJ']->id ?? null,
            ],
            // Vence en 5 días - URGENTE 🔴
            [
                'titulo' => 'Workshop de Metodología Cualitativa Avanzada',
                'slug' => 'workshop-metodologia-cualitativa',
                'descripcion' => 'Técnicas avanzadas de análisis cualitativo: entrevistas profundas, grupos focales y análisis de discurso.',
                'ponente' => 'Dr. Edwin Atilano Robles',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addDays(2),
                'fecha_fin' => now()->addDays(5),
                'lugar' => 'Sala de Seminarios, Edificio C',
                'estado' => 'publicado',
                'imagen_banner' => 'recursos/Seminariosdefault.png',
                'departamento_id' => $deptos['DIE']->id ?? null,
            ],
            // Vence en 7 días (1 semana) - URGENTE 🔴
            [
                'titulo' => 'Diagnóstico Ambiental del Valle de México',
                'slug' => 'diagnostico-ambiental-valle',
                'descripcion' => 'Evaluación multidisciplinaria de la calidad del aire, agua y suelo en la zona metropolitana.',
                'ponente' => 'Dr. José María Chávez Aguirre',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addDays(3),
                'fecha_fin' => now()->addWeek(),
                'lugar' => 'Laboratorio Ambiental',
                'estado' => 'publicado',
                'imagen_banner' => 'recursos/Seminariosdefault.png',
                'departamento_id' => $deptos['DTA']->id ?? null,
            ],
            // Vence en 10 días - PRÓXIMO 🟡
            [
                'titulo' => 'Seminario de Periodismo de Investigación',
                'slug' => 'seminario-periodismo-investigacion',
                'descripcion' => 'Técnicas de investigación periodística y herramientas digitales para la verificación de datos.',
                'ponente' => 'Lic. Luis Felipe Estrada Carreón',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addDays(5),
                'fecha_fin' => now()->addDays(10),
                'lugar' => 'Sala de Medios, Edificio E',
                'estado' => 'publicado',
                'imagen_banner' => 'recursos/Seminariosdefault.png',
                'departamento_id' => $deptos['DICEC']->id ?? null,
            ],
            // Vence en 15 días - PRÓXIMO 🟡
            [
                'titulo' => 'Pedagogías Críticas en América Latina',
                'slug' => 'pedagogias-criticas-latam',
                'descripcion' => 'Revisión de las principales corrientes pedagógicas críticas y su aplicación en contextos actuales.',
                'ponente' => 'Dra. Lorena Beatriz Garcés Zepeda',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addDays(8),
                'fecha_fin' => now()->addDays(15),
                'lugar' => 'Aula 203, Edificio D',
                'estado' => 'publicado',
                'imagen_banner' => 'recursos/Seminariosdefault.png',
                'departamento_id' => $deptos['DIE']->id ?? null,
            ],
            // Vence en 20 días - PRÓXIMO 🟡
            [
                'titulo' => 'Curso de Género y Políticas Públicas',
                'slug' => 'curso-genero-politicas-publicas',
                'descripcion' => 'Análisis de género en el diseño e implementación de políticas públicas en México.',
                'ponente' => 'Dra. Sofía Crespo Reyes',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addDays(12),
                'fecha_fin' => now()->addDays(20),
                'lugar' => 'Aula 105, Edificio D',
                'estado' => 'publicado',
                'imagen_banner' => 'recursos/Seminariosdefault.png',
                'departamento_id' => $deptos['DIE']->id ?? null,
            ],
            // Vence en 25 días - MODERADO 🟢
            [
                'titulo' => 'Gobernanza y Sostenibilidad Urbana',
                'slug' => 'gobernanza-sostenibilidad-urbana',
                'descripcion' => 'Modelos de gobernanza para ciudades sostenibles y resilientes al cambio climático.',
                'ponente' => 'Dra. Adelina Quintero Sánchez',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addDays(15),
                'fecha_fin' => now()->addDays(25),
                'lugar' => 'Sala de Juntas, Edificio C',
                'estado' => 'publicado',
                'imagen_banner' => 'recursos/Seminariosdefault.png',
                'departamento_id' => $deptos['DPE']->id ?? null,
            ],
            // Vence en 30 días - MODERADO 🟢
            [
                'titulo' => 'Seminario de Filosofía de la Educación',
                'slug' => 'seminario-filosofia-educacion',
                'descripcion' => 'Fundamentos filosóficos de la educación contemporánea y sus implicaciones prácticas.',
                'ponente' => 'Dra. Rosa Martha Gutiérrez Rodríguez',
                'institucion_ponente' => 'Universidad Internacional',
                'fecha_inicio' => now()->addDays(20),
                'fecha_fin' => now()->addDays(30),
                'lugar' => 'Auditorio Principal',
                'estado' => 'publicado',
                'imagen_banner' => 'recursos/Seminariosdefault.png',
                'departamento_id' => $deptos['DEGPP']->id ?? null,
            ],
            // Vence en 45 días - FUERA DE RANGO (no aparecerá con período mes)
            [
                'titulo' => 'Gestión Integral del Riesgo de Desastres',
                'slug' => 'gestion-integral-riesgo-desastres',
                'descripcion' => 'Estrategias de prevención, mitigación y respuesta ante riesgos y desastres naturales.',
                'ponente' => 'Dra. Coordinadora DRNA',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addDays(35),
                'fecha_fin' => now()->addDays(45),
                'lugar' => 'Sala de Crisis, Edificio F',
                'estado' => 'publicado',
                'imagen_banner' => 'recursos/Seminariosdefault.png',
                'departamento_id' => $deptos['DRNA']->id ?? null,
            ],
            // Seminario ya iniciado, vence en 12 días - URGENTE 🔴
            [
                'titulo' => 'Derechos Humanos: Cierre de Inscripciones',
                'slug' => 'derechos-humanos-cierre-inscripciones',
                'descripcion' => 'Últimos lugares disponibles para el seminario permanente de derechos humanos.',
                'ponente' => 'Dr. Christian Miguel Acosta García',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->subDays(2),
                'fecha_fin' => now()->addDays(12),
                'lugar' => 'Sala de Juntas, Edificio B',
                'estado' => 'publicado',
                'imagen_banner' => 'recursos/Seminariosdefault.png',
                'departamento_id' => $deptos['IPAJ']->id ?? null,
            ],
            // Seminario inactivo (no debe aparecer)
            [
                'titulo' => 'Seminario Pasado de Prueba 2025',
                'slug' => 'seminario-pasado-2025',
                'descripcion' => 'Este seminario ya fue realizado y está inactivo.',
                'ponente' => 'Dr. Test',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->subMonths(2),
                'fecha_fin' => now()->subDays(10),
                'lugar' => 'Sala de Pruebas',
                'estado' => 'borrador',
                'departamento_id' => $deptos['DIE']->id ?? null,
            ],
        ];

        foreach ($seminarios as $seminario) {
            if ($seminario['departamento_id']) {
                Seminario::updateOrCreate(
                    ['slug' => $seminario['slug']],
                    $seminario
                );
            }
        }
    }
}
