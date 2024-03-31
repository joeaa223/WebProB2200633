//bar chart transportation
var barChartOptions = {
    series: [{
    data: [15.18, 7.29, 6.22, 5.87, 3.22, 3.13, 2.98, 1.65, 1.39],
    name: "Products",
  }],
    chart: {
    type: 'bar',
    background: "transparent",
    height: 350,
    toolbar: {
        show: false,
    },
  },

  colors: [
    "#2962ff",
    "#d50000",
    "#2e7d32",
    "#ff6d00",
    "#583cb3",
  ],
  
  plotOptions: {
    bar: {
        distributed:true,
        borderRadius: 4,
        horizontal: true,
        columnWidh: "40%",
    }
  },
  dataLabels: {
    enabled: false
  },

  fill: {
    opacity: 1,
  },

  grid: {
    borderColor: "#55596e",
    yaxis: {
        lines: {
            show: true,
        },
    },
    xaxis: {
        lines: {
            show: true,
        },
    },
  },

  legend: {
    labels: {
        colors:"#f5f7ff",
    },
    show: true,
    position: "top",
  },

  stroke: {
    colors: ["transparent"],
    show: true,
    width: 2
  },

  tooltip: {
    y: {
      formatter: function(val) {
        console.log("Original value:", val);
        var billion = val / 1000; // 将百万转换为亿
        var formattedValue = billion >= 1 ? billion.toFixed(1) + 'billion' : val + 'million';
        console.log("Formatted value:", formattedValue);
        return formattedValue;
      }
      
      
    },
    shared: true,
    intersect: false,
    theme: "dark",
  },


  xaxis: {
    categories: ['Electricity and Heat', 'Transport', 'Manufacturing and Construction', 'Agriculture', 'Fugitive emissions', 'Industry', 'Buildings',
      'Waste', 'Land-use change and Forestry'
    ],
    title: {
        style: {
            color: "#f5f7ff",
        },
    },

    axisBorder: {
        show: true,
        color: "#55596e",
    },

    axisTicks: {
        show: true,
        color: "#55596e",
    },

    labels: {
        style: {
            colors: "#f5f7ff",
        },
    },

  },

  yaxis : {
    labels:{
      formatter: function(val) {
        console.log("Original value:", val);
        var billion = val / 1000; // 将百万转换为亿
        var formattedValue = billion >= 1 ? billion.toFixed(1) + 'billion' : val + 'million';
        console.log("Formatted value:", formattedValue);
        return formattedValue;
      },
      
      style: {
        colors: "f5f7ff",
      },
    },
    title: {
        text: "Count",
        style: {
            color: "#f5f7ff",
        },
    },

    axisBorder: {
        color: "#55596e",
        show: true,
    },

    axisTicks: {
        color: "#55596e",
    },

    labels: {
        style: {
            colors: "#f5f7ff",
        },
    },
  }
  };

  var chart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
  chart.render();

// area chart-------------------------------

  //bar chart Energy
var barChartOptions = {
    series: [{
    data: [15.11, 7.10, 6.18, 2.71, 1.63, 1.17, 0.655, 0.268],
    name: "Products",
  }],
    chart: {
    type: 'bar',
    background: "transparent",
    height: 350,
    toolbar: {
        show: false,
    },
  },

  colors: [
    "#2962ff",
    "#d50000",
    "#2e7d32",
    "#ff6d00",
    "#583cb3",
  ],
  
  plotOptions: {
    bar: {
        distributed:true,
        borderRadius: 4,
        horizontal: true,
        columnWidh: "40%",
    }
  },
  dataLabels: {
    enabled: false
  },

  fill: {
    opacity: 1,
  },

  grid: {
    borderColor: "#55596e",
    yaxis: {
        lines: {
            show: true,
        },
    },
    xaxis: {
        lines: {
            show: true,
        },
    },
  },

  legend: {
    labels: {
        colors:"#f5f7ff",
    },
    show: true,
    position: "top",
  },

  stroke: {
    colors: ["transparent"],
    show: true,
    width: 2
  },

  tooltip: {
    y: {
      formatter: function(val) {
        console.log("Original value:", val);
        var billion = val / 1000; // 将百万转换为亿
        var formattedValue = billion >= 1 ? billion.toFixed(1) + 'billion' : val + 'million';
        console.log("Formatted value:", formattedValue);
        return formattedValue;
      }
      
      
    },
    shared: true,
    intersect: false,
    theme: "dark",
  },


  xaxis: {
    categories: ['Electric and heat', 'Transport', 'Manufacturing and Construction', 'Buildings', 'Industry', 'Land-use change and forestry', 'Other fuel combution',
      'Fugitive emissions'
    ],
    title: {
        style: {
            color: "#f5f7ff",
        },
    },

    axisBorder: {
        show: true,
        color: "#55596e",
    },

    axisTicks: {
        show: true,
        color: "#55596e",
    },

    labels: {
        style: {
            colors: "#f5f7ff",
        },
    },

  },

  yaxis : {
    title: {
        text: "Count",
        style: {
            color: "#f5f7ff",
        },
    },

    axisBorder: {
        color: "#55596e",
        show: true,
    },

    axisTicks: {
        color: "#55596e",
    },

    labels: {
        style: {
            colors: "#f5f7ff",
        },
    },
  }
  };



  var chart = new ApexCharts(document.querySelector("#bar-chart2"), barChartOptions);
  chart.render();