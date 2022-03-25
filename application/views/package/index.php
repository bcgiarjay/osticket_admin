<div class="container h-100">
    <div class="h-100" id="pageContent">
        <div class="w-100 h-100 d-flex justify-content-center align-items-center text-center bg-transparent py-5">
            <div>
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw" style="color: #d71d1d;"></i>
                <span class="sr-only">Please wait...</span>
                <div>Please wait...</div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {


        // ----- PAGE CONTENT -----
        function pageContent() {
            let html = `
            <div class="row py-4">
                <div class="col-md-5 col-sm-12">
                    <div class="card" style="box-shadow: 1px 1px 10px 1px grey;">
                        <div class="card-header bg-dark text-white">
                            <h4 class="mb-0">CREATE PACKAGE</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST" id="formQr">
                                <div class="form-group">
                                    <label>Topic <code>*</code></label>
                                    <select class="form-control"
                                        name="topicID"
                                        required>
                                        <option value="" selected disabled>Select topic</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description <code>*</code></label>
                                    <textarea class="form-control"
                                        name="description"
                                        rows="3"
                                        style="resize: none;"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Date Purchased</label>
                                    <input type="date"
                                        class="form-control"
                                        name="datePurchase"
                                        max="<?= date('Y-m-d') ?>"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Validity Date
                                        <input type="checkbox" onchange="
                                            if (this.checked) {
                                                document.getElementById('validityDate').value = '';
                                                document.getElementById('validityDate').setAttribute('disabled', true);
                                            } else {
                                                document.getElementById('validityDate').removeAttribute('disabled');
                                            }
                                        "> No expiration
                                    </label>
                                    <input type="date"
                                        class="form-control"
                                        name="validityDate"
                                        id="validityDate"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Subscription Type</label>
                                    <select class="form-control"
                                        name="subscriptionType"
                                        required>
                                        <option value="" selected disabled>Select subscription type</option>
                                        <option value="Standard Package">Standard Package</option>
                                        <option value="Premium Package">Premium Package</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Ticket Creation Count</label>
                                    <input type="number"
                                        class="form-control"
                                        name="ticketCount"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Onsite/Remote Support Count</label>
                                    <input type="number"
                                        class="form-control"
                                        name="supportCount"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Subscription Renewed</label>
                                    <input type="date"
                                        class="form-control"
                                        name="subscriptionRenewed">
                                </div>
                                <div class="text-right">
                                    <button type="submit"
                                        class="btn btn-primary">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Save
                                    </button>
                                    <button type="reset"
                                        class="btn btn-danger">
                                        <i class="fa fa-floppy-o" aria-hidden="true"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped w-100">
                            <thead>
                                <tr>
                                    <th>QR Code</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody id="tableTbody">
                                <tr>
                                    <td colspan="2">
                                        <div class="w-100 text-center bg-transparent py-5">
                                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                                            <span class="sr-only">Please wait...</span>
                                            <div>Please wait...</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <img src="./uploads/qr.png"
                                            height="80" width="80">
                                        <a class="btn btn-sm btn-warning mt-2 d-block w-100"
                                            href="uploads/qr.png"
                                            download="client.png">Download</a>
                                        <button class="btn btn-sm btn-info mt-1 d-block w-100">Update</button>
                                    </td>
                                    <td>
                                        <div class="info">
                                            <div>Client: BlackCoders</div>
                                            <div>Date Purchased: 2022-01-01</div>
                                            <div>Validity Date: 2022-11-02</div>
                                            <div>System Name: BlackBox - ERP System</div>
                                            <div>Subscription Type: Premium Package</div>
                                            <div>Ticket Count: 1200</div>
                                            <div>Onsite Count: 1000</div>
                                            <div>Subscription Renewed: 2021-02-02</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>`;

            setTimeout(() => {
                $("#pageContent").html(html);
            }, 100);
        }
        pageContent();
        // ----- END PAGE CONTENT -----


        
        $(document).on("submit", "#formQr", function(e) {
            e.preventDefault();

            let client              = $(`[name="client"]`).val();
            let datePurchase        = $(`[name="datePurchase"]`).val();
            let validityDate        = $(`[name="validityDate"]`).val();
            let systemName          = $(`[name="systemName"]`).val();
            let subscriptionType    = $(`[name="subscriptionType"]`).val();
            let ticketCount         = $(`[name="ticketCount"]`).val();
            let onsiteCount         = $(`[name="onsiteCount"]`).val();
            let subscriptionRenewed = $(`[name="subscriptionRenewed"]`).val();
            
            let data = {
                client,
                datePurchase,
                validityDate,
                systemName,
                subscriptionType,
                ticketCount,
                onsiteCount,
                subscriptionRenewed,
            }

            $.ajax({
                method: "POST",
                url: "insert.php",
                data,
                async: true,
                dataType: "json",
                success: function(data) {
                    if (data != "false") {
                        let {
                            client,
                            datePurchase,
                            validityDate,
                            systemName,
                            subscriptionType,
                            ticketCount,
                            onsiteCount,
                            subscriptionRenewed,
                            filename,
                            qrKey,
                        } = data;
                        let html = `
                        <tr>
                            <td class="text-center">
                                <img src="./uploads/${filename}"
                                    height="80" width="80">
                                <a class="btn btn-sm btn-warning mt-2 d-block w-100"
                                    href="uploads/${filename}"
                                    download="${filename}">Download</a>
                                <button class="btn btn-sm btn-danger mt-1 d-block w-100">Update</button>
                            </td>
                            <td>
                                <div class="info">
                                    <div>Client: ${client}</div>
                                    <div>Date Purchased: ${datePurchase}</div>
                                    <div>Validity Date: ${validityDate}</div>
                                    <div>System Name: ${systemName}</div>
                                    <div>Subscription Type: ${subscriptionType}</div>
                                    <div>Ticket Count: ${ticketCount}</div>
                                    <div>Onsite Count: ${onsiteCount}</div>
                                    <div>Subscription Renewed: ${subscriptionRenewed || ""}</div>
                                </div>
                            </td>
                        </tr>`;
                        $("#tableTbody").prepend(html);
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })

        })

    })

</script>