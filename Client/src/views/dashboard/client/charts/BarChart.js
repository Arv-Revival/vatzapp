import React, { useEffect } from "react";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";

am4core.useTheme(am4themes_animated);
const BarChart = (props) => {
  useEffect(() => {
    const MONTHS = [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ];
    let graphData = [];

    if (props.data?.length) {
      for (let i = 0; i < MONTHS.length; i++) {
        let monthName = MONTHS[i];
        let graphObj = {
          month: monthName,
          sale_amount: 0,
          purchase_amount: 0,
          expenditure_amount: 0,
        };
        let selectedMonth = props.data.find((i) => i.month === monthName);
        if (selectedMonth) {
          graphObj.sale_amount = selectedMonth.sale_amount;
          graphObj.purchase_amount = selectedMonth.purchase_amount;
          graphObj.expenditure_amount = selectedMonth.expenditure_amount;
        }
        graphData.push(graphObj);
      }
    }

    let chart = am4core.create("entries-chart", am4charts.XYChart);
    chart.data = graphData.reverse();

    let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "month";
    categoryAxis.title.text = "Months";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 20;

    let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.title.text = "Transactions";
    valueAxis.min = 0;

    let series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = "sale_amount";
    series.dataFields.categoryX = "month";
    series.name = "Sales";
    series.tooltipText = "{name}: [bold]{valueY}[/]";
    series.stacked = true;
    series.columns.template.width = 20;

    let series2 = chart.series.push(new am4charts.ColumnSeries());
    series2.dataFields.valueY = "purchase_amount";
    series2.dataFields.categoryX = "month";
    series2.name = "Purchase";
    series2.tooltipText = "{name}: [bold]{valueY}[/]";
    series2.stacked = true;
    series2.columns.template.width = 20;

    let series3 = chart.series.push(new am4charts.ColumnSeries());
    series3.dataFields.valueY = "expenditure_amount";
    series3.dataFields.categoryX = "month";
    series3.name = "Expenditure";
    series3.tooltipText = "{name}: [bold]{valueY}[/]";
    series3.stacked = true;
    series3.columns.template.width = 20;

    chart.cursor = new am4charts.XYCursor();
    // chart.legend = new am4charts.Legend();
  });

  return <div id="entries-chart" style={{ width: "100%", height: "305px" }} />;
};

export default BarChart;
