// noinspection JSJQueryEfficiency

class Animal {

    constructor(
        name,
        type,
        race,
        ageInMonth,
        weightInGrams,
        gender,
        isNeutered,
        physicalState,
        physicalActivity,
        diseases
    ) {
        this.name = name;
        this.type = type;
        this.race = race;
        this.ageInMonth = ageInMonth;
        this.weightInGrams = weightInGrams;
        this.gender = gender;
        this.isNeutered = isNeutered;
        this.physicalState = physicalState;
        this.physicalActivity = physicalActivity;
        this.diseases = diseases;
    }
}

class Calculadora {

    constructor() {
        this.minSteps = 1;
        this.maxSteps = 6;
        this.currentStep = 1;
        this.animal = new Animal(
            '',
            'dog',
            '',
            3,
            500,
            'male',
            false,
            'normal',
            '',
            'Ninguna'
        );
        this.productsSelected = [];
        this.selectedDay = '';
        this.selectedMonth = '';
        this.selectedYear = '';
        this.packageSelected = 250;
        this.selectedPackage = false;
        this.monthlyQuantity = 0;
        this.dailyQuantity = 0;
        this.foodType = 'Crudo';
    }

    getDogPercentage(){
        if(this.animal.ageInMonth <= 84 && this.animal.ageInMonth > 12){ /// Adulto
            if(this.animal.physicalActivity === 'baja') return 2;
            if(this.animal.physicalActivity === 'media') return 2.5;
            if(this.animal.physicalActivity === 'alta') return 3;
            if(this.animal.physicalActivity === 'deportista') return 3.5;
        }

        if(this.animal.ageInMonth === 3 || this.animal.ageInMonth === 4) return 8;
        if(this.animal.ageInMonth === 5 || this.animal.ageInMonth === 6) return 6;
        if(this.animal.ageInMonth === 7 || this.animal.ageInMonth === 8) return 4;
        if(this.animal.ageInMonth === 9 || this.animal.ageInMonth === 10) return 3;
        if(this.animal.ageInMonth === 11 || this.animal.ageInMonth === 12) return 2;
        if(this.animal.ageInMonth > 84) return 2; /// Senior
    }

    getCatPercentage(){
        if(this.animal.ageInMonth <= 84 && this.animal.ageInMonth >= 12){ /// Adulto
            if(this.animal.physicalActivity === 'baja') return 3;
            if(this.animal.physicalActivity === 'media') return 4;
            if(this.animal.physicalActivity === 'alta') return 5;
        }

        if(this.animal.ageInMonth === 3 || this.animal.ageInMonth === 4) return 8;
        if(this.animal.ageInMonth === 5 || this.animal.ageInMonth === 6) return 6;
        if(this.animal.ageInMonth >= 7 || this.animal.ageInMonth <= 11) return 4;
        if(this.animal.ageInMonth > 84) return 2; /// Senior
    }

    getMonthlyQuantity(){
        let percentage;
        if(calculadora.animal.type === 'dog'){
            percentage = this.getDogPercentage();
        } else {
            percentage = this.getCatPercentage();
        }

        this.dailyQuantity = this.roundToTwo(this.animal.weightInGrams * (percentage / 100));
        this.monthlyQuantity =  this.dailyQuantity * 30;

        return parseInt(this.monthlyQuantity);
    }

    getDailyQuantity(){
        return parseInt(this.dailyQuantity);
    }

    roundToTwo(num) {
        return +(Math.round(num + "e+2")  + "e-2");
    }

    getRecommendedPackageSize(){
        if(this.monthlyQuantity <= 5000){
            return 250;
        } else if(this.monthlyQuantity > 5000 && this.monthlyQuantity <= 18000) {
            return 500;
        }
        return 1000;
    }

    addProduct(
        id,
        name,
        weight,
        price,
        src,
    ){
        const margin = this.getMonthlyQuantity() * 0.20;

        if (weight + this.getCurrentWeightInGrams() > this.getMonthlyQuantity() + margin) {
            return false;
        }

        this.productsSelected.push({
            'id': id,
            'name': name,
            'weight': weight,
            'price': price,
            'image': src,
        })
        return true;
    }

    removeProduct(id){

        let index = -1;

        for(let i = 0; i< this.productsSelected.length; i++){
            if(this.productsSelected[i].id === id){
                index = i;
            }
        }

        if (index > -1) {
            this.productsSelected.splice(index, 1);
        }
    }

