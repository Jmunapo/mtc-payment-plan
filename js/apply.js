
        $(function () {
            $('.readTnC').on('click', function () {
                var color = $(this).data('color');
                $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
                $('#mdModal').modal('show');
            });

            $('#accept').on('click', function () {
                $('#accept_terms').attr('checked', true);
                $('#mdModal').modal('hide');
            });

            $('#form_validation').submit(e=>{
                e.preventDefault();
                let apply_form = $('#form_validation');
                apply_form.validate();
                if(!apply_form.valid()) return;
                

                let valData = {};
                let valArray = $(apply_form).serializeArray();

                valArray.forEach(val => {
                    valData[val.name] = val.value;
                });

                $('.page-loader-wrapper').fadeIn('slow');
                $('.page-loader-wrapper').css('background' , '#8edfff7a');
                $('.loader p').css('color' , '#f44336');

                $.post('php/action/apply_submit.php', valData, (response)=>{
                    var res = JSON.parse(response);
                    $('#installs').html('');
                    $('#even').addClass('even-display');
                    $('.page-loader-wrapper').fadeOut('slow');
                    if(res.status === "success"){
                        e.target.reset();
                        swal('',`Successfully applied, please wait for approval, you will receive alert SMSs on ${res.phone}`, 'success');
                        }else{
                         swal('',`There were Errors in your submission! please refresh your browser and try again`, 'error');   

                    }
                }).fail(()=>{
                    console.log('Something happened');
                    setTimeout(function () { $('.page-loader-wrapper').fadeOut();}, 1000);
                })
            })
        });

        function getValue(elem){
            return $(elem).val();
        }

        function getId(elem){
            return $(elem).attr('id');
        }
        
        var names = ['First', 'Second', 'Third', 'Fourth'];
        var values;
        function selectThis(radio){
            even = false; //To reset the even checkbox
            $('#even input').attr('checked', false);
            let val = Number(getValue(radio));
            values = [];
            let install = '';
            for (let i = 0; i < val; i++) {
                var obj = {  }
                obj[names[i]] = 0;
                values.push(obj);
               install = install+=`
               <div class="installments">
                    <p><b>${names[i]} Installement</b></p>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-line">
                                <input onchange="validateDate(this, ${i+1});" type="text" id="date${names[i]}" name="date${names[i]}" class="datepicker form-control" min="Wednesday 05 September 2018" placeholder="Please choose a date..." required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" min="0" onkeyup="calculateMoney(this, '${names[val-1]}');" id="amount${names[i]}" name="amount${names[i]}" class="form-control" placeholder="Amount" required>
                            </div>
                        </div>
                    </div>
                </div>`;             
            }
            //document.getElementById('installs').innerHTML(install);
            $('#installs').html(install);
            if(val > 1){
                $('#even').removeClass('even-display');
            }else{
                $('#even').addClass('even-display');
            }

            $(`#amount${names[val-1]}`).attr('readonly', true);
            $(`#amount${names[val-1]}`).val(balance);

            values.splice(-1,1);

            autosize($('textarea.auto-growth'));
            $('.datepicker').bootstrapMaterialDatePicker({
                format: 'YYYY-MM-DD',
                clearButton: false,
                weekStart: 1,
                time: false
            });
        }

        function validateDate(elem, months){
            let days = 30*24*60*60*1000; //30 Days in milliseconds
            let payDay = new Date(getValue(elem)).getTime();
            let id = getId(elem);
            var currDate = new Date().getTime();
            if(payDay <= currDate){
                swal("", "Date should be later than today!", "error");
                $(`#${id}`).val('');
                return;
            }
            let x = String(id).replace('date','');
            if(payDay > currDate + (Number(months)*days)){
                swal('',`Your ${x} installment should be paid within ${Number(months) * 30} days`, "error");
                $(`#${id}`).val('');
                return;
            }
            

            if(months === 1) return;

            let previousId = 'date'+names[names.indexOf(x)-1];
            let previousDate = new Date(getValue($(`#${previousId}`))).getTime();
            previousDate = (isNaN(previousDate))? 0 : previousDate;

            if(payDay < previousDate || previousDate === 0){
                $(`#${id}`).val('');
                swal('',`Your ${x} installment should be paid later than your ${names[names.indexOf(x)-1]} installment`, "error");
                return;
            }
        }


        function evenlyDistribute(elem){
            if(even){
                let fields = values.length + 1;
                let evenly = (balance/fields);//Math.round(balance/fields);

                values.forEach(i => {
                    let key = Object.keys(i)[0];
                    let id = 'amount'+key;
                    $(`#${id}`).val(evenly);
                    $(`#${id}`).attr('readonly', true);
                });

                let readOnly = 'amount'+names[values.length];
                $(`#${readOnly}`).val(evenly);
            }else{
                values.forEach(i => {
                    let key = Object.keys(i)[0];
                    let id = 'amount'+key;
                    $(`#${id}`).val('');
                    $(`#${id}`).attr('readonly', false);
                });
                let readOnly = 'amount'+names[values.length];
                $(`#${readOnly}`).val(balance);
            }
        }

        function calculateMoney(elem, readOnly){
            let elementValue = Number(getValue(elem));
            let id = getId(elem);
            let x = String(id).replace('amount','');

            let total = 0;
            let diff = 0;
            values.forEach(val => {
                if(x in val){
                    val[x] = elementValue;
                }
                let k = Object.keys(val)[0];
                total += val[k];
            });

            diff = balance-total;

            if(diff < 0){
                let eLen = (String(elementValue).length);
                $(`#${id}`).val(Number(String(elementValue).substring(0, eLen-1)));
                swal("", "Invalid amount", "error");
                return;
            }
            $(`#amount${readOnly}`).val(diff);
        }