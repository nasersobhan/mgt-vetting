/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });



$('[name=passportNumberOption]').on('change',function(){
    var passportVal = $(this).val();
    if(passportVal == 'need'){
        $('#passportNumber').val('Need').addClass('d-none')
    }else if(passportVal == 'na'){
        $('#passportNumber').val('Not Applicable').addClass('d-none')
    }else {
        $('#passportNumber').val('').removeClass('d-none')
    }
});

$('[name=tazkira]').on('change',function(){
    var passportVal = $(this).val();
    if(passportVal == 'need'){
        $('#tazkiraNumber').val('Need').addClass('d-none')
    }else if(passportVal == 'na'){
        $('#tazkiraNumber').val('Not Applicable').addClass('d-none')
    }else {
        $('#tazkiraNumber').val('').removeClass('d-none')
    }
})


$('#covid19VaccineDateOption').on('change',function(){
    var passportVal = $(this).is(":checked")
    if(passportVal){
        $('#covid19VaccineDate').val('').removeClass('d-none').removeAttr('disabled').attr('required')
    }else {
        $('#covid19VaccineDate').val('').addClass('d-none').attr('disabled').removeAttr('required')
    }
})

$('#interviewDateOption').on('change',function(){
    var passportVal = $(this).is(":checked")
    if(passportVal){
        $('#interviewDate').val('').removeClass('d-none').removeAttr('disabled').attr('required')
    }else {
        $('#interviewDate').val('').addClass('d-none').attr('disabled').removeAttr('required')
    }
})


$('#uaeBiometricDateOption').on('change',function(){
    var passportVal = $(this).is(":checked")
    if(passportVal){
        $('#uaeBiometricDate').val('').removeClass('d-none').removeAttr('disabled').attr('required')
    }else {
        $('#uaeBiometricDate').val('').addClass('d-none').attr('disabled').removeAttr('required')
    }
})

$('#leaveDateOption').on('change',function(){
    var passportVal = $(this).is(":checked")
    if(passportVal){
        $('#leaveDate').val('').removeClass('d-none').removeAttr('disabled').attr('required')
    }else {
        $('#leaveDate').val('').addClass('d-none').attr('disabled').removeAttr('required')
    }
})