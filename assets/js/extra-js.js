jQuery(function(){

    var sendnotif = "Yes";
    var updateArray = new Array();
    var inp = false;
    var con = false;
    var sv = false;

    // $('#searchable').load('pages/ajax/data_list.php')
    // $('#encoding-modal-form').modal('show')

    $('#flexRadioDefault1').change(function(){
        sendnotif = $(this).val()
    })
 
    $('#flexRadioDefault2').change(function(){
        sendnotif = $(this).val()
    })

    $('#flexRadioDefault3').change(function(){
        sendnotif = $(this).val()
    })


    // Hover hide and show function
    $('.table-row').hover(function(){
        var id = $(this).data("id")
        if($('.x-'+ id +':hover').length != 0 && con == false){
            // console.log($('.x-'+ id).find('td:nth-child(1)').text())
            $('#btn-edit-'+id).prop('hidden', false)
            $('#btn-del-'+id).prop('hidden', false)
            $('#btn-edit-'+id).css('margin-left', '15px')
            
        } else {
            $('#btn-edit-'+id).prop('hidden', true)
            $('#btn-del-'+id).prop('hidden', true)
        }

        // Edit button
        $('#btn-edit-'+id).click(function(){
            con = true;
            sv = false;
            $('#btn-edit-'+id).prop('hidden', true)
            $('#btn-del-'+id).prop('hidden', true)

            // $('#btn-sv-'+id).css('margin-left', '15px')
            $('#btn-sv-'+id).prop('hidden', false)
            $('#btn-cl-'+id).prop('hidden', false)
        
            if(inp == false){
        
                $('.x-'+id).find('.editableColumn').each(function(){
                    var html = $(this).html();
                    var input = $('<input class="form-control editableInput" id="editableInput" type="text" />');
                    input.val(html)
                    
                    $(this).html(input);
                })
            }
            inp = true;
            $('.x-'+id).find('span.editableColumn > input.editableInput').css('width', '50px').attr({'type':'number', 'min':'0', 'max':'5'})
            $('.x-'+id).find('td:nth-child(1).editableColumn > input.editableInput').css('width', '60px')
            $('.x-'+id).find('td:nth-child(2).editableColumn > input.editableInput').css('width', '60px').attr({'type':'number', 'min':'0'})
            $('.x-'+id).find('td:nth-child(3).editableColumn > input.editableInput').css('width', '60px').attr({'type':'number', 'min':'0'})
            $('.x-'+id).find('td:nth-child(4).editableColumn > input.editableInput').css('width', '50px').attr({'type':'number', 'min':'0', 'max':'20'})
            $('.x-'+id).find('td:nth-child(5).editableColumn > input.editableInput').css('width', '150px').attr('type','date')
            $('.x-'+id).find('td:nth-child(6).editableColumn > input.editableInput').css('width', '60px')
            $('.x-'+id).find('td:nth-child(7).editableColumn > input.editableInput').css('width', '55px')
            $('.x-'+id).find('td:nth-child(8).editableColumn > input.editableInput').css('width', '55px')
            $('.x-'+id).find('td:nth-child(9).editableColumn > input.editableInput').css('width', '60px')
        })


        // Delete Button
        $('#btn-del-'+id).click(function(){
            $.ajax({
                url: 'pages/ajax/del_data.php',
                type: 'POST',
                data: {id: id},
                success: function(data){
                    console.log(data)
                    if(data == 'success'){
                        window.document.location = '?menu=main';
                    } else {    

                    }
                }
            })
        })
        

        //save edit button
        $('#btn-sv-'+id).click(function(){
            con = false;
            inp = false;
            $('#btn-edit-'+id).prop('hidden', false)
            $('#btn-del-'+id).prop('hidden', false)

            $('#btn-sv-'+id).prop('hidden', true)
            $('#btn-cl-'+id).prop('hidden', true)

            if(sv == false){
    
                $('.x-'+id).find('.editableColumn').each(function(){
                    $(this).html($('.editableInput').val())
                })

                $('.x-'+id).find('td').each(function(){
                    updateArray.push($(this).text())
                })
            
                $.ajax({
                    url: 'pages/ajax/update_data.php',
                    type: 'POST',
                    data: {
                        ID: id,
                        data: updateArray,
                        user: $('.page-title').data("user")
                    },
                    success: function(data){
                        console.log(data)
                        if(data == "updated"){
                            $('#encoding-modal-form').modal('show')
                        }
                        updateArray = new Array()
                    }
                })
            }
            sv = true;
        })

        // cancel edit buttonw
        $('#btn-cl-'+id).click(function(){
            con = false;
            inp = false;
            sv = false;
            $('#btn-edit-'+id).prop('hidden', false)
            $('#btn-del-'+id).prop('hidden', false)

            $('#btn-sv-'+id).prop('hidden', true)
            $('#btn-cl-'+id).prop('hidden', true)

            $('.x-'+id).find('.editableColumn').each(function(){
                $(this).html($('#editableInput').val())
            })
        })
    })


    // Add Button for Summary Report
    $('#submit').click(function(){
        if($('#current-water-level').val() == '') {
            
            $('#current-water-level').addClass('is-invalid')

        } else if ($('#spilling-level').val() == '') {

            $('#current-water-level').removeClass('is-invalid')
            $('#spilling-level').addClass('is-invalid')

        } else if ($('#date-visit').val() == '') {

            $('#date-visit').addClass('is-invalid')
            $('#spilling-level').removeClass('is-invalid')
            $('#current-water-level').removeClass('is-invalid')

        } else if ($('#no-gate-open').val() == '') {

            $('#no-gate-open').addClass('is-invalid')
            $('#date-visit').removeClass('is-invalid')
            $('#spilling-level').removeClass('is-invalid')
            $('#current-water-level').removeClass('is-invalid')

        } else if ($('#date-opened').val() == '') {

            $('#date-opened').addClass('is-invalid')
            $('#no-gate-open').removeClass('is-invalid')
            $('#date-visit').removeClass('is-invalid')
            $('#spilling-level').removeClass('is-invalid')
            $('#current-water-level').removeClass('is-invalid')

        } else if ($('#time-opened-hr').val() == '') {

            $('#time-opened-hr').addClass('is-invalid')
            $('#date-opened').removeClass('is-invalid')
            $('#no-gate-open').removeClass('is-invalid')
            $('#date-visit').removeClass('is-invalid')
            $('#spilling-level').removeClass('is-invalid')
            $('#current-water-level').removeClass('is-invalid')

        } else if ($('#inflow').val() == '') {

            $('#inflow').addClass('is-invalid')
            $('#time-opened-hr').removeClass('is-invalid')
            $('#date-opened').removeClass('is-invalid')
            $('#no-gate-open').removeClass('is-invalid')
            $('#date-visit').removeClass('is-invalid')
            $('#spilling-level').removeClass('is-invalid')
            $('#current-water-level').removeClass('is-invalid')

        } else if ($('#outflow').val() == '') {

            $('#outflow').addClass('is-invalid')
            $('#inflow').removeClass('is-invalid')
            $('#time-opened-hr').removeClass('is-invalid')
            $('#date-opened').removeClass('is-invalid')
            $('#no-gate-open').removeClass('is-invalid')
            $('#date-visit').removeClass('is-invalid')
            $('#spilling-level').removeClass('is-invalid')
            $('#current-water-level').removeClass('is-invalid')

        } else if ($('#hrs-opened-hr').val() == '') {
            
            $('#hrs-opened-hr').addClass('is-invalid')
            $('#outflow').removeClass('is-invalid')
            $('#inflow').removeClass('is-invalid')
            $('#time-opened-hr').removeClass('is-invalid')
            $('#date-opened').removeClass('is-invalid')
            $('#no-gate-open').removeClass('is-invalid')
            $('#date-visit').removeClass('is-invalid')
            $('#spilling-level').removeClass('is-invalid')
            $('#current-water-level').removeClass('is-invalid')

        } else if ($('#areas-affected').val() == '') {

            $('#areas-affected').addClass('is-invalid')
            $('#hrs-opened-hr').removeClass('is-invalid')
            $('#outflow').removeClass('is-invalid')
            $('#inflow').removeClass('is-invalid')
            $('#time-opened-hr').removeClass('is-invalid')
            $('#date-opened').removeClass('is-invalid')
            $('#no-gate-open').removeClass('is-invalid')
            $('#date-visit').removeClass('is-invalid')
            $('#spilling-level').removeClass('is-invalid')
            $('#current-water-level').removeClass('is-invalid')

        } else if ($('#status-alert-warning').val() == '') {

            $('#status-alert-warning').addClass('is-invalid')
            $('#areas-affected').removeClass('is-invalid')
            $('#hrs-opened-hr').removeClass('is-invalid')
            $('#outflow').removeClass('is-invalid')
            $('#inflow').removeClass('is-invalid')
            $('#time-opened-hr').removeClass('is-invalid')
            $('#date-opened').removeClass('is-invalid')
            $('#no-gate-open').removeClass('is-invalid')
            $('#date-visit').removeClass('is-invalid')
            $('#spilling-level').removeClass('is-invalid')
            $('#current-water-level').removeClass('is-invalid')

        } else {
            
            $.ajax({
                url: 'pages/ajax/save_data.php',
                type: 'POST',
                data: {
                    Dam: $('#dam').val(),
                    CurrentWaterLevel: $('#current-water-level').val(),
                    SpillingLevel: $('#spilling-level').val(),
                    DateVisit: $('#date-visit').val(),
                    NoGateOpen: $('#no-gate-open').val(),
                    DateOpened: $('#date-opened').val(),
                    TimeOpened: ($('#time-opened-mm').val() == '') ? $('#time-opened-hr').val()+':00' : $('#time-opened-mm').val(),
                    Inflow: $('#inflow').val(),
                    InflowUnit: $('#inflow-unit').val(),
                    Outflow: $('#outflow').val(),
                    OutflowUnit: $('#outflow-unit').val(),
                    HrsOpened: ($('#hrs-opened-mm').val() == '') ? $('#hrs-opened-hr').val()+':00' : $('#hrs-opened-mm').val(),
                    AreasAffected: $('#areas-affected').val(),
                    StatusAlertWarning: $('#status-alert-warning').val(),
                    SendNotif: sendnotif,
                    CreatedBy: $('.page-title').data("user")
                },
                success: function(data){
                    if(data == 'success'){
                        console.log('sending..')
                        if(sendnotif == "email") {
                            sendEmail()
                        } else if (sendnotif == "sms") {
                            sendSMS()
                        } else {
                            sendEmail()
                            sendSMS()
                        }
                        clearInputs()
                        window.document.location = '?menu=main';
                        $('#modal-dialogue').modal('show');
                    } else {
                        console.log('not sent')
                        console.log(data)
                    }
                }
            })
        }
        
    })


    function sendEmail(){
        $.ajax({
            url: 'pages/mail.php',
            type: 'POST',
            data: {test: 'data'},
            success: function(data){
                console.log(data)
            }
        })
    }

    function sendSMS(){
        $.ajax({
            url: 'pages/sms.php',
            type: 'POST',
            data: {Dam: $('#dam').val()},
            success: function(data){
                console.log(data)
            }
        })
    }

    function clearInputs(){
        $('#status-alert-warning').val('')
        $('#areas-affected').val('')
        $('#hrs-opened-hr').val('')
        $('#hrs-opened-mm').val('')
        $('#outflow').val('')
        $('#inflow').val('')
        $('#time-opened-hr').val('')
        $('#time-opened-mm').val('')
        $('#date-opened').val('')
        $('#no-gate-open').val('')
        $('#date-visit').val('')
        $('#spilling-level').val('')
        $('#current-water-level').val('')
    }

});
