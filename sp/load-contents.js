/* 
 *  Author: Anthea Jung
 *  Created: 10/27/2015
 *  Last modified: 10/28/2015
 *  
 *  Instead of using css (traduzioni.css) to fill the elements with new manual 
 *  tranlsation, loadContents() function is used to place the given value to the 
 *  element with the given id. Depending on if the element is empty or not, value 
 *  is either appended or replaced */

function loadContents() {
    //example: appendORreplace('#L19', "appeal to the Boards of Appeal");
    //see DE/load-contents.js for more examples
//contenzioso.html
appendORreplace('#F35',"Recursos por omisiòn");
appendORreplace('#F36',"Recursos por omisiòn");

//concorrenza.html
appendORreplace('#F41',"La firma ofrece asistencia calificada en la interpretación y aplicación de la ley antimonopolio de la Unión Europea (cárteles y las prácticas contrarias a la competencia, el abuso de posición dominante y ayudas estatales). La Firma cuenta con amplia experiencia en esta área en procedimientos ante los tribunales de la Unión Europea.");
appendORreplace('#S1',"acciones para impugnar la declaración de la Comisión Europea de que algunas ayudas regionales para reducir el impacto de las plantas de acero eran ilegales");
appendORreplace('#F47',"acciones para aplicar el estatuto de limitaciones al poder de la Comision Europea para conseguir multas dadas en un juicio final por acuerdos contrarios a la competencia");
appendORreplace('#F48',"Acciones basadas en una clausula de arbitraje para establecer la ilegalidad de la recoleccion por parte de la Comision Europea de una garantía bancaria para el pago de una multa tras la prescripción del poder de la Comision para requerir el pago de tal multa del deudor principal");
appendORreplace('#L3',"contra los Estados miembros sospechosos de haber planeado y / o implementado una ayuda de Estado incompatible con las normas europeas (artículos 107 y 108 del TFUE).");
appendORreplace('#L25',"contra empresas alemanas que habían impuesto de facto contratos en el sector fotovoltaico para el suministro de obleas de silicio que contenían claúsulas excesivamente restrictivas para la competición o que abusaban de una posición dominante");

//arbitration.html
appendORreplace('#L62',"La firma proporciona asistencia y representación en procedimientos (formales o informales) encaminados a la solución de controversias o prevenir que surjan controversias, tanto entre entidades privadas como con las autoridades públicas. ");
appendORreplace('#L63',"En todos los niveles (nacional e internacional), la firma ofrece asistencia con los siguientes tipos de procedimientos:  procedimientos de arbitraje (tanto formales como amistosos), conciliación y mediación (también en el ámbito fiscal). ");
appendORreplace('#F56',"en un caso de supuesto incumplimiento de contrato la compañía ganó una licitación realizada por la Delegación de la Unión Europea en un estado africano por la renovación del suministro de agua de la capital del estado (la queja se debió a que se suministró, parcialmente, bienes de origen chino en lugar de bienes comunitarios o APC -como es obligatorio hacer-).");
appendORreplace('#F57',"una disputa surgida entre las partes de un contrato de agencia internacional en relación a la indemnización por despido pedida por un agente francés. La disputa se sometió a arbitraje por la Camara Internacional de Comercio de París (ICC).");

//import-export.html
appendORreplace('#F71',"Desde los años 80 la empresa está muy atenta a los problemas de aduana. Muchos, de hecho, son problemas que pueden afectar a un operador comercial, y que, por lo tanto, merecen un análisis especial, preferiblemente preventivo. ");
appendORreplace('#L6',"solicitar la clasificación arancelaria correcta de las mercancías importadas (lo cual determina el nivel de imposición de derechos de aduana y / o la existencia de  prohibiciones o restricciones a las importaciones); ");
appendORreplace('#L7',"Usar las naves aduaneras y de IVA dentro de las normas (sobre todo en zonas francas)");
appendORreplace('#F73',"Acuerdos relativos a la aplicación del Espacio Económico Europeo (EEE)  entre la UE y Noruega, Islandia y Liechtenstein ");
appendORreplace('#F74',"Acuerdos relativos a la aplicación de la OMC (Organización Mundial del Comercio) ");

//settori.html
appendORreplace('#L28',"recurso de anulación contra una decisión de la Comisión por la que un proyecto de inversión para la racionalización de la producción de alfalfa deshidratada había sido excluido de la financiación comunitaria; ");
appendORreplace('#L29',"acción contra el rechazo, por la Comisión, de una oferta en una licitación para la venta de cebada de la Comunidad en poder de la autoridad austriaca; ");
appendORreplace('#S11',"acciones para impugnar una decisión de la Comisión que consideraba ilegal algunas ayudas regionales para reducir el impacto ambiental de las plantas de acero. ");
appendORreplace('#F81',"sobre la interpretación de la legislación comunitaria en la mejora de la eficiencia de las empresas agrícolas en relación con el régimen de ayudas a la extensificación de la producción de carne de vaca y ternera");
appendORreplace('#F82',"sobre la correcta interpretación de la normativa comunitaria y las normas internacionales sobre protección de las aguas de lago de la contaminación industrial; ");
appendORreplace('#F83',"sobre una regulación -declarada inválida- del Consejo de la Unión Europea, que prohíbe el uso de redes de deriva para la pesca del atún en el Mediterráneo. ");

//contenzioso.html

//contenzioso.html
}

/* If an element is empty, then appends value.
 * If an element is not empty, then replaces the innerHTML with a given value */
function appendORreplace(id, value) {
    if ($(id).html() === "") {
        $(id).append(value);
    } else {
        $(id).text(value);
    }
}