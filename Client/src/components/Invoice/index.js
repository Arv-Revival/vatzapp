import React from "react";
import moment from "moment";
import { ToWords } from "to-words";

const Invoice = (props) => {
  const { data, userData } = props;
  const toWords = new ToWords();
  let totalAmt = "AED " + toWords.convert(data.payment_amount) + " only";
  let clientAddress = userData.client_user.building_name
    ? userData.client_user.building_name + ", "
    : "";
  clientAddress += userData.client_user.palce
    ? userData.client_user.palce + ", "
    : "";
  clientAddress += userData.client_user.city
    ? userData.client_user.city + ", "
    : "";
  clientAddress += userData.client_user.p_o_box
    ? userData.client_user.p_o_box + ", "
    : "";
  clientAddress += userData.client_user.region.name
    ? userData.client_user.region.name + ", "
    : "";
  clientAddress += userData.client_user.country.name
    ? userData.client_user.country.name
    : "";
  return (
    <React.Fragment>
      <div className="invoice-layout">
        <div className="row">
          <div className="col-12 text-center">
            <h4>VATZAPP</h4>
            <div>Lorem ipsum 334,</div>
            <div>Dolor sit amet, voluptatem, accusantium - 687654</div>
          </div>
        </div>
        <div className="row mt-5">
          <div className="col-6">
            <h6>Tax Invoice</h6>
          </div>
          <div className="col-6">
            <div className="row">
              <div className="col-4 pr-0    item-label">Invoice #</div>
              <div className="col-6 pl-1">
                {`VATZ- ${moment(data.payment_date).format("YYYY-MM-")}${
                  data.id
                }`}
              </div>
            </div>
            <div className="row">
              <div className="col-4 pr-0 item-label">Date</div>
              <div className="col-6 pl-1">
                {moment(data.payment_date).format("DD-MMM-YYYY")}
              </div>
            </div>
          </div>
        </div>

        <div className="row row-eq-height mt-4">
          <div className="col-6">
            <div className="p-2 border border-dark h-100">
              <div className="row">
                <div className="col-5 pr-0 item-label">Customer Name</div>
                <div className="col-7 pl-1 text-break">{userData.name}</div>
              </div>
              <div className="row">
                <div className="col-5 pr-0 item-label">Address</div>
                <div className="col-7 pl-1 text-break">{clientAddress}</div>
              </div>
              <div className="row">
                <div className="col-5 pr-0 item-label">Tel</div>
                <div className="col-7 pl-1 text-break">
                  {userData.whatsapp_no}
                </div>
              </div>
              <div className="row">
                <div className="col-5 pr-0 item-label">Email</div>
                <div className="col-7 pl-1 text-break">{userData.email}</div>
              </div>
              <div className="row">
                <div className="col-5 pr-0 item-label">Customer TRN</div>
                <div className="col-7 pl-1 text-break">
                  {userData.client_user.trn_number}
                </div>
              </div>
            </div>
          </div>

          <div className="col-6">
            <div className="p-2 border border-dark h-100">
              <div className="row">
                <div className="col-5 pr-0 item-label">Plan</div>
                <div className="col-7 pl-1 text-break">{data.plan_name}</div>
              </div>
              <div className="row">
                <div className="col-5 pr-0 item-label">Mode of Payment</div>
                <div className="col-7 pl-1 text-break">{data.payment_type}</div>
              </div>
              <div className="row">
                <div className="col-5 pr-0 item-label">Our Ref</div>
                <div className="col-7 pl-1 text-break">{data.ref}</div>
              </div>
            </div>
          </div>
        </div>

        <div className="row border-top border-bottom border-dark mt-3">
          <div className="col-1 pr-0 py-2">SL NO</div>
          <div className="col-6 py-2">DESCRIPTION</div>
          <div className="col-1 py-2">Qty</div>
          <div className="col-2 py-2">Unit Price</div>
          <div className="col-2 py-2">Amount</div>
        </div>
        <div className="row">
          <div className="col-1 py-2">1.</div>
          <div className="col-6 py-2">
            {`Subscription from ${moment(data.from).format(
              "DD-MMM-YYYY"
            )} to ${moment(data.to).format("DD-MMM-YYYY")}`}
          </div>
          <div className="col-1 py-2">1</div>
          <div className="col-2 py-2">{data.payment_amount}</div>
          <div className="col-2 py-2">{data.payment_amount}</div>
        </div>
        <div className="row border-top border-dark" style={{ marginTop: 250 }}>
          <div className="col-7 py-2">Bank Details:</div>
          <div className="col-3 py-2">Total Amount:</div>
          <div className="col-2 py-2">{data.payment_amount}</div>
        </div>
        <div className="row border-bottom border-dark mt-2">
          <div className="col py-1">{totalAmt}</div>
        </div>
        <div className="row border-dark mt-4">
          <div className="col pb-2">
            This is a computer-generated document. No signature is required
          </div>
        </div>
      </div>
    </React.Fragment>
  );
};

export default Invoice;
