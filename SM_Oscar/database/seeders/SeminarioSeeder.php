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
            // Anuales - IPAJ (Derechos Humanos)
            [
                'titulo' => 'La Justiciabilidad de los Derechos Económicos, Sociales y Culturales',
                'slug' => 'justiciabilidad-desca',
                'descripcion' => 'Justiciabilidad de los DESCA: fundamentar los derechos económicos, sociales y culturales, así como ambientales bajo un enfoque universal, interamericano y nacional que considere los criterios de progresividad y justiciabilidad a fin de advertir sobre relevancia e implicaciones prácticas.',
                'ponente' => 'Dr. Christian Miguel Acosta García',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addMonths(1),
                'fecha_fin' => now()->addMonths(4),
                'lugar' => 'Aula Magna, Edificio A',
                'estado' => 'publicado',
                'departamento_id' => $deptos['IPAJ']->id ?? null,
            ],
            // Anuales - DIE (Metodología)
            [
                'titulo' => 'Tendencias actuales en métodos para la investigación social',
                'slug' => 'tendencias-metodos-investigacion',
                'descripcion' => 'Mejorar y actualizar la enseñanza de métodos de investigación para las ciencias sociales a través del fortalecimiento de los conocimientos en esta materia tanto de profesores como de estudiantes.',
                'ponente' => 'Dr. Edwin Atilano Robles',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addMonths(2),
                'fecha_fin' => now()->addMonths(5),
                'lugar' => 'Sala de Seminarios, Edificio C',
                'estado' => 'publicado',
                'departamento_id' => $deptos['DIE']->id ?? null,
            ],
            // Anuales - DTA (Medio Ambiente)
            [
                'titulo' => 'Seminario multidisciplinario: Rehabilitación de la Cuenca del Río Pánuco',
                'slug' => 'rehabilitacion-cuenca-panuco',
                'descripcion' => 'Elaborar interdisciplinariamente una propuesta de Rehabilitación de la Cuenca del Río Pánuco, en la que se realicen estudios científicos con el fin de mejorar las condiciones de calidad y suministro de agua.',
                'ponente' => 'Dr. José María Chávez Aguirre',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addMonths(1),
                'fecha_fin' => now()->addMonths(6),
                'lugar' => 'Laboratorio Ambiental',
                'estado' => 'publicado',
                'departamento_id' => $deptos['DTA']->id ?? null,
            ],
            // Anuales - DICEC (Comunicación)
            [
                'titulo' => 'Seminario Multidisciplinario de Estudios sobre la Prensa',
                'slug' => 'estudios-prensa',
                'descripcion' => 'Construir un espacio de estudio multidisciplinario para el fomento, desarrollo y difusión de las investigaciones sobre distintos aspectos de la prensa periódica en México.',
                'ponente' => 'Lic. Luis Felipe Estrada Carreón',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addMonths(3),
                'fecha_fin' => now()->addMonths(7),
                'lugar' => 'Sala de Medios, Edificio E',
                'estado' => 'publicado',
                'departamento_id' => $deptos['DICEC']->id ?? null,
            ],
            // Anuales - DIE (Pedagogía)
            [
                'titulo' => 'Recuperación y resignificación de las pedagogías liberadoras latinoamericanas',
                'slug' => 'pedagogias-liberadoras',
                'descripcion' => 'Recuperar, mediante la técnica de investigación documental y la creación de un seminario, las pedagogías mexicanas y latinoamericanas que han significado una práctica contra hegemónica.',
                'ponente' => 'Dra. Lorena Beatriz Garcés Zepeda',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addWeeks(2),
                'fecha_fin' => now()->addMonths(5),
                'lugar' => 'Aula 203, Edificio D',
                'estado' => 'publicado',
                'departamento_id' => $deptos['DIE']->id ?? null,
            ],
            // Permanentes - IPAJ (Derechos Humanos)
            [
                'titulo' => 'Seminario permanente de Derechos Humanos',
                'slug' => 'permanente-derechos-humanos',
                'descripcion' => 'Valorar los Derechos Humanos bajo un enfoque integral que considere los parámetros universales, interamericanos y nacionales para promover la formación y actualización permanente.',
                'ponente' => 'Dr. Christian Miguel Acosta García',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addYear(),
                'lugar' => 'Sala de Juntas, Edificio B',
                'estado' => 'publicado',
                'departamento_id' => $deptos['IPAJ']->id ?? null,
            ],
            // Permanentes - DICEC (Cultura)
            [
                'titulo' => 'Seminario permanente de Estudios de la Fiesta en México',
                'slug' => 'permanente-fiesta-mexico',
                'descripcion' => 'Convocar y organizar a los investigadores de la fiesta en México, independientemente de la formación profesional y de los intereses académicos.',
                'ponente' => 'Mtro. Hugo Cardoso Vargas',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addYear(),
                'lugar' => 'Sala Cultural, Edificio E',
                'estado' => 'publicado',
                'departamento_id' => $deptos['DICEC']->id ?? null,
            ],
            // Permanentes - DIE (Género)
            [
                'titulo' => 'Seminario permanente de Teoría e historiografía de los estudios de género',
                'slug' => 'permanente-estudios-genero',
                'descripcion' => 'Valorar los cambios y continuidades producidos en la evolución de la escritura de la historia de las mujeres y de género, durante los últimos treinta años.',
                'ponente' => 'Dra. Sofía Crespo Reyes',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addYear(),
                'lugar' => 'Aula 105, Edificio D',
                'estado' => 'publicado',
                'departamento_id' => $deptos['DIE']->id ?? null,
            ],
            // Permanentes - DPE (Gobernanza)
            [
                'titulo' => 'Seminario permanente Gobernanza del desarrollo sostenible',
                'slug' => 'permanente-gobernanza-sostenible',
                'descripcion' => 'Analizar la incidencia de las alianzas multistakeholder en la transformación positiva y el alcance de los ODS.',
                'ponente' => 'Dra. Adelina Quintero Sánchez',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now(),
                'fecha_fin' => now()->addYear(),
                'lugar' => 'Sala de Juntas, Edificio C',
                'estado' => 'publicado',
                'departamento_id' => $deptos['DPE']->id ?? null,
            ],
            // Especiales - DEGPP (Filosofía)
            [
                'titulo' => 'Seminario Internacional: Retos y Perspectivas de la Educación y la Pedagogía',
                'slug' => 'internacional-educacion-pedagogia',
                'descripcion' => 'Promover, estimular y fomentar la reflexión, discusión y desarrollo de las ciencias educativa y pedagógica en beneficio de la sociedad.',
                'ponente' => 'Dra. Rosa Martha Gutiérrez Rodríguez',
                'institucion_ponente' => 'Universidad Internacional',
                'fecha_inicio' => now()->addMonths(6),
                'fecha_fin' => now()->addMonths(7),
                'lugar' => 'Auditorio Principal',
                'estado' => 'publicado',
                'departamento_id' => $deptos['DEGPP']->id ?? null,
            ],
            // Especiales - DRNA (Riesgos)
            [
                'titulo' => 'Seminario de Gestión de Riesgos y Desastres Naturales',
                'slug' => 'gestion-riesgos-desastres',
                'descripcion' => 'Análisis de estrategias para la prevención, mitigación y respuesta ante desastres naturales y antropogénicos.',
                'ponente' => 'Dra. Coordinadora DRNA',
                'institucion_ponente' => 'FES Acatlán - UNAM',
                'fecha_inicio' => now()->addMonths(2),
                'fecha_fin' => now()->addMonths(3),
                'lugar' => 'Sala de Crisis, Edificio F',
                'estado' => 'publicado',
                'departamento_id' => $deptos['DRNA']->id ?? null,
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