    getCurrentWeightInGrams(){
        let currentWeightInGrams = 0;
        for(let i = 0; i < this.productsSelected.length; i++){
            currentWeightInGrams = parseInt(this.productsSelected[i].weight) + currentWeightInGrams;
        }

        return currentWeightInGrams;
    }

    getCurrentAmount(){
        let totalAmount = 0;
        for(let i = 0; i < this.productsSelected.length; i++){
            totalAmount = parseFloat(this.productsSelected[i].price) + totalAmount;
        }

        return totalAmount;
    }
}

let calculadora = new Calculadora();

jQuery(document).ready(function($) {

    let tomorrow = new Date();
    let futureDay = new Date();
    futureDay.setDate(futureDay.getDate() + 2);

    let dayOfWeek = futureDay.getDay();

    if (dayOfWeek === 0 || dayOfWeek === 1) {
        tomorrow.setDate(futureDay.getDate() + (2 - dayOfWeek));
    }

    calculadora.selectedDay = tomorrow.getDate();
    calculadora.selectedMonth = tomorrow.getMonth() + 1;
    calculadora.selectedYear = tomorrow.getFullYear();

    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };

    $.datepicker.setDefaults($.datepicker.regional['es']);

    $( '#datepicker' ).datepicker({
        minDate: tomorrow,
        defaultDate: tomorrow,
        language: 'es',
        beforeShowDay: function(d) {
            let day = d.getDay();
            return [day !== 0 && day !== 1];
        },
        onSelect: function(dateText, inst) {
            console.log('dateText: '+dateText);
            console.log('inst: ');
            console.log(inst);
            console.log('Date Selected: '+$(this).val());
            calculadora.selectedDay = inst.selectedDay;
            calculadora.selectedMonth = inst.selectedMonth + 1;
            calculadora.selectedYear = inst.selectedYear;
            canGoToStep6();
        }
    });

    $('#datepicker').val($.datepicker.formatDate('dd/mm/yy', tomorrow));

});

