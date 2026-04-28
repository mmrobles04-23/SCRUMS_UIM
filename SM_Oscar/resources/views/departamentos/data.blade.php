{{--
    Componente: Datos de Departamentos
    Descripción: Array de departamentos y lógica para determinar el activo
--}}

@php
  $departamentos = [
    'DTA' => ['nombre' => 'Dpto. de Tecnología Ambiental', 'color' => '#78D64B', 'logo' => 'uima_dta.png', 'icono' => 'bi-tree', 'siglas' => 'DTA'],
    'IPAJ' => ['nombre' => 'Dpto. de Investigación en Procuración y Administración de Justicia', 'color' => '#69B3E7', 'logo' => 'uima_ipaj.png', 'icono' => 'bi-bank', 'siglas' => 'IPAJ'],
    'DPE' => ['nombre' => 'Dpto. de Proyección Empresarial', 'color' => '#DF1995', 'logo' => 'uima_dpe.png', 'icono' => 'bi-briefcase', 'siglas' => 'DPE'],
    'DIE' => ['nombre' => 'Dpto. de Investigación Educativa', 'color' => '#FA4616', 'logo' => 'uima_die.png', 'icono' => 'bi-mortarboard', 'siglas' => 'DIE'],
    'DICEC' => ['nombre' => 'Dpto. de Investigación en Comunicación y Estudios Culturales', 'color' => '#824F9E', 'logo' => 'uima_dicec.png', 'icono' => 'bi-broadcast', 'siglas' => 'DICEC'],
    'DRNA' => ['nombre' => 'Dpto. de Riesgos Naturales y Antropogénicos', 'color' => '#D50032', 'logo' => 'uima_drna.png', 'icono' => 'bi-exclamation-triangle', 'siglas' => 'DRNA'],
    'DEGPP' => ['nombre' => 'Dpto. de Estudios de Gobierno y Política Pública', 'color' => '#26D07C', 'logo' => 'uima_degpp.png', 'icono' => 'bi-building', 'siglas' => 'DEGPP'],
  ];

  $siglaSolicitada = request()->query('id', 'DRNA');
  $deptoActivo = $departamentos[$siglaSolicitada] ?? $departamentos['DRNA'];
@endphp
