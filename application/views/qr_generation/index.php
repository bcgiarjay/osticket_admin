<div class="container">

    <div class="row py-4">
        <div class="col-md-5 col-sm-12">
            <div class="card" style="box-shadow: 1px 1px 10px 1px grey;">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">GENERATE QR CODE</h4>
                </div>
                <div class="card-body" style="position: relative;">

                    <!-- ----- PRELOADER ----- -->
                    <div style="
                        position: absolute;
                        height: 100%;
                        width: 100%;
                        top: 0;
                        left: 0;
                        background: #f2f2f2e0;
                        z-index: 999;
                        display: none;"
                        id="createPreloader">
                        <div class="h-100 d-flex justify-content-center align-items-center flex-column pb-5">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            <span class="sr-only">Please wait...</span>
                            <div>Please wait...</div>
                        </div>        
                    </div>
                    <!-- ----- END PRELOADER ----- -->

                    <form action="#" method="POST" id="formQr">
                        <div class="form-group">
                            <label>Topic <code>*</code></label>
                            <select class="form-control validate"
                                name="topicID"
                                id="topicID"
                                select2
                                required>
                                <option value="" selected disabled>Select topic</option>
                            <?php 
                            if ($topics && !empty($topics)):
                                foreach ($topics as $i => $x): 
                            ?>
                                <option value="<?= $x['topic_id'] ?>"
                                    topic="<?= $x['topic'] ?>"><?= $x['topic'] ?></option> 
                            <?php
                                endforeach;
                            endif; 
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description <code>*</code></label>
                            <textarea class="form-control validate"
                                name="description"
                                id="description"
                                pattern="[-a-zA-Z0-9., ]{0,}"
                                placeholder="Enter description"
                                rows="3"
                                style="resize: none;"
                                autocomplete="off"
                                inputmask
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date Purchased <code>*</code></label>
                            <input type="text"
                                class="form-control validate"
                                name="datePurchase"
                                id="datePurchase"
                                max="<?= date('Y-m-d') ?>"
                                autocomplete="off"
                                daterange
                                required>
                            <div class="d-block invalid-feedback" id="invalid-datePurchase"></div>
                        </div>
                        <div class="form-group">
                            <label>Validity Date <code>*</code>
                                <input type="checkbox"
                                    class="validate" 
                                    name="noValidityExpiration"
                                    onchange="
                                    let element = document.getElementById('validityDate');
                                    if (this.checked) {
                                        element.value = '';
                                        element.setAttribute('disabled', true);
                                        element.removeAttribute('required');
                                    } else {
                                        element.removeAttribute('disabled');
                                        element.setAttribute('required', true);
                                    }"> No expiration
                            </label>
                            <input type="text"
                                class="form-control validate"
                                name="validityDate"
                                id="validityDate"
                                min="<?= date("Y-m-d") ?>"
                                autocomplete="off"
                                daterange
                                required>
                            <div class="d-block invalid-feedback" id="invalid-validityDate"></div>
                        </div>
                        <div class="form-group">
                            <label>Subscription Type <code>*</code></label>
                            <select class="form-control validate"
                                name="subscriptionType"
                                id="subscriptionType"
                                select2
                                required>
                                <option value="" selected disabled>Select subscription type</option>
                                <option value="Standard Package">Standard Package</option>
                                <option value="Premium Package">Premium Package</option>
                            </select>
                            <div class="d-block invalid-feedback" id="invalid-subscriptionType"></div>
                        </div>
                        <div class="form-group">
                            <label>Ticket Creation Count <code>*</code>
                                <input type="checkbox"
                                    class="validate" 
                                    name="noTicketExpiration"
                                    onchange="
                                    let element = document.getElementById('ticketCount');
                                    if (this.checked) {
                                        element.value = '';
                                        element.setAttribute('disabled', true);
                                        element.removeAttribute('required');
                                    } else {
                                        element.removeAttribute('disabled');
                                        element.setAttribute('required', true);
                                    }"> No expiration
                            </label>
                            <input type="text"
                                class="form-control text-right"
                                name="ticketCount"
                                id="ticketCount"
                                placeholder=""
                                pattern="[0-9]+"
                                min="0"
                                max="999999999"
                                autocomplete="off"
                                inputmask
                                number
                                required>
                            <div class="d-block invalid-feedback" id="invalid-ticketCount"></div>
                        </div>
                        <div class="form-group">
                            <label>Onsite/Remote Support Count <code>*</code>
                                <input type="checkbox"
                                    class="validate" 
                                    name="noSupportExpiration"
                                    onchange="
                                    let element = document.getElementById('supportCount');
                                    if (this.checked) {
                                        element.value = '';
                                        element.setAttribute('disabled', true);
                                        element.removeAttribute('required');
                                    } else {
                                        element.removeAttribute('disabled');
                                        element.setAttribute('required', true);
                                    }"> No expiration
                            </label>
                            <input type="text"
                                class="form-control text-right"
                                name="supportCount"
                                id="supportCount"
                                placeholder=""
                                pattern="[0-9]+"
                                min="0"
                                max="999999999"
                                autocomplete="off"
                                inputmask
                                number
                                required>
                            <div class="d-block invalid-feedback" id="invalid-supportCount"></div>
                        </div>
                        <!-- <div class="form-group">
                            <label>Subscription Renewed</label>
                            <input type="text"
                                class="form-control validate"
                                name="subscriptionRenewed"
                                id="subscriptionRenewed"
                                min="<?= date('Y-m-d') ?>"
                                daterange
                                required>
                            <div class="d-block invalid-feedback" id="invalid-subscriptionRenewed"></div>
                        </div> -->
                        <div class="d-block text-center mt-4">
                            <button type="submit"
                                class="btn btn-primary py-2 px-5"
                                id="btnSubmit">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                            </button>
                            <button type="reset"
                                class="btn btn-danger py-2 px-5"
                                id="btnReset">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7 col-sm-12">
            <div class="card" style="box-shadow: 1px 1px 10px 1px grey;">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">ITEMS</h4>
                </div>
                <div class="card-body">

                    <!-- ----- PRELOADER ----- -->
                    <div style="
                        position: absolute;
                        height: 100%;
                        width: 100%;
                        top: 0;
                        left: 0;
                        background: #f2f2f2e0;
                        z-index: 999;
                        display: none;"
                        id="tablePreloader">
                        <div class="h-100 d-flex justify-content-center align-items-center flex-column pb-5">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                            <span class="sr-only">Please wait...</span>
                            <div>Please wait...</div>
                        </div>        
                    </div>
                    <!-- ----- END PRELOADER ----- -->

                    <div class="table-responsive">
                        <table class="table table-striped w-100" id="tableItems">
                            <thead>
                                <tr class="bg-dark text-white">
                                    <th>QR Code</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody id="tableTbody">
                            <?php 
                                if ($items && !empty($items)): 
                                    foreach ($items as $i => $x):
                                        $qrcodeID             = $x['qrcodeID'];
                                        $topicID              = $x['topicID'] ?? "";
                                        $topicName            = $x['topicName'] ?? "";
                                        $description          = $x['description'] ?? "";
                                        $datePurchased        = $x['datePurchased'] ?? "";
                                        $validityDate         = $x['validityDate'] ?? "";
                                        $subscriptionType     = $x['subscriptionType'] ?? "";
                                        $ticketCount          = $x['ticketCount'] ?? "";
                                        $supportCount         = $x['supportCount'] ?? "";
                                        $filename             = $x['filename'] ?? "";
                                        $noValidityExpiration = $x['noValidityExpiration'];
                                        $noTicketExpiration   = $x['noTicketExpiration'];
                                        $noSupportExpiration  = $x['noSupportExpiration'];

                                        $validityDate = $noValidityExpiration == '1' ? 'No expiration' : $validityDate;
                                        $ticketCount  = $noTicketExpiration == '1' ? 'No expiration' : $ticketCount;
                                        $supportCount = $noSupportExpiration == '1' ? 'No expiration' : $supportCount;
                            ?>
                                <tr class="qrcode" id="<?= $qrcodeID ?>">
                                    <td class="text-center">
                                        <img src="<?= base_url('uploads/qrcodes/'.$filename) ?>"
                                            height="80" width="80">
                                        <a class="btn btn-sm btn-warning mt-2 d-block w-100"
                                            href="<?= base_url('uploads/qrcodes/'.$filename) ?>"
                                            download="qrcode.png">Download</a>
                                        <button class="btn btn-sm btn-info mt-1 d-block w-100 btnUpdate"
                                            qrcodeID="<?= $qrcodeID ?>">Update</button>
                                    </td>
                                    <td>
                                        <div class="info">
                                            <div>
                                                <b>Topic:</b> 
                                                <span><?= $topicName ?></span>
                                            </div>
                                            <div>
                                                <b>Description:</b> 
                                                <span><?= $description ?></span>
                                            </div>
                                            <div>
                                                <b>Date Purchased:</b> 
                                                <span><?= $datePurchased ?></span>
                                            </div>
                                            <div>
                                                <b>Validity Date:</b> 
                                                <span><?= $validityDate ?></span>
                                            </div>
                                            <div>
                                                <b>Subscription Type:</b> 
                                                <span><?= $subscriptionType ?></span>
                                            </div>
                                            <div>
                                                <b>Ticket Creation Count:</b> 
                                                <span><?= $ticketCount ?></span>
                                            </div>
                                            <div>
                                                <b>Onsite/Remote Support Count:</b> 
                                                <span><?= $supportCount ?></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php 
                                    endforeach;
                                endif;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

    
