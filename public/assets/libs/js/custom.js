$('.inputMoney').maskMoney({ thousands: '.', decimal: ',' });


$('.datepicker').datetimepicker({
    format: 'DD-MM-YYYY',
    defaultDate: moment().format('YYYY-MM-DD'),
    useCurrent: true,
    icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
    },
    ignoreReadonly: true
})

$('.timepicker').datetimepicker({
    format: 'LT',
    icons: {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down",
        previous: 'fa fa-chevron-left',
        next: 'fa fa-chevron-right',
    },
})



$(".inputCep").change(function(){
    let attr = $(this).attr('customCep');
    let cep_code = $(this).val()
    if( cep_code.length <= 0 ) return
    $.get("https://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
        function(result){
            if( result.status!=1 ){
                alert(result.message || "Houve um erro desconhecido");
                return;
            }



// For some browsers, `attr` is undefined; for others, `attr` is false. Check for both.
            if (typeof attr !== typeof undefined && attr !== false) {

                $("input#state-" + attr).val( result.state )
                $("input#city-" + attr).val( result.city )
                $("input#neighborhood-" + attr).val( result.district )
                $("input#address-" + attr).val( result.address )

            } else {

                $("input#state").val( result.state )
                $("input#city").val( result.city )
                $("input#neighborhood").val( result.district )
                $("input#address").val( result.address )

            }


        });
});

$('.inputCep').mask('00000-000');



$("#cpfcnpj").keydown(function(){
    try {
        $("#cpfcnpj").unmask();
    } catch (e) {}

    var tamanho = $("#cpfcnpj").val().length;

    if(tamanho < 11){
        $("#cpfcnpj").mask("999.999.999-99");
    } else {
        $("#cpfcnpj").mask("99.999.999/9999-99");
    }

    // ajustando foco
    var elem = this;
    setTimeout(function(){
        // mudo a posição do seletor
        elem.selectionStart = elem.selectionEnd = 10000;
    }, 0);
    // reaplico o valor para mudar o foco
    var currentValue = $(this).val();
    $(this).val('');
    $(this).val(currentValue);
});


