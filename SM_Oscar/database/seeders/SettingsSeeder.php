<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // ========== HERO (Carrusel) ==========
            ['group' => 'welcome', 'key' => 'hero_slide1_titulo', 'type' => 'text', 'label' => 'Slide 1 - Título', 'value' => 'Unidad de Investigación Multidisciplinaria'],
            ['group' => 'welcome', 'key' => 'hero_slide1_imagen', 'type' => 'image', 'label' => 'Slide 1 - Imagen', 'value' => 'recursos/Banner1.png'],
            ['group' => 'welcome', 'key' => 'hero_slide2_titulo', 'type' => 'text', 'label' => 'Slide 2 - Título', 'value' => 'FES Acatlán — UNAM'],
            ['group' => 'welcome', 'key' => 'hero_slide2_imagen', 'type' => 'image', 'label' => 'Slide 2 - Imagen', 'value' => 'recursos/Banner2.png'],
            ['group' => 'welcome', 'key' => 'hero_slide3_titulo', 'type' => 'text', 'label' => 'Slide 3 - Título', 'value' => 'Docencia, investigación y cultura'],
            ['group' => 'welcome', 'key' => 'hero_slide3_imagen', 'type' => 'image', 'label' => 'Slide 3 - Imagen', 'value' => 'recursos/Banner3.png'],

            // ========== PROPÓSITO ==========
            ['group' => 'welcome', 'key' => 'proposito_etiqueta', 'type' => 'text', 'label' => 'Propósito - Etiqueta superior', 'value' => 'Institucional'],
            ['group' => 'welcome', 'key' => 'proposito_titulo', 'type' => 'text', 'label' => 'Propósito - Título', 'value' => '¿Qué es la UIMA?'],
            ['group' => 'welcome', 'key' => 'proposito_parrafo1', 'type' => 'textarea', 'label' => 'Propósito - Párrafo 1', 'value' => 'La Unidad de Investigación Multidisciplinaria Aplicada (UIMA) de la FES Acatlán es un espacio dedicado a la generación de conocimiento fronterizo que responde a las necesidades actuales de la sociedad mexicana.'],
            ['group' => 'welcome', 'key' => 'proposito_parrafo2', 'type' => 'textarea', 'label' => 'Propósito - Párrafo 2', 'value' => 'Nuestra misión es articular los esfuerzos de académicos, estudiantes e investigadores en proyectos que trasciendan las fronteras de las disciplinas tradicionales, integrando tecnología, ciencias sociales y humanidades.'],
            ['group' => 'welcome', 'key' => 'proposito_imagen', 'type' => 'image', 'label' => 'Propósito - Imagen 1', 'value' => 'recursos/Proposito1.png'],
            ['group' => 'welcome', 'key' => 'proposito_imagen2', 'type' => 'image', 'label' => 'Propósito - Imagen 2', 'value' => 'recursos/Depnoticias1.png'],
            ['group' => 'welcome', 'key' => 'proposito_imagen3', 'type' => 'image', 'label' => 'Propósito - Imagen 3', 'value' => 'recursos/Noticias1.png'],

            // ========== ESTADÍSTICAS ==========
            ['group' => 'welcome', 'key' => 'stat1_numero', 'type' => 'text', 'label' => 'Estadística 1 - Número', 'value' => '25+'],
            ['group' => 'welcome', 'key' => 'stat1_label', 'type' => 'text', 'label' => 'Estadística 1 - Etiqueta', 'value' => 'Proyectos Activos'],
            ['group' => 'welcome', 'key' => 'stat2_numero', 'type' => 'text', 'label' => 'Estadística 2 - Número', 'value' => '150'],
            ['group' => 'welcome', 'key' => 'stat2_label', 'type' => 'text', 'label' => 'Estadística 2 - Etiqueta', 'value' => 'Investigadores'],
            ['group' => 'welcome', 'key' => 'stat3_numero', 'type' => 'text', 'label' => 'Estadística 3 - Número', 'value' => '7'],
            ['group' => 'welcome', 'key' => 'stat3_label', 'type' => 'text', 'label' => 'Estadística 3 - Etiqueta', 'value' => 'Departamentos'],
            ['group' => 'welcome', 'key' => 'stat4_numero', 'type' => 'text', 'label' => 'Estadística 4 - Número', 'value' => '50+'],
            ['group' => 'welcome', 'key' => 'stat4_label', 'type' => 'text', 'label' => 'Estadística 4 - Etiqueta', 'value' => 'Publicaciones Anuales'],

            // ========== DEPARTAMENTOS ==========
            ['group' => 'welcome', 'key' => 'dept_etiqueta', 'type' => 'text', 'label' => 'Departamentos - Etiqueta', 'value' => 'Estructura Académica'],
            ['group' => 'welcome', 'key' => 'dept_titulo', 'type' => 'text', 'label' => 'Departamentos - Título', 'value' => 'Nuestros Departamentos'],
            ['group' => 'welcome', 'key' => 'dept_descripcion', 'type' => 'textarea', 'label' => 'Departamentos - Descripción', 'value' => 'Contamos con siete áreas especializadas de investigación que impulsan el desarrollo de la UNAM, vinculando de forma multidisciplinaria la ciencia, tecnología, humanidades y las problemáticas sociales.'],

            // ========== CONGRESOS ==========
            ['group' => 'welcome', 'key' => 'congresos_titulo', 'type' => 'text', 'label' => 'Congresos - Título', 'value' => 'Congresos'],
            ['group' => 'welcome', 'key' => 'congresos_subtitulo', 'type' => 'textarea', 'label' => 'Congresos - Subtítulo', 'value' => 'Encuentros académicos de la UIM; detalle e inscripción por evento.'],
            ['group' => 'welcome', 'key' => 'congresos_empty', 'type' => 'textarea', 'label' => 'Congresos - Mensaje vacío', 'value' => 'No hay congresos publicados por el momento.'],

            // ========== NOTICIAS ==========
            ['group' => 'welcome', 'key' => 'noticias_etiqueta', 'type' => 'text', 'label' => 'Noticias - Etiqueta', 'value' => 'Actualidad'],
            ['group' => 'welcome', 'key' => 'noticias_titulo', 'type' => 'text', 'label' => 'Noticias - Título', 'value' => 'Últimas Noticias y Eventos'],
            ['group' => 'welcome', 'key' => 'noticias_link', 'type' => 'text', 'label' => 'Noticias - Texto link', 'value' => 'Ver todas las noticias'],

            // Noticia 1
            ['group' => 'welcome', 'key' => 'noticia1_titulo', 'type' => 'text', 'label' => 'Noticia 1 - Título', 'value' => 'Nuevas perspectivas en la investigación 2024'],
            ['group' => 'welcome', 'key' => 'noticia1_resumen', 'type' => 'textarea', 'label' => 'Noticia 1 - Resumen', 'value' => 'Se invita a la comunidad académica a participar en el ciclo de conferencias...'],
            ['group' => 'welcome', 'key' => 'noticia1_imagen', 'type' => 'image', 'label' => 'Noticia 1 - Imagen', 'value' => 'recursos/Noticias1.png'],
            ['group' => 'welcome', 'key' => 'noticia1_categoria', 'type' => 'text', 'label' => 'Noticia 1 - Categoría', 'value' => 'Seminario'],
            ['group' => 'welcome', 'key' => 'noticia1_fecha', 'type' => 'text', 'label' => 'Noticia 1 - Fecha', 'value' => 'Oct 24'],
            ['group' => 'welcome', 'key' => 'noticia1_link', 'type' => 'text', 'label' => 'Noticia 1 - Link', 'value' => '#'],

            // Noticia 2
            ['group' => 'welcome', 'key' => 'noticia2_titulo', 'type' => 'text', 'label' => 'Noticia 2 - Título', 'value' => 'Presentación Revista FIGURAS: Invierno'],
            ['group' => 'welcome', 'key' => 'noticia2_resumen', 'type' => 'textarea', 'label' => 'Noticia 2 - Resumen', 'value' => 'Explora los artículos más recientes sobre humanidades digitales...'],
            ['group' => 'welcome', 'key' => 'noticia2_imagen', 'type' => 'image', 'label' => 'Noticia 2 - Imagen', 'value' => 'recursos/Noticias2.png'],
            ['group' => 'welcome', 'key' => 'noticia2_categoria', 'type' => 'text', 'label' => 'Noticia 2 - Categoría', 'value' => 'Publicación'],
            ['group' => 'welcome', 'key' => 'noticia2_fecha', 'type' => 'text', 'label' => 'Noticia 2 - Fecha', 'value' => 'Oct 12'],
            ['group' => 'welcome', 'key' => 'noticia2_link', 'type' => 'text', 'label' => 'Noticia 2 - Link', 'value' => '#'],

            // Noticia 3
            ['group' => 'welcome', 'key' => 'noticia3_titulo', 'type' => 'text', 'label' => 'Noticia 3 - Título', 'value' => 'Alianza con institutos internacionales'],
            ['group' => 'welcome', 'key' => 'noticia3_resumen', 'type' => 'textarea', 'label' => 'Noticia 3 - Resumen', 'value' => 'UIMA firma convenio de colaboración con universidades europeas...'],
            ['group' => 'welcome', 'key' => 'noticia3_imagen', 'type' => 'image', 'label' => 'Noticia 3 - Imagen', 'value' => 'recursos/Noticias3.png'],
            ['group' => 'welcome', 'key' => 'noticia3_categoria', 'type' => 'text', 'label' => 'Noticia 3 - Categoría', 'value' => 'Vinculación'],
            ['group' => 'welcome', 'key' => 'noticia3_fecha', 'type' => 'text', 'label' => 'Noticia 3 - Fecha', 'value' => 'Sep 28'],
            ['group' => 'welcome', 'key' => 'noticia3_link', 'type' => 'text', 'label' => 'Noticia 3 - Link', 'value' => '#'],

            // ========== EVENTOS PRÓXIMOS (Carrusel) ==========
            ['group' => 'welcome', 'key' => 'eventos_proximos_activo', 'type' => 'boolean', 'label' => 'Eventos Próximos - Mostrar sección', 'value' => '1'],
            ['group' => 'welcome', 'key' => 'eventos_proximos_titulo', 'type' => 'text', 'label' => 'Eventos Próximos - Título', 'value' => 'Eventos Próximos a Vencer'],
            ['group' => 'welcome', 'key' => 'eventos_proximos_periodo', 'type' => 'text', 'label' => 'Eventos Próximos - Período (semana/mes/trimestre)', 'value' => 'mes'],
            ['group' => 'welcome', 'key' => 'eventos_proximos_cantidad', 'type' => 'text', 'label' => 'Eventos Próximos - Cantidad máxima', 'value' => '6'],
            ['group' => 'welcome', 'key' => 'eventos_proximos_tipo', 'type' => 'text', 'label' => 'Eventos Próximos - Tipo (ambos/congresos/seminarios)', 'value' => 'ambos'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