jQuery(function(){

    jQuery( ".taiowcp-cart-close").on( "click", function(){
        const button = jQuery(".add-quantity-btn");
        button.removeClass("loading");
        button.find(".loader").hide();
        jQuery('#summary-calculator-sidebar').removeClass('model-summary-active');
    });

    jQuery( ".backBtn").on( "click", function(){
        backStep();
    });

    jQuery( ".continueBtn").on( "click", function(){
        goToNextStep();
    });

    jQuery( ".step").on( "click", function(){
        // goToStep(jQuery(this).html());
    });


    // STEP 1 - NAME
    jQuery( "input[name='name']").on( "keyup", function(){
        calculadora.animal.name = jQuery(this).val();
        canGoToStep2();
    });

    // STEP 1 - RACE
    jQuery( "input[list='race_dog']").on( "change", function(){
        if(calculadora.animal.type === 'dog') {
            calculadora.animal.race = jQuery(this).val();
            jQuery("select[name='race_cat'] option:first").prop('selected',true).trigger( "change" );
            canGoToStep2();
        }
    });

    jQuery( "input[list='race_cat']").on( "change", function(){
        if(calculadora.animal.type === 'cat') {
            calculadora.animal.race = jQuery(this).val();
            jQuery("select[name='race_dog'] option:first").prop('selected',true).trigger( "change" );
            canGoToStep2();
        }
    });

    // STEP 1 - TYPE
    jQuery( ".step1 .animal").on( "click", function(){
        jQuery( ".step1 .animal").removeClass('selected');
        jQuery(this).addClass('selected');
        calculadora.animal.type = jQuery(this).attr('data-animal');

        let images = jQuery( ".step3 .animal img");

        jQuery("#dog-products-crudo").addClass('hidden');
        jQuery("#dog-products-cocinado").addClass('hidden');
        jQuery("#cat-products-crudo").addClass('hidden');
        jQuery("#cat-products-cocinado").addClass('hidden');
        jQuery("#"+calculadora.animal.type+"-products-"+calculadora.foodType.toLowerCase()).removeClass('hidden');
        calculadora.productsSelected = [];
        recalculateCalculatorSummary();

        if(calculadora.animal.type === 'cat'){
            jQuery('#race_cat_animal_list').show();
            jQuery('#race_dog_animal_list').hide();
            for(let i = 0; i<images.length; i++){
                images[i].src = images[i].src.replace('gato', 'gato');
                images[i].src = images[i].src.replace('perro', 'gato');
            }

            jQuery('#activity_dog_animal_list').hide();
            jQuery('#activity_cat_animal_list').show();
            jQuery('#cat-products').show();
            jQuery('#dog-products').hide();

        } else {
            jQuery('#race_dog_animal_list').show();
            jQuery('#race_cat_animal_list').hide();
            for(let i = 0; i<images.length; i++){
                images[i].src = images[i].src.replace('gato', 'perro');
                images[i].src = images[i].src.replace('perro', 'perro');
            }

            jQuery('#activity_cat_animal_list').hide();
            jQuery('#activity_dog_animal_list').show();
            jQuery('#dog-products').show();
            jQuery('#cat-products').hide();
        }

        calculadora.animal.race = '';
        canGoToStep2();
    });


    // STEP 2 - AGE
    jQuery( "select[name='age']").on( "change", function(){
        calculadora.animal.ageInMonth = parseInt(jQuery( "select[name='age'] option:selected").val());
        canGoToStep3();
    });

    // STEP 2 - WEIGHT
    jQuery( "select[name='weight']").on( "change", function(){
        calculadora.animal.weightInGrams = parseInt(jQuery( "select[name='weight'] option:selected").val());
        canGoToStep3();
    });

    // STEP 2 - NEUTERED
    jQuery( "input[name='neutered']").on( "click", function(){
        calculadora.animal.isNeutered = jQuery( "input[name='neutered']").is(":checked");
        canGoToStep3();
    });

    // STEP 2 - GENDER
    jQuery( ".step2 .animal").on( "click", function(){
        jQuery( ".step2 .animal").removeClass('selected');
        jQuery(this).addClass('selected');
        calculadora.animal.gender = jQuery(this).attr('data-animal-gender');

        if(calculadora.animal.gender === 'macho'){
            let machoImageUrl = jQuery('#macho-icon').attr("src");
            let hembraImageUrl = jQuery('#hembra-icon').attr("src");
            machoImageUrl = machoImageUrl.replace('black', 'white');
            machoImageUrl = machoImageUrl.replace('white', 'white');
            hembraImageUrl = hembraImageUrl.replace('black', 'black');
            hembraImageUrl = hembraImageUrl.replace('white', 'black');

            jQuery('#macho-icon').attr("src", machoImageUrl);
            jQuery('#hembra-icon').attr("src", hembraImageUrl);
        } else if(calculadora.animal.gender === 'hembra'){
            let machoImageUrl = jQuery('#macho-icon').attr("src");
            let hembraImageUrl = jQuery('#hembra-icon').attr("src");
            machoImageUrl = machoImageUrl.replace('black', 'black');
            machoImageUrl = machoImageUrl.replace('white', 'black');
            hembraImageUrl = hembraImageUrl.replace('black', 'white');
            hembraImageUrl = hembraImageUrl.replace('white', 'white');

            jQuery('#macho-icon').attr("src", machoImageUrl);
            jQuery('#hembra-icon').attr("src", hembraImageUrl);
        }

        jQuery(this).addClass('selected');

        canGoToStep4();
    });

    // STEP 2 - CASTRADO
    jQuery( "input[name='castrado']").on( "click", function(){
        calculadora.animal.isNeutered = jQuery(this).is(":checked")
        canGoToStep3();
    });

    // STEP 3 - ESTADO FISICO
    jQuery( ".step3 .animal").on( "click", function(){
        jQuery( ".step3 .animal").removeClass('selected');
        jQuery(this).addClass('selected');
        calculadora.animal.physicalState = jQuery(this).attr('data-physical-state');
        canGoToStep4();
    });

    // STEP 3 - ACTIVIDAD FISICA - PERRO
    jQuery( "select[name='activity_dog']").on( "change", function(){
        calculadora.animal.physicalActivity = jQuery( "select[name='activity_dog'] option:selected").val();
        canGoToStep4();
    });

    jQuery( "select[name='activity_cat']").on( "change", function(){
        calculadora.animal.physicalActivity = jQuery( "select[name='activity_cat'] option:selected").val();
        canGoToStep4();
    });

    // STEP 3 - ACTIVIDAD FISICA - GATO
    jQuery( "select[name='activity_cat']").on( "change", function(){
        calculadora.animal.physicalActivity = jQuery( "select[name='activity_cat'] option:selected").val();
        canGoToStep4();
    });

    // STEP 3 - ALERGIAS / INTOLERANCIAS
    jQuery( "select[name='animal_diseases']").on( "change", function(){
        calculadora.animal.diseases = jQuery( "select[name='animal_diseases'] option:selected").val();
        canGoToStep4();
    });


    // STEP 4 - PACKAGE
    jQuery( ".single-package").on( "click", function(){
        calculadora.packageSelected = parseInt(jQuery(this).attr('data-package-size'));
        calculadora.selectedPackage = true;
        jQuery('.single-package').removeClass('selected');
        jQuery(this).addClass('selected');
        canGoToStep5();
    });

    // STEP 5 - CHOOSE PRODUCT
    jQuery( ".single-product").on( "click", function(e){
        e.stopPropagation();

        const button = jQuery(this).find(".add-quantity-btn");
        button.addClass("loading");
        const productId = jQuery(this).find(".add-quantity-btn").data("product-id");

        button.addClass("loading");
        button.find(".loader").show();

        updateAddToCartButton(calculadora.packageSelected, productId)
            .then(() => {
                button.removeClass("loading");
                canGoToStep6();
            })
            .catch(() => {
                button.removeClass("loading");
                showToast("Error al añadir el producto", 5000);
                canGoToStep6();
            });
    });

    jQuery( "#summary-calculator-btn").on( "click", function(){
        jQuery('#summary-calculator-sidebar').toggleClass('model-summary-active');
    });

    jQuery( "body").on( "click", function(event){
        if(
            jQuery(event.target).closest('#summary-calculator-btn, #summary-calculator-sidebar, .add-quantity-btn, .remove-icon').length
        ){
            return;
        }

        if(jQuery('#summary-calculator-sidebar').hasClass('model-summary-active')){
            jQuery('#summary-calculator-sidebar').removeClass('model-summary-active');
            const button = jQuery(".add-quantity-btn");
            button.removeClass("loading");
            button.find(".loader").hide();
        }
    });

    jQuery( "body").on( "click", 'span.remove-icon', function(){
        calculadora.removeProduct(jQuery(this).attr('data-product-id'));
        recalculateCalculatorSummary();
    });

    // STEP 6

    jQuery( ".step5 .food").on( "click", function(){
        jQuery( ".step5 .food").removeClass('selected');
        jQuery(this).addClass('selected');
        calculadora.foodType = jQuery(this).attr('data-food');

        jQuery("#dog-products-crudo").addClass('hidden');
        jQuery("#dog-products-cocinado").addClass('hidden');
        jQuery("#cat-products-crudo").addClass('hidden');
        jQuery("#cat-products-cocinado").addClass('hidden');
        jQuery("#"+calculadora.animal.type+"-products-"+calculadora.foodType.toLowerCase()).removeClass('hidden');
        calculadora.productsSelected = [];
        recalculateCalculatorSummary();

        canGoToStep6();
    });
});

