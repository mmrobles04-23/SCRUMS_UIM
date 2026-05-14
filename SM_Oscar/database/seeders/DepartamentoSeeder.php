<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    public function run(): void
    {
        $departamentos = [
            [
                'siglas' => 'DTA',
                'nombre' => 'Dpto. de Tecnología Ambiental',
                'color' => '#78D64B',
                'logo' => 'uima_dta.png',
                'icono' => 'bi-tree',
                'descripcion' => 'Desarrollo de tecnologías sostenibles y gestión ambiental.',
                'objetivo' => 'Desarrollar soluciones tecnológicas innovadoras para mitigar el impacto ambiental y promover la sostenibilidad en procesos industriales y urbanos.',
                'coordinador' => 'Dr. Coordinador DTA',
                'imagen_coordinador' => 'recursos/perfildepartamento.png',
                'imagen_banner' => 'recursos/perfildepartamento.png',
                'cargo_coordinador' => 'Coordinador del Departamento',
                'oficina' => 'Edificio A, Oficina 101',
                'email_contacto' => 'dta@uima.unam.mx',
                'telefono' => '5555-0101',
                'activo' => true,
                'orden' => 1,
                'funciones' => [
                    'Evaluar la calidad del aire y agua en zonas urbanas.',
                    'Diseñar sistemas de tratamiento de residuos sólidos.',
                    'Investigar fuentes de energía renovable aplicables a nivel local.'
                ]
            ],
            [
                'siglas' => 'IPAJ',
                'nombre' => 'Dpto. de Investigación en Procuración y Administración de Justicia',
                'color' => '#69B3E7',
                'logo' => 'uima_ipaj.png',
                'icono' => 'bi-bank',
                'descripcion' => 'Investigación en sistemas jurídicos y derechos humanos.',
                'objetivo' => 'Fortalecer el estado de derecho mediante la investigación aplicada en sistemas de justicia, derechos humanos y seguridad pública.',
                'coordinador' => 'Dra. Coordinadora IPAJ',
                'imagen_coordinador' => 'recursos/perfildepartamento.png',
                'imagen_banner' => 'recursos/perfildepartamento.png',
                'cargo_coordinador' => 'Coordinadora del Departamento',
                'oficina' => 'Edificio B, Oficina 202',
                'email_contacto' => 'ipaj@uima.unam.mx',
                'telefono' => '5555-0202',
                'activo' => true,
                'orden' => 2,
                'funciones' => [
                    'Analizar la eficiencia del sistema penal acusatorio.',
                    'Desarrollar programas de capacitación en derechos humanos.',
                    'Investigar políticas de reinserción social.'
                ]
            ],
            [
                'siglas' => 'DPE',
                'nombre' => 'Dpto. de Proyección Empresarial',
                'color' => '#DF1995',
                'logo' => 'uima_dpe.png',
                'icono' => 'bi-briefcase',
                'descripcion' => 'Desarrollo empresarial, innovación y emprendimiento.',
                'objetivo' => 'Vincular la investigación académica con el sector productivo para impulsar la competitividad y la innovación empresarial.',
                'coordinador' => 'Dr. Coordinador DPE',
                'imagen_coordinador' => 'recursos/perfildepartamento.png',
                'imagen_banner' => 'recursos/perfildepartamento.png',
                'cargo_coordinador' => 'Coordinador del Departamento',
                'oficina' => 'Edificio C, Oficina 303',
                'email_contacto' => 'dpe@uima.unam.mx',
                'telefono' => '5555-0303',
                'activo' => true,
                'orden' => 3,
                'funciones' => [
                    'Realizar estudios de mercado para sectores estratégicos.',
                    'Diseñar modelos de negocio sostenibles.',
                    'Brindar asesoría en propiedad intelectual.'
                ]
            ],
            [
                'siglas' => 'DIE',
                'nombre' => 'Dpto. de Investigación Educativa',
                'color' => '#FA4616',
                'logo' => 'uima_die.png',
                'icono' => 'bi-mortarboard',
                'descripcion' => 'Investigación en metodologías pedagógicas y evaluación educativa.',
                'objetivo' => 'Transformar los procesos de enseñanza-aprendizaje mediante la investigación en pedagogía y tecnologías educativas.',
                'coordinador' => 'Dra. Coordinadora DIE',
                'imagen_coordinador' => 'recursos/perfildepartamento.png',
                'imagen_banner' => 'recursos/perfildepartamento.png',
                'cargo_coordinador' => 'Coordinadora del Departamento',
                'oficina' => 'Edificio D, Oficina 404',
                'email_contacto' => 'die@uima.unam.mx',
                'telefono' => '5555-0404',
                'activo' => true,
                'orden' => 4,
                'funciones' => [
                    'Evaluar el impacto de las TIC en el aula.',
                    'Diseñar planes de estudio con enfoque multidisciplinario.',
                    'Investigar la deserción escolar y sus causas.'
                ]
            ],
            [
                'siglas' => 'DICEC',
                'nombre' => 'Dpto. de Investigación en Comunicación y Estudios Culturales',
                'color' => '#824F9E',
                'logo' => 'uima_dicec.png',
                'icono' => 'bi-broadcast',
                'descripcion' => 'Investigación en comunicación y medios digitales.',
                'objetivo' => 'Analizar los fenómenos de comunicación y cultura en la era digital para comprender su impacto en la sociedad contemporánea.',
                'coordinador' => 'Dr. Coordinador DICEC',
                'imagen_coordinador' => 'recursos/perfildepartamento.png',
                'imagen_banner' => 'recursos/perfildepartamento.png',
                'cargo_coordinador' => 'Coordinador del Departamento',
                'oficina' => 'Edificio E, Oficina 505',
                'email_contacto' => 'dicec@uima.unam.mx',
                'telefono' => '5555-0505',
                'activo' => true,
                'orden' => 5,
                'funciones' => [
                    'Estudiar las narrativas transmedia en medios digitales.',
                    'Analizar el impacto de las redes sociales en la opinión pública.',
                    'Investigar la preservación del patrimonio cultural digital.'
                ]
            ],
            [
                'siglas' => 'DRNA',
                'nombre' => 'Dpto. de Riesgos Naturales y Antropogénicos',
                'color' => '#D50032',
                'logo' => 'uima_drna.png',
                'icono' => 'bi-exclamation-triangle',
                'descripcion' => 'Investigación en riesgos naturales y agentes perturbadores.',
                'objetivo' => 'Caracterizar las acciones generadas por los distintos agentes perturbadores mediante el análisis riguroso de modelos estocásticos y deterministas.',
                'coordinador' => 'Dr. Coordinador DRNA',
                'imagen_coordinador' => 'recursos/perfildepartamento.png',
                'imagen_banner' => 'recursos/perfildepartamento.png',
                'cargo_coordinador' => 'Coordinador del Departamento',
                'oficina' => 'Edificio E, Oficina 505',
                'email_contacto' => 'drna@uima.unam.mx',
                'telefono' => '5555-0505',
                'activo' => true,
                'orden' => 6,
                'funciones' => [
                    'Evaluar riesgos geológicos e hidrometeorológicos.',
                    'Desarrollo de metodologías de cuantificación.',
                    'Monitoreo sísmico y alertamiento temprano.'
                ]
            ],
            [
                'siglas' => 'DEGPP',
                'nombre' => 'Dpto. de Estudios de Gobierno y Política Pública',
                'color' => '#26D07C',
                'logo' => 'uima_degpp.png',
                'icono' => 'bi-building',
                'descripcion' => 'Investigación en gobierno y política pública.',
                'objetivo' => 'Generar conocimiento científico sobre la gestión pública y la gobernanza para fortalecer las instituciones democráticas.',
                'coordinador' => 'Dr. Coordinador DEGPP',
                'imagen_coordinador' => 'recursos/perfildepartamento.png',
                'imagen_banner' => 'recursos/perfildepartamento.png',
                'cargo_coordinador' => 'Coordinador del Departamento',
                'oficina' => 'Edificio E, Oficina 505',
                'email_contacto' => 'degpp@uima.unam.mx',
                'telefono' => '5555-0505',
                'activo' => true,
                'orden' => 7,
                'funciones' => [
                    'Evaluar el impacto de políticas públicas estatales.',
                    'Diseñar modelos de participación ciudadana.',
                    'Analizar la transparencia y rendición de cuentas.'
                ]
            ],
        ];

        foreach ($departamentos as $deptoData) {
            $funciones = $deptoData['funciones'] ?? [];
            unset($deptoData['funciones']);

            $departamento = Departamento::updateOrCreate(
                ['siglas' => $deptoData['siglas']],
                $deptoData
            );

            // Sincronizar funciones
            $departamento->funciones()->delete();
            foreach ($funciones as $desc) {
                $departamento->funciones()->create(['descripcion' => $desc]);
            }
        }
    }
}
