import React from "react";
import moment from "moment";

const Report = (props) => {
  const { data } = props;
  let clientAddress = data.building_name ? data.building_name + ", " : "";
  clientAddress += data.palce ? data.palce + ", " : "";
  clientAddress += data.city ? data.city + ", " : "";
  clientAddress += data.p_o_box ? data.p_o_box : "";
  return (
    <React.Fragment>
      <div className="vat-report-layout">
        <div className="row">
          <div className="col-12 text-center">
            <h6 className="mb-1">VAT Return-201</h6>
          </div>
          <div className="col-12">
            <div className="mb-2">{data.trn}</div>
            <div>{data.name}</div>
            <div>{clientAddress}</div>
            <div>{data.region}</div>
            <div>{data.country}</div>
          </div>
        </div>
        <div className="row mt-2">
          <div className="col-10 pr-0">
            <table className="table table-bordered" cellSpacing="0">
              <tbody>
                <tr>
                  <td width="300">VAT Return Period</td>
                  <td>
                    {moment(data.vat_return_start_period).format(
                      "DD MMM YYYY"
                    ) +
                      " - " +
                      moment(data.vat_return_end_period).format("DD MMM YYYY")}
                  </td>
                </tr>
                <tr>
                  <td>VAT Return Due Date</td>
                  <td>
                    {moment(data.vat_return_due_date).format("DD MMM YYYY")}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div className="row">
          <div className="col-12">
            <div className="my-1 font-weight-bold">
              VAT on Sales and All Other Outputs
            </div>
            <table className="table table-bordered">
              <thead>
                <tr>
                  <th width="300"></th>
                  <th>Amount</th>
                  <th>VAT Amount</th>
                  <th>Adjustment</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1a Standard rated supplies in Abu Dhabi</td>
                  <td>
                    {data.region === "Abu Dhabi" && (
                      <span>{data.sale_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>
                    {data.region === "Abu Dhabi" && (
                      <span>{data.sale_vat_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>{data.region === "Abu Dhabi" && <span>0</span>}</td>
                </tr>
                <tr>
                  <td>1b Standard rated supplies in Dubai</td>
                  <td>
                    {data.region === "Dubai" && (
                      <span>{data.sale_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>
                    {data.region === "Dubai" && (
                      <span>{data.sale_vat_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>{data.region === "Dubai" && <span>0</span>}</td>
                </tr>
                <tr>
                  <td>1c Standard rated supplies in Sharjah</td>
                  <td>
                    {data.region === "Sharjah" && (
                      <span>{data.sale_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>
                    {data.region === "Sharjah" && (
                      <span>{data.sale_vat_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>{data.region === "Sharjah" && <span>0</span>}</td>
                </tr>
                <tr>
                  <td>1d Standard rated supplies in Ajman</td>
                  <td>
                    {data.region === "Ajman" && (
                      <span>{data.sale_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>
                    {data.region === "Ajman" && (
                      <span>{data.sale_vat_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>{data.region === "Ajman" && <span>0</span>}</td>
                </tr>
                <tr>
                  <td>1e Standard rated supplies in Umm Al Quwain</td>
                  <td>
                    {data.region === "Umm-Al-Quwain" && (
                      <span>{data.sale_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>
                    {data.region === "Umm-Al-Quwain" && (
                      <span>{data.sale_vat_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>{data.region === "Umm-Al-Quwain" && <span>0</span>}</td>
                </tr>
                <tr>
                  <td>1f Standard rated supplies in Ras Al Khaimah</td>
                  <td>
                    {data.region === "Ras-Al-Khaimah" && (
                      <span>{data.sale_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>
                    {data.region === "Ras-Al-Khaimah" && (
                      <span>{data.sale_vat_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>{data.region === "Ras-Al-Khaimah" && <span>0</span>}</td>
                </tr>
                <tr>
                  <td>1g Standard rated supplies in Fujairah</td>
                  <td>
                    {data.region === "Fujairah" && (
                      <span>{data.sale_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>
                    {data.region === "Fujairah" && (
                      <span>{data.sale_vat_amount.toFixed(2)}</span>
                    )}
                  </td>
                  <td>{data.region === "Fujairah" && <span>0</span>}</td>
                </tr>
                <tr>
                  <td>
                    <div className="text-wrap">
                      2 Tax Refunds provided to Tourists under the Tax Refunds
                      for Tourists Scheme
                    </div>
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>3 Supplies subject to the reverse charge provisions</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>4 Zero rated supplies</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>5 Exempt supplies</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>6 Goods imported into the UAE</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>7 Adjustments to goods imported into the UAE</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td className="text-right font-weight-bold">8 Totals</td>
                  <td>{data.sale_amount.toFixed(2)}</td>
                  <td>{data.sale_vat_amount.toFixed(2)}</td>
                  <td>0</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div className="row">
          <div className="col-12">
            <div className="my-1 font-weight-bold">
              VAT on Expenses and All Other Inputs
            </div>
            <table className="table table-bordered">
              <tbody>
                <tr>
                  <td width="300">9 Standard rated expenses</td>
                  <td>{data.purchase_amount.toFixed(2)}</td>
                  <td>{data.purchase_vat_amount.toFixed(2)}</td>
                  <td>0</td>
                </tr>
                <tr>
                  <td>10 Supplies subject to the reverse charge provisions</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td className="text-right font-weight-bold">11 Totals</td>
                  <td>{data.purchase_amount.toFixed(2)}</td>
                  <td>{data.purchase_vat_amount.toFixed(2)}</td>
                  <td>0</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div className="row">
          <div className="col-6 pr-0">
            <div className="my-1 font-weight-bold">Net VAT Due</div>
            <table className="table table-bordered">
              <tbody>
                <tr>
                  <td width="300">12 Total value of due tax for the period</td>
                </tr>
                <tr>
                  <td>{data.net_vat_sale_due.toFixed(2)}</td>
                </tr>
                <tr>
                  <td>13 Total value of recoverable tax for the period</td>
                </tr>
                <tr>
                  <td>{data.net_vat_purchase_due.toFixed(2)}</td>
                </tr>
                <tr>
                  <td>14 Payable tax for the period</td>
                </tr>
                <tr>
                  <td>{data.payable_tax_for_the_period.toFixed(2)}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div className="row mt-4">
          <div className="col-12">
            <div>Authorised Signatory</div>
            <div>Name</div>
            <div className="mt-2">Phone/Mobile</div>
          </div>
        </div>
      </div>
    </React.Fragment>
  );
};

export default Report;