function updateAddToCartButton(packageSize, productId) {
    console.log({
        action: "get_variation_by_package_size",
        package_size: packageSize,
        product_id: productId,
    });

    return new Promise((resolve, reject) => {
        jQuery.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: {
                action: "get_variation_by_package_size",
                package_size: packageSize,
                product_id: productId,
            },
            success: function (response) {
                if (response.success) {
                    const variation = response.data;

                    let result = calculadora.addProduct(
                        variation.variation_id,
                        variation.name,
                        variation.weight,
                        variation.price,
                        variation.image,
                    );

                    if(!result){
                        reject();
                        return;
                    }

                    if(!jQuery('#summary-calculator-sidebar').hasClass('model-summary-active')){
                        jQuery('#summary-calculator-sidebar').addClass('model-summary-active');
                    }

                    recalculateCalculatorSummary();
                    resolve();

                } else {
                    console.log(response);
                    console.log("No se encontró la variación.");
                    reject();
                }
            },
            error: function (error) {
                console.log("Error en la solicitud AJAX:", error);
                reject();
            },
        });
    });
}

function showToast(message, duration = 3000) {
    const toast = jQuery('<div class="toast"></div>').text(message);

    jQuery('body').append(toast);

    setTimeout(() => {
        toast.addClass('show');
    }, 100); // Delay breve para activar la animación

    setTimeout(() => {
        toast.removeClass('show');
        setTimeout(() => {
            toast.remove(); // Eliminar el toast del DOM
        }, 300); // Asegurar que la animación termine antes de eliminarlo
    }, duration);
}

