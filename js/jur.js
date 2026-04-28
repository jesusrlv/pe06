function criterios(criterio){
    $('#criteriosCalificacion').modal('show'); 

    var categoria = document.getElementById('catCompleto').value;

    if (categoria == 1){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Logro Académico<br>Subcategoría 12 a 18 años: </strong> Trayectoria académica ejemplar, distinciones recibidas, concursos académicos, así como otros estudios curricularpes.'; 
    }
    else if (categoria ==2){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Logro Académico<br>Subcategoría 19 a 29 años: </strong> Trayectoria académica ejemplar. a) Elaboración de investigaciones o estudios científicos, publicación de libros o artículos académicos, conferencias impartidas, ponente en intercambios académicos y distinciones recibidas; concursos académicos, así como otros estudios curriculares. b) Labores docentes en los diversos niveles educativos a favor de la comunidad y que trasciendan las responsabilidades cotidianas, como expresión de un compromiso personal para crear un proyecto de vida que redunde en beneficio de la sociedad.'; 
    }
    else if (categoria ==3){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Discapacidad e Integración: </strong> Mujeres y hombres jóvenes con discapacidad, quienes por su actitud (resiliencia), perseverancia y actividades individuales o de manera organizada, sean ejemplo de superación y contribuyan a generar oportunidades en el desarrollo y la integración de otras personas jóvenes con o sin discapacidad en los diversos rubros de nuestra cotidianidad (aportaciones a la comunidad, recreación, trabajo y educación).'; 
    }
    else if (categoria ==4){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Ingenio emprendedor: </strong> Liderazgo emprendedor en distintas ramas económicas que debe traducirse en habilidad para crear y desarrollar unidades de producción viables, redituables y sustentables. Implementación de iniciativas de negocios, transferencia de tecnología e innovación; fortalecimiento de la planta productiva con impacto en el aspecto económico y social de la comunidad. Desarrollo, difusión y promoción de una cultura emprendedora; inversión en el desarrollo de capital humano de las organizaciones productivas, destacando: gestión directiva; habilidades gerenciales; capacitación y adiestramiento de personal dirigido a la productividad y crecimiento.'; 
    }
    else if (categoria ==5){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Responsabilidad Social: </strong> Desarrollo de programas, proyectos o actividades, cuyo propósito sea expresión de solidaridad con comunidades y grupos sociales vulnerables del Estado, y que al ejecutarse generen opciones de solución a problemáticas específicas, mejorando en su caso, la calidad y nivel de vida de sus habitantes. De igual forma, se reconocerán los proyectos para el desarrollo de capacidades y habilidades en las comunidades; la implementación de los proyectos productivos; la colaboración en situaciones de desastre o emergencias; proyectos para mejorar la salud física y psicológica, la alimentación, la vivienda e infraestructura en las comunidades, así como proyectos para fomentar y fortalecer los valores ciudadanos.'; 
    }
    else if (categoria ==6){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Mérito Migrante: </strong> Promoción del conocimiento, el ejercicio y/o respeto a los derechos y obligaciones que poseen los miembros de la comunidad zacatecana en el extranjero. Participación relevante en medios impresos, en radio, en televisión y/o en cine, en términos de su profesionalismo, innovación, contenido social y/o divulgación tanto de los valores mexicanos como de la cultura zacatecana. Actividades que se destaquen por su sentido de solidaridad social y que se traduzcan en mejoramiento de las condiciones de vida de grupos, comunidades o de la sociedad en general, así como las acciones heroicas, de protección civil y atención a grupos vulnerables.  (Los(as) candidatos(as) deberán preferentemente pertenecer a algún club registrado en alguna de las federaciones de clubes zacatecanos en algún estado de la Unión Americana).'; 
    }
    else if (categoria ==7){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Mérito campesino: </strong> Acciones de las y los jóvenes que en el medio rural promuevan la vigencia y el desarrollo de sus municipios y comunidades. Iniciativas para preservar y/o transmitir su patrimonio cultural. Elaboración y desarrollo de proyectos productivos; mejoramiento y conservación ambiental; aplicación de tecnologías alternativas para el aprovechamiento de los recursos naturales y actividades de capacitación y educación en materia ambiental en sus municipios y comunidades.'; 
    }
    else if (categoria ==8){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Protección al medio ambiente: </strong> Acciones de las y los jóvenes que promuevan el cuidado y protección del medio ambiente dentro de su comunidad y en nuestro estado, que estén encaminadas a revertir efectos de impacto debido al calentamiento global, la disposición de agua, la deforestación, los patrones de producción, consumo irresponsable, etc., rescatando los principios y valores que sustentan a esta sociedad. Fomentando la sostenibilidad ambiental y sustentabilidad de los recursos naturales.'; 
    }
    else if (categoria ==9){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Cultura Cívica, Política y Democracia: </strong> Las y los jóvenes que con sus propuestas promuevan el avance en la democracia participativa requisito necesario para la transformación de nuestro país, hacia uno donde prevalezca la justicia, donde cada ciudadano asuma su papel en la definición del rumbo de México y desempeñe la parte que le corresponde desde lo local para contribuir al progreso nacional. Premiando su aportación a una cultura de participación ciudadana, en el ejercicio de acciones basadas en la reflexión, el análisis y  fortalecimiento de una cultura democrática sustentada en los valores del diálogo, la tolerancia, el respeto a la pluralidad y a la generación de acuerdos; estas acciones se pueden llevar a cabo por medio de foros, talleres, investigaciones, simulacros, iniciativas ciudadanas, modelos de prácticas democráticas, así como la elaboración de estudios, ponencias, investigaciones, trabajos o publicaciones en revistas; que por su impacto modifiquen entornos y prácticas ciudadanas. No podrán participar en esta distinción las y los jóvenes que desempeñen un cargo público.'; 
    }
    else if (categoria ==10){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Literatura: </strong> Escritores(as) del género literario y narrativo: poemas, sonetos, novelas, ensayos y cuentos que hayan permitido fortalecer y salvaguardar las tradiciones de una o de varias regiones del Estado.'; 
    }
    else if (categoria ==11){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Artes escénicas (Música): </strong> a) composición de música o canciones en cualquier género, que reflejen o hallan reflejado la identidad con Zacatecas. b) Interpretes de cualquier instrumento que hayan representado a la Entidad en el país o en el extranjero, c) Interpretación de música regional que identifique a Zacatecas con las y los zacatecanos. '; 
    }
    else if (categoria ==12){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Artes escénicas (Teatro): </strong> actores, productores y/o directores que destacan por su trayectoria, intercambios culturales, presentaciones, cursos o actividades curriculares y proyectos en beneficio de la sociedad zacatecana. '; 
    }
    else if (categoria ==13){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Artes escénicas (Danza): </strong> bailarines que destaquen por su trayectoria, intercambios culturales, cursos y capacitaciones, presentaciones nacionales o internacionales, proyectos o actividades en beneficio de la sociedad en general.'; 
    }
    else if (categoria ==14){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Artes escénicas (Artes Plásticas, Visuales y Populares): </strong> a) Las y los Jóvenes destacados en las artes plásticas y que hayan representado a Zacatecas en el país o en el extranjero, b) que a través de la práctica del dibujo o la pintura han aportado a la juventud herramientas para sobresalir y mantenerlos alejados de las adicciones c) que hayan destacado en el séptimo arte (comerciales, cortometrajes, largometrajes y animaciones), así como, d) aquellos que su quehacer versa en la arquitectura, la escultura, la fotografía. En artes populares serán tomadas en cuenta las expresiones de obras artesanales, con técnicas y materiales tradicionales, así como la creación de nuevos diseños que, por su calidad y aportaciones a nuestra vida cotidiana, contribuyan al fortalecimiento de nuestra identidad, a la vez que benefician a su comunidad.'; 
    }
    else if (categoria ==15){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Arte Urbano. Grafiti: </strong> a) Representación de ideas, testimonios, demandas sociales, anécdotas, innovación y tendencias a través de la mezcla de colores de aerosol sobre una superficie de amplias dimensiones, b) A las y los jóvenes que hayan fomentado a través de su arte el mantener vigentes valores y buenas prácticas sociales. Y en general todas aquellas manifestaciones de las llamadas tribus urbanas. '; 
    }
    else if (categoria ==16){
        document.getElementById('criteriosCategoria').innerHTML = '<strong> Ciencias Aplicadas: </strong> Acciones que contribuyan a fomentar y generar investigación científica; creación e innovación tecnológica; investigaciones básicas en las ciencias naturales, de la vida, sociales, de la conducta y las humanidades, fortaleciendo los espacios de expresión de su creatividad e inventiva; generación de conocimientos, difusión y transmisión de los mismos a nivel nacional e internacional, así como su desarrollo y aplicación sustentable.'; 
    }
}