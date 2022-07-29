import React, { useEffect } from "react";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

import * as moment from "moment";

am4core.useTheme(am4themes_animated);

const ClusteredChart = (props) => {
  useEffect(() => {
    let chart = am4core.create("vat-payable-chart", am4charts.XYChart);

    // Add data
    chart.data = props.data;
    // chart.padding(40, 40, 40, 40);

    let categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.dataFields.category = "client_name";
    categoryAxis.renderer.minGridDistance = 10;
    categoryAxis.renderer.inversed = true;
    categoryAxis.renderer.grid.template.disabled = true;

    let valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
    valueAxis.renderer.grid.template.strokeOpacity = 0;
    valueAxis.renderer.baseGrid.disabled = true;
    valueAxis.min = getMinVal(props.data);
    valueAxis.max = getMaxVal(props.data);
    valueAxis.strictMinMax = true;
    valueAxis.renderer.minGridDistance = 50;

    let series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.categoryY = "client_name";
    series.dataFields.valueX = "vat_amount";
    series.tooltipText = "{valueX.value}";
    series.columns.template.strokeOpacity = 0;
    series.columns.template.column.cornerRadiusBottomLeft = 15;
    series.columns.template.column.cornerRadiusBottomRight = 15;
    series.columns.template.column.cornerRadiusTopLeft = 15;
    series.columns.template.column.cornerRadiusTopRight = 15;
    series.columns.template.height = 30;
    series.columns.template.fill = am4core.color("#476678");

    let labelBullet = series.bullets.push(new am4charts.LabelBullet());
    labelBullet.label.horizontalCenter = "middle";
    labelBullet.label.fill = am4core.color("#fff");
    labelBullet.label.adapter.add("dx", (dx, target) => {
      if (target.dataItem.valueX < 0) {
        return 50;
      } else {
        return -50;
      }
    });
    labelBullet.label.adapter.add("text", (text, target) => {
      return parseFloat(target.dataItem.valueX).toFixed(2) + " AED";
    });
  });

  const getMaxVal = (data) => {
    let max =
      Math.max.apply(
        Math,
        data.map((obj) => {
          return obj.vat_amount;
        })
      ) + 50;
    return max;
  };

  const getMinVal = (data) => {
    let min =
      Math.min.apply(
        Math,
        data.map((obj) => {
          return obj.vat_amount;
        })
      ) - 50;
    return min;
  };

  return (
    <div
      id="vat-payable-chart"
      style={{
        width: "100%",
        height:
          (props.data?.length ? 30 * props.data?.length + 100 : 100) + "px",
      }}
    />
  );
};

export default ClusteredChart;