function recalculateCalculatorSummary(){
    jQuery('.summary_calculator_item').empty();

    if(calculadora.productsSelected.length === 0){
        jQuery('.summary_calculator_item').append('<div class="no-items">Sin platos</div>');
    }

    for(let i = 0; i<calculadora.productsSelected.length; i++){
        let productHtml = `
            <div class="item-product-wrap">
                <div class="product-details">
                    <div class="product-image"><img src="`+calculadora.productsSelected[i].image+`" alt="`+calculadora.productsSelected[i].name+`"/></div>
                    <div class="product-name">`+calculadora.productsSelected[i].name+`</div>
                    <span class="remove-icon" aria-label="Remove this item" data-product-id="`+calculadora.productsSelected[i].id+`">
                        <svg viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" alt="" title=""
                             class="snipcart__icon">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M22 4v6.47H12v3.236h40V10.47H42V4H22zm3.333 6.47V7.235H38.67v3.235H25.333zm20.001 9.707h3.333V59H15.334V20.177h3.333v35.588h26.667V20.177zm-15 29.116V23.412h3.334v25.881h-3.334z"
                                  fill="currentColor"></path>
                        </svg>
                    </span>
                </div>
                <div class="item-product-quantity">
                    <span class="quantity">
                        <span class="quantity-text">Cantidad: 
                            <span class="product-quantity-weight">`+calculadora.productsSelected[i].weight+`g</span>
                        </span>
                        <span class="product-amount">`+calculadora.productsSelected[i].price+`€</span>
                    </span>
                </div>
            </div>
            `;
        jQuery('.summary_calculator_item').append(productHtml);
    }


    calculadora.getCurrentWeightInGrams();
    calculadora.getCurrentAmount();

    jQuery('div.summary-calculator-model-footer span.summary-calculator-value').text(calculadora.getCurrentWeightInGrams() + 'gr');
    jQuery('div.summary-calculator-model-footer span.woocommerce-Price-amount.amount').text(calculadora.getCurrentAmount() + '€');
}

function goToNextStep(){

    if(
        calculadora.currentStep === 1 && canGoToStep2() ||
        calculadora.currentStep === 2 && canGoToStep3() ||
        calculadora.currentStep === 3 && canGoToStep4() ||
        calculadora.currentStep === 4 && canGoToStep5() ||
        calculadora.currentStep === 5 && canGoToStep6()
    ){
          if(calculadora.currentStep <= calculadora.maxSteps){

            calculadora.currentStep++;

            jQuery('.steps').hide();
            jQuery('.step'+calculadora.currentStep).show();

            jQuery('.continueBtn').show();

            if(calculadora.currentStep === calculadora.minSteps){
                jQuery('.backBtn').hide();
            }

            if(calculadora.currentStep === calculadora.maxSteps){
                jQuery('.continueBtn').hide();
            }

            jQuery('.continueBtn').addClass('disabled');
            jQuery('#currentStep').text(calculadora.currentStep);

            goToStep(calculadora.currentStep.toString());

            if(calculadora.currentStep > calculadora.minSteps){
                jQuery('.backBtn').css('display', 'inline-flex');
            }

            calculateWeight();
        }
    }
}

function backStep(){

    if(calculadora.currentStep > calculadora.minSteps){

        calculadora.currentStep--;

        jQuery('.steps').hide();
        jQuery('.step'+calculadora.currentStep).show();

        jQuery('.continueBtn').show();

        if(calculadora.currentStep === calculadora.minSteps){
            jQuery('.backBtn').hide();
        }

        if(calculadora.currentStep === calculadora.maxSteps){
            jQuery('.continueBtn').hide();
        }

        jQuery('.continueBtn').addClass('disabled');

        console.log('calculadora.currentStep: '+calculadora.currentStep);
        if(calculadora.currentStep === 1) canGoToStep2();
        if(calculadora.currentStep === 2) canGoToStep3();
        if(calculadora.currentStep === 3) canGoToStep4();
        if(calculadora.currentStep === 4) canGoToStep5();
        if(calculadora.currentStep === 5) canGoToStep6();

        if( calculadora.currentStep === 5){
            jQuery('#summary-calculator-btn').show();
        } else {
            jQuery('#summary-calculator-btn').hide();
        }

        if(calculadora.currentStep === calculadora.minSteps){
            jQuery('.backBtn').css('display', 'none');
        }
    }
}

