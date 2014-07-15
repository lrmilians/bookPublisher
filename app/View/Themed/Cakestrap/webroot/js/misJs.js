$(document).ready(function() {
    menuActions();

});

function menuActions() {
    $('.navigation li').hover(
            function() {
                $('.level1', this).fadeIn();
            },
            function() {
                $('.level1', this).fadeOut();
            }
    );
    $('.level1 li').hover(
            function() {
                $('.level2', this).fadeIn();
            },
            function() {
                $('.level2', this).fadeOut();
            }
    );
}


function sumValueBillBuy() {
    if ($("#BillsBaseCategory1").val().length !== 0) {
        var billBaseCategory1 = parseFloat($("#BillsBaseCategory1").val());
    } else {
        var billBaseCategory1 = 0;
    }
    if ($("#BillsBaseCategory3").val().length !== 0) {
        var billBaseCategory3 = parseFloat($("#BillsBaseCategory3").val());
    } else {
        var billBaseCategory3 = 0;
    }
    if ($("#BillsBaseCategory4").val().length !== 0) {
        var billBaseCategory4 = parseFloat($("#BillsBaseCategory4").val());
    } else {
        var billBaseCategory4 = 0;
    }
    if ($("#BillsBaseCategory5").val().length !== 0) {
        var billBaseCategory5 = parseFloat($("#BillsBaseCategory5").val());
    } else {
        var billBaseCategory5 = 0;
    }
    if ($("#BillsBaseCategory6").val().length !== 0) {
        var billBaseCategory6 = parseFloat($("#BillsBaseCategory6").val());
    } else {
        var billBaseCategory6 = 0;
    }
    if ($("#BillsBaseCategory7").val().length !== 0) {
        var billBaseCategory7 = parseFloat($("#BillsBaseCategory7").val());
    } else {
        var billBaseCategory7 = 0;
    }
    if ($("#BillRate12").val().length !== 0) {
        var billRate12 = parseFloat($("#BillRate12").val());
    } else {
        var billRate12 = 0;
    }
    var subtotal = (billBaseCategory1 + billBaseCategory3 + billBaseCategory4 + billBaseCategory5 + billBaseCategory6 + billBaseCategory7);
    var iva = (billRate12 * 12 / 100);
    var total = (subtotal + iva);
    $("#BillSubtotal").val(subtotal.toFixed(2));
    $("#BillIva").val(iva.toFixed(2));
    $("#BillTotal").val(total.toFixed(2));
}

function sumValueBillSale() {
    if ($("#BillsBaseCategory8").val().length !== 0) {
        var billBaseCategory8 = parseFloat($("#BillsBaseCategory8").val());
    } else {
        var billBaseCategory8 = 0;
    }
    if ($("#BillRate12").val().length !== 0) {
        var billRate12 = parseFloat($("#BillRate12").val());
    } else {
        var billRate12 = 0;
    }

    var subtotal = (billBaseCategory8);
    var iva = (billRate12 * 12 / 100);
    var total = (subtotal + iva);
    $("#BillSubtotal").val(subtotal.toFixed(2));
    $("#BillIva").val(iva.toFixed(2));
    $("#BillTotal").val(total.toFixed(2));
}

/*function numberBetween112(){
 if ((document.getElementById("ExpenditureStatementTimeWorked").value > 12) || (document.getElementById("ExpenditureStatementTimeWorked").value < 1)){
 document.getElementById("ExpenditureStatementTimeWorked").value = 1;
 alert('El tiempo trabajado debe comprender entre 1 y 12 meses.');
 }
 if ((document.getElementById("ExpenditureStatementTimeWorkedOther").value > 12) || (document.getElementById("ExpenditureStatementTimeWorkedOther").value < 0)){
 document.getElementById("ExpenditureStatementTimeWorkedOther").value = 0;
 alert('El tiempo trabajado debe comprender entre 0 y 12 meses.');
 }
 }*/

