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
                'descripcion' => 'Desarrollo de tecnologías sostenibles y gestión ambiental para la conservación de recursos naturales.',
                'coordinador' => 'Dr. Coordinador DTA',
                'cargo_coordinador' => 'Coordinador del Departamento',
                'oficina' => 'Edificio A, Oficina 101',
                'email_contacto' => 'dta@uima.unam.mx',
                'telefono' => '5555-0101',
                'activo' => true,
                'orden' => 1,
            ],
            [
                'siglas' => 'IPAJ',
                'nombre' => 'Dpto. de Investigación en Procuración y Administración de Justicia',
                'color' => '#69B3E7',
                'logo' => 'uima_ipaj.png',
                'icono' => 'bi-bank',
                'descripcion' => 'Investigación en sistemas jurídicos, derechos humanos y administración de justicia.',
                'coordinador' => 'Dra. Coordinadora IPAJ',
                'cargo_coordinador' => 'Coordinadora del Departamento',
                'oficina' => 'Edificio B, Oficina 202',
                'email_contacto' => 'ipaj@uima.unam.mx',
                'telefono' => '5555-0202',
                'activo' => true,
                'orden' => 2,
            ],
            [
                'siglas' => 'DPE',
                'nombre' => 'Dpto. de Proyección Empresarial',
                'color' => '#DF1995',
                'logo' => 'uima_dpe.png',
                'icono' => 'bi-briefcase',
                'descripcion' => 'Desarrollo empresarial, innovación y emprendimiento en el ámbito académico y profesional.',
                'coordinador' => 'Dr. Coordinador DPE',
                'cargo_coordinador' => 'Coordinador del Departamento',
                'oficina' => 'Edificio C, Oficina 303',
                'email_contacto' => 'dpe@uima.unam.mx',
                'telefono' => '5555-0303',
                'activo' => true,
                'orden' => 3,
            ],
            [
                'siglas' => 'DIE',
                'nombre' => 'Dpto. de Investigación Educativa',
                'color' => '#FA4616',
                'logo' => 'uima_die.png',
                'icono' => 'bi-mortarboard',
                'descripcion' => 'Investigación en metodologías pedagógicas, evaluación educativa y desarrollo curricular.',
                'coordinador' => 'Dra. Coordinadora DIE',
                'cargo_coordinador' => 'Coordinadora del Departamento',
                'oficina' => 'Edificio D, Oficina 404',
                'email_contacto' => 'die@uima.unam.mx',
                'telefono' => '5555-0404',
                'activo' => true,
                'orden' => 4,
            ],
            [
                'siglas' => 'DICEC',
                'nombre' => 'Dpto. de Investigación en Comunicación y Estudios Culturales',
                'color' => '#824F9E',
                'logo' => 'uima_dicec.png',
                'icono' => 'bi-broadcast',
                'descripcion' => 'Investigación en comunicación, medios digitales y estudios culturales contemporáneos.',
                'coordinador' => 'Dr. Coordinador DICEC',
                'cargo_coordinador' => 'Coordinador del Departamento',
                'oficina' => 'Edificio E, Oficina 505',
                'email_contacto' => 'dicec@uima.unam.mx',
                'telefono' => '5555-0505',
                'activo' => true,
                'orden' => 5,
            ],
            [
                'siglas' => 'DRNA',
                'nombre' => 'Dpto. de Riesgos Naturales y Antropogénicos',
                'color' => '#D50032',
                'logo' => 'uima_drna.png',
                'icono' => 'bi-exclamation-triangle',
                'descripcion' => 'Investigación en riesgos naturales y antropogénicos.',
                'coordinador' => 'Dr. Coordinador DRNA',
                'cargo_coordinador' => 'Coordinador del Departamento',
                'oficina' => 'Edificio E, Oficina 505',
                'email_contacto' => 'drna@uima.unam.mx',
                'telefono' => '5555-0505',
                'activo' => true,
                'orden' => 6,
            ],
            [
                'siglas' => 'DEGPP',
                'nombre' => 'Dpto. de Estudios de Gobierno y Política Pública',
                'color' => '#26D07C',
                'logo' => 'uima_degpp.png',
                'icono' => 'bi-building',
                'descripcion' => 'Investigación en gobierno, política pública y gobernanza.',
                'coordinador' => 'Dr. Coordinador DEGPP',
                'cargo_coordinador' => 'Coordinador del Departamento',
                'oficina' => 'Edificio E, Oficina 505',
                'email_contacto' => 'degpp@uima.unam.mx',
                'telefono' => '5555-0505',
                'activo' => true,
                'orden' => 7,
            ],
        ];

        foreach ($departamentos as $depto) {
            Departamento::updateOrCreate(
                ['siglas' => $depto['siglas']],
                $depto
            );
        }
    }
}