function canGoToStep2(){

    if(calculadora.animal.type !== '' && calculadora.animal.race !== '' && calculadora.animal.race !== '0' && calculadora.animal.name !== ''){
        enableMoveForwardBtn();

        if(calculadora.animal.type === 'cat'){
            jQuery('#age_dog_animal_list').hide();
            jQuery('#age_cat_animal_list').show();
        } else if(calculadora.animal.type === 'dog'){
            jQuery('#age_dog_animal_list').show();
            jQuery('#age_cat_animal_list').hide();
        }

        return true;
    }

    disableMoveFordwardBtn();
    return false;
}

function canGoToStep3(){

    if(calculadora.animal.ageInMonth !== '' && calculadora.animal.gender !== ''){
        enableMoveForwardBtn();

        if(calculadora.animal.type === 'cat'){
            jQuery('#activity_dog_animal_list').hide();
            jQuery('#activity_cat_animal_list').show();
        } else if(calculadora.animal.type === 'dog'){
            jQuery('#activity_dog_animal_list').show();
            jQuery('#activity_cat_animal_list').hide();
        }

        return true;
    }

    disableMoveFordwardBtn();
    return false;
}

function canGoToStep4(){

    if(calculadora.animal.physicalState !== '0' && calculadora.animal.physicalActivity !== '' && calculadora.animal.diseases !==''){
        enableMoveForwardBtn();
        return true;
    }

    disableMoveFordwardBtn();
    return false;
}

function canGoToStep5(){
    if(
        calculadora.packageSelected === 250 ||
        calculadora.packageSelected === 500 ||
        calculadora.packageSelected === 1000
    ){
        jQuery('div.summary-calculator-model-footer span.summary-calculator-month-value').text(calculadora.getMonthlyQuantity() + 'gr');
        enableMoveForwardBtn();
        return true;
    }

    disableMoveFordwardBtn();
    return false;
}

function canGoToStep6() {
    const margin = calculadora.getMonthlyQuantity() * 0.20;
    const maxAllowedWeight = Number(calculadora.getMonthlyQuantity()) + margin;
    const currentWeight = calculadora.getCurrentWeightInGrams();

    if (
        calculadora.productsSelected.length > 0 &&
        currentWeight + margin >= calculadora.getMonthlyQuantity() &&
        currentWeight <= maxAllowedWeight
    ) {
        enableMoveForwardBtn();
        return true;
    }

    disableMoveFordwardBtn();
    return false;
}


function canGoToStep7(){
    if(calculadora.selectedDay !== '' && calculadora.selectedMonth !== '' && calculadora.selectedYear !== ''){
        enableMoveForwardBtn();
        return true;
    }
    disableMoveFordwardBtn();
    return false;
}

function enableMoveForwardBtn(){
    jQuery('.continueBtn').removeClass('disabled');
}

function disableMoveFordwardBtn(){
    jQuery('.continueBtn').addClass('disabled');
}