<script>

    const BASE_URL = $("body").attr("base_url");


    // ----- INIT DATERANGEPICKER -----
    function initDateRangePicker() {
        $(`[daterange]`).each(function() {
            let min = $(this).attr("min");
            let max = $(this).attr("max");
            let id  = $(this).attr("id");
            let invalid = `invalid-${id}`;

            let minDate = min ? moment(min) : false;
            let maxDate = max ? moment(max) : false;

            $(this).daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                autoApply: true,
                minDate,
                maxDate,
                locale: {
                    format: "MMMM DD, YYYY"
                },
            }, function(data) {
                let date = data.format("YYYY-MM-DD");
                $(`#${id}`).attr("date", date);
            });
        })
    }
    // ----- END INIT DATERANGEPICKER -----


    // ----- INIT INPUTMASK -----
    function initInputMask() {
        $(`[inputmask]`).each(function() {
            let regex       = $(this).attr("pattern");
            let placeholder = $(this).attr("placeholder") ?? "";
            if (regex) {
                $(this).inputmask({
                    regex,
                    placeholder,
                    showMaskOnHover: false,
                    showMaskOnFocus: false,
                    greedy: false,
                });
            }
        })

    }
    // ----- END INIT INPUTMASK -----


    // ----- INIT SELECT2 -----
    function initSelect2() {
        $(`[select2]`).select2();
    }
    // ----- END INIT SELECT2 -----


    // ----- INIT DATATABLES -----
    function initDataTables(element = '', options = {}) {
        if ($.fn.DataTable.isDataTable("#tableItems")) {
            $("#tableItems").DataTable().destroy();
        }
        
        var table = $("#tableItems")
            .css({ "min-width": "100%" })
            .removeAttr("width")
            .DataTable({
                proccessing: false,
                serverSide: false,
                scrollX: true,
				scrollY: 550,
                sorting: [],
                scrollCollapse: true,
                columnDefs: [
                    { targets: 0,  width: 150 },
                    { targets: 1,  width: 500 },
                ],
            });
    }
    // ----- END INIT DATATABLES -----


    // ----- GET TABLE DATA -----
    function getTableData(table = '', columns = '', where = '') {
        let result = [];
        $.ajax({
            method: "POST",
            url: "qr_generation/getTableData",
            data: { table, columns, where },
            async: false,
            dataType: "json",
            success: function(data) {
                result = data;
            }
        })
        return result;
    }
    // ----- END GET TABLE DATA -----


    $(document).ready(function() {

        initInputMask();
        initSelect2();
        initDateRangePicker();
        initDataTables();
        

        // ----- RESET FORM -----
        $(document).on("reset", "#formQr", function(e) {
            let action = $("#formQr").attr("action");
            if (action == "update") {
                e.preventDefault();
                Swal.fire({
                    title: 'DISCARD QR CODE GENERATION',
                    text: "Are you sure to discard this process??",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#28a745',
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'YES',
                    cancelButtonText: 'NO',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#formQr").removeAttr("qrcodeID").removeAttr("action");
                        $("#btnReset").html(`<i class="fa fa-ban" aria-hidden="true"></i> Reset`);

                        $('#createPreloader').show();
                        Swal.fire({
                            icon: 'success',
                            title: 'PROCESS SUCCESSFULLY DISCARDED!',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            $('#createPreloader').hide();
                            $('#formQr').trigger('reset');
                        })
                    }
                })
            } else {
                $(`[select2]`).val('').trigger("change");
                $(`[name="validityDate"], [name="ticketCount"], [name="supportCount"]`).removeAttr("disabled").attr("required", true);
            }
        })
        // ----- END RESET FORM -----


        // ----- UPDATE QR CODE -----
        $(document).on("click", ".btnUpdate", function() {
            let qrcodeID = $(this).attr("qrcodeID");
            $("#createPreloader").show();

            setTimeout(() => {
                $("#formQr").attr("qrcodeID", qrcodeID).attr("action", "update");
                $("#btnReset").html(`<i class="fa fa-ban" aria-hidden="true"></i> Cancel`).attr("action", "cancel");

                let data = getTableData("qrcodes", "", `qrcodeID=${qrcodeID}`);
                if (data && data.length) {
                    let {
                        qrcodeID,
                        topicID,
                        topicName,
                        description,
                        client,
                        datePurchase,
                        validityDate,
                        noValidityExpiration,
                        systemName,
                        subscriptionType,
                        ticketCount,
                        noTicketExpiration,
                        supportCount,
                        noSupportExpiration,
                        subscriptionRenewed,
                        filename,
                        qrKey,
                    } = data && data[0];

                    $(`[name="topicID"]`).val(topicID).trigger('change');
                    $(`[name="description"]`).val(description);
                    $(`[name="datePurchase"]`).val(moment(datePurchase).format("MMMM DD, YYYY"));
                    $(`[name="noValidityExpiration"]`).prop('checked', noValidityExpiration == '1');
                    noValidityExpiration == '1' ? $(`[name="validityDate"]`).val('').attr("disabled", true) : $(`[name="validityDate"]`).val(moment(validityDate).format("MMMM DD, YYYY")).removeAttr("disabled");  
                    $(`[name="subscriptionType"]`).val(subscriptionType).trigger('change');
                    $(`[name="noTicketExpiration"]`).prop('checked', noTicketExpiration == '1');
                    noTicketExpiration == '1' ? $(`[name="ticketCount"]`).val('').attr("disabled", true) : $(`[name="ticketCount"]`).val(ticketCount).removeAttr("disabled");  
                    $(`[name="noSupportExpiration"]`).prop('checked', noSupportExpiration == '1');
                    noSupportExpiration == '1' ? $(`[name="supportCount"]`).val('').attr("disabled", true) : $(`[name="supportCount"]`).val(supportCount).removeAttr("disabled");  
                }
                $("#createPreloader").hide();
            }, 1000);
        })
        // ----- END UPDATE QR CODE -----


        // ----- SUBMIT GENERATE QR CODE -----
        $(document).on("submit", "#formQr", function(e) {
            e.preventDefault();

            let isUpdate = $("#formQr").attr("action") == "update";
            let qrcodeID = $("#formQr").attr("qrcodeID");

            let title = "GENERATE QR CODE";
            let text  = "Do you want to generate a QR Code for the selected topic?";
            if (isUpdate) {
                title = "UPDATE QR CODE";
                text  = "Are you sure to update this QR Code?";
            }

            Swal.fire({
                title,
                text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#dc3545',
                confirmButtonText: 'YES',
                cancelButtonText: 'NO',
            }).then((result) => {
                if (result.isConfirmed) {
                    saveQRGeneration()
                }
            })

        })
        // ----- END SUBMIT GENERATE QR CODE -----


        // ----- SAVE QR GENERATION -----
        function saveQRGeneration() {
            let qrcodeID             = $("#formQr").attr("qrcodeID");
            let action               = $("#formQr").attr("action");
                action               = action ? action : "insert";
            let client               = $(`[name="client"]`).val();
            let topicID              = $(`[name="topicID"]`).val();
            let topicName            = $(`[name="topicID"] option:selected`).attr('topic');
            let description          = $(`[name="description"]`).val()?.trim();
            let datePurchase         = $(`[name="datePurchase"]`).val();
                datePurchase         = datePurchase ? moment(datePurchase).format("YYYY-MM-DD") : "";
            let validityDate         = $(`[name="validityDate"]`).val();
                validityDate         = validityDate ? moment(validityDate).format("YYYY-MM-DD") : "";
            let systemName           = $(`[name="systemName"]`).val();
            let subscriptionType     = $(`[name="subscriptionType"]`).val();
            let ticketCount          = $(`[name="ticketCount"]`).val();
            let supportCount         = $(`[name="supportCount"]`).val();
            let subscriptionRenewed  = $(`[name="subscriptionRenewed"]`).val();

            let noValidityExpiration = $(`[name="noValidityExpiration"]`).prop('checked') ? '1' : '0';
            let noTicketExpiration   = $(`[name="noTicketExpiration"]`).prop('checked') ? '1' : '0';
            let noSupportExpiration  = $(`[name="noSupportExpiration"]`).prop('checked') ? '1' : '0';
            
            let data = {
                action,
                qrcodeID,
                client,
                topicID,
                topicName,
                description,
                datePurchase,
                validityDate,
                systemName,
                subscriptionType,
                ticketCount,
                supportCount,
                subscriptionRenewed,
                noValidityExpiration,
                noTicketExpiration,
                noSupportExpiration
            }

            $('#tablePreloader').show();

            setTimeout(() => {
                $.ajax({
                    method: "POST",
                    url: "qr_generation/saveQrCode",
                    data,
                    async: true,
                    dataType: "json",
                    success: function(result) {
                        if (result && result.status != "false") {

                            let { id, data } = result;

                            let {
                                topicID,
                                topicName,
                                description,
                                datePurchase,
                                validityDate,
                                systemName,
                                subscriptionType,
                                ticketCount,
                                supportCount,
                                subscriptionRenewed,
                                filename,
                                qrKey,
                                noValidityExpiration,
                                noTicketExpiration,
                                noSupportExpiration,
                            } = data;

                            validityDate = noValidityExpiration == '1' ? 'No expiration' : validityDate;
                            ticketCount  = noTicketExpiration == '1' ? 'No expiration' : ticketCount;
                            supportCount = noSupportExpiration == '1' ? 'No expiration' : supportCount;

                            if ($.fn.DataTable.isDataTable("#tableItems")) {
                                $("#tableItems").DataTable().destroy();
                            }

                            action == "update" && $(`tr.qrcode[id="${id}"]`).remove() && $('#formQr').removeAttr('action');;

                            let html = `
                            <tr class="qrcode new_data" id="${id}">
                                <td class="text-center">
                                    <img src="${BASE_URL}uploads/qrcodes/${filename}"
                                        height="80" width="80">
                                    <a class="btn btn-sm btn-warning mt-2 d-block w-100"
                                        href="${BASE_URL}uploads/qrcodes/${filename}"
                                        download="${filename}">Download</a>
                                    <button class="btn btn-sm btn-info mt-1 d-block w-100 btnUpdate"
                                        qrcodeID="${id}">Update</button>
                                </td>
                                <td>
                                    <div class="info">
                                        <div>
                                            <b>Topic:</b> 
                                            <span>${topicName || ""}</span>
                                        </div>
                                        <div>
                                            <b>Description:</b> 
                                            <span>${description || ""}</span>
                                        </div>
                                        <div>
                                            <b>Date Purchased:</b> 
                                            <span>${datePurchase || ""}</span>
                                        </div>
                                        <div>
                                            <b>Validity Date:</b> 
                                            <span>${validityDate || ""}</span>
                                        </div>
                                        <div>
                                            <b>Subscription Type:</b> 
                                            <span>${subscriptionType || ""}</span>
                                        </div>
                                        <div>
                                            <b>Ticket Creation Count:</b> 
                                            <span>${ticketCount || ""}</span>
                                        </div>
                                        <div>
                                            <b>Onsite/Remote Support Count:</b> 
                                            <span>${supportCount || ""}</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>`;
                            $("#tableTbody").prepend(html);

                            initDataTables();

                            Swal.fire({
                                icon: 'success',
                                title: 'QR CODE SUCCESSFULLY GENERATED!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                $('#tablePreloader').hide();
                                $('#formQr').trigger('reset');
                            })
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                }).done(function() {
                    $('#tablePreloader').hide();
                    $('#formQr').trigger('reset');
                })
            }, 1000);
        }
        // ----- END SAVE QR GENERATION -----

    })

</script>