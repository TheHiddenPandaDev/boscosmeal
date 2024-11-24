<?php
/**
 * Template Name: Calculator
 * The template for displaying the calculator
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @product TheHiddenPanda
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

get_header(); ?>
</div>

<div id="primary" <?php astra_primary_class(); ?> >

    <div id="summary-calculator-btn">
        <span>Ver resumen de la calculadora 📝 </span>
    </div>

    <div id="summary-calculator-sidebar">
        <div class="summary-calculator-model-wrap" style="opacity: 1;">

            <div class="summary-calculator-model-header">
                <div class="cart-heading">
                    <h4>📝 Resumen</h4>
                    <span class="taiowcp-cart-close"></span>
                </div>
            </div>

            <div class="summary-calculator-model-body">
                <div class="summary-calculator-list">
                    <div class="summary_calculator_item">

                        <div class="no-items">
                            Sin platos
                        </div>
                    </div>
                </div>
            </div>

            <div class="summary-calculator-model-footer">
                <div class="cart-total">
                <span class="summary-calculator-payment-title">Detalles</span>

                    <div class="summary-calculator-total-wrap">

                        <div class="summary-calculator-month-weight">
                            <span class="summary-calculator-label-month">Cantidad a comer al mes</span>
                            <span class="summary-calculator-month-value">0gr</span>
                        </div>

                        <div class="summary-calculator-total-weight">
                            <span class="summary-calculator-label">Total cantidad seleccionada</span>
                            <span class="summary-calculator-value">0gr</span>
                        </div>

                        <div class="summary-calculator-total">
                            <span class="summary-calculator-label">Importe total</span>
                            <span class="woocommerce-Price-amount amount">0€</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <div class="uagb-container-inner-blocks-wrap ast-container">
        <div class="header-title">
            <h2>CALCULA TU MENÚ</h2>
        </div>
    </div>

    <!-- Num Steps -->
    <div class="uagb-container-inner-blocks-wrap ast-container">
        <div class="num-steps">
            <div class="progress-container">
                <div class="step active numStep1">1</div>
                <div class="progress-line"></div>
                <div class="step numStep2">2</div>
                <div class="progress-line"></div>
                <div class="step numStep3">3</div>
                <div class="progress-line"></div>
                <div class="step numStep4">4</div>
                <div class="progress-line"></div>
                <div class="step numStep5">5</div>
                <div class="progress-line"></div>
                <div class="step numStep6">6</div>
            </div>
        </div>
    </div>

    <!-- Step 1 -->
    <div class="uagb-container-inner-blocks-wrap ast-container">
        <div class="steps step1">
            <div class="animal-selector">
                <div class="animal selected" data-animal="dog">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/calculadora/perro.png">
                </div>
                <div class="animal" data-animal="cat">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/calculadora/gato.png">
                </div>
            </div>
            <div class="animal-name">
                <p class="form-row animal-name form-row-wide" id="animal-name-field" data-priority="50">
                    <label for="animal-name" class="">Nombre</label><br />
                    <span class="woocommerce-input-wrapper">
                        <input type="text" class="input-text " name="name" id="animal-name" placeholder="Nombre de nuestro amigo" autocomplete="animal-name" data-placeholder="Nombre de nuestro amigo">
                    </span>
                    <span id="animal-name-error-msg" class="calculator-error-msg">Escribe un nombre</span>
                </p>
            </div>

            <div class="animal-race">
                <div id="race_dog_animal_list">
                    <p class="form-row animal-name form-row-wide" id="animal-name-field" data-priority="50">
                        <labe for="race_dog" class="">Escoge su raza</labe><br />
                        <span class="woocommerce-input-wrapper">
                            <input type="text" list="race_dog" class="input-text" autocomplete="off">
                            <datalist  class="form-control" data-show-subtext="true" data-live-search="true" id="race_dog" name="race_dog">
                                <option value="Affenpinscher"></option>
                                <option value="Afgano"></option>
                                <option value="Akita Americano"></option>
                                <option value="Akita Inu"></option>
                                <option value="Alano Español"></option>
                                <option value="American Bully"></option>
                                <option value="American Foxhound"></option>
                                <option value="American Pit Bull Terrier"></option>
                                <option value="American Staffordshire Terrier"></option>
                                <option value="Antiguo perro de muestra Danés"></option>
                                <option value="Australian Silky Terrier"></option>
                                <option value="Azawakh"></option>
                                <option value="Barbet"></option>
                                <option value="Basenji"></option>
                                <option value="Basset Hound"></option>
                                <option value="Basset artesiano de Normandia"></option>
                                <option value="Basset azul de Gascuña"></option>
                                <option value="Basset leonado de Bretaña"></option>
                                <option value="Beagle"></option>
                                <option value="Beagle-Harrier"></option>
                                <option value="Bedlington Terrier"></option>
                                <option value="Berger de Picardie"></option>
                                <option value="Bichón Boloñés"></option>
                                <option value="Bichón Frisé"></option>
                                <option value="Bichón Habanero"></option>
                                <option value="Bichón Maltés"></option>
                                <option value="Billy"></option>
                                <option value="Black And Tan Coonhound"></option>
                                <option value="Bodeguero Andaluz"></option>
                                <option value="Bloodhound"></option>
                                <option value="Bobtail"></option>
                                <option value="Border Collie"></option>
                                <option value="Border Terrier"></option>
                                <option value="Borzoi (Galgo Ruso)"></option>
                                <option value="Boston Terrier"></option>
                                <option value="Boyero Australiano"></option>
                                <option value="Boyero de Flandes"></option>
                                <option value="Boyero de las Ardenas"></option>
                                <option value="Briard"></option>
                                <option value="Brittany"></option>
                                <option value="Broholmer"></option>
                                <option value="Buhund Noruego"></option>
                                <option value="Bull Mastín"></option>
                                <option value="Bull Terrier"></option>
                                <option value="Bull Terrier Miniatura"></option>
                                <option value="Bulldog"></option>
                                <option value="Bulldog Francés"></option>
                                <option value="Bulldog americano"></option>
                                <option value="Bóxer"></option>
                                <option value="Cairn Terrier"></option>
                                <option value="Cane Corso"></option>
                                <option value="Caniche (o Poodle)"></option>
                                <option value="Carlino"></option>
                                <option value="Chihuahua"></option>
                                <option value="Chin Japonés"></option>
                                <option value="Chow Chow"></option>
                                <option value="Cirneco Del Etna"></option>
                                <option value="Clumber Spaniel"></option>
                                <option value="Cocker Americano"></option>
                                <option value="Cocker Spaniel"></option>
                                <option value="Collie"></option>
                                <option value="Collie Barbudo"></option>
                                <option value="Collie Smooth"></option>
                                <option value="Corgi Galés Cárdigan"></option>
                                <option value="Corgi Galés Pembroke"></option>
                                <option value="Cotón de Tuléar"></option>
                                <option value="Curly Coated Retriever (de pelo rizado)"></option>
                                <option value="Dandie Dinmont Terrier"></option>
                                <option value="Deerhound Escocés"></option>
                                <option value="Doberman"></option>
                                <option value="Dogo Argentino"></option>
                                <option value="Dogo Canario"></option>
                                <option value="Dogo Mallorquín"></option>
                                <option value="Dogo de Burdeos"></option>
                                <option value="Dálmata"></option>
                                <option value="Drever"></option>
                                <option value="Elkhound Noruego"></option>
                                <option value="Epagneul breton"></option>
                                <option value="Eurasier"></option>
                                <option value="Faraón Hound"></option>
                                <option value="Field Spaniel"></option>
                                <option value="Fila Brasileiro"></option>
                                <option value="Fila de San Miguel"></option>
                                <option value="Fox Terrier Pelo Duro"></option>
                                <option value="Fox Terrier Toy"></option>
                                <option value="Fox Terrier de Pelo Liso"></option>
                                <option value="Foxhound Americano"></option>
                                <option value="Foxhound Inglés"></option>
                                <option value="Galgo Español"></option>
                                <option value="Galgo Italiano"></option>
                                <option value="Galés Terrier Galés"></option>
                                <option value="Gascon Saintongeois"></option>
                                <option value="Glen Of Imaal Terrier"></option>
                                <option value="Golden Retriever"></option>
                                <option value="Gran Basset Grifón vendeano"></option>
                                <option value="Gran Danés"></option>
                                <option value="Greyhound"></option>
                                <option value="Grifón Belga"></option>
                                <option value="Grifón de Bruselas"></option>
                                <option value="Grifón de muestra Korthals de pelo duro"></option>
                                <option value="Grifón de muestra bohemio de pelo duro"></option>
                                <option value="Grifón de muestra eslovaco de pelo duro"></option>
                                <option value="Hamiltonstovare"></option>
                                <option value="Harrier"></option>
                                <option value="Hokkaïdo"></option>
                                <option value="Hovawart"></option>
                                <option value="Husky Siberiano"></option>
                                <option value="Irish Soft Coated Wheaten Terrier"></option>
                                <option value="Jack Russell Terrier"></option>
                                <option value="Jamthund"></option>
                                <option value="Kai"></option>
                                <option value="Karjalankarhukoira"></option>
                                <option value="Keeshond"></option>
                                <option value="Kerry Blue Terrier"></option>
                                <option value="Kishu"></option>
                                <option value="Komondor"></option>
                                <option value="Korea Jinco Dog"></option>
                                <option value="Kromfohrländer"></option>
                                <option value="Kuvasz"></option>
                                <option value="Labrador Retriever"></option>
                                <option value="Lakeland Terrier"></option>
                                <option value="Landseer"></option>
                                <option value="Laïka Ruso-Europeo"></option>
                                <option value="Laïka de Siberia oriental"></option>
                                <option value="Lebrel Húngaro"></option>
                                <option value="Leonberger"></option>
                                <option value="Lhasa Apso"></option>
                                <option value="Lundehund noruego"></option>
                                <option value="Löwchen"></option>
                                <option value="Malamute de Alaska"></option>
                                <option value="Mastín"></option>
                                <option value="Mastín Napolitano"></option>
                                <option value="Mastín Tibetano"></option>
                                <option value="Mestizo">Mestizo</option>
                                <option value="Mudi"></option>
                                <option value="Münsterländer grande"></option>
                                <option value="Münsterländer pequeño"></option>
                                <option value="Otterhound"></option>
                                <option value="Papillon"></option>
                                <option value="Parson Russell Terrier"></option>
                                <option value="Pastor Alemán"></option>
                                <option value="Pastor Australiano"></option>
                                <option value="Pastor Belga"></option>
                                <option value="Pastor Blanco Suizo"></option>
                                <option value="Pastor Catalán"></option>
                                <option value="Pastor Polaco de Tierras Bajas"></option>
                                <option value="Pastor Yugoslavo de Charplanina"></option>
                                <option value="Pastor de Anatolia"></option>
                                <option value="Pastor de Beauce"></option>
                                <option value="Pastor de Los Pirineos"></option>
                                <option value="Pastor de Shetland"></option>
                                <option value="Pequinés"></option>
                                <option value="Perdiguero de Burgos"></option>
                                <option value="Perdiguero de Drente"></option>
                                <option value="Perdiguero portugués"></option>
                                <option value="Perro Boyero de Entlebuch Entlebucher"></option>
                                <option value="Perro Crestado Chino"></option>
                                <option value="Perro De Agua Español"></option>
                                <option value="Perro Esquimal Americano"></option>
                                <option value="Perro Esquimal Canadiense"></option>
                                <option value="Perro Lobo Checoslovaco"></option>
                                <option value="Perro Pastor Croato"></option>
                                <option value="Perro Pastor Mallorquín"></option>
                                <option value="Perro Smous holandés"></option>
                                <option value="Perro de Agua Americano"></option>
                                <option value="Perro de Aguas Portugués"></option>
                                <option value="Perro de Canaan"></option>
                                <option value="Perro de Castro Laboreiro"></option>
                                <option value="Perro de Groenlandia"></option>
                                <option value="Perro de Montaña Appenzell"></option>
                                <option value="Perro de Montaña Bernés"></option>
                                <option value="Perro de Montaña Gran Suizo"></option>
                                <option value="Perro de Montaña de Los Pirineos"></option>
                                <option value="Perro de Montaña de la Sierra de la Estrella"></option>
                                <option value="Perro de Montaña del Atlas"></option>
                                <option value="Perro de Pastor Bergamasco"></option>
                                <option value="Perro de Pastor Maremmano-Abruzzese"></option>
                                <option value="Perro de Pastor islandés"></option>
                                <option value="Perro de Pastor polaco de Podhale"></option>
                                <option value="Perro de Pastor polaco de las Llanuras"></option>
                                <option value="Perro de Pastor portugués"></option>
                                <option value="Perro de pastor de Asia Central"></option>
                                <option value="Perro de pastor de Karst"></option>
                                <option value="Perro de pastor de Rusia Meridional"></option>
                                <option value="Perro de pastor del Cáucaso"></option>
                                <option value="Perro lobo de Saarloos"></option>
                                <option value="Perro sin Pelo del Perú"></option>
                                <option value="Perro sin pelo Mexicano"></option>
                                <option value="Pinscher"></option>
                                <option value="Pinscher Miniatura"></option>
                                <option value="Pinscher austriaco"></option>
                                <option value="Plott Hound"></option>
                                <option value="Podenco Canario"></option>
                                <option value="Podenco Ibicenco"></option>
                                <option value="Podenco Portugués"></option>
                                <option value="Pointer"></option>
                                <option value="Pointer Alemán de Pelo Corto"></option>
                                <option value="Pointer Alemán de Pelo Duro"></option>
                                <option value="Poitevin"></option>
                                <option value="Pomerania"></option>
                                <option value="Porcelaine"></option>
                                <option value="Pudelpointer"></option>
                                <option value="Puli"></option>
                                <option value="Pumi"></option>
                                <option value="Rafeiro del Alentejo"></option>
                                <option value="Rastreador de Hannover"></option>
                                <option value="Rastreador montañés de Baviera"></option>
                                <option value="Retriever de La Bahía de Chesapeake"></option>
                                <option value="Retriever de Nueva Escocia"></option>
                                <option value="Retriever de Pelo Liso"></option>
                                <option value="Ridgeback de Rodesia"></option>
                                <option value="Rottweiler"></option>
                                <option value="Sabueso Artesiano"></option>
                                <option value="Sabueso Estirio de pelo duro"></option>
                                <option value="Sabueso Halden"></option>
                                <option value="Sabueso Italiano (de pelo corto)"></option>
                                <option value="Sabueso Italiano (de pelo duro)"></option>
                                <option value="Sabueso Schiller"></option>
                                <option value="Sabueso austriaco negro y fuego"></option>
                                <option value="Sabueso alemán"></option>
                                <option value="Sabueso de Bosnia de pelo cerdoso"></option>
                                <option value="Sabueso de Hygen"></option>
                                <option value="Sabueso de Smaland"></option>
                                <option value="Sabueso de Transilvania"></option>
                                <option value="Sabueso de las Montañas de Montenegro"></option>
                                <option value="Sabueso del Tirol"></option>
                                <option value="Sabueso español"></option>
                                <option value="Sabueso eslovaco"></option>
                                <option value="Sabueso finlandés"></option>
                                <option value="Sabueso francés tricolor"></option>
                                <option value="Sabueso noruego"></option>
                                <option value="Sabueso polaco"></option>
                                <option value="Sabueso serbio"></option>
                                <option value="Sabueso suizo"></option>
                                <option value="Sabueso tricolor serbio"></option>
                                <option value="Saluki (Galgo Persa)"></option>
                                <option value="Samoyedo"></option>
                                <option value="San Bernardo"></option>
                                <option value="Schapendoes neerlandés"></option>
                                <option value="Schipperke"></option>
                                <option value="Schnauzer"></option>
                                <option value="Schnauzer Gigante"></option>
                                <option value="Schnauzer Miniatura"></option>
                                <option value="Setter Gordon"></option>
                                <option value="Setter Inglés"></option>
                                <option value="Setter Irlandés"></option>
                                <option value="Setter irlandés rojo"></option>
                                <option value="Setter irlandés rojo y blanco"></option>
                                <option value="Shar Pei"></option>
                                <option value="Shiba"></option>
                                <option value="ShihTzu"></option>
                                <option value="Shikoku"></option>
                                <option value="Silky Terrier"></option>
                                <option value="Sloughi (galgo árabe)"></option>
                                <option value="Spaniel Cavalier King Charles"></option>
                                <option value="Spaniel Picardo"></option>
                                <option value="Spaniel Tibetano"></option>
                                <option value="Spaniel continental enano"></option>
                                <option value="Spaniel de Agua Irlandés"></option>
                                <option value="Spaniel de Pont-Audemer"></option>
                                <option value="Spaniel de Sussex"></option>
                                <option value="Spinone Italiano"></option>
                                <option value="Spitz Alemán"></option>
                                <option value="Spitz Finlandés"></option>
                                <option value="Spitz Japonés"></option>
                                <option value="Spitz de Norrbotten"></option>
                                <option value="Springer Spaniel Galés"></option>
                                <option value="Springer Spaniel Inglés"></option>
                                <option value="Stabyhoun"></option>
                                <option value="Staffordshire Bull Terrier"></option>
                                <option value="Tchuvatch eslovaco"></option>
                                <option value="Teckel"></option>
                                <option value="Tejonero alpino"></option>
                                <option value="Tejonero de Westfalia"></option>
                                <option value="Terranova"></option>
                                <option value="Terrier Australiano"></option>
                                <option value="Terrier Brasileño"></option>
                                <option value="Terrier Cesky"></option>
                                <option value="Terrier Escocés"></option>
                                <option value="Terrier Irlandés"></option>
                                <option value="Terrier Sealyham Terrier"></option>
                                <option value="Terrier Tibetano"></option>
                                <option value="Terrier West Highland"></option>
                                <option value="Terrier cazador alemán"></option>
                                <option value="Terrier de Airedale"></option>
                                <option value="Terrier de Norfolk"></option>
                                <option value="Terrier de Norwich"></option>
                                <option value="Terrier de Skye"></option>
                                <option value="Terrier japonés"></option>
                                <option value="Thai Ridgeback Dog"></option>
                                <option value="Tosa Inu"></option>
                                <option value="Valhund Sueco"></option>
                                <option value="Vizsla"></option>
                                <option value="Volpino Italiano"></option>
                                <option value="Wetterhound"></option>
                                <option value="Wheaten Terrier"></option>
                                <option value="Whippet"></option>
                                <option value="Wolfhound Irlandés"></option>
                                <option value="Yorkshire terrier"></option>

                            </datalist>
                        </span>
                        <span id="animal-race-dog-error-msg" class="calculator-error-msg">Selecciona una raza</span>
                    </p>
                </div>
                <div id="race_cat_animal_list">
                    <p class="form-row animal-name form-row-wide" id="animal-name-field" data-priority="50">
                        <label for="race_cat" class="">Escoge su raza</label><br />
                        <span class="woocommerce-input-wrapper">
                            <input type="text" list="race_cat" class="input-text" autocomplete="off">
                            <datalist class="form-control" data-show-subtext="true" data-live-search="true" id="race_cat" name="race_cat">
                                <option value='Abisinio'></option>
                                <option value='Americano de pelo corto'></option>
                                <option value='American wirehair'></option>
                                <option value='Angora turco'></option>
                                <option value='Ashera'></option>
                                <option value='Australian Mist'></option>
                                <option value='Azul ruso'></option>
                                <option value='Balinés'></option>
                                <option value='Bambino'></option>
                                <option value='Bengala o bengalí'></option>
                                <option value='Birmano'></option>
                                <option value='Bobtail americano'></option>
                                <option value='Bobtail japonés'></option>
                                <option value='Bombay'></option>
                                <option value='Bosque de Noruega'></option>
                                <option value='Británico de pelo largo'></option>
                                <option value='British shorthair - Gato británico de pelo corto'></option>
                                <option value='Burmés'></option>
                                <option value='Burmilla'></option>
                                <option value='Caracat'></option>
                                <option value='Cartujo o chartreux'></option>
                                <option value='Ceilán'></option>
                                <option value='Chantilly-Tiffany'></option>
                                <option value='Chausie'></option>
                                <option value='Colorpoint'></option>
                                <option value='Común europeo'></option>
                                <option value='Cornish rex'></option>
                                <option value='Curl americano'></option>
                                <option value='Cymric'></option>
                                <option value='Devon rex'></option>
                                <option value='Don sphynx o donskoy'></option>
                                <option value='Elfo'></option>
                                <option value='Exótico de pelo corto'></option>
                                <option value='German rex o rex alemán'></option>
                                <option value='Gato neva masquerade'></option>
                                <option value='Habana'></option>
                                <option value='Highland fold'></option>
                                <option value='Himalayo'></option>
                                <option value='Khao manee'></option>
                                <option value='Kohana'></option>
                                <option value='Korat'></option>
                                <option value='Kurilian bobtail'></option>
                                <option value='LaPerm'></option>
                                <option value='Levkoy ucraniano'></option>
                                <option value='Lykoi o gato lobo'></option>
                                <option value='Maine coon'></option>
                                <option value='Manx'></option>
                                <option value='Mau egipcio'></option>
                                <option value='Mestizo'>Mestizo</option>
                                <option value='Minskin'></option>
                                <option value='Montés'></option>
                                <option value='Munchkin'></option>
                                <option value='Nebelung'></option>
                                <option value='Neva masquerade'></option>
                                <option value='Ocicat o gato ocelote'></option>
                                <option value='Oriental de pelo corto'></option>
                                <option value='Oriental de pelo largo o javanés'></option>
                                <option value='Persa'></option>
                                <option value='Peterbald'></option>
                                <option value='Pixie bob'></option>
                                <option value='Ragamuffin'></option>
                                <option value='Ragdoll'></option>
                                <option value='Savannah'></option>
                                <option value='Scottish fold'></option>
                                <option value='Selkirk rex'></option>
                                <option value='Siamés'></option>
                                <option value='Siberiano'></option>
                                <option value='Singapura o singapur'></option>
                                <option value='Skookum'></option>
                                <option value='Snowshoe'></option>
                                <option value='Sokoke'></option>
                                <option value='Somalí'></option>
                                <option value='Sphynx o esfinge'></option>
                                <option value='Thai o siamés tradicional'></option>
                                <option value='Tonkinés'></option>
                                <option value='Toyger'></option>
                                <option value='Ural rex'></option>
                                <option value='Van turco'></option>
                            </datalist>
                        </span>
                        <span id="animal-race-cat-error-msg" class="calculator-error-msg">Selecciona una raza</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Step 2 -->
    <div class="uagb-container-inner-blocks-wrap ast-container">
        <div class="steps step2">
            <div class="gender">
                <div class="animal-gender">
                    <div class="animal-gender-selector">
                        <div class="animal selected" data-animal-gender="macho">
                            <img id="macho-icon" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/calculadora/sexo/macho-white.png">
                        </div>
                        <br />
                        <span>Macho</span>
                    </div>

                    <div class="animal-gender-selector">
                        <div class="animal" data-animal-gender="hembra">
                            <img id="hembra-icon" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/calculadora/sexo/hembra-black.png">
                        </div>
                        <br />
                        <span>Hembra</span>
                    </div>
                </div>
            </div>

            <div class="animal-age">
                <p class="form-row animal-age-in-month form-row-wide" id="animal-age-in-month-field" data-priority="50">
                    <label for="age_in_month" class="">¿Cuál es su edad?</label><br />
                    <span class="woocommerce-input-wrapper">
                        <select name="age" id=age_in_month" class="js-calc__input-component" data-age-in-month="age_in_month">
                            <option value="3">3 meses</option>
                            <option value="4">4 meses</option>
                            <option value="5">5 meses</option>
                            <option value="6">6 meses</option>
                            <option value="7">7 meses</option>
                            <option value="8">8 meses</option>
                            <option value="9">9 meses</option>
                            <option value="10">10 meses</option>
                            <option value="11">11 meses</option>
                            <option value="12">1 año</option>
                            <option value="24">2 años</option>
                            <option value="36">3 años</option>
                            <option value="48">4 años</option>
                            <option value="60">5 años</option>
                            <option value="72">6 años</option>
                            <option value="84">7 años</option>
                            <option value="96">8 años</option>
                            <option value="108">9 años</option>
                            <option value="120">10 años</option>
                            <option value="132">11 años</option>
                            <option value="144">12 años</option>
                            <option value="156">13 años</option>
                            <option value="168">14 años</option>
                            <option value="180">15 años</option>
                            <option value="192">16 años</option>
                            <option value="204">17 años</option>
                            <option value="216">18 años</option>
                            <option value="228">19 años</option>
                            <option value="240">20 años</option>
                        </select>
                    </span>
                    <span id="age-in-month-error-msg" class="calculator-error-msg">Selecciona una edad</span>
                </p>
            </div>

            <p class="form-row animal-weight form-row-wide" id="animal-weight-field" data-priority="50">
                <label for="weight" class="">¿Cuál es su peso?</label><br />
                <span class="woocommerce-input-wrapper">
                    <select id=weight" class="js-calc__input-component" data-key="weight" name="weight">
                        <option value="500">0.5 Kg</option>
                        <option value="1000">1.0 Kg</option>
                        <option value="1500">1.5 Kg</option>
                        <option value="2000">2.0 Kg</option>
                        <option value="2500">2.5 Kg</option>
                        <option value="3000">3.0 Kg</option>
                        <option value="3500">3.5 Kg</option>
                        <option value="4000">4.0 Kg</option>
                        <option value="4500">4.5 Kg</option>
                        <option value="5000">5.0 Kg</option>
                        <option value="5500">5.5 Kg</option>
                        <option value="6000">6.0 Kg</option>
                        <option value="6500">6.5 Kg</option>
                        <option value="7000">7.0 Kg</option>
                        <option value="7500">7.5 Kg</option>
                        <option value="8000">8.0 Kg</option>
                        <option value="8500">8.5 Kg</option>
                        <option value="9000">9.0 Kg</option>
                        <option value="9500">9.5 Kg</option>
                        <option value="10000">10.0 Kg</option>
                        <option value="11000">11 Kg</option>
                        <option value="12000">12 Kg</option>
                        <option value="13000">13 Kg</option>
                        <option value="14000">14 Kg</option>
                        <option value="15000">15 Kg</option>
                        <option value="16000">16 Kg</option>
                        <option value="17000">17 Kg</option>
                        <option value="18000">18 Kg</option>
                        <option value="19000">19 Kg</option>
                        <option value="20000">20 Kg</option>
                        <option value="21000">21 Kg</option>
                        <option value="22000">22 Kg</option>
                        <option value="23000">23 Kg</option>
                        <option value="24000">24 Kg</option>
                        <option value="25000">25 Kg</option>
                        <option value="26000">26 Kg</option>
                        <option value="27000">27 Kg</option>
                        <option value="28000">28 Kg</option>
                        <option value="29000">29 Kg</option>
                        <option value="30000">30 Kg</option>
                        <option value="31000">31 Kg</option>
                        <option value="32000">32 Kg</option>
                        <option value="33000">33 Kg</option>
                        <option value="34000">34 Kg</option>
                        <option value="35000">35 Kg</option>
                        <option value="36000">36 Kg</option>
                        <option value="37000">37 Kg</option>
                        <option value="38000">38 Kg</option>
                        <option value="39000">39 Kg</option>
                        <option value="40000">40 Kg</option>
                        <option value="41000">41 Kg</option>
                        <option value="42000">42 Kg</option>
                        <option value="43000">43 Kg</option>
                        <option value="44000">44 Kg</option>
                        <option value="45000">45 Kg</option>
                        <option value="46000">46 Kg</option>
                        <option value="47000">47 Kg</option>
                        <option value="48000">48 Kg</option>
                        <option value="49000">49 Kg</option>
                        <option value="50000">50 Kg</option>
                        <option value="51000">51 Kg</option>
                        <option value="52000">52 Kg</option>
                        <option value="53000">53 Kg</option>
                        <option value="54000">54 Kg</option>
                        <option value="55000">55 Kg</option>
                        <option value="56000">56 Kg</option>
                        <option value="57000">57 Kg</option>
                        <option value="58000">58 Kg</option>
                        <option value="59000">59 Kg</option>
                        <option value="60000">60 Kg</option>
                        <option value="61000">61 Kg</option>
                        <option value="62000">62 Kg</option>
                        <option value="63000">63 Kg</option>
                        <option value="64000">64 Kg</option>
                        <option value="65000">65 Kg</option>
                        <option value="66000">66 Kg</option>
                        <option value="67000">67 Kg</option>
                        <option value="68000">68 Kg</option>
                        <option value="69000">69 Kg</option>
                        <option value="70000">70 Kg</option>
                        <option value="71000">71 Kg</option>
                        <option value="72000">72 Kg</option>
                        <option value="73000">73 Kg</option>
                        <option value="74000">74 Kg</option>
                        <option value="75000">75 Kg</option>
                        <option value="76000">76 Kg</option>
                        <option value="77000">77 Kg</option>
                        <option value="78000">78 Kg</option>
                        <option value="79000">79 Kg</option>
                        <option value="80000">80 Kg</option>
                        <option value="81000">81 Kg</option>
                        <option value="82000">82 Kg</option>
                        <option value="83000">83 Kg</option>
                        <option value="84000">84 Kg</option>
                        <option value="85000">85 Kg</option>
                        <option value="86000">86 Kg</option>
                        <option value="87000">87 Kg</option>
                        <option value="88000">88 Kg</option>
                        <option value="89000">89 Kg</option>
                        <option value="90000">90 Kg</option>
                        <option value="91000">91 Kg</option>
                        <option value="92000">92 Kg</option>
                        <option value="93000">93 Kg</option>
                        <option value="94000">94 Kg</option>
                        <option value="95000">95 Kg</option>
                        <option value="96000">96 Kg</option>
                        <option value="97000">97 Kg</option>
                        <option value="98000">98 Kg</option>
                        <option value="99000">99 Kg</option>
                        <option value="100000">100 Kg</option>
                    </select>
                </span>
                <span id="weight-error-msg" class="calculator-error-msg">Selecciona un peso</span>
            </p>

            <p class="form-row animal-weight form-row-wide" id="animal-weight-field" data-priority="50">
                <label for="neutered" class="">¿Esta castrad@?</label><br />
                <span class="woocommerce-input-wrapper checkbox-neutered">
                    SI <input class="form-check-input" type="checkbox" name="neutered" value="true" id="neutered">
                </span>
            </p>
        </div>
    </div>

    <!-- Step 3 -->
    <div class="uagb-container-inner-blocks-wrap ast-container">
        <div class="steps step3">
            <div class="animal-race">

                <div class="animal-physical-state">
                    <div class="physical-state-selector">
                        <div class="animal" data-physical-state="delgado">
                            <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/calculadora/estado_fisico/perro/1.png">
                        </div>
                        <br />
                        <span>DELGADO</span>
                    </div>

                    <div class="physical-state-selector">
                        <div class="animal selected" data-physical-state="normal">
                            <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/calculadora/estado_fisico/perro/2.png">
                        </div>
                        <br />
                        <span>NORMAL</span>
                    </div>

                    <div class="physical-state-selector">
                        <div class="animal" data-physical-state="sobrepeso">
                            <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/calculadora/estado_fisico/perro/3.png">
                        </div>
                        <br />
                        <span>SOBREPESO</span>
                    </div>
                </div>

                <div class="activity_selector">
                    <div id="activity_dog_animal_list">
                        <p class="form-row animal-name form-row-wide" id="animal-activity-field" data-priority="50">
                            <label for="activity_dog" class="">Actividad física</label><br />
                            <span class="woocommerce-input-wrapper">
                                <select class="form-control" data-show-subtext="true" data-live-search="true" id="activity_dog" name="activity_dog">
                                    <option value="0">Selecciona la actividad física</option>
                                    <option value="baja">Baja</option>
                                    <option value="media">Media</option>
                                    <option value="alta">Alta</option>
                                    <option value="deportista">Deportista / Galgo</option>
                                </select>
                            </span>
                            <span id="activity-dog-error-msg" class="calculator-error-msg">Selecciona una actividad física</span>
                        </p>
                    </div>

                    <div id="activity_cat_animal_list" class="hidden">
                        <p class="form-row animal-name form-row-wide" id="animal-activity-field" data-priority="50">
                            <label for="activity_cat" class="">Actividad física</label><br />
                            <span class="woocommerce-input-wrapper">
                                <select class="form-control" data-show-subtext="true" data-live-search="true" id="activity_cat" name="activity_cat">
                                    <option value="0">Selecciona la actividad física</option>
                                    <option value="baja">Baja</option>
                                    <option value="media">Media</option>
                                    <option value="alta">Exterior</option>
                                </select>
                            </span>
                            <span id="activity-cat-error-msg" class="calculator-error-msg">Selecciona una actividad física</span>
                        </p>
                    </div>
                </div>

                <div id="animal_diseases_list">
                    <p class="form-row animal-name form-row-wide" id="animal-diseases-field" data-priority="50">
                        <label for="animal_diseases" class="">Enfermedades</label><br />
                        <span class="woocommerce-input-wrapper">
                            <select class="form-control" data-show-subtext="true" data-live-search="true" id="animal_diseases" name="animal_diseases">
                                <option value="Ninguna">Selecciona enfermedad</option>
                                <option value="Ninguna">Ninguna</option>
                                <option value="Alergias alimentarias">Alergias alimentarias</option>
                                <option value="Leishmania">Leishmania</option>
                                <option value="Enfermedad renal">Enfermedad renal</option>
                                <option value="Epilepsia">Epilepsia</option>
                                <option value="Displasia">Displasia</option>
                                <option value="Enfermedad digestiva">Enfermedad digestiva</option>
                                <option value="Enfermedad cardíaca">Enfermedad cardíaca</option>
                                <option value="Problema dermatológico">Problema dermatológico</option>
                            </select>
                        </span>
                        <span id="animal-diseases-error-msg" class="calculator-error-msg">Selecciona una opción</span>
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- Step 4 -->
    <div class="steps step4">
        <div class="uagb-container-inner-blocks-wrap ast-container">
            <div class="step4-header">
                <h2><span id="final-animal-name" class="animal-name">Pepe</span> debería comer <span class="quantity"><span id="weight-quantity">8.6</span> KG</span> al mes</h2>
                <h3><span class="quantity"><span id="diary-weight-quantity">500</span>gr</span> al día</h3>
                <h4>Te recomendamos el paquete de <span class="recommended-package">250gr</span></h4>
            </div>
        </div>
        <div class="products ast-container-fluid">
            <div class="grid-products grid-packages">

                <div class="single-package" data-package-size="250">
                    <div class="product-information">
                        <div class="product-name">
                            <span class="product-name">250gr</span>
                            <p class="product-description">Paquetes de comida de 250gr</p>
                        </div>
                    </div>
                </div>

                <div class="single-package selected" data-package-size="500">
                    <div class="product-information">
                        <div class="product-name">
                            <span class="product-name">500gr</span>
                            <p class="product-description">Paquetes de comida de 500gr</p>
                        </div>
                    </div>
                </div>

                <div class="single-package" data-package-size="1000">
                    <div class="product-information">
                        <div class="product-name">
                            <span class="product-name">1kg</span>
                            <p class="product-description">Paquetes de comida de 1kg</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Step 5 -->
    <div class="steps step5">
        <div class="uagb-container-inner-blocks-wrap ast-container">
            <div class="step4-header">
                <h4>ESCOGE TUS PLATOS</h4>
                <div class="food-type-selector">
                    <div class="food selected" data-food="Crudo">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/calculadora/barf.png">
                        <br>
                        <span>Barf</span>
                    </div>
                    <div class="food" data-food="Cocinado">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/calculadora/cocinado.png">
                        <br>
                        <span>Cocinado</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="products ast-container-fluid">
            <div id="dog-products-crudo">
                <div class="grid-products">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'AND', // Asegura que ambos filtros se cumplan
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'bmeal_dog',
                            ),
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'menus-barf-perro',
                            ),
                        ),
                    );
                    $query = new WP_Query($args);

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $productName = get_the_title();
                            $productImage = get_the_post_thumbnail(get_the_ID(), 'large');
                            $productDescription = wc_get_product(get_the_ID())->get_description();
                            $product = wc_get_product(get_the_ID());
                            $custom_price = get_post_meta(get_the_ID(), '_custom_price', true);
                            $productPrice = $custom_price ? custom_floatval($custom_price) : 0;
                            ?>
                            <div class="single-product" data-single-product-id="<?php echo get_the_ID(); ?>">
                                <div class="product-information">
                                    <div class="product-img">
                                        <?php echo $productImage; ?>
                                    </div>
                                    <div class="product-name">
                                        <span class="product-name"><?php echo $productName ?></span>
                                        <div class="product-description"><?php echo $productDescription; ?></div>
                                        <?php
                                        $variations = $product->get_available_variations();
                                        foreach ($variations as $variation) {
                                            $variation_id = $variation['variation_id'];
                                            $custom_price = get_post_meta($variation_id, '_custom_price', true);
                                            $productPrice = $custom_price ? custom_floatval($custom_price) : '0,00';
                                            $product_variation = new WC_Product_Variation($variation_id);
                                            $variationName = $product_variation->get_attribute('Formato');
                                            ?>
                                            <div data-product-variation-name="<?php echo $variationName; ?>" data-product-variation-id-price="<?php echo $variation_id; ?>" class="variation-pricing" style="display: none;">
                                                <div class="pricing"><?php echo $productPrice; ?>€</div>
                                            </div>
                                            <?php
                                        } ?>
                                    </div>
                                </div>
                                <div class="product-quantity">
                                    <button data-product-id="<?php echo get_the_ID(); ?>" class="remove-quantity-btn"></button>
                                    <span class="current-quantity"></span>
                                    <button data-product-id="<?php echo get_the_ID(); ?>" class="add-quantity-btn"></button>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div class="hidden">
            <div id="cat-products-crudo" class="hidden">
                <div class="grid-products">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'AND', // Asegura que ambos filtros se cumplan
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'bmeal_gato',
                            ),
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'menus-barf-gato',
                            ),
                        ),
                    );
                    $query = new WP_Query($args);

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $productName = get_the_title();
                            $productImage = get_the_post_thumbnail(get_the_ID(), 'large');
                            $productDescription = wc_get_product(get_the_ID())->get_description();
                            $product = wc_get_product(get_the_ID());
                            $custom_price = get_post_meta(get_the_ID(), '_custom_price', true);
                            $productPrice = $custom_price ? custom_floatval($custom_price) : 0;
                            ?>
                            <div class="single-product" data-single-product-id="<?php echo get_the_ID(); ?>">
                                <div class="product-information">
                                    <div class="product-img">
                                        <?php echo $productImage; ?>
                                    </div>
                                    <div class="product-name">
                                        <span class="product-name"><?php echo $productName ?></span>
                                        <p class="product-description"><?php echo $productDescription; ?> </p>
                                        <?php
                                        $variations = $product->get_available_variations();
                                        foreach ($variations as $variation) {
                                            $variation_id = $variation['variation_id'];
                                            $custom_price = get_post_meta($variation_id, '_custom_price', true);
                                            $productPrice = $custom_price ? custom_floatval($custom_price) : '0,00';
                                            $product_variation = new WC_Product_Variation($variation_id);
                                            $variationName = $product_variation->get_attribute('Formato');
                                            ?>
                                            <div data-product-variation-name="<?php echo $variationName; ?>" data-product-variation-id-price="<?php echo $variation_id; ?>" class="variation-pricing" style="display: none;">
                                                <div class="pricing"><?php echo $productPrice; ?>€</div>
                                            </div>
                                            <?php
                                        } ?>
                                    </div>
                                </div>
                                <div class="product-quantity">
                                    <button data-product-id="<?php echo get_the_ID(); ?>" class="remove-quantity-btn"></button>
                                    <span class="current-quantity"></span>
                                    <button data-product-id="<?php echo get_the_ID(); ?>" class="add-quantity-btn"></button>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div id="dog-products-cocinado" class="hidden">
                <div class="grid-products">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'AND', // Asegura que ambos filtros se cumplan
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'bmeal_dog',
                            ),
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'menus-cocinados-perro',
                            ),
                        ),
                    );
                    $query = new WP_Query($args);

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $productName = get_the_title();
                            $productImage = get_the_post_thumbnail(get_the_ID(), 'large');
                            $productDescription = wc_get_product(get_the_ID())->get_description();
                            $product = wc_get_product(get_the_ID());
                            $custom_price = get_post_meta(get_the_ID(), '_custom_price', true);
                            $productPrice = $custom_price ? custom_floatval($custom_price) : 0;
                            ?>
                            <div class="single-product" data-single-product-id="<?php echo get_the_ID(); ?>">
                                <div class="product-information">
                                    <div class="product-img">
                                        <?php echo $productImage; ?>
                                    </div>
                                    <div class="product-name">
                                        <span class="product-name"><?php echo $productName ?></span>
                                        <p class="product-description"><?php echo $productDescription; ?> </p>
                                        <?php
                                        $variations = $product->get_available_variations();
                                        foreach ($variations as $variation) {
                                            $variation_id = $variation['variation_id'];
                                            $custom_price = get_post_meta($variation_id, '_custom_price', true);
                                            $productPrice = $custom_price ? custom_floatval($custom_price) : '0,00';
                                            $product_variation = new WC_Product_Variation($variation_id);
                                            $variationName = $product_variation->get_attribute('Formato');
                                            ?>
                                            <div data-product-variation-name="<?php echo $variationName; ?>" data-product-variation-id-price="<?php echo $variation_id; ?>" class="variation-pricing" style="display: none;">
                                                <div class="pricing"><?php echo $productPrice; ?>€</div>
                                            </div>
                                            <?php
                                        } ?>
                                    </div>
                                </div>
                                <div class="product-quantity">
                                    <button data-product-id="<?php echo get_the_ID(); ?>" class="remove-quantity-btn"></button>
                                    <span class="current-quantity"></span>
                                    <button data-product-id="<?php echo get_the_ID(); ?>" class="add-quantity-btn"></button>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <div id="cat-products-cocinado" class="hidden">
                <div class="grid-products">
                    <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'tax_query' => array(
                            'relation' => 'AND', // Asegura que ambos filtros se cumplan
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'bmeal_gato',
                            ),
                            array(
                                'taxonomy' => 'product_cat',
                                'field'    => 'slug',
                                'terms'    => 'menus-cocinados-gato',
                            ),
                        ),
                    );
                    $query = new WP_Query($args);

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            $productName = get_the_title();
                            $productImage = get_the_post_thumbnail(get_the_ID(), 'large');
                            $productDescription = wc_get_product(get_the_ID())->get_description();
                            $product = wc_get_product(get_the_ID());
                            $custom_price = get_post_meta(get_the_ID(), '_custom_price', true);
                            $productPrice = $custom_price ? custom_floatval($custom_price) : 0;
                            ?>
                            <div class="single-product" data-single-product-id="<?php echo get_the_ID(); ?>">
                                <div class="product-information">
                                    <div class="product-img">
                                        <?php echo $productImage; ?>
                                    </div>
                                    <div class="product-name">
                                        <span class="product-name"><?php echo $productName ?></span>
                                        <p class="product-description"><?php echo $productDescription; ?> </p>
                                        <div style="display: inline-block;text-align: right;">
                                            <?php
                                            $variations = $product->get_available_variations();
                                            foreach ($variations as $variation) {
                                                $variation_id = $variation['variation_id'];
                                                $custom_price = get_post_meta($variation_id, '_custom_price', true);
                                                $productPrice = $custom_price ? custom_floatval($custom_price) : '0,00';
                                                $product_variation = new WC_Product_Variation($variation_id);
                                                $variationName = $product_variation->get_attribute('Formato');
                                                ?>
                                                <div data-product-variation-name="<?php echo $variationName; ?>" data-product-variation-id-price="<?php echo $variation_id; ?>" class="variation-pricing" style="display: none;">
                                                    <div class="pricing"><?php echo $productPrice; ?>€</div>
                                                </div>
                                                <?php
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-quantity">
                                    <button data-product-id="<?php echo get_the_ID(); ?>" class="remove-quantity-btn"></button>
                                    <span class="current-quantity"></span>
                                    <button data-product-id="<?php echo get_the_ID(); ?>" class="add-quantity-btn"></button>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Step 6 -->
    <div class="uagb-container-inner-blocks-wrap ast-container">
        <div class="steps step6">
            <h2>Elige la fecha de entrega en la que quieres recibir tu pedido</h2>
            <div class="warning-box">
                <div class="warning-icon">⚠️</div>
                <div class="warning-message-content">
                    <p><strong>SI ESCOGES LA OPCIÓN DE ENVÍO A DOMICILIO TEN EN</strong></p>
                    <p><strong>⚠️ NUESTRO PRODUCTO ES CONGELADO.</p>
                    <p><strong>⌚ EL HORARIO DE ENTREGA ES DE 9 A 14h, NO MODIFICABLE.</p>
                    <p><strong>📅 NO ESCOJAS UN DIA FESTIVO EN TU LOCALIDAD.</strong></p>
                    <p><strong>📅 NO ESCOJAS UN DIA FESTIVO EN TU LOCALIDAD.</strong></p>
                    <p><strong>🚚 ASEGURATE DE PODER RECOGER EL ENVÍO EN LA FECHA Y LUGAR INDICADO.</strong>
                        <br/>Para más información consulta nuestras condiciones de envío <a href="<?php echo esc_url(get_permalink(669)); ?>" target="_blank">aquí</a>
                    </p>
                </div>
                <div class="clear"></div>
            </div>
            <div id="datepicker"></div>
        </div>
    </div>

    <!-- Step 6 -->
    <div class="uagb-container-inner-blocks-wrap ast-container">
        <div class="steps step7">
            <h2>Un momento... Te estamos redirigiendo al carrito...</h2>
        </div>
    </div>

    <!-- Buttons wizard -->
    <div class="uagb-container-inner-blocks-wrap ast-container">
        <div class="buttons-wizard">
            <div class="btn-calculadora button backBtn">Volver atrás</div>
            <div class="btn-calculadora button continueBtn disabled">Siguiente</div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