function goToStep(numStep){

    clearCalculatorErrors();
    let canNavigate;

    if( calculadora.currentStep === 5){
        jQuery('#summary-calculator-btn').show();
    } else {
        jQuery('#summary-calculator-btn').hide();
    }

    switch (numStep) {
        case '1':
            canNavigate = true;
            break;
        case '2':
            canNavigate = canGoToStep2();
            break;
        case '3':
            canNavigate = canGoToStep2() && canGoToStep3();
            break;
        case '4':
            canNavigate = canGoToStep2() && canGoToStep3() && canGoToStep4();
            break;
        case '5':
            canNavigate = canGoToStep2() && canGoToStep3() && canGoToStep4() && canGoToStep5();
            break;
        case '6':
            canNavigate = canGoToStep2() && canGoToStep3() && canGoToStep4() && canGoToStep5() && canGoToStep6();
            break;
        case '7':
            canNavigate = canGoToStep2() && canGoToStep3() && canGoToStep4() && canGoToStep5() && canGoToStep6() && canGoToStep7();
            break;
        default:
            canNavigate = false;
            break;
    }

    console.log('Can Navigate? '+canNavigate);

    if(!canNavigate){
        switch (calculadora.currentStep) {
            case 1:
                showCalculatorErrorsStep1();
                break;
            case 2:
                showCalculatorErrorsStep2();
                break;
            case 3:
                showCalculatorErrorsStep3();
                break;
            case 4:
                showCalculatorErrorsStep4();
                break;
            case 5:
                showCalculatorErrorsStep5();
                break;
            default:
                canNavigate = false;
                break;
        }
    }

    if(canNavigate) {

        calculadora.currentStep = parseInt(numStep);

        if(calculadora.currentStep === 1) canGoToStep2();
        if(calculadora.currentStep === 2) canGoToStep3();
        if(calculadora.currentStep === 3) canGoToStep4();
        if(calculadora.currentStep === 4) canGoToStep5();
        if(calculadora.currentStep === 5) canGoToStep6();
        if(calculadora.currentStep === 6) canGoToStep7();

        jQuery('.steps').hide();
        jQuery('.step').removeClass('active');
        jQuery('.numStep' + numStep).addClass('active');
        jQuery('.step' + numStep).fadeIn();

        if(numStep === '1'){
            jQuery('.backBtn').hide();
        }

        calculateWeight();
        calculateRecommendedPackage();

        if(numStep === '7'){
            console.log(calculadora);
            jQuery.ajax({
                url: ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'process_subscription',
                    calculadora: calculadora,
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = response.data.redirect_url;
                    } else {
                        console.log(response);
                        console.log('Error al agregar la suscripción al carrito.');
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    }
}

function clearCalculatorErrors(){
    jQuery('.input-text').removeClass('input-calculator-error-msg');
    jQuery('.calculator-error-msg').hide();
}

function showCalculatorErrorsStep1(){
    if(calculadora.animal.race === '' || calculadora.animal.race === '0') {
        jQuery("input[list='race_"+calculadora.animal.type+"']").addClass('input-calculator-error-msg');
        jQuery('#animal-race-'+calculadora.animal.type+'-error-msg').show();
    }

    if (calculadora.animal.name === '') {
        jQuery('#animal-name').addClass('input-calculator-error-msg');
        jQuery('#animal-name-error-msg').show();
    }
}

function showCalculatorErrorsStep2(){
    if (calculadora.animal.ageInMonth === '') {
        jQuery('#age_in_month').addClass('input-calculator-error-msg');
        jQuery('#age-in-month-error-msg').show();
    }

    if (calculadora.animal.weightInGrams === '') {
        jQuery('#weight').addClass('input-calculator-error-msg');
        jQuery('#weight-error-msg').show();
    }
}

function showCalculatorErrorsStep3(){
    if (calculadora.animal.physicalActivity === '0' || calculadora.animal.physicalActivity === '') {
        jQuery('#activity_'+calculadora.animal.type).addClass('input-calculator-error-msg');
        jQuery('#activity-'+calculadora.animal.type+'-error-msg').show();
    }

    if (calculadora.animal.diseases === '') {
        jQuery('#animal_diseases').addClass('input-calculator-error-msg');
        jQuery('#animal-diseases-error-msg').show();
    }
}

function showCalculatorErrorsStep4(){

}

function showCalculatorErrorsStep5(){

}

function calculateWeight(){
    if(calculadora.currentStep === 4){
        jQuery('#final-animal-name').text(calculadora.animal.name);
        jQuery('#weight-quantity').text(calculadora.getMonthlyQuantity() / 1000);
        jQuery('#diary-weight-quantity').text(calculadora.getDailyQuantity());
    }
}

function calculateRecommendedPackage(){

    calculadora.productsSelected = [];
    recalculateCalculatorSummary();

    if(calculadora.currentStep === 4 && !calculadora.selectedPackage){
        let recommendedSize = calculadora.getRecommendedPackageSize();
        calculadora.packageSelected = recommendedSize;

        jQuery('.single-package').removeClass('selected');

        jQuery('.single-package').each(function() {
            if (parseInt(jQuery(this).data('package-size')) === recommendedSize) {
                jQuery(this).addClass('selected');
            }
        });

        if(recommendedSize === 250){
            jQuery('.recommended-package').html('250gr');
        } else if(recommendedSize === 500){
            jQuery('.recommended-package').html('500gr');
        } else {
            jQuery('.recommended-package').html('1kg');
        }
    }
}